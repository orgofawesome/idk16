<?php
header("content-type: text/plain");

$stmt = $authPDO->prepare("SELECT clientStatus FROM clientstatus WHERE browserTrackerId = :browserId");
$stmt->bindParam(':browserId', $rbxEventTracker["browserid"], PDO::PARAM_INT);
$stmt->execute();

$result = $stmt->fetchColumn() ?? "Unknown";

die($result);
?>