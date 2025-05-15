<?php

function uploadToCDN ($filename, $img_file){
    // Azure Storage Account credentials
    $accountName = "idk16";
    $accountKey = "N4tGVtngqM5zbRB0T+Ye+R5vFOmbZSWHceXJSGUT4dBsCyv7agGzItxMRLRhjXj8SbOPFsfq0To0+AStcAIquA==";
    $containerName = "content3-production";
    $blobName = $filename;
    $fileToUpload = $img_file;

    // Azure Blob Storage URL
    $blobUrl = "https://$accountName.blob.core.windows.net/$containerName/$blobName";

    // Generate request headers
    $date = gmdate('D, d M Y H:i:s T');
    $contentLength = strlen($img_file);
    $contentType = "text/plain"; // Set content type if needed
    $canonicalizedHeaders = "x-ms-blob-type:BlockBlob\nx-ms-date:$date\nx-ms-version:2020-04-08";
    $canonicalizedResource = "/$accountName/$containerName/$blobName";
    $stringToSign = "PUT\n\n\n$contentLength\n\n$contentType\n\n\n\n\n\n\nx-ms-blob-type:BlockBlob\nx-ms-date:$date\nx-ms-version:2020-04-08\n/$accountName/$containerName/$blobName";
    // Generate authorization header
    $signature = base64_encode(hash_hmac('sha256', $stringToSign, base64_decode($accountKey), true));
    $authorizationHeader = "Authorization: SharedKey $accountName:$signature";
    // cURL options
    $ch = curl_init($blobUrl);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fileToUpload);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "x-ms-blob-type: BlockBlob",
        "Content-Type: text/plain", // Set content type if needed
        "x-ms-date: " . gmdate('D, d M Y H:i:s T'),
        "x-ms-version: 2020-04-08",
        $authorizationHeader
    ]);

    $response = curl_exec($ch);

    curl_close($ch);
    return;
}


$gear_attributes_catalog = [
    0 => "Melee",
    1 => "Power Up",
    2 => "Ranged", 
    3 => "Navigation",
    4 => "Explosive",
    5 => "Musical",
    6 => "Social",
    7 => "Transport",
    8 => "Building"
];

$gear_attributes_html = [
    0 => "Melee",
    1 => "PowerUp",
    2 => "Ranged", 
    3 => "Navigation",
    4 => "Explosive",
    5 => "Musical",
    6 => "Social",
    7 => "Transport",
    8 => "Building"
];

$genre_types = [
    1 => "All",
    7 => "Town and City",
    8 => "Medieval",
    9 => "Sci-Fi",
    10 => "Fighting",
    11 => "Horror",
    12 => "Naval",
    13 => "Adventure",
    14 => "Sports",
    15 => "Comedy",
    16 => "Western",
    17 => "Military",
    19 => "Building",
    20 => "FPS",
    21 => "RPG"
];

$asset_types = [
    1 => "Image",
    2 => "TShirt",
    3 => "Audio",
    4 => "Mesh",
    5 => "Lua",
    8 => "Hat",
    9 => "Place",
    10 => "Model",
    11 => "Shirt",
    12 => "Pants",
    13 => "Decal",
    17 => "Head",
    18 => "Face",
    19 => "Gear",
    21 => "Badge",
    24 => "Animation",
    27 => "Torso",
    28 => "RightArm",
    29 => "LeftArm",
    30 => "LeftLeg",
    31 => "RightLeg",
    32 => "Package",
    34 => "GamePass",
    38 => "Plugin",
    40 => "MeshPart",
    41 => "Hair",
    42 => "FaceAccessory",
    43 => "NeckAccessory",
    44 => "ShoulderAccessory",
    45 => "FrontAccessory",
    46 => "BackAccessory",
    47 => "WaistAccessory",
    48 => "ClimbAnimation",
    49 => "DeathAnimation",
    50 => "FallAnimation",
    51 => "IdleAnimation",
    52 => "JumpAnimation",
    53 => "RunAnimation",
    54 => "SwimAnimation",
    55 => "WalkAnimation",
    56 => "PoseAnimation"
];

class AssetService {
    private static $pdo;

    public static function init($pdo) {
        self::$pdo = $pdo;
    }

