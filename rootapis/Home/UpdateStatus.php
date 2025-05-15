<?php
header("Content-Type: application/json");

try {
	if (!$isUserAuthenticated){
		throw new Exception("Unauthenticated");
	}

	$userId = $userInfo["id"];
	$time = time();
	$ratelimit = time() - 500;

	$stmt = $pdo->prepare("SELECT * FROM `feed` WHERE `userType` = 1 AND `userId` = :userId AND `time` > $ratelimit");
	$stmt->bindParam(':userId', $userId);
	$stmt->execute();

	if ($stmt->rowCount() > 3){
		throw new Exception("Ratelimited");
	}

	$statusMessage = $_POST["status"] ?? "";
	$size = strlen($statusMessage);

	if ($size > 255){
		throw new Exception("The user status is too big.");
	}
	
	if ($size == 0){
		throw new Exception("There is no user status set.");
	}
	
	$stmt = $pdo->prepare("INSERT INTO feed (userId, userType, time, userStatus) VALUES (:userId, 1, :time, :status)");
	$stmt->bindParam(':userId', $userId);
	$stmt->bindParam(':time', $time);
	$stmt->bindParam(':status', $statusMessage);
	$stmt->execute();
	
	
	$json = [
		'success' => true,
		'message' => htmlspecialchars($statusMessage)
	];
	
	die(json_encode($json));	
}catch (Exception $e){
	$json = [ 
		'success' => false,
		'message' => $e->getMessage()
	];
	
	http_response_code(400);
	
	die(json_encode($json));
}

?>