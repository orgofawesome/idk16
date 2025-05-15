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

    $json = (array)json_decode(file_get_contents("https://thumbnails.roproxy.com/v1/assets?assetIds=".$assetId."&size=".$width."x".$height."&format=".$format));
	header("Location: ".$json["data"][0]->imageUrl);    
}else{
    $stmt = $pdo->prepare("SELECT `assetTypeId`, `thumbnails` FROM assets WHERE assetId = :assetId");
    $stmt->bindParam(':assetId', $assetId, PDO::PARAM_INT);
    $stmt->execute();

    $assetInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($assetInfo["assetTypeId"] == 9){
        $thumbnails = $assetInfo["thumbnails"];

        if (isset($thumbnails) && $thumbnails !== ""){
            $thumbnails = json_decode($thumbnails);

            if (count($thumbnails) !== 0)
                $assetId = $thumbnails[0];
        }
    }

    $allowedResolutions = [
        '48x48',
        '60x62',
        '75x75',
        '100x100',
        '110x110',
        '160x100',
        '250x250',
        '352x352',
        '420x230',
        '420x420'
    ];

    $rowName = $width . "x" . $height;

    if (in_array($rowName, $allowedResolutions))
    {
        $result = ThumbnailService::requestAssetThumbnail($assetId, $width, $height);
    }

    if (!isset($result)){
        die(http_response_code(409));
    }else{
        die(header("Location: $result"));
    }
}
?>