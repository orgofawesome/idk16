<?php
$userId = (int)$vars["id"];
$assetId = (int)$vars["assetid"];
$json = [ "Success" => false ];

try {
	if ( !$userLookup->doesUserExist($userId) || !AssetService::doesUserUploadedAssetExist($assetId) ){
		$json["ErrorMessage"] = "Unknown user or asset";
		die(json_encode($json));
	}
    
	// We have no reason to give this a unique Asset function if its the only time this thing is being used
	$stmt = $pdo->prepare("SELECT allowedCreators FROM assets WHERE assetId = ? AND assetTypeId = 9");
	$stmt->bindParam(1, $vars['assetid']);
	$stmt->execute();
	$result = $stmt->fetchColumn();
	$result = json_decode($result);

	$json["Success"] = true;
	$json["CanManage"] = in_array($userId, $result, true) ? true : false;
}

catch (Exception $e){
	http_response_code(500);
	$json = [ 'errors' => [ [ 'code' => 500, 'message' => "InternalServerError" ] ] ];
}


die(json_encode($json));
?>