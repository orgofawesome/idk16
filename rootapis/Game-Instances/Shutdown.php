<?php
header("content-type: application/json");

try {
	$userId = ($isUserAuthenticated) ? $userInfo["id"] : throw new Exception("Not authenticated");
	
	$placeId = $_POST["placeid"] ?? throw new Exception("Missing placeId char");
	$gameId = $_POST["gameid"] ?? throw new Exception("Missing gameId char");
	
	$assetInfo = AssetService::getAssetInfo($placeId);
	
	if ($assetInfo == false)
		throw new Exception("Asset does not exist");
	
	if ($assetInfo["typeid"] !== 9)
		throw new Exception("Asset is not a place");
	
	if ($userId !== $assetInfo["creatorId"])
		throw new Exception("Asset is not owned by user. $userId vs {$assetInfo['creatorId']}");
	
	$stmt = $gameServPDO->prepare("SELECT * FROM serverinstances WHERE serverPlaceId = :placeId AND serverGameId = :gameId");
	$stmt->bindParam(':placeId', $placeId, PDO::PARAM_INT);
	$stmt->bindParam(':gameId', $gameId, PDO::PARAM_STR);
	$stmt->execute();
	
	if ($stmt->rowCount() == 0)
		throw new Exception("Invalid gameserver");
	
	$stmt = $gameServPDO->prepare("INSERT INTO awaitingjobs (timeRequested, actionRequested, placeId, gameId) VALUES (:time, 13, :placeId, :gameId)");
	$stmt->bindValue(':time', time());
	$stmt->bindParam(':placeId', $placeId, PDO::PARAM_INT);
	$stmt->bindParam(':gameId', $gameId, PDO::PARAM_STR);
	$stmt->execute();
	
	$json = [
				'placeId' => $assetInfo["id"],
				'privateServerId' => null,
				'gameId' => $gameId
	];
	
	die(json_encode($json));
}
catch (Exception $e){
	http_response_code(400);
}

?>
