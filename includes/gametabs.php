<?php

class siteView
{
	public static function makeGameTab( $assetId )
	{
		global $pdo;

        $stmt = $pdo->prepare("SELECT creatorId, creatorType, assetId, assetName, totalPlayerCount FROM assets WHERE assetId = :assetId");
        $stmt->execute([ ':assetId' => $assetId ]);
        $game = $stmt->fetch(PDO::FETCH_ASSOC);

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
        
        $string = '<li class="list-item game-card">
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
            <a class="text-link xsmall text-overflow" href="', $game["creatorProfile"], '">', $game["creatorName"], '</a>
            </span>
            </div>
        </li>';

        return $string;
	}

    public static function batchMakeGameTab( $assetIds )
	{
		global $pdo;
        $string = "";
        $dbstring = "";
        
        $stmt = $pdo->prepare("SELECT creatorId, creatorType, assetId, assetName, totalPlayerCount FROM assets WHERE assetId = :assetId");
        $stmt->execute([ ':assetId' => $assetId ]);
        $game = $stmt->fetch(PDO::FETCH_ASSOC);

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
        
        $string = '<li class="list-item game-card">
        <div class="game-card-container">
            <a href="https://www.idk18.xyz/games/', $game["assetId"], '" class="game-card-link">
                <div class="game-card-thumb-container">
                    <img class="game-card-thumb"
                        src="', ThumbnailService::requestAssetThumbnail( $game["assetId"], 150, 150), '"
                        alt=""
                        thumbnail=', "'", '{"Final":true,"Url":"', AssetService::getAssetIcon($game["assetId"], 1), '","RetryUrl":null}', "'", ' image-retry/>
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
            <a class="text-link xsmall text-overflow" href="', $game["creatorProfile"], '">', $game["creatorName"], '</a>
            </span>
            </div>
        </li>';

        return $string;
	}
}

?>
