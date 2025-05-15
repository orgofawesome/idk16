<?php
if (!$isUserAuthenticated){
	$json = [ "errors" => [ [ "code" => 403, "message" => "Forbidden" ] ] ];
	http_response_code(403);
	die(json_encode($json));
}

$userId = $userInfo['id'];
$followedUserId = (int)$_POST["followeduserid"];
$json = [];
$successResponse = true;

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

	if ($userthing == 1){
		$stmt = $authPDO->prepare("DELETE FROM followers WHERE requesterid = :userId AND followingid = :followedUserId");
		$stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
		$stmt->bindParam(":followedUserId", $followedUserId, PDO::PARAM_INT);

		if ($stmt->execute()){
			$json["success"] = true;
			$json["message"] = "Success";
		}else
			$successResponse = false;
	}else
		$successResponse = false;
}

if ($successResponse === false && !isset($json["message"])){
	http_response_code(500);
	$json["success"] = false;
	$json["message"] = "InternalServerError";
}

die(json_encode($json));
?>