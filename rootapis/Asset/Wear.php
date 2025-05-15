<?php
header("content-type: application/json");

if (!$isUserAuthenticated){
    http_response_code(404);
    die; # We don't want to deal with these people because they will most likely try to find ways around it, we don't know Roblox's original error code for this
}

try {
    # Check if the values are proper before we proceed and have errors throughout the script

    $assetId = $_POST["assetid"] ?? null; # The requested asset ID
    $equip = $_POST["equip"] ?? null; # Does user want to equip it or not
    $userId = $userInfo["id"];

    if (!is_numeric($assetId))
        throw new Exception("Wear API: User did not request a proper Asset ID");

    if ($equip !== "true" && $equip !== "false")
        throw new Exception("Wear API: User did not request a valid equip value");

    $assetId = (int)$assetId;
    $doesAssetExist = AssetService::doesUserUploadedAssetExist($assetId); # Check if it exists

    if (!$doesAssetExist)
        throw new Exception("Wear API: User has inserted an invalid asset ID");

    $doesUserOwnAsset = AssetService::doesUserOwnAsset($assetId, $userId); #  Check if user has permission to have it

    if (!$doesUserOwnAsset)
        throw new Exception("Wear API: User does not have permission to wear such asset");

    $assetTypeId = AssetService::getAssetInfo($assetId)['typeid'];

    switch ($assetTypeId)
    {
        case 41:
        case 18:
        case 12:
        case 11:
        case 8:
            break;

        default:
            throw new Exception("Wear API: This asset type is not supported yet for wearing");
            break;
    }

    $limits = [
        8 => 3,
        41 => 3,
        18 => 1,
        12 => 1,
        11 => 1
    ];

    $stmt = $pdo->prepare("SELECT wearing FROM inventory WHERE userId = ? and assetType = ? AND wearing = 1");
    $stmt->bindParam(1, $userId, PDO::PARAM_INT);
	$stmt->bindParam(2, $assetTypeId, PDO::PARAM_INT);
	$stmt->execute();
    $count = $stmt->rowCount();

    $stmt = $pdo->prepare("SELECT wearing FROM inventory WHERE userId = ? and assetId = ?");
    $stmt->bindParam(1, $userId, PDO::PARAM_INT);
	$stmt->bindParam(2, $assetId, PDO::PARAM_INT);
	$stmt->execute();

    if ($limits[$assetTypeId] - $count <= 0 && $equip == "true"){
        throw new Exception("Wear API: Limit exceeded for how many items of same type can be wore");
    }

    switch ($stmt->fetchColumn())
    {
        case 0:
            if ($equip == "false")
                break; # Would be a waste of resources continuing

            $stmt = $pdo->prepare("UPDATE inventory SET wearing = 1 WHERE userId = ? and assetId = ?");
            $stmt->bindParam(1, $userId, PDO::PARAM_INT);
            $stmt->bindParam(2, $assetId, PDO::PARAM_INT);
            $stmt->execute();
            break;

        case 1:
            if ($equip == "true")
                break;

            $stmt = $pdo->prepare("UPDATE inventory SET wearing = 0 WHERE userId = ? and assetId = ?");
            $stmt->bindParam(1, $userId, PDO::PARAM_INT);
            $stmt->bindParam(2, $assetId, PDO::PARAM_INT);
            $stmt->execute();
            break;

        default:
            throw new Exception("Wear API: Unknown error while fetching wear status");
            break;
    }

    function generateRandomString($length = 15) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
    
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
    
        return $randomString;
    }

    ThumbnailService::invalidateAllAvatarThumbnails( $userId );

    $json = [ 'isValid' => true ];
    die(json_encode($json));
}
catch (Exception $e){
    $json = [ 'isValid' => false ];
    http_response_code(400);
    die(json_encode($json));
}