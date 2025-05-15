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
?>