    public static function getAssetInfo($id, $type = 1)
    {
        if ($type == 2){
            $stmt = self::$pdo->prepare("SELECT assetId FROM idk16assets WHERE assetVersionId = :versionId");
            $stmt->bindParam(':versionId', $id);
            $stmt->execute();

            if ($stmt->rowCount() == 0){
                return false;
            }else{
                $id = $stmt->fetchColumn();
            }
        }

        $stmt = self::$pdo->prepare("SELECT * FROM assets WHERE assetId = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() === 0)
            return false;
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $json = [
            'name' => $result["assetName"],
            'imageid' => $result["iconImageAssetId"],
            'typeid' => $result["assetTypeId"],
            'id' => $result["assetId"],
            'genretype' => $result["genreType"],
            'universeid' => $result["universeId"],
            'description' => $result["assetDescription"],
            'creatorId' => $result["creatorId"],
            'creatorType' => $result["creatorType"],
            'maxPlayers' => $result["maxPlayers"],
            'uncopylocked' => $result["isUncopylocked"],
            'forsale' => $result["isForSale"],
            'price' => $result["priceInRobux"],
            'productid' => $result["productId"],
            'created' => $result["created"],
            'updated' => $result["updated"],
            'status' => $result["assetStatus"],
            'thumbnails' => $result["thumbnails"],
            'chattype' => $result["chatType"],
            'gearattributes' => $result["gearAttributes"],
            'visitCache' => $result["visitCache"],
            'rootPlace' => $result["isRootPlace"]
        ];
        
        return $json;
    }

    public static function uploadAssetContent( $assetId, $base64_content, $assetType )
    {
        // If they are calling this function then they passed through all checks anyways
        $assetContent = base64_decode( $base64_content );

        $stmt = self::$pdo->prepare( "SELECT assetVersion FROM idk16assets WHERE assetId = :assetId" );
        $stmt->execute( [ ':assetId' => $assetId ] );

        $assetVersion = ( $stmt->rowCount() == 0 ) ? 1 : $stmt->fetchColumn() + 1;
        $assetHash = hash( 'sha256', $assetContent ); // We need to work out our own algorithm, but this will temp do
        
        uploadToCDN( $assetHash, $assetContent );
        $stmt = self::$pdo->prepare( "INSERT INTO idk16assets (assetId, assetVersion, assetHash, assetTypeId, uploadTime) VALUES (:assetId, :assetVersion, :shaHash, :typeId, :uploadTime)");
        $stmt->bindParam(':assetId', $assetId, PDO::PARAM_INT);
        $stmt->bindParam(':assetVersion', $assetVersion);
        $stmt->bindParam(':shaHash', $assetHash);
        $stmt->bindParam(':typeId', $assetType);
        $stmt->bindValue(':uploadTime', time());
        if ( $stmt->execute() )
            return true;

        return false;
    }

    public static function createNewAsset( $name, $description, $assetType, $creatorType = 1, $creatorId, $settings = [] )
    {
        switch ( $assetType )
        {
            case 9:
                $maxPlayers = $settings['maxPlayers'] ?? 18;
                $avatarSetting = $settings['avatarSetting'] ?? 1;
                $chatType = $setting['chatType'] ?? 1;
                $uncopylocked = $setting['allowCopying'] ?? 0;
                $universeId = self::reserveUniverseId( $creatorType, $creatorId );
                $genreType = $settings['genreType'] ?? 1;
                $allowedCreators = $creatorId;

                $statement = "INSERT INTO assets (assetName, assetDescription, universeId, genreType, maxPlayers, avatarSetting, chatType, isUncopylocked, isRootPlace, allowedCreators) VALUES (:name, :desc, :universe, :genre, :players, :avatar, :chat, :uncopyl, 1, :allCreators)";
                $args = [
                    ':name' => $name,
                    ':desc' => $description,
                    ':universe' => $universeId,
                    ':genre' => $genreType,
                    ':players' => $maxPlayers,
                    ':avatar' => $avatarSetting,
                    ':chat' => $chatType,
                    ':uncopyl' => $uncopylocked,
                    ':allCreators' => json_encode([ $allowedCreators ])
                ];
                break;

            case 10:
                return false;
                $uncopylocked = $setting['allowCopying'] ?? 0;

                break;

            default:
                return false;
        }

        $stmt = self::$pdo->prepare( $statement );
        $stmt->execute( $args );
        return self::$pdo->lastInsertId();
    }

    public static function getRootOfUniverse($universeId)
    {
        $stmt = self::$pdo->prepare("SELECT assetId FROM assets WHERE isRootPlace = 1 AND universeId = :universeId");
        $stmt->bindParam(':universeId', $universeId);
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public static function getAssetDownloadInfo($assetId)
    {
        $stmt = self::$pdo->prepare("SELECT assetId, assetVersion, assetVersionId FROM idk16assets WHERE assetId = :assetId ORDER BY assetVersionId DESC LIMIT 1");
        $stmt->bindParam(':assetId', $assetId);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function convertAssetToVersionId($assetId)
    {
        $stmt = self::$pdo->prepare("SELECT assetVersionId FROM idk16assets WHERE assetId = :assetId ORDER BY assetVersionId DESC LIMIT 1");
        $stmt->bindParam(':assetId', $assetId);
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public static function convertProductToAsset($productId)
    {
        $stmt = self::$pdo->prepare("SELECT assetId FROM assets WHERE productId = :productId");
        $stmt->bindParam(':productId', $productId);
        $stmt->execute();
        
        if ($stmt->rowCount() == 0){
            return false;
        }
        
        return $stmt->fetchColumn();
    }

    public static function reserveUniverseId( $userId, $userType )
    {
        $stmt = self::$pdo->prepare("INSERT INTO universeReservations (creatorId, creatorType) VALUES (:creatorId, :creatorType)");
        $stmt->execute( [ ':creatorId' => $userId, ':creatorType' => $userType ] );

        return self::$pdo->lastInsertId();
    }

    public static function getRobloxAsset($id, $version)
    {
        global $domain;
        $robloxFallbackUrl = "https://assetdelivery.roblox.com/v1/asset?id=";
        $robloxCdnUrl = "http://c0.idk18.xyz";

        if ($version > 0) {
            $url = $robloxFallbackUrl . $id . '&version=' . $version;
        }

        $stmt = self::$pdo->prepare("SELECT md5,type FROM robloxassets WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $resultCount = $stmt->rowCount();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($resultCount !== 0) {
            if ($result["type"] == 0){
                return $robloxCdnUrl . '/' . $result["md5"];
            }
        }
        
        /*if ($result["type"] === 1){
            $hash = $result["md5"];
            $st = 31;
                
            for($i = 0; $i < 32; $i++)
            {
                $st ^= ord($hash[$i]);
            }

            return 'https://c' . strval($st % 8) . '.rbxcdn.com/' . $hash;
        }*/

        if (!isset($url))
            $url = $robloxFallbackUrl . $id;

        $cookie_name = '.ROBLOSECURITY';
        $cookie_value = '_|WARNING:-DO-NOT-SHARE-THIS.--Sharing-this-will-allow-someone-to-log-in-as-you-and-to-steal-your-ROBUX-and-items.|_DDE446677714EDB6D7B9F5B81967154C8C35B04762DDCBD3445B18287EEE4B3195FE4EA2C7474A1C6C07E2B647287301A6F3B38E27976A8DE731CA1BD14B967DBEE805CF2A58007CB58E35AA9DDEDE3533993676A89FB73466B59580AD4616A590E7056AF9890EBC9868354D75E8372A2068533F845867ABE7BDC1A564FE1827DB6152001C7E795A97E9960A59DFD4EE164C07F0F380613E76A9A7CE7B8E6B19E63A787F6EBEA516C602FF3DFF7C52093960CCB5DA7D0009E5A1B2AB8146809E7D447CD47BAFBEF9E4E913E25ACBB58E99ED4FBF49368AF424EDBDFCEADEBC0EAFBF82E34CCE858D644D43A8957B93F6704BB6E1CAD6A68ED5E0BDD2AB1CC306B2AAD9AA89A2AD0C85A40B79735889B8D4E18A9295212BCC9288E8A0DC4B4843E0E40F49E279DE1AD2AA50689F68566569C39A6F8211FAC5894A507155EF1F178C64446FE7BDC0ED43FE86252DE8163DE038F572F47E3C8087D3C367F913E9C9DB585DC2F3C8D31CE195C590A2E9812F8F63F2F3E63242E188D5C0C32134F5EF531C6546769BDB8B9E1BA098D594EEB6130421283B2F246C5B54BB20CA82433EE3E1A9B24C7652A29DD8CF0B599AEAC45F6F67495DE3CBF3C4522EDC35BDEA566DB5CCE5AF6DD4164E3927B85DF6268A9EED5E4E5438D3D63B8AA99CA4EDA94B3976DAC6924800EE7C9394A5DA0B0397CF5A163BB129D9DA491EC1DDB39706997DE312A6B249491A9455D8EA2CB8FBDB0C99BC5278EE4FCC684EFA9BC0579ACF04AD115842D4A9100C0088B4D33A6ECDC4FDFCAB5C7453B1B7498A38F46614934C5AA2F9EC5A1183C782ABFDFDE4212A93BFFE9C324FC314C619D32AC1D8B3287CEBABF33E06FD660A12C985DFBC03114A968031718BECFE91DDC66F6B7DC08F177ECE736DD9E1FD220F08E57750182CF96485FDD654575D749BF034205CFFB35BAB0EA66467D7A346DEEA63877A0E87159426113CA669252A9E93B3E7A8A356939CBBFD9E659D02E386D88464C9BEB864C3287C62B1C95804CF26183FE825E5EF35D7D2ACE72137B0D02340966FDE81ECD6ADA0';
        $headers = [];
        $curl_options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_USERAGENT => 'Roblox/WinInet',
            CURLOPT_HTTPHEADER => ['Cookie: ' . urlencode($cookie_name) . '=' . urlencode($cookie_value)],
            CURLOPT_HEADERFUNCTION => function($curl, $header) use (&$headers)
                                        {
                                            $len = strlen($header);
                                            $header = explode(':', $header, 2);
                                            if (count($header) < 2) // ignore invalid headers
                                            return $len;

                                            $headers[strtolower(trim($header[0]))][] = trim($header[1]);
                                            
                                            return $len;
                                        },
            CURLOPT_SSL_VERIFYPEER => false
        ];
            
        if (strpos($url, 'https://') === 0) {
            $curl_options[CURLOPT_COOKIE] = $cookie_name . '=' . $cookie_value . '; Secure';
        }
        
        $ch = curl_init();
        curl_setopt_array($ch, $curl_options);
            
        $response = curl_exec($ch);
        
        if ($response === false || !isset($headers['location'][0])) {
            return "https://www.$domain/request-error?code=400";
        } else {
            return $headers['location'][0];
        }
    }

    public static function getAsset($id, $version = 0)
    {
        global $domain;

        $query = ($version == 0) ? "SELECT assetHash FROM idk16assets WHERE assetId = :id ORDER BY assetVersion DESC LIMIT 1" : "SELECT assetHash,assetCDN FROM idk16assets WHERE assetId = :id AND assetVersion = :vers";
        
        $stmt = self::$pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() == 0 && $version !== 0){
            $stmt = self::$pdo->prepare("SELECT assetHash FROM idk16assets WHERE assetId = :id ORDER BY assetVersion DESC LIMIT 1");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        if ($stmt->rowCount() == 0)
            return "https://www.$domain/request-error?code=400";

        return "https://c1.$domain/" . $result["assetHash"];
    }

    public static function getAssetVersionId($assetVersionId)
    {
        global $domain;

        $stmt = self::$pdo->prepare("SELECT assetHash FROM idk16assets WHERE assetVersionId = :id");
        $stmt->bindParam(':id', $assetVersionId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() == 0)
            return "https://www.$domain/request-error?code=400";

        return "https://c1.$domain/" . $result["assetHash"];
    }

    public static function doesUserOwnAsset($id, $userId = null)
    {
        $stmt = self::$pdo->prepare("SELECT userId FROM inventory WHERE userId = ? and assetId = ?");
        $stmt->bindParam(1, $userId, PDO::PARAM_INT);
        $stmt->bindParam(2, $id, PDO::PARAM_INT);
        $stmt->execute();
        
        if ($stmt->rowCount() >= 1)
            return true;
        else
            return false;
    }

    public static function getGroupName($groupId)
    {
        $stmt = self::$pdo->prepare("SELECT name FROM groups WHERE id = :groupId");
        $stmt->bindParam(':groupId', $groupId, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() == 0){
            return false;
        }

        return $stmt->fetchColumn();
    }

    public static function getGroupRank($playerId, $groupId)
    {
        $stmt = self::$pdo->prepare("SELECT rankId FROM groupmembers WHERE groupId = :groupId AND userId = :userId");
        $stmt->bindParam(':groupId', $groupId, PDO::PARAM_INT);
        $stmt->bindParam(':userId', $playerId, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() == 0){
            return false;
        }

        return $stmt->fetchColumn();
    }

    public static function doesUserUploadedAssetExist($id)
    {
        $stmt = self::$pdo->prepare("SELECT assetId FROM assets WHERE assetId = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();

        //echo $stmt->fetchColumn();
        if ($stmt->rowCount() == 0)
            return false;
        
        return true;
    }

    public static function doesUserHavePermissionToGetAsset($id, $isUserAuthenticated = false, $userId = 0, $apiKey = null, $bypassCopylock = false)
    {
        global $server;

        $id = (int)$id;

        //echo "$id\n$isUserAuthenticated\n$userId";
        $isRobloxRequest = (isset($_SERVER["HTTP_ROBLOX_PLACE_ID"]) && isset($_SERVER["HTTP_ROBLOX_GAME_ID"]) && isset($_SERVER["HTTP_ACCESSKEY"]) && isset($_SERVER["HTTP_REQUESTER"])) ? true : false;

        try
        {
            $stmt = self::$pdo->prepare("SELECT assetTypeId FROM assets WHERE assetId = :assetId");
            $stmt->bindParam(":assetId", $id);
            $stmt->execute();
        
            if ($stmt->rowCount() == 0)
                throw new Exception("An error encountered meanwhile requesting permission for an asset: Asset information failed to be fetched");

            switch ($stmt->fetchColumn())
            {
                case 9:
                case 10:
                    $stmt = self::$pdo->prepare("SELECT isUncopylocked,creatorId FROM assets WHERE assetId = :assetId");
                    $stmt->bindParam(":assetId", $id);
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($isUserAuthenticated){
                        if ($userId === $result["creatorId"])
                            break;
                    }

                    if ($result["isUncopylocked"] === 1 && $bypassCopylock === false){
                        break;
                    }

                    if ($apiKey !== null && isset($_GET["reason"])){
                        $gameServPDO = connectDatabase('gameservers');
                        $stmt = $gameServPDO->prepare("SELECT serverPlaceId FROM serverinstances WHERE ServerGameId = :gameId AND serverType = 2 AND serverHasStarted = 0");
                        $stmt->bindParam(':gameId', $apiKey);
                        $stmt->execute();

                        if ($stmt->rowCount() !== 0){
                            $placeId = (int)$id;
                            $actualPlaceId = $stmt->fetchColumn();

                            if ($placeId == $actualPlaceId){
                                break;
                            }
                        }
                    }

                    if (!$isRobloxRequest){
                        throw new Exception("An error encountered meanwhile requesting permission for an asset: You don't have permission to access this asset.");
                    }
                    
                    if ($isRobloxRequest){
                        $placeId = (int)$_SERVER["HTTP_ROBLOX_PLACE_ID"];
                        $jobId = $_SERVER["HTTP_ROBLOX_GAME_ID"];
                        $accessKey = $_SERVER["HTTP_ACCESSKEY"];
                        $requester = $_SERVER["HTTP_REQUESTER"];
                        $assetType = $_SERVER["HTTP_ASSETTYPE"];

                        switch ($requester){
                            case "Server":
                                $firstCheck = ($placeId == $id) ? true : false;
                                $secondCheck = (isset($jobId)) ? true : false;
                                $thirdCheck = ($accessKey == $server["RCCAccessKey"]) ? true : false;
                                $fourthCheck = (isset($_SERVER["HTTP_ASSETTYPE"]));

                                if ($firstCheck && $secondCheck && $thirdCheck && $fourthCheck){
                                    if ($assetType !== "Place")
                                        throw new Exception("An error encountered meanwhile requesting permission from an asset: idk16 Administration has marked this asset as moderated.");
                                    $pdo = connectDatabase('gameservers');
            
                                    $stmt = $pdo->prepare("SELECT serverHasStarted FROM serverinstances WHERE serverGameId = :jobId AND serverPlaceId = :assetId");
                                    $stmt->bindParam(":jobId", $jobId);
                                    $stmt->bindParam(":assetId", $placeId);
                                    $stmt->execute();

                                    $result = $stmt->fetchColumn();
            
                                    if ($stmt->rowCount() == 0)
                                        throw new Exception("An error encountered meanwhile requesting permission from an asset: Authenticated user does not have permission to fetch copylocked asset");
                                    
                                    if ($result == 1)
                                        throw new Exception("An error encountered meanwhile requesting permission from an asset: idk16 Administration has marked this asset as moderated.");   
                                }else
                                    throw new Exception("An error encountered meanwhile requesting permission from an asset: Authenticated user does not have permission to fetch asset.");
                            break;

                            default:
                                throw new Exception("An error encountered meanwhile requesting permission from an asset: Authenticated user does not have permission to fetch asset.");
                            break;
                        }
                    }    
                break;

                case 1:
                case 3:
                case 4:
                case 8:
                case 11:
                case 12:
                case 13:
                case 18:
                case 19:
                case 41:
                    break;

                default:
                    throw new Exception("An error encountered meanwhile requesting permission from an asset: Contact IDK16 Staff");
                    break;
            }
        }
        catch (Exception $e)
        {
            return false;
        }

        return true;
    }
}

class ThumbnailService
{
    private static $pdo;

    public static function init($pdo) {
        self::$pdo = $pdo;
    }

    public static function makeAssetThumbnail( $assetId, $resolutionX, $resolutionY, $type = 0, $format = 0 )
    {
        $time = time();
        $stmt2 = self::$pdo->prepare( "SELECT * FROM thumbnails WHERE thumbnailAssetId = :assetId AND thumbnailResolution = 'root' AND thumbnailIsAvatar = 0 AND isPlaceIcon = :type AND $time < dateExpire" );
        $stmt2->bindParam( ':assetId', $assetId );
        $stmt2->bindParam( ':type', $type );
        $stmt2->execute();
        $assetInfo = AssetService::getAssetInfo( $assetId );
        $assetDownload = AssetService::getAssetDownloadInfo( $assetId );
        $stuff = $stmt2->fetch(PDO::FETCH_ASSOC);
        
        if ( $stmt2->rowCount() == 0 && $assetInfo['typeid'] !== 1){
            $stmt = self::$pdo->prepare( "INSERT INTO thumbnails (thumbnailAssetType, thumbnailUniverseId, thumbnailAssetId, thumbnailVersion, thumbnailAssetVersionId, thumbnailResolution, thumbnailFormat, date, dateExpire, isPlaceIcon) VALUES (:assetType, :universeId, :assetId, :assetVersion, :assetVersionId, :thumbnailResolution, :thumbnailFormat, :date, :expire, :isPlaceIcon)");
            $stmt->bindParam(':assetType', $assetInfo['typeid']);
            $stmt->bindParam(':universeId', $assetInfo['universeid']);
            $stmt->bindParam(':assetId', $assetDownload["assetId"] );
            $stmt->bindParam(':assetVersion', $assetDownload['assetVersion'] );
            $stmt->bindParam(':assetVersionId', $assetDownload['assetVersionId'] );
            $stmt->bindValue(':thumbnailResolution', 'root');
            $stmt->bindValue(':thumbnailFormat', 0);
            $stmt->bindParam(':date', $time);
            $stmt->bindValue(':expire', strtotime("+180 Days", $time));
            $stmt->bindParam(':isPlaceIcon', $type);
            $stmt->execute();
        }

        $joint = "{$resolutionX}x{$resolutionY}";
        $stmt = self::$pdo->prepare( "INSERT INTO thumbnails (thumbnailAssetType, thumbnailUniverseId, thumbnailAssetId, thumbnailVersion, thumbnailAssetVersionId, thumbnailResolution, thumbnailFormat, date, dateExpire, isPlaceIcon) VALUES (:assetType, :universeId, :assetId, :assetVersion, :assetVersionId, :thumbnailResolution, :thumbnailFormat, :date, :expire, :isPlaceIcon)");
        $stmt->bindValue(':assetType', 1);
        $stmt->bindParam(':universeId', $assetInfo['universeid']);
        $stmt->bindParam(':assetId', $assetDownload["assetId"] );
        $stmt->bindParam(':assetVersion', $assetDownload['assetVersion'] );
        $stmt->bindParam(':assetVersionId', $assetDownload['assetVersionId'] );
        $stmt->bindValue(':thumbnailResolution', $joint);
        $stmt->bindValue(':thumbnailFormat', $format);
        $stmt->bindParam(':date', $time);
        $stmt->bindValue(':expire', strtotime("+180 Days", $time));
        $stmt->bindParam(':isPlaceIcon', $type);
        $stmt->execute();

        $type = "thumbnail";
        $joint = "{$resolutionX}x{$resolutionY}";
        if ($joint == "150x150" || $joint == "140x140"){
            $joint = "150x150";
            $type = "icon";
        }

        return self::requestAssetThumbnail( 478, $resolutionX, $resolutionY);
    }

    public static function makeAvatarThumbnail( $assetId, $resolutionX, $resolutionY, $type = 0, $format = 0 )
    {
        $time = time();
        $stmt2 = self::$pdo->prepare( "SELECT * FROM thumbnails WHERE thumbnailAssetId = :assetId AND thumbnailResolution = 'root' AND thumbnailIsAvatar = 1 AND isPlaceIcon = :type AND $time < dateExpire" );
        $stmt2->bindParam( ':assetId', $assetId );
        $stmt2->bindParam( ':type', $type );
        $stmt2->execute();
        $stuff = $stmt2->fetch(PDO::FETCH_ASSOC);

        if ($type == 1){
            $assetType = -3;
        }
        else 
            $assetType = -1;
        
        if ( $stmt2->rowCount() == 0){
            $stmt = self::$pdo->prepare( "INSERT INTO thumbnails (thumbnailAssetType, thumbnailUniverseId, thumbnailAssetId, thumbnailVersion, thumbnailAssetVersionId, thumbnailResolution, thumbnailFormat, date, dateExpire, isPlaceIcon, thumbnailIsAvatar) VALUES (:assetType, :universeId, :assetId, :assetVersion, :assetVersionId, :thumbnailResolution, :thumbnailFormat, :date, :expire, :isPlaceIcon, 1)");
            $stmt->bindParam(':assetType', $assetType);
            $stmt->bindValue(':universeId', 0);
            $stmt->bindParam(':assetId', $assetId );
            $stmt->bindValue(':assetVersion', 0 );
            $stmt->bindValue(':assetVersionId', 0 );
            $stmt->bindValue(':thumbnailResolution', 'root');
            $stmt->bindValue(':thumbnailFormat', 0);
            $stmt->bindParam(':date', $time);
            $stmt->bindValue(':expire', strtotime("+180 Days", $time));
            $stmt->bindParam(':isPlaceIcon', $type);
            $stmt->execute();
        }

        $joint = "{$resolutionX}x{$resolutionY}";
        $stmt = self::$pdo->prepare( "INSERT INTO thumbnails (thumbnailAssetType, thumbnailUniverseId, thumbnailAssetId, thumbnailVersion, thumbnailAssetVersionId, thumbnailResolution, thumbnailFormat, date, dateExpire, isPlaceIcon, thumbnailIsAvatar) VALUES (:assetType, :universeId, :assetId, :assetVersion, :assetVersionId, :thumbnailResolution, :thumbnailFormat, :date, :expire, :isPlaceIcon, 1)");
        $stmt->bindValue(':assetType', -2);
        $stmt->bindValue(':universeId', 0);
        $stmt->bindParam(':assetId', $assetId );
        $stmt->bindValue(':assetVersion', 0 );
        $stmt->bindValue(':assetVersionId', 0 );
        $stmt->bindParam(':thumbnailResolution', $joint);
        $stmt->bindParam(':thumbnailFormat', $format);
        $stmt->bindParam(':date', $time);
        $stmt->bindValue(':expire', strtotime("+180 Days", $time));
        $stmt->bindParam(':isPlaceIcon', $type);
        $stmt->execute();

        $type = "thumbnail";
        $joint = "{$resolutionX}x{$resolutionY}";
        if ($joint == "150x150" || $joint == "140x140"){
            $joint = "150x150";
            $type = "icon";
        }

        return self::requestAssetThumbnail( 478, $resolutionX, $resolutionY);
    }

    public static function requestAssetThumbnail( $assetId, $resolutionX, $resolutionY, $type = 0, $format = 0 ){
        // Types
        // 0 - Thumbnail
        // 1 - Place Icon
        $time = time();
        $assetInfo = AssetService::getAssetInfo( $assetId );

        if ($assetInfo['typeid'] == 9 && $assetInfo['rootPlace'] == 0){
            $assetId = AssetService::getRootOfUniverse( $assetInfo['universeid'] );
            $assetInfo = AssetService::getAssetInfo( $assetId );
        }

        if ($assetInfo['typeid'] == 9 && $assetInfo['imageid'] !== 0 && $type == 1){
            $assetId = $assetInfo['imageid'];
            $type = 0;
        }

        if ($assetInfo['typeid'] !== 9 && $assetInfo['imageid'] !== 0){
            $assetId = $assetInfo['imageid'];
        }

        $joint = "{$resolutionX}x{$resolutionY}";

        $stmt = self::$pdo->prepare( "SELECT thumbnailHash, thumbnailFinal FROM thumbnails WHERE thumbnailIsAvatar = 0 AND thumbnailAssetId = :assetId AND thumbnailFormat = :format AND thumbnailResolution = :resolution AND isPlaceIcon = :type AND $time < dateExpire" );
        $stmt->bindParam( ':assetId', $assetId );
        $stmt->bindParam( ':resolution', $joint );
        $stmt->bindParam( ':format', $format );
        $stmt->bindParam( ':type', $type );
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $rowCount = $stmt->rowCount();

        if ( $result["thumbnailFinal"] == 0 && $rowCount !== 0 ){
            return self::requestAssetThumbnail( 478, $resolutionX, $resolutionY);
        }

        if ($stmt->rowCount() == 0)
        {
            $url = self::makeAssetThumbnail( $assetId, $resolutionX, $resolutionY, $type, $format );
        }
        else
        {
            $url = "https://t0.idk18.xyz/" . $result['thumbnailHash'];
        }
        
        return $url;
    }

    public static function requestAvatarThumbnail( $assetId, $resolutionX, $resolutionY, $type = 0 ){
        // Types
        // 0 - Avatar Body
        // 1 - Avatar Headshot
        // 2 - Avatar 3D Body
        $time = time();

        $joint = "{$resolutionX}x{$resolutionY}";
        $stmt = self::$pdo->prepare( "SELECT thumbnailHash, thumbnailFinal FROM thumbnails WHERE isPlaceIcon = :type AND thumbnailAssetId = :assetId AND thumbnailResolution = :resolution AND thumbnailIsAvatar = 1 AND dateExpire > :currentTime" );
        $stmt->bindParam( ':assetId', $assetId );
        $stmt->bindParam( ':resolution', $joint );
        $stmt->bindParam( ':currentTime', $time );
        $stmt->bindParam( ':type', $type );
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $rowCount = $stmt->rowCount();

        if ( $result["thumbnailFinal"] == 0 && $rowCount !== 0 ){
            return self::requestAssetThumbnail( 478, $resolutionX, $resolutionY);
        }

        if ($rowCount == 0)
        {
            $url = ThumbnailService::makeAvatarThumbnail( $assetId, $resolutionX, $resolutionY, $type );
        }
        else
        {
            $url = "https://t0.idk18.xyz/" . $result['thumbnailHash'];
        }
        
        return $url;
    }

    public static function invalidateAllAvatarThumbnails( $userId )
    {
        $time = time();
        $stmt = self::$pdo->prepare("UPDATE thumbnails SET dateExpire = :currentTime WHERE thumbnailIsAvatar = 1 AND thumbnailAssetId = :userId");
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':currentTime', $time);
        $stmt->execute();

        return true;
    }

    public static function invalidateAllAssetThumbnails( $assetId )
    {
        $time = time();
        $stmt = self::$pdo->prepare("UPDATE thumbnails SET dateExpire = :currentTime WHERE thumbnailIsAvatar = 0 AND thumbnailAssetId = :userId");
        $stmt->bindParam(':userId', $assetId);
        $stmt->bindParam(':currentTime', $time);
        $stmt->execute();

        return true;
    }
}

$pdo = connectDatabase('assets');
AssetService::init($pdo);
ThumbnailService::init($pdo);

?>
