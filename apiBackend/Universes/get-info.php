<?php

try{
	$universeId = $_GET["universeid"] ?? throw new Exception("Missing universeId variable");
	
	$stmt = $pdo->prepare("SELECT * FROM assets WHERE universeId = :universeId AND isRootPlace = 1");
	$stmt->bindParam(':universeId', $universeId, PDO::PARAM_INT);
	$stmt->execute();
	
	if ($stmt->rowCount() == 0)
		throw new Exception("Asset does not exist or not a place");
	
	$assetInfo = $stmt->fetch(PDO::FETCH_ASSOC);
	$avatarTypes = [
        0 => "PlayerChoice",
        1 => "MorphToR6",
        2 => "MorphToR15"
    ];
	
	$editPermissions = AssetService::doesUserHavePermissionToGetAsset($assetInfo["assetId"], $isUserAuthenticated, $userInfo['id'], null, true);
	
	$json = [
				'Name' => $assetInfo["assetName"],
				'Description' => $assetInfo["assetDescription"],
				'RootPlace' => $assetInfo["assetId"],
				'StudioAccessToApisAllowed' => false,
				'CurrentUserHasEditPermissions' => $editPermissions,
				'UniverseAvatarType' => $avatarTypes[$assetInfo["avatarSetting"]]
	];
	
	die(json_encode($json));
}

catch (Exception $e){
	$error = [
				'errors' => [
								[
									'code' => 400,
									'message' => 'BadRequest'
								]
							]
			];
			
	die(json_encode($error));
}