<?php
$userId = $userInfo['id'];
$username = $userInfo['name'];

$stmt7 = $authPDO->prepare("SELECT requester, requested FROM friendreq WHERE requester = :userId AND accepted = 1 OR requested = :userId AND accepted = 1 ORDER BY dateaccept DESC");
$stmt7->bindParam(':userId', $userId, PDO::PARAM_INT);
$stmt7->execute();
$friendsCount = $stmt7->rowCount();
$friendsList = $stmt7->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<!--[if IE 8]><html class=ie8 ng-app=robloxApp><![endif]-->
<!--[if gt IE 8]><!-->
<html>
<!--<![endif]-->

<head data-machine-id=<?= $webServerName ?>>
    <title>Home - ROBLOX</title>
    <meta http-equiv=X-UA-Compatible content="IE=edge,requiresActiveX=true">
    <meta charset=UTF-8>
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name=author content="Roblox Corporation">
    <meta name=description content="Roblox is the world's largest social platform for play. We help power the imaginations of people around the world.">
    <meta name=keywords content="free games,online games,building games,virtual worlds,free mmo,gaming cloud,physics engine">
    <meta name=apple-itunes-app content="app-id=431946152">
    <meta name=google-site-verification content=KjufnQUaDv5nXJogvDMey4G-Kb7ceUVxTdzcMaP9pCY>
    <link href=https://images.idk18.xyz/7aee41db80c1071f60377c3575a0ed87.ico rel=icon>
                <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600" rel="stylesheet" type="text/css">

    <link rel="canonical" href="<?= $requestUrl ?>" />
    
    
    <link rel='stylesheet' href='https://static.idk18.xyz/css/leanbase___9b9fc145916d65f94e610d1f02775894_m.css/fetch' />
    <link rel='stylesheet' href='https://static.idk18.xyz/css/page___2298f2939498e3e809570d6e56fdecdd_m.css/fetch'>
    <script src=//ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js></script>
    <script>
        window.jQuery||document.write("<script type='text/javascript' src='/js/jquery/jquery-1.11.1.js'><\/script>")
    </script>
    <script src=//ajax.aspnetcdn.com/ajax/jquery.migrate/jquery-migrate-1.2.1.min.js></script>
    <script>
        window.jQuery||document.write("<script type='text/javascript' src='/js/jquery/jquery-migrate-1.2.1.js'><\/script>")
    </script>
     <script type='text/javascript' src='https://js.idk18.xyz/86411e39f51e0ef39c7fa2f1f92fe7b3.js'></script>
	 
    <meta name=viewport content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
	
       <?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/adshelper.php" ); ?>
    <script>
        $(function(){Roblox.JSErrorTracker.initialize({'suppressConsoleError':true});});
    </script>
    <!--[if lt IE 9]><script src=//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js></script><script src=//oss.maxcdn.com/respond/1.4.2/respond.min.js></script><![endif]-->
 <?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/googleanalytics.php" ); ?>


    <?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/eventstreaminit.php" ); ?>
    <script>
        if(Roblox&&Roblox.PageHeartbeatEvent){Roblox.PageHeartbeatEvent.Init([2,8,20,60]);}
    </script>
    <script>
        if(typeof(Roblox)==="undefined"){Roblox={};}
        Roblox.Endpoints=Roblox.Endpoints||{};Roblox.Endpoints.Urls=Roblox.Endpoints.Urls||{};Roblox.Endpoints.Urls['/api/item.ashx']='https://www.<?= $domain ?>/api/item.ashx';Roblox.Endpoints.Urls['/asset/']='https://assetgame.<?= $domain ?>/asset/';Roblox.Endpoints.Urls['/client-status/set']='https://www.<?= $domain ?>/client-status/set';Roblox.Endpoints.Urls['/client-status']='https://www.<?= $domain ?>/client-status';Roblox.Endpoints.Urls['/game/']='https://assetgame.<?= $domain ?>/game/';Roblox.Endpoints.Urls['/game-auth/getauthticket']='https://www.<?= $domain ?>/game-auth/getauthticket';Roblox.Endpoints.Urls['/game/edit.ashx']='https://assetgame.<?= $domain ?>/game/edit.ashx';Roblox.Endpoints.Urls['/game/getauthticket']='https://assetgame.<?= $domain ?>/game/getauthticket';Roblox.Endpoints.Urls['/game/get-hash']='https://assetgame.<?= $domain ?>/game/get-hash';Roblox.Endpoints.Urls['/game/placelauncher.ashx']='https://assetgame.<?= $domain ?>/game/placelauncher.ashx';Roblox.Endpoints.Urls['/game/preloader']='https://assetgame.<?= $domain ?>/game/preloader';Roblox.Endpoints.Urls['/game/report-stats']='https://assetgame.<?= $domain ?>/game/report-stats';Roblox.Endpoints.Urls['/game/report-event']='https://assetgame.<?= $domain ?>/game/report-event';Roblox.Endpoints.Urls['/game/updateprerollcount']='https://assetgame.<?= $domain ?>/game/updateprerollcount';Roblox.Endpoints.Urls['/login/default.aspx']='https://www.<?= $domain ?>/login/default.aspx';Roblox.Endpoints.Urls['/my/avatar']='https://www.<?= $domain ?>/my/avatar';Roblox.Endpoints.Urls['/my/money.aspx']='https://www.<?= $domain ?>/my/money.aspx';Roblox.Endpoints.Urls['/navigation/userdata']='https://www.<?= $domain ?>/navigation/userdata';Roblox.Endpoints.Urls['/chat/chat']='https://www.<?= $domain ?>/chat/chat';Roblox.Endpoints.Urls['/chat/data']='https://www.<?= $domain ?>/chat/data';Roblox.Endpoints.Urls['/presence/users']='https://www.<?= $domain ?>/presence/users';Roblox.Endpoints.Urls['/presence/user']='https://www.<?= $domain ?>/presence/user';Roblox.Endpoints.Urls['/friends/list']='https://www.<?= $domain ?>/friends/list';Roblox.Endpoints.Urls['/navigation/getcount']='https://www.<?= $domain ?>/navigation/getCount';Roblox.Endpoints.Urls['/regex/email']='https://www.<?= $domain ?>/regex/email';Roblox.Endpoints.Urls['/catalog/browse.aspx']='https://www.<?= $domain ?>/catalog/browse.aspx';Roblox.Endpoints.Urls['/catalog/html']='https://search.<?= $domain ?>/catalog/html';Roblox.Endpoints.Urls['/catalog/json']='https://search.<?= $domain ?>/catalog/json';Roblox.Endpoints.Urls['/catalog/contents']='https://search.<?= $domain ?>/catalog/contents';Roblox.Endpoints.Urls['/catalog/lists.aspx']='https://search.<?= $domain ?>/catalog/lists.aspx';Roblox.Endpoints.Urls['/catalog/items']='https://search.<?= $domain ?>/catalog/items';Roblox.Endpoints.Urls['/asset-hash-thumbnail/image']='https://assetgame.<?= $domain ?>/asset-hash-thumbnail/image';Roblox.Endpoints.Urls['/asset-hash-thumbnail/json']='https://assetgame.<?= $domain ?>/asset-hash-thumbnail/json';Roblox.Endpoints.Urls['/asset-thumbnail-3d/json']='https://assetgame.<?= $domain ?>/asset-thumbnail-3d/json';Roblox.Endpoints.Urls['/asset-thumbnail/image']='https://assetgame.<?= $domain ?>/asset-thumbnail/image';Roblox.Endpoints.Urls['/asset-thumbnail/json']='https://assetgame.<?= $domain ?>/asset-thumbnail/json';Roblox.Endpoints.Urls['/asset-thumbnail/url']='https://assetgame.<?= $domain ?>/asset-thumbnail/url';Roblox.Endpoints.Urls['/asset/request-thumbnail-fix']='https://assetgame.<?= $domain ?>/asset/request-thumbnail-fix';Roblox.Endpoints.Urls['/avatar-thumbnail-3d/json']='https://www.<?= $domain ?>/avatar-thumbnail-3d/json';Roblox.Endpoints.Urls['/avatar-thumbnail/image']='https://www.<?= $domain ?>/avatar-thumbnail/image';Roblox.Endpoints.Urls['/avatar-thumbnail/json']='https://www.<?= $domain ?>/avatar-thumbnail/json';Roblox.Endpoints.Urls['/avatar-thumbnails']='https://www.<?= $domain ?>/avatar-thumbnails';Roblox.Endpoints.Urls['/avatar/request-thumbnail-fix']='https://www.<?= $domain ?>/avatar/request-thumbnail-fix';Roblox.Endpoints.Urls['/bust-thumbnail/json']='https://www.<?= $domain ?>/bust-thumbnail/json';Roblox.Endpoints.Urls['/group-thumbnails']='https://www.<?= $domain ?>/group-thumbnails';Roblox.Endpoints.Urls['/groups/getprimarygroupinfo.ashx']='https://www.<?= $domain ?>/groups/getprimarygroupinfo.ashx';Roblox.Endpoints.Urls['/headshot-thumbnail/json']='https://www.<?= $domain ?>/headshot-thumbnail/json';Roblox.Endpoints.Urls['/item-thumbnails']='https://www.<?= $domain ?>/item-thumbnails';Roblox.Endpoints.Urls['/outfit-thumbnail/json']='https://www.<?= $domain ?>/outfit-thumbnail/json';Roblox.Endpoints.Urls['/place-thumbnails']='https://www.<?= $domain ?>/place-thumbnails';Roblox.Endpoints.Urls['/thumbnail/asset/']='https://www.<?= $domain ?>/thumbnail/asset/';Roblox.Endpoints.Urls['/thumbnail/avatar-headshot']='https://www.<?= $domain ?>/thumbnail/avatar-headshot';Roblox.Endpoints.Urls['/thumbnail/avatar-headshots']='https://www.<?= $domain ?>/thumbnail/avatar-headshots';Roblox.Endpoints.Urls['/thumbnail/user-avatar']='https://www.<?= $domain ?>/thumbnail/user-avatar';Roblox.Endpoints.Urls['/thumbnail/resolve-hash']='https://www.<?= $domain ?>/thumbnail/resolve-hash';Roblox.Endpoints.Urls['/thumbnail/place']='https://www.<?= $domain ?>/thumbnail/place';Roblox.Endpoints.Urls['/thumbnail/get-asset-media']='https://www.<?= $domain ?>/thumbnail/get-asset-media';Roblox.Endpoints.Urls['/thumbnail/remove-asset-media']='https://www.<?= $domain ?>/thumbnail/remove-asset-media';Roblox.Endpoints.Urls['/thumbnail/set-asset-media-sort-order']='https://www.<?= $domain ?>/thumbnail/set-asset-media-sort-order';Roblox.Endpoints.Urls['/thumbnail/place-thumbnails']='https://www.<?= $domain ?>/thumbnail/place-thumbnails';Roblox.Endpoints.Urls['/thumbnail/place-thumbnails-partial']='https://www.<?= $domain ?>/thumbnail/place-thumbnails-partial';Roblox.Endpoints.Urls['/thumbnail_holder/g']='https://www.<?= $domain ?>/thumbnail_holder/g';Roblox.Endpoints.Urls['/users/{id}/profile']='https://www.<?= $domain ?>/users/{id}/profile';Roblox.Endpoints.Urls['/service-workers/push-notifications']='https://www.<?= $domain ?>/service-workers/push-notifications';Roblox.Endpoints.Urls['/notification-stream/notification-stream-data']='https://www.<?= $domain ?>/notification-stream/notification-stream-data';Roblox.Endpoints.Urls['/api/friends/acceptfriendrequest']='https://www.<?= $domain ?>/api/friends/acceptfriendrequest';Roblox.Endpoints.Urls['/api/friends/declinefriendrequest']='https://www.<?= $domain ?>/api/friends/declinefriendrequest';Roblox.Endpoints.Urls['/authentication/is-logged-in']='https://www.<?= $domain ?>/authentication/is-logged-in';Roblox.Endpoints.addCrossDomainOptionsToAllRequests=true;
    </script>

    <body id=rbx-body data-performance-relative-value=0.005 data-internal-page-name=Home data-send-event-percentage=0>
        <div id=roblox-linkify data-enabled=true data-regex="(https?\:\/\/)?(?:www\.)?([a-z0-9\-]{2,}\.)*(((m|de|www|web|api|blog|wiki|help|corp|polls|bloxcon|developer|devforum|forum)\.roblox\.com|robloxlabs\.com)|(www\.shoproblox\.com))((\/[A-Za-z0-9-+&amp;@#\/%?=~_|!:,.;]*)|(\b|\s))"
        data-regex-flags=gm data-as-http-regex=((wiki|[^.]help|corp|polls|bloxcon|developer|devforum)\.roblox\.com|robloxlabs\.com)></div>
        <div id=image-retry-data data-image-retry-max-times=10 data-image-retry-timer=1500 data-ga-logging-percent=10></div>
        <div id=http-retry-data data-http-retry-max-timeout=0 data-http-retry-base-timeout=0 data-http-retry-max-times=5></div>
        <div id=TosAgreementInfo data-terms-check-needed=False></div>
        <div id=fb-root></div>
        <div id=wrap class="wrap no-gutter-ads logged-in" data-gutter-ads-enabled=false>
            <?php require_once("../includes/header.php"); ?>
            <script>
                var Roblox=Roblox||{};(function(){if(Roblox&&Roblox.Performance){Roblox.Performance.setPerformanceMark("navigation_end");}})();
            </script>
