<?php
header("content-type: application/json");
$json = [];

if ($_GET["rqtype"] !== "purchase"){
	die();
}

if (!$isUserAuthenticated){
	http_response_code(500);
	$json["showDivID"] = "TransactionFailureView";
	$json["title"] = "Error";
	$json["errorMsg"] = "An error occured while processing this transaction. No ROBUX have been removed from your account. Please try again later.";
	die(json_encode($json));
}

$productId = intval($_GET["productid"]) ?? 0;
$assetId = AssetService::convertProductToAsset($productId);
$expectedPrice = (isset($_GET["expectedprice"])) ? intval($_GET["expectedprice"]) : die(json_encode($json));
$expectedSeller = (isset($_GET["expectedsellerid"])) ? intval($_GET["expectedsellerid"]) : die(json_encode($json));
$locationType = 0;
$locationId = 0;

// No such asset linked to the productid, die..
if (!$assetId){
	http_response_code(500);
	$json["showDivID"] = "TransactionFailureView";
	$json["title"] = "Error";
	$json["errorMsg"] = "An error occured while processing this transaction. No ROBUX have been removed from your account. Please try again later.";
	die(json_encode($json));
}

$assetInfo = AssetService::getAssetInfo($assetId); // Fetch the latest information of this asset

if ($expectedSeller !== $assetInfo["creatorId"]){
	http_response_code(500);
	$json["showDivID"] = "TransactionFailureView";
	$json["title"] = "Error";
	$json["errorMsg"] = "An error occured while processing this transaction. No ROBUX have been removed from your account. Please try again later.";
	die(json_encode($json));
}
	
if (AssetService::doesUserOwnAsset($assetId, $userInfo['id'])){
	http_response_code(500);
	$json["showDivID"] = "TransactionFailureView";
	$json["title"] = "Error";
	$json["errorMsg"] = "You already own this item.";
	die(json_encode($json));
}

// We want to make sure that the price is the same as the expected so that we don't scam the user
if ($assetInfo["price"] !== $expectedPrice){
	http_response_code(500);
	$json["showDivID"] = "PriceChangedView";
	$json["expectedPrice"] = $expectedPrice;
	$json["currentPrice"] = $assetInfo["price"];
	$json["balanceAfterSale"] = $userInfo['robuxBalance'] - $assetInfo["price"];
	die(json_encode($json));
}

if ($userInfo['robuxBalance'] < $expectedPrice){
	http_response_code(500);
	$json["showDivID"] = "InsufficientFundsView";
	$json["currentCurrency"] = 1;
	$json["shortfallPrice"] = $expectedPrice - $userInfo['robuxBalance'];
	die(json_encode($json));
}

try {
	$pdo->beginTransaction();
	$purchaseTime = time();
	
	$stmt = $authPDO->prepare("UPDATE users SET robuxBalance = robuxBalance - :robux WHERE id = :userId");
	$stmt->bindParam(':robux', $expectedPrice);
	$stmt->bindParam(':userId', $userInfo['id']);
	$stmt->execute();
	
	$stmt = $pdo->prepare("INSERT INTO transactions (userId, assetId, reason, locationType, locationPlaceId, robux) VALUES (:userId, :assetId, 1, :locationType, :locationPlaceId, :robux)");
	$stmt->bindParam(':userId', $userInfo['id']);
	$stmt->bindParam(':assetId', $assetId, PDO::PARAM_INT);
	$stmt->bindParam(':locationType', $locationType);
	$stmt->bindParam(':locationPlaceId', $locationId);
	$stmt->bindParam(':robux', $expectedPrice);
	$stmt->execute();
	
	$stmt = $pdo->prepare("INSERT INTO inventory (userId, assetId, assetType, purchasedWhen) VALUES (:userId, :assetId, :assetType, :date)");
	$stmt->bindParam(':userId', $userInfo['id']);
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
	
	$json["TransactionVerb"] = "purchased";
	$json["AssetName"] = $assetInfo["name"];
	$json["AssetType"] = $asset_types[$assetInfo["typeid"]];
	$json["SellerName"] = UserAuthentication::lookupNameById($assetInfo["creatorId"]);
	$json["Price"] = $assetInfo["price"];
}
catch (Exception $e){
	$pdo->rollback();
	http_response_code(500);
	$json["showDivID"] = "TransactionFailureView";
}

die(json_encode($json));
?>