<?php
$SortFilter = $_GET["sortfilter"];
$Keyword = $_GET["keyword"] ?? "";
$StartRows = $_GET["startrows"] ?? 0;
$MaxRows = $_GET["maxrows"] ?? 14;
$Genre = $_GET["genreid"] ?? 1;

if (61 < (int)$MaxRows){
    die;
}

if ($Keyword !== ""){
    if (trim($Keyword) == ""){
        die;
    }
    
    $stmt = $pdo->prepare("SELECT * FROM assets WHERE assetTypeId = 9 AND isRootPlace = 1 AND assetName LIKE :keyword LIMIT :startRow,:maxRows");
    $Keyword = "%$Keyword%";
    $stmt->bindParam(':keyword', $Keyword, PDO::PARAM_STR);
    $stmt->bindParam(":startRow", $StartRows, PDO::PARAM_INT);
    $stmt->bindParam(":maxRows", $MaxRows, PDO::PARAM_INT);
    $stmt->execute();
}else{
    switch ($SortFilter)
    {
        case 1:
            if ($Genre == "1"){
                $stmt = $pdo->prepare("SELECT * FROM assets WHERE assetTypeId = 9 AND isRootPlace = 1 ORDER BY playerCount DESC LIMIT :startRow,:maxRows");
                $stmt->bindParam(":startRow", $StartRows, PDO::PARAM_INT);
                $stmt->bindParam(":maxRows", $MaxRows, PDO::PARAM_INT);
                $stmt->execute();
            }else{
                $stmt = $pdo->prepare("SELECT * FROM assets WHERE assetTypeId = 9 AND genreType = :genre AND isRootPlace = 1 ORDER BY playerCount DESC LIMIT :startRow,:maxRows");
                $stmt->bindParam(":startRow", $StartRows, PDO::PARAM_INT);
                $stmt->bindParam(":maxRows", $MaxRows, PDO::PARAM_INT);
                $stmt->bindParam(":genre", $Genre, PDO::PARAM_INT);
                $stmt->execute();
            }
            break;

        default:
            http_response_code(400);
            die();
            break;
    }
}



$games = [];

foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $game){
    $stmt2 = $pdo->prepare("SELECT playerCount FROM assets WHERE universeId = :universeId and assetTypeId = 9");
    $stmt2->bindParam(':universeId', $game["universeId"]);
    $stmt2->execute();
    $playerCount = 0;

    foreach ($stmt2->fetchAll(PDO::FETCH_ASSOC) as $result)
    {
        $playerCount = $playerCount + $result["playerCount"];
    }

    $game['totalPlayerCount'] = $playerCount;
    $games[] = $game;
}

// Sort games by totalPlayerCount in descending order
usort($games, function($a, $b) {
    return $b['totalPlayerCount'] - $a['totalPlayerCount'];
});

foreach ($games as $game){
	$stmt = $pdo->prepare("SELECT vote FROM votes WHERE assetId = :assetId");
	$stmt->bindParam(':assetId', $game["assetId"], PDO::PARAM_INT);
	$stmt->execute();
	  
	$totalUp = 0;
    $totalDown = 0;
	$extra = "";
	
	foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $result){
		if ($result["vote"] == 1)
			$totalUp++;
		
		if ($result["vote"] == 0)
			$totalDown++;
	}
	
	if ($totalUp == 0 && $totalDown == 0){
		$extra = "no-votes";
	}
	
	if ($game["creatorType"] === 1){
		$game["creatorName"] = UserAuthentication::lookupNameById($game["creatorId"]);
		$game["creatorProfile"] = "https://www.$domain/users/{$game["creatorId"]}/profile";
	}else{
		$game["creatorName"] = AssetService::getGroupName($game["creatorId"]);
		$game["creatorProfile"] = "https://www.$domain/groups/group.aspx?gid=" . $game["creatorId"];
	}
    $thumbnail = ThumbnailService::requestAssetThumbnail( $game["assetId"], 150, 150, 1);
	
    echo '<li class="list-item game-card">
    <div class="game-card-container">
        <a href="https://www.idk18.xyz/games/', $game["assetId"], '" class="game-card-link">
            <div class="game-card-thumb-container">
                <img class="game-card-thumb"
                     src="', $thumbnail, '"
                     alt=""
                     thumbnail=', "'", '{"Final":true,"Url":"', $thumbnail, '","RetryUrl":null}', "'", ' image-retry/>
            </div>
            <div class="text-overflow game-card-name" title="', htmlspecialchars($game["assetName"]), '" ng-non-bindable>
                ', htmlspecialchars($game["assetName"]), '
            </div>
            <div class="game-card-name-secondary">
                ', $game['totalPlayerCount'], ' Playing
            </div>
            <div class="game-card-vote">
                <div class="vote-bar"
                     data-voting-processed="false">
                    <div class="vote-thumbs-up">
                        <span class="icon-thumbs-up"></span>
                    </div>
                    <div class="vote-container"
                         data-upvotes="', $totalUp, '"
                         data-downvotes="', $totalDown, '">
                        <div class="vote-background ', $extra, '"></div>
                        <div class="vote-percentage"></div>
                        <div class="vote-mask">
                            <div class="segment seg-1"></div>
                            <div class="segment seg-2"></div>
                            <div class="segment seg-3"></div>
                            <div class="segment seg-4"></div>
                        </div>
                    </div>
                    <div class="vote-thumbs-down">
                        <span class="icon-thumbs-down"></span>
                    </div>
                </div>
                <div class="vote-counts">
                    <div class="vote-down-count">', formatNumber($totalDown), '</div>
                    <div class="vote-up-count">', formatNumber($totalUp), '</div>
                </div>
            </div>
        </a>
        <span class="game-card-footer">
        <span class="text-label xsmall">By </span>
        <a class="text-link xsmall text-overflow" href="', $game["creatorProfile"], '">', htmlspecialchars($game["creatorName"]), '</a>
    </span>
    </div>
</li>';
}
?>
