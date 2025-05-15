<?php
header("content-type: application/json");
$json = [
	"success" => false
];

if (!$isUserAuthenticated){
	$json["status"] = "Error";
	die(json_encode($json));
}

$productId = intval($_POST["productid"]) ?? 0;
$assetId = AssetService::convertProductToAsset($productId);
$expectedPrice = (isset($_POST["purchaseprice"])) ? intval($_POST["purchaseprice"]) : die(json_encode($json));
$locationType = (isset($_POST["locationtype"])) ? $_POST["locationtype"] : "Unknown";
$locationId = (isset($_POST["locationid"])) ? intval($_POST["locationid"]) : 0;
$userId = $userInfo['id'];

switch ($locationType)
{
	case "Game":
		$locationType = 1;
	break;
	
	default: 
		$locationType = 0;
	break;
}

// No such asset linked to the productid, die..
if (!$assetId){
	$json["status"] = "Error";
	die(json_encode($json));
}

$assetInfo = AssetService::getAssetInfo($assetId); // Fetch the latest information of this asset

if (AssetService::doesUserOwnAsset($assetId, $userId)){
	$json["status"] = "AlreadyOwned";
	die(json_encode($json));
}

// We want to make sure that the price is the same as the expected so that we don't scam the user
if ($assetInfo["price"] !== $expectedPrice){
	$json["status"] = "Error";
	die(json_encode($json));
}

if ($userInfo['robuxBalance'] < $expectedPrice){
	$json["status"] = "Error";
	die(json_encode($json));
}

try {
	$pdo->beginTransaction();
	$purchaseTime = time();
	
	$stmt = $authPDO->prepare("UPDATE users SET robuxBalance = robuxBalance - :robux WHERE id = :userId");
	$stmt->bindParam(':robux', $expectedPrice);
	$stmt->bindParam(':userId', $userId);
	$stmt->execute();
	
	$stmt = $pdo->prepare("INSERT INTO transactions (userId, assetId, reason, locationType, locationPlaceId, robux) VALUES (:userId, :assetId, 1, :locationType, :locationPlaceId, :robux)");
	$stmt->bindParam(':userId', $userId);
	$stmt->bindParam(':assetId', $assetId, PDO::PARAM_INT);
	$stmt->bindParam(':locationType', $locationType);
	$stmt->bindParam(':locationPlaceId', $locationId);
	$stmt->bindParam(':robux', $expectedPrice);
	$stmt->execute();
	
	$stmt = $pdo->prepare("INSERT INTO inventory (userId, assetId, assetType, purchasedWhen) VALUES (:userId, :assetId, :assetType, :date)");
	$stmt->bindParam(':userId', $userId);
	$stmt->bindParam(':assetId', $assetId, PDO::PARAM_INT);
	$stmt->bindParam(':assetType', $assetInfo["typeid"]);
	$stmt->bindParam(':date', $purchaseTime);
	$stmt->execute();
	
	$stmt = $pdo->prepare("INSERT INTO transactions (userId, assetId, reason, locationType, locationPlaceId, robux) VALUES (:sellerId, :assetId, 2, :locationType, :locationPlaceId, :robux)");
	$stmt->bindParam(':sellerId', $assetInfo["creatorId"]);
	$stmt->bindParam(':assetId', $assetId, PDO::PARAM_INT);
	$stmt->bindParam(':locationType', $locationType);
	$stmt->bindParam(':locationPlaceId', $locationId);
	$stmt->bindValue(':robux', $expectedPrice * 0.70);
	$stmt->execute();
	
	$stmt = $authPDO->prepare("UPDATE users SET robuxBalance = robuxBalance + :robux WHERE id = :sellerId");
	$stmt->bindValue(':robux', $expectedPrice * 0.70);
	$stmt->bindParam(':sellerId', $assetInfo["creatorId"]);
	$stmt->execute();
	
	$stmt = $authPDO->prepare("UPDATE users SET robuxBalance = robuxBalance + :robux WHERE id = 1");
	$stmt->bindValue(':robux', $expectedPrice * 0.30);
	$stmt->execute();
	$pdo->commit();
	$json["success"] = true;
}
catch (Exception $e){
	$pdo->rollback();
	$json["status"] = "Error";
}

die(json_encode($json));
?>