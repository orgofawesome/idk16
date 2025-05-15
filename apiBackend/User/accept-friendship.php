<?php
if (!$isUserAuthenticated){
	$json = [ "errors" => [ [ "code" => 403, "message" => "Forbidden" ] ] ];
	http_response_code(403);
	die(json_encode($json));
}

$userId = $userInfo['id'];
$followedUserId = (int)$_GET["requesteruserid"] ?? 0;
$json = [];
$successResponse = true;

if ($followedUserId == $userId){
	die(http_response_code(404));
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
	http_response_code(400);
	$successResponse = false;
	$json["success"] = false;
	$json["message"] = "InternalServerError";
}

if ($followedUserId == 0){
	http_response_code(400);
	$successResponse = false;
	$json["success"] = false;
	$json["message"] = "Invalid recipient";
}else{
	if (!$userLookup->doesUserExist($followedUserId)){
		http_response_code(400);
		$successResponse = false;
		$json["success"] = false;
		$json["message"] = "Invalid recipient";
	}
}

if ($successResponse){
	$stmt = $authPDO->prepare("SELECT * FROM friendreq WHERE requester = :followed AND requested = :userid AND accepted = 0");
	$stmt->bindParam(':followed', $followedUserId, PDO::PARAM_INT);
	$stmt->bindParam(':userid', $userId, PDO::PARAM_INT);
	$stmt->execute();  
	$didUserRequest = $stmt->rowCount();
	
	if ($didUserRequest !== 0){
		$stmt = $authPDO->prepare("UPDATE friendreq SET accepted = 1, dateaccept = :time WHERE requester = :followed AND requested = :userid");
		$stmt->bindParam(":userid", $userId, PDO::PARAM_INT);
		$stmt->bindParam(":followed", $followedUserId, PDO::PARAM_INT);
		$stmt->bindValue(":time", time());
		$stmt->execute();

		$stmt = $authPDO->prepare("DELETE FROM friendreq WHERE requester = :userid AND requested = :followed");
		$stmt->bindParam(":userid", $userId, PDO::PARAM_INT);
		$stmt->bindParam(":followed", $followedUserId, PDO::PARAM_INT);
		$stmt->bindValue(":time", time());
		
		if ($stmt->execute()){
			$json["success"] = true;
			$json["message"] = "Success";
		}else
			$successResponse = false;
	}else{
			$json["success"] = false;
			$json["message"] = "No friend request";
	}
}

if ($successResponse === false && !isset($json["message"])){
	$json["success"] = false;
	$json["message"] = "InternalServerError";
}

die(json_encode($json));
?>