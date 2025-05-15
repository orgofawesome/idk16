<?php
header("content-type: text/plain");


try {
    $placeId = $_GET["destinationplaceid"] ?? throw new Exception("Invalid request");
    $origin = $_GET["originplaceid"] ?? throw new Exception("Invalid request");

    $assetInfo = AssetService::getAssetInfo($placeId) ?? throw new Exception("Invalid Place");

    if ($assetInfo['rootPlace'] !== 1){
        if ($assetInfo["typeid"] !== 9){
            throw new Exception('Not a place');
        }
    
        if ($origin == 0){
            throw new Exception("User tried to join a subplace directly");
        }
    
        $originInfo = AssetService::getAssetInfo($origin);

        if ($originInfo["universeid"] !== $assetInfo["universeid"])
            throw new Exception("User tried to join a subplace by joining another universe unrelated.");
    }

    print('true');
}
catch (Exception $e){
    print('false');
}
?>