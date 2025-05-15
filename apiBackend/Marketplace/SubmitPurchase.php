<?php
header("content-type: application/json");

function GUID()
{
    if (function_exists('com_create_guid') === true)
    {
        return trim(com_create_guid(), '{}');
    }

    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}

$json = [
	"success" => false,
	"receipt" => ""
];



if (!$isUserAuthenticated){
	$json["status"] = "Error";
	die(json_encode($json));
}

$productId = intval($_POST["productid"]) ?? 0;
$assetId = AssetService::convertProductToAsset($productId);

if ($assetId !== 0){
	$json["status"] = "Error";
	die(json_encode($json));
}

$expectedPrice = (isset($_POST["expectedunitprice"])) ? intval($_POST["expectedunitprice"]) : die(json_encode($json));
$locationId = (isset($_POST["placeid"])) ? intval($_POST["placeid"]) : 0;
$userId = $userInfo['id'];

if ($locationId == 0){
	$json["status"] = "Error";
	die(json_encode($json));
}

$stmt = $pdo->prepare("SELECT * FROM assets WHERE productId = :productId");
$stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
$stmt->execute();
$assetInfo = $stmt->fetch(PDO::FETCH_ASSOC);

// We want to make sure that the price is the same as the expected so that we don't scam the user
if ($assetInfo["priceInRobux"] !== $expectedPrice){
	$json["status"] = "Error";
	die(json_encode($json));
}

if ($userInfo["robuxBalance"] < $expectedPrice){
	$json["status"] = "Error";
	die(json_encode($json));
}

try {
	$pdo->beginTransaction();
	$purchaseTime = time();
	$receiptId = GUID();
	
	$stmt = $authPDO->prepare("UPDATE users SET robuxBalance = robuxBalance - :robux WHERE id = :userId");
	$stmt->bindParam(':robux', $expectedPrice);
	$stmt->bindParam(':userId', $userId);
	$stmt->execute();
	
	$stmt = $pdo->prepare("INSERT INTO transactions (userId, assetId, reason, locationType, locationPlaceId, robux) VALUES (:userId, 0, 1, 1, :locationPlaceId, :robux)");
	$stmt->bindParam(':userId', $userId);
	$stmt->bindParam(':locationPlaceId', $locationId);
	$stmt->bindParam(':robux', $expectedPrice);
	$stmt->execute();
	
	$stmt = $pdo->prepare("INSERT INTO receipts (playerId, productId, unitPrice, time, receiptId, placeId) VALUES (:userId, :assetId, :assetType, :date, :receiptId, :placeId)");
	$stmt->bindParam(':userId', $userId);
	$stmt->bindParam(':assetId', $productId, PDO::PARAM_INT);
	$stmt->bindParam(':assetType', $expectedPrice);
	$stmt->bindParam(':date', $purchaseTime);
	$stmt->bindParam(':receiptId', $receiptId);
	$stmt->bindParam(':placeId', $locationId);
	$stmt->execute();
	
	$stmt = $pdo->prepare("INSERT INTO transactions (userId, assetId, reason, locationType, locationPlaceId, robux) VALUES (:sellerId, 0, 2, 1, :locationPlaceId, :robux)");
	$stmt->bindParam(':sellerId', $assetInfo["creatorId"]);
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
	$json["receipt"] = $receiptId;
}
catch (Exception $e){
	$pdo->rollback();
	$json["status"] = "Error";
}

die(json_encode($json));
?>