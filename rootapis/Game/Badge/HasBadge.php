<?php
header("content-type: text/plain");

$userId = intval($_GET["userid"]) ?? 0;
$badgeId = intval($_GET["badgeid"]) ?? 0;

if ($userId == 0 || $badgeId == 0){
    die("Failure");
}

$stmt = $pdo->prepare("SELECT * FROM inventory WHERE assetType = 21 AND assetId = :badgeId AND userId = :userId");
$stmt->bindParam(':badgeId', $badgeId);
$stmt->bindParam(':userId', $userId);
$stmt->execute();

if ($stmt->rowCount() == 0)
    echo "Failure";
else
    echo "Success";

?>