<?php
header("content-type: application/json");
header("Access-Control-Allow-Origin: https://www.$domain");
header("Access-Control-Allow-Credentials: true");

$stmt = $pdo->prepare("SELECT obj FROM idk16assets WHERE assetId = :id");
$stmt->bindParam(':id', $_GET["assetid"], PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchColumn();

if ($result == null){
    die(header("Location: https://www.idk18.xyz/request-error"));
}

$url = "https://t1.idk18.xyz/$result";

$json = [
    "Url" => $url,
    "Final" => true
];

die(json_encode($json, JSON_UNESCAPED_SLASHES));
?>