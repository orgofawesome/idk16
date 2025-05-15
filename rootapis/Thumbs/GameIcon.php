<?php

$assetId = (int)$_GET["assetid"] ?? 0;
$width = (int)$_GET["width"] ?? 0;
$height = (int)$_GET["height"] ?? 0;
$format = $_GET["format"] ?? "png";

if ($width == 0 || $height == 0 || $assetId == 0){
    die(http_response_code(409));
}

$doesAssetExist = AssetService::doesUserUploadedAssetExist($assetId);

if (!$doesAssetExist){
    if ($height == 230){
        $height = 420; // We need to do this because Roblox returns 420x230 images under 420x420 parameters
    }

    $json = (array)json_decode(file_get_contents("https://thumbnails.roproxy.com/v1/places/gameicons?placeIds=$assetId&size=".$width."x".$height."&format=".$format));
	header("Location: ".$json["data"][0]->imageUrl);    
}else{
    $stmt = $pdo->prepare("SELECT `assetTypeId`, `iconImageAssetId` FROM assets WHERE assetId = :assetId");
    $stmt->bindParam(':assetId', $assetId, PDO::PARAM_INT);
    $stmt->execute();

    $assetInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($assetInfo["assetTypeId"] !== 9){
        die(http_response_code(400));
    }

    $allowedResolutions = [
        '50x50',
        '128x128',
        '150x150',
        '256x256',
        '420x420',
        '512x512',
        '576x324'
    ];

    $rowName = $width . "x" . $height;

    if (in_array($rowName, $allowedResolutions))
    {
        if ($assetInfo['iconImageAssetId'] !== 0){
            $assetId = $assetInfo['iconImageAssetId'];
            $result = ThumbnailService::requestAssetThumbnail($assetId, $width, $height);
        }else{
            $result = ThumbnailService::requestAssetThumbnail($assetId, $width, $height, 1);
        }
    
        if (!isset($result)){
            die(http_response_code(409));
        }else{
            die(header("Location: $result"));
        }
    }
}
?>