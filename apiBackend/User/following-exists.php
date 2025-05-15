<?php
$userId = (int)$_GET["userid"];
$followerUserId = (int)$_GET["followeruserid"];
$json = [];
$successResponse = true;

if ($userId == $followerUserId || $userId == 0 || $followerUserId == 0){
	http_response_code(400);
	$successResponse = false;
	$json["success"] = false;
	$json["message"] = "Invalid followerUserId/Invalid userId";
}else{
	if (!$userLookup->doesUserExist($userId) || !$userLookup->doesUserExist($followerUserId)){
		http_response_code(400);
		$successResponse = false;
		$json["success"] = false;
		$json["message"] = "Invalid followerUserId/Invalid userId";
	}
}

if ($successResponse){
	$stmt = $authPDO->prepare("SELECT * FROM followers WHERE requesterid = ? AND followingid = ?");
	$stmt->bindParam(1, $followerUserId, PDO::PARAM_INT);
	$stmt->bindParam(2, $userId, PDO::PARAM_INT);
	$stmt->execute();  
	$userthing = $stmt->rowCount();
	$json["success"] = true;
	$json["message"] = "Success";
	$json["isFollowing"] = (boolean)$userthing ?? false;
}


die(json_encode($json));
?>