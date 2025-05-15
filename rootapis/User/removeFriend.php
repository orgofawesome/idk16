<?php
if (!$isUserAuthenticated){
	$json = [ "errors" => [ [ "code" => 403, "message" => "Forbidden" ] ] ];
	http_response_code(403);
	die(json_encode($json));
}

$userId = $userInfo['id'];
$post = file_get_contents("php://input");
$post = json_decode($post);
$followedUserId = $post->targetUserID ?? 0;
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

$array = [ $followedUserId, $userId ];
sort($array);
$statement = "{$array[0]}-{$array[1]}";

if ($successResponse){
	$stmt = $authPDO->prepare("SELECT * FROM friendreq WHERE stmt = :statement");
	$stmt->bindParam(":statement", $statement);
	$stmt->execute();  
	$didUserRequest = $stmt->rowCount();
	
	if ($didUserRequest !== 0){
		$stmt = $authPDO->prepare("DELETE FROM friendreq WHERE stmt = :statement");
		$stmt->bindParam(":statement", $statement);
		$stmt->execute();
	}
}

$json = [
	'success' => true
];

die(json_encode($json));
?>