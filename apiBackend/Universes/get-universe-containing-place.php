<?php

try{
	$placeId = $_GET["placeid"] ?? throw new Exception("Missing place ID variable");
	
	if (!AssetService::doesUserUploadedAssetExist($placeId))
		throw new Exception("Asset does not exist");
	
	$assetInfo = AssetService::getAssetInfo($placeId);
	
	if ($assetInfo["typeid"] !== 9)
		throw new Exception("Asset is not a place");
	
	$json = [
				'UniverseId' => $assetInfo["universeid"]
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