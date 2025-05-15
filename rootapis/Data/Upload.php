<?php

try 
{
    if (!$isUserAuthenticated){
        throw new Exception("Publish API: Someone attempted to publish without authentication");
    }

    $assetTypes = array_flip($asset_types);
    $assetType = $_GET["type"] ?? throw new Exception("Publish API: Missing asset type, unknown publish");
    $assetId = $_GET["assetid"] ?? throw new Exception("Publish API: Missing asset ID");
    $assetName = $_GET["name"] ?? throw new Exception("Publish API: Missing asset Name");
    $assetDesc = $_GET["description"] ?? throw new Exception("Publish API: Missing asset Desc");
    $genre = $_GET['genretypeid'] ?? 1;
    $uncopylocked = $_GET['ispublic'] ?? throw new Exception("Publish API: Missing uncopylock check");

    switch ( $uncopylocked )
    {
        case "True":
        case "true":
            $uncopylocked = true;
            break;

        case "False":
        case "false":
            $uncopylocked = false;
            break;

        default: 
            throw new Exception("Publish API: Invalid uncopylock value");
            break;
    }

    if ( !isset($genre_types[$genre]) ){
        throw new Exception("Publish API: Invalid genre");
    }

    if (!isset($assetTypes[$assetType])){
        throw new Exception("Publish API: Someone attempted to publish with a invalid asset type");
    }

    $allowedTypes = [ 9 ];

    if (!in_array($assetTypes[$assetType], $allowedTypes)){
        throw new Exception("Publish API: This is a disallowed asset type: {$assetTypes[$assetType]}");
    }

    $settings = [
        'genreType' => $genre,
        'allowCopying' => $uncopylocked
    ];

    if ( $assetId == "0" || $assetId == 0 ){
        $assetId = AssetService::createNewAsset( $assetName, $assetDesc, $assetTypes[$assetType], 1, $userInfo['id'], $settings);
    }else{
        $checker = AssetService::doesUserHavePermissionToGetAsset( $assetId );

        if ( !$checker ){
            throw new Exception("Publish API: User tried to edit a place unauthorised");
        }
    }

    if (AssetService::uploadAssetContent( $assetId, base64_encode(gzdecode(file_get_contents("php://input"))), $assetTypes[$assetType] )){
        die($assetId);
    }
}
catch (Exception $e)
{
    $errorReport = Telemetry::reportError($e->getMessage(), $userInfo['id'] );
	die(header("Location: https://www.$domain/request-error?code=400&id=$errorReport"));
}