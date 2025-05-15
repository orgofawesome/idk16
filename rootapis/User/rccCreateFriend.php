<?php
$userId = $_GET["seconduserid"];
$followedUserId = $_GET["firstuserid"];
$json = [];
$successResponse = true;

if ($followedUserId == $userId){
	die(http_response_code(404));
}

if ($followedUserId == 0){
	http_response_code(400);
}else{
	if (!$userLookup->doesUserExist($followedUserId)){
		http_response_code(400);
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
		$stmt->execute();
	}
}

die();
?>