<?php if (!str_contains($_SERVER['HTTP_USER_AGENT'], "ROBLOX")): ?>
    <div class="container-main  
                 
                
                
                ">
<?php endif; ?>
                <script>
                    if(top.location!=self.location){top.location=self.location.href;}
                </script>
                <div class=alert-container>
                    <noscript>
                        <div>
                            <div class=alert-info role=alert>Please enable Javascript to use all the features on this site.</div>
                        </div>
                    </noscript> 
					</div>
                <div class=content>
                    <div id=Skyscraper-Abp-Left class="abp abp-container left-abp"><iframe name=Roblox_MyHome_Left_160x600 allowtransparency=true frameborder=0 height=612 scrolling=no src=https://www.<?= $domain ?>/user-sponsorship/2 width=160 data-js-adtype=iframead data-ad-slot=Roblox_MyHome_Left_160x600></iframe></div>
					
                    <div id=HomeContainer class="row home-container" data-update-status-url=/home/updatestatus>
                        <div class="col-xs-12 home-header">
                            <a href=https://www.<?= $domain ?>/users/<?= $userId ?>/profile class="avatar avatar-headshot-lg"> <img alt=avatar src='<?= ThumbnailService::requestAvatarThumbnail( $userId, 352, 352, 1) ?>' id=home-avatar-thumb class=avatar-card-image> </a>
                            <script>
                                $("img#home-avatar-thumb").on('load',function(){if(Roblox&&Roblox.Performance){Roblox.Performance.setPerformanceMark("head_avatar");}});
                            </script>
                            <div class="home-header-content non-bc">
                                <h1><a href=https://www.<?= $domain ?>/users/<?= $userId ?>/profile>Hello, <?= htmlspecialchars($username) ?>!</a></h1></div>
                        </div>
						<?php if ($friendsCount !== 0): ?>
						<div class="col-xs-12 section home-friends">
						<div class=container-header>
							<h3>Friends (<?= $friendsCount ?>)</h3>
							<a href=https://www.<?= $domain ?>/users/<?= $userId ?>/friends class="btn-secondary-xs btn-more btn-fixed-width">See All</a>
						</div>
						<div class=section-content>
							<ul class="hlist friend-list">
							<?php
							$count = 0;
							foreach ($friendsList as $friend){
								$count++;

								if ($count < 10){
									$friendId = ($friend["requester"] == $userId) ? $friend["requested"] : $friend["requester"];
									$friendName = UserAuthentication::lookupNameById($friendId);

									echo'<li id=friend_' . $friendId . ' class="list-item friend">
									<div class=avatar-container>
									<a href=https://www.' . $domain . '/users/' . $friendId . '/profile class="avatar avatar-card-fullbody friend-link" title=' . $friendName . '>
										<span class="avatar-card-link friend-avatar" data-3d-url="/avatar-thumbnail-3d/json?userId=' . $friendId . '" data-orig-retry-url="/avatar-thumbnail/json?userId=' . $friendId . '&amp;width=100&amp;height=100&amp;format=png">
										<img alt=' . $friendName . ' class=avatar-card-image src=' . ThumbnailService::requestAvatarThumbnail( $friendId, 100, 100, 0) . '>
										</span>
										<span class="text-overflow friend-name">' . $friendName . '</span>
									</a>
									</div>';
								}
							}
							?>
							</ul>
						</div>
						</div>
						<?php endif; ?>
						<?php 
						$stmt = $authPDO->prepare("SELECT * FROM visit WHERE playerId = :userId ORDER BY time DESC");
						$stmt->bindParam(':userId', $userId);
						$stmt->execute();
						
						$count = 0;
						$maxCount = 6;
						$games = [];
						
						foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $visit){
							if ($count == $maxCount)
								break;
							
							if (!in_array($visit["placeId"], $games)){
								$games[] = $visit["placeId"];
								$count++;
							}
						}
						
						
						if ($count !== 0):
						?>
							<div class="container-list home-games">
								<div class="container-header">
									<h3>Recently Played</h3>
									<a  href="https://www.<?= $domain ?>/games/?sortFilter=6" class="btn-secondary-xs btn-fixed-width btn-more">See All</a>
								</div>
								

						<ul class="hlist game-cards ">
							<?php

							foreach ($games as $placeId){
								$stmt2 = $pdo->prepare("SELECT * FROM assets WHERE assetId = :assetId");
								$stmt2->bindParam(':assetId', $placeId);
								$stmt2->execute();
								$game = $stmt2->fetch(PDO::FETCH_ASSOC);

								$stmt2 = $pdo->prepare("SELECT playerCount FROM assets WHERE universeId = :universeId and assetTypeId = 9");
								$stmt2->bindParam(':universeId', $game["universeId"]);
								$stmt2->execute();
								$playerCount = 0;
								
								$stmt = $pdo->prepare("SELECT vote FROM votes WHERE assetId = :assetId");
								$stmt->bindParam(':assetId', $placeId, PDO::PARAM_INT);
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

								foreach ($stmt2->fetchAll(PDO::FETCH_ASSOC) as $result)
								{
									$playerCount = $playerCount + $result["playerCount"];
								}

								$game['totalPlayerCount'] = $playerCount;
							
								if ($game["creatorType"] === 1){
									$game["creatorName"] = UserAuthentication::lookupNameById($game["creatorId"]);
									$game["HasTeamCreatePermissions"] = ($game["creatorId"] == $userId || $game["uncopylocked"] == 1) ? true : false;
									$game["HasFullPermissions"] = ($game["creatorId"] == $userId);
									$game["creatorProfile"] = "https://www.$domain/users/{$game["creatorId"]}/profile";
								}else{
									$game["creatorName"] = AssetService::getGroupName($game["creatorId"]);
									$game["HasFullPermissions"] = (AssetService::getGroupRank($userId, $game["creatorId"]) == 255) ? true : false;
									$game["HasTeamCreatePermissions"] = ($game["uncopylocked"] == 1) ? true : false;
									$game["creatorProfile"] = "https://www.$domain/groups/group.aspx?gid=" . $game["creatorId"];
								}

								echo '<li class="list-item game-card">
										<div class="game-card-container">
											<a href="https://www.', $domain, '/games/', $game["assetId"], '" class="game-card-link">
												<div class="game-card-thumb-container">
													<img class="game-card-thumb"
														src="', ThumbnailService::requestAssetThumbnail( $game["assetId"], 150, 150, 1), '"
														alt=""
														thumbnail=', "'", '{"Final":true,"Url":"', ThumbnailService::requestAssetThumbnail( $game["assetId"], 150, 150, 1), '","RetryUrl":null}', "'", ' image-retry/>
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
							}
						?>

						</ul>
							</div>
						<?php endif; ?>
                        <?php 
						$stmt = $pdo->prepare("SELECT * FROM favorites WHERE userId = :userId and typeId = 9 ORDER BY lastModified DESC LIMIT 6");
						$stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
						$stmt->execute();
						$count = $stmt->rowCount();

						if ($count !== 0):
						?>
							<div class="container-list favorite-games-container">
								<div class="container-header">
									<h3>My Favorites</h3>
									<a  href="https://www.<?= $domain ?>/users/<?= $userId ?>/favorites#!/places" class="btn-secondary-xs btn-fixed-width btn-more">See All</a>
								</div>
								

						<ul class="hlist game-cards ">
							<?php

							foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $gameInfo){
								$stmt2 = $pdo->prepare("SELECT * FROM assets WHERE assetId = :assetId");
								$stmt2->bindParam(':assetId', $gameInfo["assetId"]);
								$stmt2->execute();
								$game = $stmt2->fetch(PDO::FETCH_ASSOC);

								$stmt2 = $pdo->prepare("SELECT playerCount FROM assets WHERE universeId = :universeId and assetTypeId = 9");
								$stmt2->bindParam(':universeId', $game["universeId"]);
								$stmt2->execute();
								$playerCount = 0;
								
								$stmt4 = $pdo->prepare("SELECT vote FROM votes WHERE assetId = :assetId");
								$stmt4->bindParam(':assetId', $game['assetId'], PDO::PARAM_INT);
								$stmt4->execute();
								  
								$totalUp = 0;
								$totalDown = 0;
								$extra = "";
								
								foreach ($stmt4->fetchAll(PDO::FETCH_ASSOC) as $result){
									if ($result["vote"] == 1)
										$totalUp++;
									
									if ($result["vote"] == 0)
										$totalDown++;
								}

								if ($totalUp == 0 && $totalDown == 0){
									$extra = "no-votes";
								}

								foreach ($stmt2->fetchAll(PDO::FETCH_ASSOC) as $result)
								{
									$playerCount = $playerCount + $result["playerCount"];
								}

								$game['totalPlayerCount'] = $playerCount;
								
								if ($game["creatorType"] === 1){
									$game["creatorName"] = UserAuthentication::lookupNameById($game["creatorId"]);
									$game["HasTeamCreatePermissions"] = ($game["creatorId"] == $userId || $game["uncopylocked"] == 1) ? true : false;
									$game["HasFullPermissions"] = ($game["creatorId"] == $userId);
									$game["creatorProfile"] = "https://www.$domain/users/{$game["creatorId"]}/profile";
								}else{
									$game["creatorName"] = AssetService::getGroupName($game["creatorId"]);
									$game["HasFullPermissions"] = (AssetService::getGroupRank($userId, $game["creatorId"]) == 255) ? true : false;
									$game["HasTeamCreatePermissions"] = ($game["uncopylocked"] == 1) ? true : false;
									$game["creatorProfile"] = "https://www.$domain/groups/group.aspx?gid=" . $game["creatorId"];
								}
							
								echo '<li class="list-item game-card">
										<div class="game-card-container">
											<a href="https://www.', $domain, '/games/', $game["assetId"], '" class="game-card-link">
												<div class="game-card-thumb-container">
													<img class="game-card-thumb"
														src="', ThumbnailService::requestAssetThumbnail( $game["assetId"], 150, 150, 1), '"
														alt=""
														thumbnail=', "'", '{"Final":true,"Url":"', ThumbnailService::requestAssetThumbnail( $game["assetId"], 150, 150, 1), '","RetryUrl":null}', "'", ' image-retry/>
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
							}
						?>

						</ul>
							</div>
						<?php endif; ?>
                        <div class="col-xs-12 col-sm-6 home-right-col">
                        <div class=section>
                            <div class=section-header>
                                <h3>Blog News</h3><a href=https://blog.<?= $domain ?> class="btn-control-xs btn-more btn-fixed-width">See More</a></div>
                            <div class=section-content>
                                There are no blog news available.
								</div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 home-left-col">
                        <div class=section>
                            <div class=section-header>
                                <h3>My Feed</h3></div>
                            <div class=section-content>
							<?php
							$friends = [];
							$statement = "";
							
							foreach ($friendsList as $friend){
								if ($userId == $friend["requester"])
									$friends[] = $friend["requested"];
								else
									$friends[] = $friend["requester"];
							}
							$count = 0;
	
							foreach ($friends as $friend){
								$result = ($count == 0) ? "" : "$statement OR ";
								
								$statement = "{$result}userType = 1 AND userId = $friend";
								$count++;
							}

							$stmt = $pdo->prepare("SELECT userStatus FROM feed WHERE userType = 1 AND userId = :userId ORDER BY id DESC LIMIT 1");
							$stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
							$stmt->execute();
							$feedStatus = $stmt->fetchColumn();
							?>
                                <div class=form-horizontal id=statusForm role=form>
                                    <div class=form-group>
                                        <input class="form-control input-field" id=txtStatusMessage maxlength=254 placeholder="What are you up to?" value="<?= $feedStatus ?>">
                                        <p class=form-control-label>Status update failed.</div><a type=button class="btn-primary-md btn-fixed-width" id=shareButton>Share</a> <img id=loadingImage class=share-login alt=Sharing... src=https://images.idk18.xyz/ec4e85b0c4396cf753a06fade0a8d8af.gif
                                    height=17 width=48></div>
                                <ul class="vlist feeds">
								<?php 

								if ($friendsCount !== 0){
									$stmt = $pdo->prepare("SELECT * FROM feed WHERE $statement ORDER BY id DESC LIMIT 19");
									$stmt->execute();
									$feedCount = $stmt->rowCount();

									foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $feed){
										echo' <li class=list-item>
																										<a href="https://www.' . $domain . '/users/' . $feed['userId'] . '/profile" class="avatar avatar-headshot-md avatar-card-image list-header"><img class=header-thumb src="' . ThumbnailService::requestAvatarThumbnail( $feed['userId'], 75, 75, 1 ) . '"></a>
																										<div class=list-body>
																											<p class=list-content><a href="https://www.' . $domain . '/users/' . $feed['userId'] . '/profile">' . htmlspecialchars(UserAuthentication::lookupNameById($feed['userId'])) . '</a>
																												<p class="feedtext linkify">"' . htmlspecialchars($feed['userStatus']) . '"</p><span class="xsmall text-date-hint">' . date('M j, Y | g:i A', $feed['time']), '</span>
																												<a href="https://www.' . $domain . '/abusereport/Feed?id=' . $feed["id"] . '&amp;redirectUrl=' . "https" . urlencode("://") . $_SERVER["HTTP_HOST"] . urlencode($_SERVER["REQUEST_URI"]) . '"
																												class=abuse-report-modal> <span class=icon-report></span> </a>
																										</div>';
									}
								}else{
									$feedCount = 0;
								}			
								
								?>
								<?php if ($feedCount <= 16): ?>
                                    <li id=gameFeed class="list-item feed-game" data-default-roblox-feed>
                                                            <a class=list-header href=https://www.<?= $domain ?>/games> <span class=icon-games></span> </a>
                                                            <div class=list-body>
                                                                <h2>Play Games</h2>
                                                                <p class=list-content>Nearly all ROBLOX games are built by players like you. Here are some of our favorites:
                                                                    <ul id=FeaturedGamesContainer class=list-gallery></ul>
                                                            </div>
								<?php endif; ?>
								<?php if ($feedCount <= 17): ?>
                                                            <li class="list-item feed-creation" data-default-roblox-feed>
                                                                <a class=list-header href="https://www.<?= $domain ?>/catalog/browse.aspx?CatalogContext=1&amp;Subcategory=1&amp;CreatorID=1&amp;CurrencyType=0&amp;pxMin=0&amp;pxMax=0&amp;SortType=4&amp;SortAggregation=3&amp;SortCurrency=0&amp;IncludeNotForSale=false&amp;LegendExpanded=true&amp;Category=1">
                                                                <span class=icon-charactercustomizer></span> </a>
                                                                <div class=list-body>
                                                                    <h2>Customize Your Avatar</h2>
                                                                    <p class=list-content>Visit the <a href=https://www.<?= $domain ?>/my/character.aspx> Avatar page </a> to customize your avatar. Get new clothing in the <a href="https://www.<?= $domain ?>/catalog/browse.aspx?CatalogContext=1&amp;Subcategory=1&amp;CreatorID=1&amp;CurrencyType=0&amp;pxMin=0&amp;pxMax=0&amp;SortType=4&amp;SortAggregation=3&amp;SortCurrency=0&amp;IncludeNotForSale=false&amp;LegendExpanded=true&amp;Category=1">catalog</a>.
                                                                        <ul
                                                                        class=list-gallery>
                                                                            <li class=item-asset><img src=https://images.idk18.xyz/005a0f4d764d9c609ff4c37a2bb99006.png class=default-feed-character-image alt="">
                                                                                <li class=item-asset><img src=https://images.idk18.xyz/e861c0c517df63e9f17e96685cc4bb14.png class=default-feed-character-image alt="">
                                                                                    <li class=item-asset><img src=https://images.idk18.xyz/7fd0bef40b29834e8add92234b352c3e.png class=default-feed-character-image alt="">
                                                                                        <li class=item-asset><img src=https://images.idk18.xyz/294ebb9ceaac3c5352de0ebecab909ec.png class=default-feed-character-image alt=""></ul>
                                    </div>
                                    <li class="list-item feed-creation" data-default-roblox-feed>
                                        <a class=list-header href=https://www.<?= $domain ?>/develop> <span class=icon-develop></span> </a>
                                        <div class=list-body>
                                            <h2>Build Something</h2>
                                            <p class=list-content>Builders will enjoy playing our multiplayer building game. Professional builders will want to check out ROBLOX Studio, our game development environment on your <a href=https://www.<?= $domain ?>/develop>Develop page</a>.</div>
                                <?php endif; ?>
								<?php if ($feedCount <= 18): ?>
										<li
                                        class="list-item feed-social" data-default-roblox-feed>
                                            <a class=list-header href=https://www.<?= $domain ?>/search/users> <span class=icon-friends></span> </a>
                                            <div class=list-body>
                                                <h2>Make Friends</h2>
                                                <p class=list-content>Meet other players in-game and send them a friend request. If you miss your opportunity you can always send a request later by <a href=https://www.<?= $domain ?>/search/users>searching</a> for their user profile.</div>
                                            <li
                                            class="list-item feed-social" data-default-roblox-feed>
                                                <a class=list-header href=https://www.<?= $domain ?>/forum> <span class=icon-forum></span> </a>
                                                <div class=list-body>
                                                    <h2>ROBLOX forums for help</h2>
                                                    <p class=list-content>No matter what you're looking for, if it's ROBLOX related, there are people talking about it <a href=https://www.<?= $domain ?>/forum>here</a>.</div>
                                    </li>
								<?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div id=Skyscraper-Abp-Right class="abp abp-container right-abp"><iframe name=Roblox_MyHome_Right_160x600 allowtransparency=true frameborder=0 height=612 scrolling=no src=https://www.<?= $domain ?>/user-sponsorship/2 width=160 data-js-adtype=iframead data-ad-slot=Roblox_MyHome_Left_160x600></iframe></div>
            </div>
        </div>
        <?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"); ?>
        </div>
        <script>
            function urchinTracker(){}
        </script>
            <?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/placelauncher.php"); ?>
