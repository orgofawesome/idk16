<?php
if (!$isUserAuthenticated){
	$json = [ "errors" => [ [ "code" => 403, "message" => "Forbidden" ] ] ];
	http_response_code(403);
	die(json_encode($json));
}

$userId = $userInfo['id'];
$followedUserId = (int)$_POST["followeduserid"] ?? 0;
$json = [];
$successResponse = true;

if ($followedUserId == $userId){
	die(http_response_code(404));
}

Telemetry::reportUsage("followAPI", $userId);
$stmt = $authPDO->prepare("SELECT * FROM apiuse WHERE apiUsed = 'followAPI' AND userId = :userId AND :timeTested < timeUsed");
$stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
$stmt->bindValue(':timeTested', time() - 60, PDO::PARAM_INT);
$stmt->execute();
$userTimes = $stmt->rowCount();
		
		
$stmt = $authPDO->prepare("SELECT * FROM apiuse WHERE apiUsed = 'followAPI' AND userIp = :userIp AND :timeTested < timeUsed");
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
	$json["message"] = "Invalid followerUserId";
}else{
	if (!$userLookup->doesUserExist($followedUserId)){
		http_response_code(400);
		$successResponse = false;
		$json["success"] = false;
		$json["message"] = "Invalid followerUserId";
	}
}

if ($successResponse){
	$stmt = $authPDO->prepare("SELECT * FROM followers WHERE requesterid = ? AND followingid = ?");
	$stmt->bindParam(2, $followedUserId, PDO::PARAM_INT);
	$stmt->bindParam(1, $userId, PDO::PARAM_INT);
	$stmt->execute();  
	$userthing = $stmt->rowCount();
	
	if ($userthing === 0){
		$stmt = $authPDO->prepare("INSERT INTO followers (requesterid, followingid, startdate) VALUES (:userId, :followedUserId, :time)");
		$stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
		$stmt->bindParam(":followedUserId", $followedUserId, PDO::PARAM_INT);
		$stmt->bindValue(":time", time());
		
		if ($stmt->execute()){
			$json["success"] = true;
			$json["message"] = "Success";
		}else
			$successResponse = false;
	}else
		$successResponse = false;
}

if ($successResponse === false && !isset($json["message"])){
	$json["success"] = false;
	$json["message"] = "InternalServerError";
}

die(json_encode($json));
?>