<?php
header("content-type: application/json");
$placeId = $_GET["placeid"];

$asset = AssetService::getAssetInfo($placeId);
$gameServPDO = connectDatabase('gameservers');
if ($asset["typeid"] !== 9){
    die(header("Location: https//www.$domain/request-error?code=400"));
}

$placeId = $asset['id'];
$startRow = $_GET["startindex"];

$hasPermission = false;

if ($isUserAuthenticated){
	if ($asset['creatorId'] == $userInfo['id']){
		$hasPermission = true;
	}
}

$result = [
    "PlaceId" => $placeId,
    "ShowShutdownAllButton" => $hasPermission,
    "Collection" => [
        /*
        [
            "Capacity" => 100,
            "Ping" => 200,
            "Fps" => 60,
            "ShowSlowGameMessage" => false,
            "Guid" => "jobid",
            "PlaceId" => 1,
            "CurrentPlayers" => [
                [
                    "Id" => 1,
                    "Username" => "idk",
                    "Thumbnail" => [
                        "AssetId" => 0,
                        "AssetHash" => null,
                        "AssetTypeId" => 0,
                        "Url" => "",
                        "IsFinal" => true
                    ]
                ]
            ],
            "UserCanJoin" => true,
            "ShowShutdownButton" => false,
            "JoinScript" => ""
        ]
        */
    ],
    "TotalCollectionSize" => 0
];

$stmt = $gameServPDO->prepare("SELECT * FROM serverinstances WHERE serverPlaceId = :placeId AND :time < lastKnownExpiration and serverHasStarted = 1 AND serverType = 1 ORDER BY serverPlayerCount DESC");
$stmt->bindParam(":placeId", $placeId);
$stmt->bindValue(":time", time());
$stmt->execute();
$result["TotalCollectionSize"] = $stmt->rowCount();

$stmt = $gameServPDO->prepare("SELECT * FROM serverinstances WHERE serverPlaceId = :placeId AND :time < lastKnownExpiration and serverHasStarted = 1 AND serverType = 1 ORDER BY serverPlayerCount DESC LIMIT :startRow,10");
$stmt->bindParam(":placeId", $placeId);
$stmt->bindValue(":time", time());
$stmt->bindParam(":startRow", $startRow, PDO::PARAM_INT);
$stmt->execute();

foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $x){
    $playerList = [];
    $resultData = json_decode($x["serverPlayerList"]);
    foreach ($resultData as $playerId){
        if ((int)$playerId <= 0)
            $playerName = "A Friendly Guest";
        else
            $playerName = UserAuthentication::lookupNameById($playerId);

        $playerList[] = [ "Id" => $playerId, "Username" => $playerName, "Thumbnail" => [ "AssetId" => 0, "AssetHash" => null, "AssetTypeId" => 0, "Url" => ThumbnailService::requestAvatarThumbnail( $playerId, 150, 150, 1), "IsFinal" => true ] ];
    }

    if (!str_contains($_SERVER['HTTP_USER_AGENT'], "ROBLOX"))
        $joinScript = "Roblox.GameLauncher.joinGameInstance(" . $x["serverPlaceId"] . ", '" . $x["serverGameId"] . "');";
    else
        $joinScript = "window.location.href =  'https://www.$domain/games/start?placeid=" . $x["serverPlaceId"] . "&gameInstanceId=" . $x["serverGameId"] . "';";

    $result["Collection"][] = [
        "Capacity" => $x["serverMaxPlayers"],
        "Ping" => 0,
        "Fps" => 60,
        "ShowSlowGameMessage" => false,
        "Guid" => $x["serverGameId"],
        "PlaceId" => $x["serverPlaceId"],
        "CurrentPlayers" => $playerList,
        "UserCanJoin" => false,
        "ShowShutdownButton" => $hasPermission,
        "JoinScript" => $joinScript
    ];

}

die(json_encode($result));
?>