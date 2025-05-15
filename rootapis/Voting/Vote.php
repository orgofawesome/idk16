<?php
header("content-type: application/json");
$json = [];

try{
	$assetId = $_GET["assetid"] ?? die(http_response_code(400));
	$vote = $_GET["vote"] ?? die(http_response_code(400));
	$userId = ($isUserAuthenticated) ? $userInfo["id"] : throw new Exception("GuestUser");
	$assetInfo = AssetService::getAssetInfo($assetId);
	
	$allowedAssetTypes = [ 9 ];
	
	if (!in_array($assetInfo['typeid'], $allowedAssetTypes))
		throw new Exception("Blacklisted asset type");

	if ($vote !== "true" && $vote !== "false" && $vote !== "null")
		throw new Exception("Not a valid vote");
	else{
		if ($vote !== "null"){
			$voteBool = ($vote == "true") ? true : false;
			$vote = ($vote == "true") ? 1 : 0;
		}else{
			$voteBool = null;
			$vote = null;
		}
	}
	
	$stmt = $authPDO->prepare("SELECT * FROM apiuse WHERE apiUsed = 'voteToggle' AND userId = :userId AND :timeTested < timeUsed");
	$stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
	$stmt->bindValue(':timeTested', time() - 120, PDO::PARAM_INT);
	$stmt->execute();
	$userTimes = $stmt->rowCount();
		
		
	$stmt = $authPDO->prepare("SELECT * FROM apiuse WHERE apiUsed = 'voteToggle' AND userIp = :userIp AND :timeTested < timeUsed");
	$stmt->bindParam(':userIp', $_SERVER["HTTP_CF_CONNECTING_IP"], PDO::PARAM_STR);
	$stmt->bindValue(':timeTested', time() - 120, PDO::PARAM_INT);
	$stmt->execute();
	$ipTimes = $stmt->rowCount();
		
	if ($ipTimes === 10 || $userTimes === 10){
		throw new Exception('FloodCheckThresholdMet');
	}
		
	Telemetry::reportUsage("voteToggle", $userId);
	
		
	if ($vote === null){
		$stmt = $pdo->prepare("DELETE FROM votes WHERE assetId = :assetId AND userId = :userId");
		$stmt->bindParam(':assetId', $assetId);
		$stmt->bindParam(':userId', $userId);
		$stmt->execute();
	}else{
		if ($assetInfo["typeid"] == 9){
			$stmt = $authPDO->prepare("SELECT * FROM visit WHERE playerId = :userId AND placeId = :placeId");
			$stmt->bindParam(':placeId', $assetId);
			$stmt->bindParam(':userId', $userId);
			$stmt->execute(); 
			
			if ($stmt->rowCount() == 0){
				throw new Exception("PlayGame");
			}
		}
		
		$stmt = $pdo->prepare("SELECT * FROM votes WHERE assetId = :assetId AND userId = :userId");
		$stmt->bindParam(':assetId', $assetId);
		$stmt->bindParam(':userId', $userId);
		$stmt->execute();
		
		if ($stmt->rowCount() !== 0){
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			
			if ($result['vote'] == $vote){
				$stmt = $pdo->prepare("DELETE FROM votes WHERE assetId = :assetId AND userId = :userId");
				$stmt->bindParam(':assetId', $assetId);
				$stmt->bindParam(':userId', $userId);
				$stmt->execute();
				$vote = null;
				$voteBool = null;
			}else{
				$stmt = $pdo->prepare("UPDATE votes SET vote = :vote WHERE assetId = :assetId AND userId = :userId");
				$stmt->bindParam(':vote', $vote);
				$stmt->bindParam(':assetId', $assetId);
				$stmt->bindParam(':userId', $userId);
				$stmt->execute();
			}
		}else{
			$stmt = $pdo->prepare("INSERT INTO votes (vote, assetId, userId, assetType, time) VALUES (:vote, :assetId, :userId, :assetType, :time)");
			$stmt->bindParam(':vote', $vote);
			$stmt->bindParam(':assetId', $assetId);
			$stmt->bindParam(':userId', $userId);
			$stmt->bindParam(':assetType', $assetInfo["typeid"]);
			$stmt->bindValue(':time', time());
			$stmt->execute();
		}
	}
	
	$stmt = $pdo->prepare("SELECT vote FROM votes WHERE assetId = :assetId");
	$stmt->bindParam(':assetId', $assetId);
	$stmt->execute();
	
	$totalUp = 0;
	$totalDown = 0;
	
	foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $result){
		if ($result["vote"] == 1)
			$totalUp++;
		
		if ($result["vote"] == 0)
			$totalDown++;
	}
	
	
	$json["Success"] = true;
	$json["Model"] = [
							'AssetId' => $assetInfo["id"],
							'UserVote' => $voteBool,
							'UpVotes' => $totalUp,
							'DownVotes' => $totalDown,
							'Message' => ''
					];
					
	die(json_encode($json));
}
catch(Exception $e){
	$error = $e->getMessage();
	$allowedExceptions = [
							'PlayGame',
							'FloodCheckThresholdMet',
							'UseModel',
							'InstallPlugin',
							'BuyGamePass',
							'GuestUser'
	];
	
	if (!in_array($error, $allowedExceptions)){
		$error = 'FloodCheckThresholdMet';
	}

	$json["Success"] = false;
	$json["Message"] = "";
	$json["ModalType"] = $error;
	die(json_encode($json));
}