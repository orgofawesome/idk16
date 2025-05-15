<?php
if (!$isUserAuthenticated){
	$json = [ "errors" => [ [ "code" => 403, "message" => "Forbidden" ] ] ];
	http_response_code(403);
	die(json_encode($json));
}

$userId = $userInfo["id"];

$json = [];
$successResponse = true;

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

if ($successResponse){
	$stmt = $authPDO->prepare("DELETE FROM friendreq WHERE requested = :userid AND accepted = 0");
	$stmt->bindParam(":userid", $userId, PDO::PARAM_INT);
		
	if ($stmt->execute()){
		$json["success"] = true;
		$json["message"] = "Success";
	}else{
		$successResponse = false;
	}
}

if ($successResponse === false && !isset($json["message"])){
	$json["success"] = false;
	$json["message"] = "InternalServerError";
}

die(json_encode($json));
?>