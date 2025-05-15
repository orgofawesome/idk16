<?php
$userId = $_GET["userid"] ?? 0;
$badgeId = $_GET["badeid"] ?? 0;
$placeId = $_GET["placeid"] ?? 0;
header("content-type: text/plain");

if ($_SERVER["HTTP_ACCESSKEY"] !== $server["RCCAccessKey"]){
    die(http_response_code(500));
}

if (!$userLookup->doesUserExist($userId)){
    die("0");
}

$stmt = $pdo->prepare("SELECT * FROM inventory WHERE assetType = 21 AND assetId = :badgeId AND userId = :userId");
$stmt->bindParam(':badgeId', $badgeId);
$stmt->bindParam(':userId', $userId);
$stmt->execute();

if ($stmt->rowCount() == 1){
    die("0");
}

$stmt = $pdo->prepare("SELECT * FROM assets WHERE assetId = :badgeId AND assetTypeId = 21");
$stmt->bindParam(':badgeId', $badgeId);
$stmt->execute();

if ($stmt->rowCount() == 0){
    die("0");
}

$badgeInfo = $stmt->fetch(PDO::FETCH_ASSOC);
$gameInfo = AssetService::getAssetInfo($placeId);

if (!$gameInfo || !$badgeInfo || $gameInfo["universeid"] !== $badgeInfo["universeId"]){
    die("0");
}

$username = UserAuthentication::lookupNameById($userId);
$badgeCreatorName = UserAuthentication::lookupNameById($badgeInfo["creatorId"]);
$badgeName = $badgeInfo["assetName"];

$stmt = $pdo->prepare("INSERT INTO inventory (userId, assetId, assetType, purchasedWhen) VALUES (:userId, :badgeId, 21, :currentTime)");
$stmt->bindParam(':userId', $userId);
$stmt->bindParam(':badgeId', $badgeId);
$stmt->bindValue(':currentTime', time());

if ($stmt->execute()){
    $response = "$username won $badgeCreatorName's " . '"' . $badgeName . '"' . " award!";
    die($response);
}else{
    die;
}
?>