<?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/modals/legacygenericconfirmationmodal.php"); ?>
<?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/modals/confirmationmodal.php"); ?>


        <script>
            var Roblox=Roblox||{};Roblox.jsConsoleEnabled=false;
        </script>
<?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/cookieupgrader.php"); ?>


<?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/robloxjs.php" ); ?>


    
<script type='text/javascript' src='https://js.idk18.xyz/a7eafc0e9aa687140f5d41b73fc409ea.js.gzip'></script>
        <div ng-modules="baseTemplateApp">
            <script type="text/javascript" src="https://js.idk18.xyz/eccdbe4a2de694b92fc35ce9ecb30d6c.js"></script>
        </div>
        <div ng-modules="pageTemplateApp">
            <!-- Template bundle: page -->
<script type="text/javascript">
"use strict"; angular.module("pageTemplateApp", []).run(['$templateCache', function($templateCache) { 

 }]);
</script>

         <?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/configPaths.php"); ?>
    
        <script>
            Roblox.XsrfToken.setToken('ZBiF+JCaP3O/');
        </script>
        <script>
            $(function(){Roblox.DeveloperConsoleWarning.showWarning();});
        </script>
        <script>
            $(function(){Roblox.JSErrorTracker.initialize({'suppressConsoleError':true});});
        </script>
        <?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/eventmanager.php"); ?>
    
    

<?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/modals/upsellAdModal.php"); ?>

        <script src=https://js.idk18.xyz/74f1dcbd516e47d530539c78177380cb.js></script>
