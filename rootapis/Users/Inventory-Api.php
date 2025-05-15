<?php
header("content-type: application/json");
$userId = $_GET["userid"] ?? 0;
$assetType = $_GET["assettypeid"] ?? 0;
$allowedSizes = [ 10, 25, 50, 100 ];
$allowedAssetTypes = [ 2, 3, 8, 9, 10, 11, 12, 13, 17, 18, 19, 21, 24, 32, 34, 38, 40, 41, 42, 43, 44, 45, 46, 47 ];

$size = $_GET["itemsperpage"] ?? 0;
$json = [
    "IsValid" => false,
    "Data" => "Unknown Error"
];

if (!$userLookup->doesUserExist($userId)){
    $json["Data"] = "User does not exist.";
    die(json_encode($json));
}

if (!in_array(intval($assetType), $allowedAssetTypes)){
    $json["Data"] = "AssetType does not exist."
    die(json_encode($json));
}

if (!in_array(intval($size), $allowedSizes)){
    $json["Data"] = "Invalid page size. Please use one of: 10, 25, 50, 100";
    die(json_encode($json));
}

die(json_encode($json));
?>
