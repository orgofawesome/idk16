<?php

try
{
	if (!$isUserAuthenticated){
		throw new Exception("Unauthenticated");
	}

	$userId = $userInfo["id"];
	$post = file_get_contents("php://input");
	$post = json_decode($post);
	$followedUserId = $post->targetUserID ?? 0;
	$json = [];
	$successResponse = true;

	if ($followedUserId == $userId){
		throw new Exception("User tried to friend themselves");
	}

	Telemetry::reportUsage("friendAPI", $userId);
	$stmt = $authPDO->prepare("SELECT * FROM apiuse WHERE apiUsed = 'friendAPI' AND userId = :userId AND :timeTested < timeUsed");
	$stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
	$stmt->bindValue(':timeTested', time() - 60, PDO::PARAM_INT);
	$stmt->execute();
	$userTimes = $stmt->rowCount();
			
			
	$stmt = $authPDO->prepare("SELECT * FROM apiuse WHERE apiUsed = 'friendAPI' AND userIp = :userIp AND :timeTested < timeUsed");
	$stmt->bindParam(':userIp', $_SERVER["HTTP_CF_CONNECTING_IP"], PDO::PARAM_STR);
	$stmt->bindValue(':timeTested', time() - 60, PDO::PARAM_INT);
	$stmt->execute();
	$ipTimes = $stmt->rowCount();
			
	if ($ipTimes === 10 || $userTimes === 10){
		throw new Exception("Floodchecked");
	}

	if ($followedUserId == 0){
		throw new Exception("Invalid user");
	}else{
		if (!$userLookup->doesUserExist($followedUserId)){
			throw new Exception("Invalid user");
		}
	}

	if ($successResponse){
		$stmt = $authPDO->prepare("SELECT * FROM friendreq WHERE requester = :userid AND requested = :followed OR requested = :userid AND requester = :followed");
		$stmt->bindParam(':followed', $followedUserId, PDO::PARAM_INT);
		$stmt->bindParam(':userid', $userId, PDO::PARAM_INT);
		$stmt->execute();  
		$didUserRequest = $stmt->rowCount();
		

		if ($didUserRequest !== 0){
			$result = $stmt->fetch(PDO::FETCH_ASSOC);

			if ($result["accepted"] == 1){
				$successResponse = false;
			}elseif ($result["requested"] == $userId){
				$stmt = $authPDO->prepare("UPDATE friendreq SET accepted = 1 WHERE requester = :followed AND requested = :userid");
				$stmt->bindParam(':followed', $followedUserId, PDO::PARAM_INT);
				$stmt->bindParam(':userid', $userId, PDO::PARAM_INT);
				if ($stmt->execute())
					$successResponse = true;

			}else{
				$successResponse = false;
			}
		}

		if ($didUserRequest === 0){
			$userRow = [
				$userId,
				$followedUserId
			];

			sort($userRow);
			$statement = "{$userRow[0]}-{$userRow[1]}";

			$stmt = $authPDO->prepare("INSERT INTO friendreq (requester, requested, date, stmt) VALUES (:userId, :followedUserId, :time, :statement)");
			$stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
			$stmt->bindParam(":followedUserId", $followedUserId, PDO::PARAM_INT);
			$stmt->bindValue(":time", time());
			$stmt->bindValue(':statement', $statement);
			
			if ($stmt->execute()){
				$json["success"] = true;
				$json["message"] = "Success";
			}else
				throw new Exception("DB Error occurred, possible duplicate");
		}else{
				$json["success"] = true;
				$json["message"] = "Success";
		}
	}

	if ($successResponse === false && !isset($json["message"])){
		$json["success"] = true;
		$json["message"] = "Success";
	}

	die(json_encode($json));
}

catch (Exception $e){
	$json = [
		'success' => false,
		'message' => 'BadRequest'
	];
	
	http_response_code(400);

	die(json_encode($json));
}
?>