<?php

if (!$userLookup->doesUserExist($vars["user_id"])){
    die(header("Location: https://www.$domain/request-error?code=404"));
}

if (UserAuthentication::isUserTerminated($vars["user_id"])){
    die(header("Location: https://www.$domain/request-error?code=404"));
}

$isLoggedIn = $isUserAuthenticated;
$username = UserAuthentication::lookupNameById($vars["user_id"]);
$joinDate = $userLookup->getPublicUserInfo("joinDate", $vars["user_id"]);
$devVisits = 0;
$loggedInId = ($isLoggedIn) ? $userInfo["id"] : 0;


$stmt5 = $pdo->prepare("SELECT * FROM assets WHERE creatorId = :creator AND creatorType = 1 AND assetTypeId = 9 AND isRootPlace = 1 ORDER BY assetId DESC");
$stmt5->bindParam(':creator', $vars["user_id"], PDO::PARAM_INT);
$stmt5->execute();
$gamesCount = $stmt5->rowCount();
$gamesTitle = $stmt5->fetchAll(PDO::FETCH_ASSOC);

foreach ($gamesTitle as $game){
	$devVisits += $game["visitCache"];
}				

$userRender = ThumbnailService::requestAvatarThumbnail($vars["user_id"], 352, 352, 0);
?>




<!DOCTYPE html>
<!--[if IE 8]><html class="ie8" ng-app="robloxApp"><![endif]-->
<!--[if gt IE 8]><!-->
<html>
<!--<![endif]-->
<head data-machine-id="WEB1">
    <!-- MachineID: WEB1 -->
    <title><?= htmlspecialchars($username) ?> - ROBLOX</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,requiresActiveX=true" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="ROBLOX Corporation" />
<meta name="description" content="<?= $username ?> is one of millions playing, creating and exploring the endless possibilities of the ROBLOX universe. Join <?= htmlspecialchars($username) ?> on ROBLOX and explore together!" />
<meta name="keywords" content="free games, online games, building games, virtual worlds, free mmo, gaming cloud, physics engine" />
<meta name="apple-itunes-app" content="app-id=431946152" />
<meta name="google-site-verification" content="KjufnQUaDv5nXJogvDMey4G-Kb7ceUVxTdzcMaP9pCY" />
    <meta property="og:site_name" content="ROBLOX" />
    <meta property="og:title" content="<?= htmlspecialchars($username) ?>&#39;s Profile" />
    <meta property="og:type" content="profile" />
    <meta property="og:url" content="<?php echo "https" . "://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"] ?>" />
    <meta property="og:description" content="<?= htmlspecialchars($username) ?> is one of millions playing, creating and exploring the endless possibilities of the ROBLOX universe. Join <?= htmlspecialchars($username) ?> on ROBLOX and explore together!"/>
    <meta property="og:image" content="<?= $userRender ?>" />
    <meta property="fb:app_id" content="190191627665278">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@ROBLOX">
    <meta name="twitter:title" content="<?= htmlspecialchars($username) ?>&#39;s Profile">
    <meta name="twitter:description" content="<?= htmlspecialchars($username) ?> is one of millions playing, creating and exploring the endless possibilities of the ROBLOX universe. <?= htmlspecialchars($username) ?> is the creator of Natural Disaster Survival which has been played 0 times. Join <?= htmlspecialchars($username) ?> on ROBLOX and explore together!">
    <meta name="twitter:creator">
    <meta name=twitter:image1 content="<?= $userRender ?>" />
    <meta name="twitter:app:country" content="US">
    <meta name="twitter:app:name:iphone" content="ROBLOX Mobile">
    <meta name="twitter:app:id:iphone" content="431946152">
    <meta name="twitter:app:url:iphone">
    <meta name="twitter:app:name:ipad" content="ROBLOX Mobile">
    <meta name="twitter:app:id:ipad" content="431946152">
    <meta name="twitter:app:url:ipad">
    <meta name="twitter:app:name:googleplay" content="ROBLOX">
    <meta name="twitter:app:id:googleplay" content="com.roblox.client">
    <meta name="twitter:app:url:googleplay"/>


    <link href="https://images.idk18.xyz/7aee41db80c1071f60377c3575a0ed87.ico" rel="icon" />
                <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600" rel="stylesheet" type="text/css">

    <link rel="canonical" href="<?php echo "https" . "://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"] ?>" />
    
    
    <link rel='stylesheet' href='https://static.idk18.xyz/css/leanbase___9b9fc145916d65f94e610d1f02775894_m.css/fetch' />


            
<link rel='stylesheet' href='https://static.idk18.xyz/css/page___4a964b03af51e4ff15b0a2f14bd3eba8_m.css/fetch' />

    
    
    
    <script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js'></script>
<script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-1.11.1.js'><\/script>")</script>
<script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/jquery.migrate/jquery-migrate-1.2.1.min.js'></script>
<script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-migrate-1.2.1.js'><\/script>")</script>


    
    <script type='text/javascript' src='https://js.idk18.xyz/86411e39f51e0ef39c7fa2f1f92fe7b3.js'></script>


    
    
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>

        <?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/adshelper.php" ); ?>
		<script type="text/javascript">
    $(function () {
        Roblox.JSErrorTracker.initialize({ 'suppressConsoleError': true});
    });
</script>    <script type="text/javascript">
        $(function () {
            RobloxEventManager.triggerEvent('rbx_evt_newuser', {});
        });

    </script>

    <script type="text/javascript">
        if (Roblox && Roblox.Performance) {
            Roblox.Performance.setPerformanceMark("html_head");
        }
    </script>




    
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
 <?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/googleanalytics.php" ); ?>


    <?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/eventstreaminit.php" ); ?>


<script type="text/javascript">
    if (Roblox && Roblox.PageHeartbeatEvent) {
        Roblox.PageHeartbeatEvent.Init([2,8,20,60]);
    }
</script>        <script type="text/javascript">
if (typeof(Roblox) === "undefined") { Roblox = {}; }
Roblox.Endpoints = Roblox.Endpoints || {};
Roblox.Endpoints.Urls = Roblox.Endpoints.Urls || {};
Roblox.Endpoints.Urls['/api/item.ashx'] = 'https://www.<?= $domain ?>/api/item.ashx';
Roblox.Endpoints.Urls['/asset/'] = 'https://assetgame.<?= $domain ?>/asset/';
Roblox.Endpoints.Urls['/client-status/set'] = 'https://www.<?= $domain ?>/client-status/set';
Roblox.Endpoints.Urls['/client-status'] = 'https://www.<?= $domain ?>/client-status';
Roblox.Endpoints.Urls['/game/'] = 'https://assetgame.<?= $domain ?>/game/';
Roblox.Endpoints.Urls['/game-auth/getauthticket'] = 'https://www.<?= $domain ?>/game-auth/getauthticket';
Roblox.Endpoints.Urls['/game/edit.ashx'] = 'https://assetgame.<?= $domain ?>/game/edit.ashx';
Roblox.Endpoints.Urls['/game/getauthticket'] = 'https://assetgame.<?= $domain ?>/game/getauthticket';
Roblox.Endpoints.Urls['/game/get-hash'] = 'https://assetgame.<?= $domain ?>/game/get-hash';
Roblox.Endpoints.Urls['/game/placelauncher.ashx'] = 'https://assetgame.<?= $domain ?>/game/placelauncher.ashx';
Roblox.Endpoints.Urls['/game/preloader'] = 'https://assetgame.<?= $domain ?>/game/preloader';
Roblox.Endpoints.Urls['/game/report-stats'] = 'https://assetgame.<?= $domain ?>/game/report-stats';
Roblox.Endpoints.Urls['/game/report-event'] = 'https://assetgame.<?= $domain ?>/game/report-event';
Roblox.Endpoints.Urls['/game/updateprerollcount'] = 'https://assetgame.<?= $domain ?>/game/updateprerollcount';
Roblox.Endpoints.Urls['/login/default.aspx'] = 'https://www.<?= $domain ?>/login/default.aspx';
Roblox.Endpoints.Urls['/my/character.aspx'] = 'https://www.<?= $domain ?>/my/character.aspx';
Roblox.Endpoints.Urls['/my/money.aspx'] = 'https://www.<?= $domain ?>/my/money.aspx';
Roblox.Endpoints.Urls['/chat/chat'] = 'https://www.<?= $domain ?>/chat/chat';
Roblox.Endpoints.Urls['/presence/users'] = 'https://www.<?= $domain ?>/presence/users';
Roblox.Endpoints.Urls['/presence/user'] = 'https://www.<?= $domain ?>/presence/user';
Roblox.Endpoints.Urls['/friends/list'] = 'https://www.<?= $domain ?>/friends/list';
Roblox.Endpoints.Urls['/navigation/getCount'] = 'https://www.<?= $domain ?>/navigation/getCount';
Roblox.Endpoints.Urls['/catalog/browse.aspx'] = 'https://www.<?= $domain ?>/catalog/browse.aspx';
Roblox.Endpoints.Urls['/catalog/html'] = 'https://search.<?= $domain ?>/catalog/html';
Roblox.Endpoints.Urls['/catalog/json'] = 'https://search.<?= $domain ?>/catalog/json';
Roblox.Endpoints.Urls['/catalog/contents'] = 'https://search.<?= $domain ?>/catalog/contents';
Roblox.Endpoints.Urls['/catalog/lists.aspx'] = 'https://search.<?= $domain ?>/catalog/lists.aspx';
Roblox.Endpoints.Urls['/asset-hash-thumbnail/image'] = 'https://assetgame.<?= $domain ?>/asset-hash-thumbnail/image';
Roblox.Endpoints.Urls['/asset-hash-thumbnail/json'] = 'https://assetgame.<?= $domain ?>/asset-hash-thumbnail/json';
Roblox.Endpoints.Urls['/asset-thumbnail-3d/json'] = 'https://assetgame.<?= $domain ?>/asset-thumbnail-3d/json';
Roblox.Endpoints.Urls['/asset-thumbnail/image'] = 'https://assetgame.<?= $domain ?>/asset-thumbnail/image';
Roblox.Endpoints.Urls['/asset-thumbnail/json'] = 'https://assetgame.<?= $domain ?>/asset-thumbnail/json';
Roblox.Endpoints.Urls['/asset-thumbnail/url'] = 'https://assetgame.<?= $domain ?>/asset-thumbnail/url';
Roblox.Endpoints.Urls['/asset/request-thumbnail-fix'] = 'https://assetgame.<?= $domain ?>/asset/request-thumbnail-fix';
Roblox.Endpoints.Urls['/avatar-thumbnail-3d/json'] = 'https://www.<?= $domain ?>/avatar-thumbnail-3d/json';
Roblox.Endpoints.Urls['/avatar-thumbnail/image'] = 'https://www.<?= $domain ?>/avatar-thumbnail/image';
Roblox.Endpoints.Urls['/avatar-thumbnail/json'] = 'https://www.<?= $domain ?>/avatar-thumbnail/json';
Roblox.Endpoints.Urls['/avatar-thumbnails'] = 'https://www.<?= $domain ?>/avatar-thumbnails';
Roblox.Endpoints.Urls['/avatar/request-thumbnail-fix'] = 'https://www.<?= $domain ?>/avatar/request-thumbnail-fix';
Roblox.Endpoints.Urls['/bust-thumbnail/json'] = 'https://www.<?= $domain ?>/bust-thumbnail/json';
Roblox.Endpoints.Urls['/group-thumbnails'] = 'https://www.<?= $domain ?>/group-thumbnails';
Roblox.Endpoints.Urls['/groups/getprimarygroupinfo.ashx'] = 'https://www.<?= $domain ?>/groups/getprimarygroupinfo.ashx';
Roblox.Endpoints.Urls['/headshot-thumbnail/json'] = 'https://www.<?= $domain ?>/headshot-thumbnail/json';
Roblox.Endpoints.Urls['/item-thumbnails'] = 'https://www.<?= $domain ?>/item-thumbnails';
Roblox.Endpoints.Urls['/outfit-thumbnail/json'] = 'https://www.<?= $domain ?>/outfit-thumbnail/json';
Roblox.Endpoints.Urls['/place-thumbnails'] = 'https://www.<?= $domain ?>/place-thumbnails';
Roblox.Endpoints.Urls['/thumbnail/asset/'] = 'https://www.<?= $domain ?>/thumbnail/asset/';
Roblox.Endpoints.Urls['/thumbnail/avatar-headshot'] = 'https://www.<?= $domain ?>/thumbnail/avatar-headshot';
Roblox.Endpoints.Urls['/thumbnail/avatar-headshots'] = 'https://www.<?= $domain ?>/thumbnail/avatar-headshots';
Roblox.Endpoints.Urls['/thumbnail/user-avatar'] = 'https://www.<?= $domain ?>/thumbnail/user-avatar';
Roblox.Endpoints.Urls['/thumbnail/resolve-hash'] = 'https://www.<?= $domain ?>/thumbnail/resolve-hash';
Roblox.Endpoints.Urls['/thumbnail/place'] = 'https://www.<?= $domain ?>/thumbnail/place';
Roblox.Endpoints.Urls['/thumbnail/get-asset-media'] = 'https://www.<?= $domain ?>/thumbnail/get-asset-media';
Roblox.Endpoints.Urls['/thumbnail/remove-asset-media'] = 'https://www.<?= $domain ?>/thumbnail/remove-asset-media';
Roblox.Endpoints.Urls['/thumbnail/set-asset-media-sort-order'] = 'https://www.<?= $domain ?>/thumbnail/set-asset-media-sort-order';
Roblox.Endpoints.Urls['/thumbnail/place-thumbnails'] = 'https://www.<?= $domain ?>/thumbnail/place-thumbnails';
Roblox.Endpoints.Urls['/thumbnail/place-thumbnails-partial'] = 'https://www.<?= $domain ?>/thumbnail/place-thumbnails-partial';
Roblox.Endpoints.Urls['/thumbnail_holder/g'] = 'https://www.<?= $domain ?>/thumbnail_holder/g';
Roblox.Endpoints.Urls['/users/{id}/profile'] = 'https://www.<?= $domain ?>/users/{id}/profile';
Roblox.Endpoints.Urls['/service-workers/push-notifications'] = 'https://www.<?= $domain ?>/service-workers/push-notifications';
Roblox.Endpoints.Urls['/notification-stream/notification-stream-data'] = 'https://www.<?= $domain ?>/notification-stream/notification-stream-data';
Roblox.Endpoints.Urls['/api/friends/acceptfriendrequest'] = 'https://www.<?= $domain ?>/api/friends/acceptfriendrequest';
Roblox.Endpoints.Urls['/api/friends/declinefriendrequest'] = 'https://www.<?= $domain ?>/api/friends/declinefriendrequest';
Roblox.Endpoints.addCrossDomainOptionsToAllRequests = true;
</script>

    <script type="text/javascript">
if (typeof(Roblox) === "undefined") { Roblox = {}; }
Roblox.Endpoints = Roblox.Endpoints || {};
Roblox.Endpoints.Urls = Roblox.Endpoints.Urls || {};
</script>

</head>
<body id="rbx-body"
      class=""
      data-performance-relative-value="0.005"
      data-internal-page-name="Profile"
      data-send-event-percentage="0.01">
    <div id="roblox-linkify" data-enabled="true" data-regex="(https?\:\/\/)?(?:www\.)?([a-z0-9\-]{2,}\.)*(((m|de|www|web|api|blog|wiki|help|corp|polls|bloxcon|developer|devforum|forum)\.roblox\.com|robloxlabs\.com)|(www\.shoproblox\.com))((\/[A-Za-z0-9-+&amp;@#\/%?=~_|!:,.;]*)|(\b|\s))" data-regex-flags="gm" data-as-http-regex="((blog|wiki|[^.]help|corp|polls|bloxcon|developer|devforum)\.roblox\.com|robloxlabs\.com)"></div>

<div id="image-retry-data"
     data-image-retry-max-times="10"
     data-image-retry-timer="1500"
     data-isnewexponentialbackoffforimageretryenabled="true">
</div>
<div id="http-retry-data"
     data-http-retry-max-timeout="0"
     data-http-retry-base-timeout="0"
     data-http-retry-max-times="5">
</div>

    


<div id="fb-root"></div>

<div id="wrap" class="wrap no-gutter-ads logged-<?php if ($isUserAuthenticated) echo 'in'; else echo 'out'; ?>"
     data-gutter-ads-enabled="false">




<?php require_once("../includes/header.php"); ?>


<script type="text/javascript">
    var Roblox = Roblox || {};
    (function() {
        if (Roblox && Roblox.Performance) {
            Roblox.Performance.setPerformanceMark("navigation_end");
        }
    })();
</script>

    <div class="container-main  
                 
                
                
                ">
            <script type="text/javascript">
                if (top.location != self.location) {
                    top.location = self.location.href;
                }
            </script>
        <noscript><div><div class="alert-info" role="alert">Please enable Javascript to use all the features on this site.</div></div></noscript>
        <div class="content ">

                                        <div id="Leaderboard-Abp" class="abp leaderboard-abp">
                    

<iframe name="Roblox_Profile_Top_728x90" 
        allowtransparency="true"
        frameborder="0"
        height="110"
        scrolling="no"
        src="https://www.<?= $domain ?>/user-sponsorship/1"
        width="728"
        data-js-adtype="iframead"
        data-ad-slot="Roblox_Profile_Top_728x90"></iframe>

                </div>
            



<script type="text/javascript">
    var Roblox = Roblox || {};
</script>

<div class="profile-container" ng-modules="robloxApp, profile, robloxApp.helpers">


<div class="section profile-header">

    <div class="section-content profile-header-content" ng-controller="profileHeaderController">

<?php
$stmt = $authPDO->prepare("SELECT requesterid FROM followers WHERE followingid = :userId");
$stmt->bindParam(':userId', $vars["user_id"], PDO::PARAM_INT);
$stmt->execute();
$followingCount = $stmt->rowCount();

$stmt = $authPDO->prepare("SELECT followingid FROM followers WHERE requesterid = :userId");
$stmt->bindParam(':userId', $vars["user_id"], PDO::PARAM_INT);
$stmt->execute();
$followersCount = $stmt->rowCount();

$friendCount = 0;
$areFriends = "false";
$incomingFriendReq = 0;
$incomingFriend = "false";
$sentFriendReq = "false";

if ($isLoggedIn){
	$stmt = $authPDO->prepare("SELECT followingid FROM followers WHERE followingid = :userId AND requesterId = :authenticated");
	$stmt->bindParam(':userId', $vars["user_id"], PDO::PARAM_INT);
	$stmt->bindParam(':authenticated', $loggedInId, PDO::PARAM_INT);
	$stmt->execute();
	$isFollowing = $stmt->rowCount();
}

$stmt = $authPDO->prepare("SELECT * FROM friendreq WHERE requested = :userId OR requester = :userId ORDER BY dateaccept DESC");
$stmt->bindParam(':userId', $vars["user_id"], PDO::PARAM_INT);
$stmt->execute();
$friendsList = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($friendsList as $friendInfo){
    if ($friendInfo["accepted"] == 1)
        $friendCount++;
    
    if ($isLoggedIn){
        if ($friendInfo["requested"] == $loggedInId || $friendInfo["requester"] == $loggedInId){
            if ($friendInfo["accepted"] == 1){
                $areFriends = "true";
            }else{
                if ($friendInfo["requested"] == $loggedInId){
                    $incomingFriendReq = $friendInfo["id"];
                    $incomingFriend = "true";
                }else{
                    $sentFriendReq = "true";
                }
            }
        }
    }
}

$stmt = $pdo->prepare("SELECT userStatus FROM feed WHERE userType = 1 AND userId = :userId ORDER BY time DESC LIMIT 1");
$stmt->bindParam(':userId', $vars["user_id"], PDO::PARAM_INT);
$stmt->execute();
$feedStatus = $stmt->fetchColumn();
?>

<div data-userid="<?= $loggedInId ?>"
     data-profileuserid="<?= $vars["user_id"] ?>"
     data-profileusername="<?= htmlspecialchars($username) ?>"
     data-friendscount="<?= $friendCount ?>"
     data-followerscount="<?= $followingCount ?>"
     data-followingscount="<?= $followersCount ?>"
     data-acceptfriendrequesturl="/api/friends/acceptfriendrequest"
     data-incomingfriendrequestid="<?= $incomingFriendReq ?>"
     data-arefriends=<?= $areFriends ?>
     data-friendurl="https://www.<?= $domain ?>/users/<?= $vars["user_id"] ?>/friends#!/friends"
     data-incomingfriendrequestpending=<?= $incomingFriend ?>
     data-maysendfriendinvitation=<?php if (!$isLoggedIn || $incomingFriendReq == "true" || $sentFriendReq == "true") echo 'false'; else echo 'true'; ?>
     data-friendrequestpending=<?= $sentFriendReq ?>
     data-sendfriendrequesturl="/api/friends/sendfriendrequest"
     data-removefriendrequesturl="/api/friends/removefriend"
     data-mayfollow=<?php if (intval($vars["user_id"]) !== $loggedInId && $isLoggedIn) echo 'true'; else echo 'false'; ?> 
     data-isfollowing=<?php if (isset($isFollowing) && $isFollowing !== 0) echo 'true'; else echo 'false'; ?>
     data-followurl="/user/follow"
     data-unfollowurl="/api/user/unfollow"
     data-canmessage=false
     data-messageurl="/messages/compose?recipientId=<?= $vars["user_id"] ?>"
     data-canbefollowed=false
     data-cantrade=false
     data-isblockbuttonvisible=false
     data-getfollowscript=""
     data-ismorebtnvisible=true
     data-isvieweeblocked=false
     data-mayimpersonate=false
     data-impersonateurl=""
     data-mayupdatestatus="<?php if (intval($vars["user_id"]) == $loggedInId) echo 'true'; else echo 'false'; ?>"
     data-updatestatusurl="<?php if (intval($vars["user_id"]) == $loggedInId) echo '/home/updatestatus'; else echo ''; ?>"
     data-statustext=<?= htmlspecialchars($feedStatus) ?>
     
     data-editstatusmaxlength="254"
     data-isfriendshiprealtimeupdateenabled=true
     data-getfriendshipcounturl="https://api.<?= $domain ?>/user/get-friendship-count"
     data-inapp="false"
     data-inandroidapp="false"
     data-iniosapp="false"
     profile-header-data
     profile-header-layout="profileHeaderLayout"
     class="hidden"></div>
        <div class="profile-header-top">
        <div class="avatar avatar-headshot-lg card-plain profile-avatar-image">
            <span class="avatar-card-link avatar-image-link">
                <img alt="<?= htmlspecialchars($username) ?>" class="avatar-card-image profile-avatar-thumb" ng-src="{{ '' }}" src="<?= ThumbnailService::requestAvatarThumbnail( $vars['user_id'], 150, 150, 1) ?>" thumbnail='{"Final":true,"Url":"","RetryUrl":null,"UserId":<?= $vars["user_id"] ?>,"EndpointType":"Avatar"}' image-retry>
             </span>
            <script type="text/javascript">
                $("img.profile-avatar-thumb").on('load', function() {
                    if (Roblox && Roblox.Performance) {
                        Roblox.Performance.setPerformanceMark("head_avatar");
                    }
                });
            </script>
        </div>
            <div class="header-caption">
                <div class="header-title">
                    <h2><?= htmlspecialchars($username) ?></h2>
                        <span class="icon-obc"></span>
                </div>
                <div class="header-details">
                    <ul class="details-info">
                        <li>
                            <div class="text-label">Friends</div>
                            <a class="text-name" href="https://www.<?= $domain ?>/users/<?= $vars["user_id"] ?>/friends#!/friends" ng-cloak>
                                <h3>
                                    {{profileHeaderLayout.friendsCount | number }}
                                </h3>
                            </a>
                        </li>
                        <li>
                            <div class="text-label">Followers</div>
                            <a class="text-name" href="https://www.<?= $domain ?>/users/<?= $vars["user_id"] ?>/friends#!/followers" ng-cloak>
                                <h3>{{profileHeaderLayout.followersCount | abbreviate }}</h3>
                            </a>
                        </li>
                        <li>
                            <div class="text-label">Following</div>
                            <a class="text-name" href="https://www.<?= $domain ?>/users/<?= $vars["user_id"] ?>/friends#!/following" ng-cloak>
                                <h3>
                                    {{profileHeaderLayout.followingsCount}}
                                </h3>
                            </a>
                        </li>
                    </ul>
					<?php if ($userInfo['id'] !== intval($vars["user_id"])): ?>
                        <ul class="details-actions desktop-action">
                            <li class="btn-friends" ng-if="!profileHeaderLayout.areFriends" ng-cloak>
                                <button ng-if="profileHeaderLayout.incomingFriendRequestPending"
                                        ng-cloak
                                        class="btn-control-md"
                                        data-target-url="/api/friends/acceptfriendrequest"
                                        data-friend-request-id="0"
                                        data-target-user-id="<?= $vars['user_id'] ?>"
                                        data-friends-url="https://www.<?= $domain ?>/users/<?= $vars["user_id"] ?>/friends#!/friends"
                                        ng-click="acceptFriendRequest()">
                                    Accept
                                </button>
                                <button ng-if="!profileHeaderLayout.incomingFriendRequestPending
                                                && profileHeaderLayout.maySendFriendInvitation"
                                        ng-cloak
                                        class="btn-control-md"
                                        ng-click="sendFriendRequest()">
                                    Add Friend
                                </button>
                                <button ng-if="!profileHeaderLayout.incomingFriendRequestPending
                                            && !profileHeaderLayout.maySendFriendInvitation
                                            && profileHeaderLayout.friendRequestPending"
                                        ng-cloak
                                        class="btn-control-md disabled">
                                    Pending
                                </button>
                                <button ng-if="!profileHeaderLayout.incomingFriendRequestPending
                                            && !profileHeaderLayout.maySendFriendInvitation
                                            && !profileHeaderLayout.friendRequestPending"
                                        ng-cloak
                                        class="btn-control-md disabled">
                                    Add Friend
                                </button>
                            </li>
                            <li class="btn-friends" ng-if="profileHeaderLayout.areFriends" ng-cloak>
                                <button class="btn-control-md"
                                        id="unfriend-btn"
                                        data-target-url="/api/friends/removefriend"
                                        data-target-user-id="<?= $vars['user_id'] ?>"
                                        ng-mouseenter="hover = true"
                                        ng-mouseleave="hover =false"
                                        ng-class="{'btn-unfollow': hover}"
                                        ng-click="removeFriend()">
                                    Unfriend
                                </button>
                            </li>
                            <li class="btn-messages"
                                id="profile-message-btn">
                                <button class="btn-control-md"
                                        ng-disabled="!profileHeaderLayout.enableMessageBtn"
                                        ng-show="profileHeaderLayout.showMessageBtn"
                                        ng-click="sendMessage()"
                                        ng-cloak>
                                    Message
                                </button>
                            </li>
                            <li class="btn-messages"
                                id="profile-chat-btn"
                                ng-show="profileHeaderLayout.showChatBtn">
                                <button class="btn-control-md"
                                        ng-click="chat()"
                                        ng-cloak>
                                    Chat
                                </button>
                            </li>
                            <li class="btn-join-game" ng-if="profileHeaderLayout.canBeFollowed">
                                <button class="profile-join-game btn-primary-md"
                                        ng-cloak>
                                    Join Game
                                </button>
                            </li>
                        </ul>
                        <ul class="details-actions mobile-action" ng-class="{'three-item-list': profileHeaderLayout.canBeFollowed}">
                            <li class="btn-friends" ng-if="!profileHeaderLayout.areFriends" ng-cloak>
                                <a ng-if="profileHeaderLayout.incomingFriendRequestPending"
                                   ng-cloak
                                   data-target-url="/api/friends/acceptfriendrequest"
                                   data-friend-request-id="0"
                                   data-target-user-id="<?= $vars['user_id'] ?>"
                                   data-friends-url="https://www.<?= $domain ?>/users/<?= $vars['user_id'] ?>/friends#!/friends"
                                   class="action-add-friend"
                                   ng-click="acceptFriendRequest()">
                                    <div class="icon-add-friend"></div>
                                    <div class="text-label small">Accept</div>
                                </a>
                                <a ng-if="!profileHeaderLayout.incomingFriendRequestPending
                                && profileHeaderLayout.maySendFriendInvitation"
                                   class="action-add-friend"
                                   ng-cloak
                                   ng-click="sendFriendRequest()">
                                    <div class="icon-add-friend"></div>
                                    <div class="text-label small">Add Friend</div>
                                </a>
                                <a ng-if="!profileHeaderLayout.incomingFriendRequestPending
                                            && !profileHeaderLayout.maySendFriendInvitation
                                            && profileHeaderLayout.friendRequestPending"
                                   ng-cloak
                                   class="action-friend-pending">
                                    <div class="icon-friend-pending"></div>
                                    <div class="text-label small">Pending</div>
                                </a>
                                <a ng-if="!profileHeaderLayout.incomingFriendRequestPending
                                            && !profileHeaderLayout.maySendFriendInvitation
                                            && !profileHeaderLayout.friendRequestPending"
                                   ng-cloak
                                   class="action-friend-pending">
                                    <div class="icon-friend-pending"></div>
                                    <div class="text-label small">Add Friend</div>
                                </a>
                            </li>
                            <li class="btn-friends" ng-if="profileHeaderLayout.areFriends" ng-cloak>
                                <a data-target-url="/api/friends/removefriend"
                                   data-target-user-id="80254"
                                   ng-mouseenter="hover = true"
                                   ng-mouseleave="hover =false"
                                   ng-class="{'btn-unfollow': hover}"
                                   ng-click="removeFriend()"
                                   class="action-remove-friend">
                                    <div class="icon-remove-friend"></div>
                                    <div class="text-label small">Unfriend</div>
                                </a>
                            </li>
                            <li class="btn-messages center-icon"
                                id="profile-message-icon"
                                ng-if="profileHeaderLayout.showMessageBtn"  ng-cloak>
                                <div ng-if="!profileHeaderLayout.enableMessageBtn" class="action-message-disabled" ng-cloak>
                                    <div class="icon-send-message-disabled"></div>
                                    <div class="text-label small">Message</div>
                                </div>
                                <a ng-if="profileHeaderLayout.enableMessageBtn" ng-click="sendMessage()" class="action-message" ng-cloak>
                                    <div class="icon-send-message"></div>
                                    <div class="text-label small">Message</div>
                                </a>
                            </li>
                            <li class="btn-messages center-icon"
                                id="profile-chat-icon"
                                ng-if="profileHeaderLayout.showChatBtn"  ng-cloak>
                                <div class="action-message-disabled"
                                     ng-click="chat()" 
                                     ng-cloak>
                                    <div class="icon-start-chat"></div>
                                    <div class="text-label small">Chat</div>
                                </div>
                            </li>
                            <li class="btn-join-game last-icon" ng-if="profileHeaderLayout.canBeFollowed">
                                <a class="profile-join-game action-join-game" ng-cloak>
                                    <div class="icon-join-game"></div>
                                    <div class="text-label small">Join Game</div>
                                </a>
                            </li>
							<?php endif; ?>
                        </ul>
                </div><!--header-details-->
<div class="header-userstatus">
    <div class="header-userstatus-text"
         ng-hide="profileHeaderLayout.statusFormShown">
        <span id="userStatusText"
              class="text-overflow"
              ng-class="{'userstatus-editable' : profileHeaderLayout.mayUpdateStatus}"
              ng-bind="profileHeaderLayout.statusText | statusfilter"
              ng-click="revealStatusForm()"
              ng-cloak></span>
    </div>
</div>
            </div>
        </div>
        <p ng-show="profileHeaderLayout.hasError" ng-cloak class="small text-error header-details-error">{{profileHeaderLayout.errorMsg}}</p>
        <div id="profile-header-more" class="profile-header-more" ng-show="profileHeaderLayout.isMoreBtnVisible"
             ng-cloak>
            <a id="popover-link" class="rbx-menu-item" data-toggle="popover" data-bind="profile-header-popover-content">
                <span class="icon-more"></span>
            </a>
            <div id="popover-content" class="rbx-popover-content" data-toggle="profile-header-popover-content">
                <ul class="dropdown-menu" role="menu">
                    <li ng-hide="profileHeaderLayout.showMessageBtn">
                        <a id="profile-message"
                           ng-click="sendMessage()"
                           ng-cloak>
                            Message
                        </a>
                    </li>
                    <li ng-show="profileHeaderLayout.mayFollow" ng-cloak>
                        <a ng-bind="profileHeaderLayout.isFollowing ? 'Unfollow' : 'Follow'"
                           ng-click="follow()"
                           id="profile-follow-user"
                           ng-cloak></a>
                    </li>
                        <li ng-show="profileHeaderLayout.canTrade" ng-cloak><a ng-click="tradeItems()" id="profile-trade-items">Trade Items</a></li>
                    <li ng-show="profileHeaderLayout.isBlockButtonVisible" ng-cloak>
                        <a ng-bind="!profileHeaderLayout.isVieweeBlocked ? 'Block User' : 'Unblock User'"
                           ng-click="blockUser()"
                           id="profile-block-user"
                           ng-cloak></a>
                    </li>
                        <?php if (intval($vars["user_id"]) !== 1): ?>
                                                                <li>
                            <a href="https://www.<?= $domain ?>/users/<?= $vars['user_id'] ?>/inventory/">Inventory</a>
                        </li>
                        <?php endif; ?>
                                            <li>
                            <a href="https://www.<?= $domain ?>/users/<?= $vars['user_id'] ?>/favorites#!/places">Favorites</a>
                        </li>
                </ul>
            </div>
            <script type="text/javascript">
                $(function() {
                    $(".details-actions, .mobile-details-actions").on("click", ".profile-join-game", function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        // NOTE: global var set due to legacy game launch code.
                        play_placeId = 0;
                        
                        ;return false;
                    });
                });
            </script>
<div>
    <script type="text/javascript">
        Roblox.uiBootstrap = Roblox.uiBootstrap || {};
        Roblox.uiBootstrap.modalBackdropTemplateLink = "/viewapp/common/template/modal/backdrop.html";
        Roblox.uiBootstrap.modalWindowTemplateLink = "/viewapp/common/template/modal/window.html";
    </script>
    <script type="text/ng-template" id="profile-block-user-modal.html">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" ng-click="close()">
                    <span aria-hidden="true"><span class="icon-close"></span></span><span class="sr-only">Close</span>
                </button>
                <h5>
                    Warning
                </h5>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to unblock this user?</p>
            </div>
            <div class="modal-footer">
                    <button type="submit" id="purchaseConfirm" class="btn-control-md" ng-click="submit()">
                        Unblock
                    </button>
                                    <button type="button" class="btn-fixed-width btn-secondary-md" ng-click="close()">
                        Cancel
                    </button>
            </div>
            </div><!-- /.modal-content -->
    </script>
</div>
<div>
    <script type="text/javascript">
        Roblox.uiBootstrap = Roblox.uiBootstrap || {};
        Roblox.uiBootstrap.modalBackdropTemplateLink = "/viewapp/common/template/modal/backdrop.html";
        Roblox.uiBootstrap.modalWindowTemplateLink = "/viewapp/common/template/modal/window.html";
    </script>
    <script type="text/ng-template" id="profile-unblock-user-modal.html">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" ng-click="close()">
                    <span aria-hidden="true"><span class="icon-close"></span></span><span class="sr-only">Close</span>
                </button>
                <h5>
                    Warning
                </h5>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to block this user?</p>
            </div>
            <div class="modal-footer">
                    <button type="submit" id="purchaseConfirm" class="btn-control-md" ng-click="submit()">
                        Block
                    </button>
                                    <button type="button" class="btn-fixed-width btn-secondary-md" ng-click="close()">
                        Cancel
                    </button>
            </div>
                <p class="small modal-footer-note">When you&#39;ve blocked a user, neither of you can directly contact the other.</p>
            </div><!-- /.modal-content -->
    </script>
</div>
        </div>
    </div><!--profile-header-content-->
</div><!-- profile-header -->
    <div class="rbx-tabs-horizontal">
        <ul id="horizontal-tabs" class="nav nav-tabs" role="tablist">
            <li class="rbx-tab active">
                <a class="rbx-tab-heading" href="#about" id="tab-about">
                    <span class="text-lead">About</span>
                    <span class="rbx-tab-subtitle"></span>
                </a>
            </li>
            <li class="rbx-tab">
                <a class="rbx-tab-heading" href="#creations" id="tab-creations">
                    <span class="text-lead">Creations</span>
                    <span class="rbx-tab-subtitle"></span>
                </a>
            </li>
        </ul>
        <div class="tab-content rbx-tab-content">
            <div class="tab-pane active" id="about">
                <div class="section profile-about" ng-controller="profileUtilitiesController">
    <div class="container-header">
        <h3>About</h3>
    </div>
    <div class="section-content">
        <div class="profile-about-content">
            <p class="para-overflow-toggle para-height para-overflow-page-loading">
                <span class="profile-about-content-text" ng-non-bindable></span>
                <span class="toggle-para">Read More</span>
            </p>
        </div>
    </div>
</div>
<div class="container-list profile-avatar">
    <h3>Currently Wearing</h3>
    <div class="col-sm-6 profile-avatar-left">


<div id="UserAvatar" class="thumbnail-holder" data-reset-enabled-every-page data-3d-thumbs-enabled 
     data-url="/thumbnail/user-avatar?userId=<?= $vars["user_id"] ?>&amp;thumbnailFormatId=124&amp;width=300&amp;height=300" style="width:300px; height:300px;">
    <span class="thumbnail-span" data-3d-url="/avatar-thumbnail-3d/json?userId=<?= $vars["user_id"] ?>"  data-js-files='https://js.idk18.xyz/95518cef4aea4b89a95e61452d70c3bb.js' ><img alt='<?= htmlspecialchars($username) ?>' class='' src='<?= $userRender ?>' /></span>
        <img class="user-avatar-overlay-image thumbnail-overlay" src="https://images.rbxcdn.com/57ede1145c87db28cf51e2355909ee49.png" alt="" />
    <span class="enable-three-dee btn-control btn-control-small"></span>
</div>


    </div>
        <div class="col-sm-6 profile-avatar-right">
            <div class="profile-avatar-mask">

            <?php
                            $stmt = $pdo->prepare("SELECT * FROM inventory WHERE userId = :userId and wearing = 1");
                            $stmt->bindParam(':userId', $vars["user_id"]);
                            $stmt->execute();
            ?>
<div class="profile-accoutrements-container" ng-controller="profileAccoutrementsController">
<div data-numberofaccoutrements="<?= $stmt->rowCount() ?>"
     data-accoutrementsperpage="8"
     data-intouchscreen=false
     profile-accoutrements-data
     profile-accoutrements-layout="profileAccoutrementsLayout"
     class="hidden"></div>
    <div id="accoutrements-slider" class="profile-accoutrements-slider"
         profile-accoutrements-slider
         profile-accoutrements-layout="profileAccoutrementsLayout">
                    <ul class="accoutrement-items-container">
                        <?php
                            foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $asset){
                                $assetInfo = AssetService::getAssetInfo($asset["assetId"]);
                                echo'<li class="accoutrement-item" ng-non-bindable>
                    <a href="https://www.' . $domain . '/catalog/' . $assetInfo["id"] . '">
                        <img title="' . $assetInfo["name"] . '" alt="' . $assetInfo["name"] . '" class="accoutrement-image" src="' . ThumbnailService::requestAssetThumbnail( $assetInfo['id'], 100, 100 ) . '" />


<div class="asset-restriction-icon">
        <span class="icon-label icon--label"></span>
</div>
                    </a>
                </li>';
                            }
                        ?>

    </div><!--profile-accoutrement-slider-->
    <div id="accoutrements-page" class="profile-accoutrements-page-container"
         profile-accoutrements-page
         profile-accoutrements-layout="profileAccoutrementsLayout">
                <span class="profile-accoutrements-page hidden"
                      ng-class="{'page-active': profileAccoutrementsLayout.currentPageNumber == 0}"
                      ng-click="getAccoutrementsPage(0)"></span>
                <span class="profile-accoutrements-page hidden"
                      ng-class="{'page-active': profileAccoutrementsLayout.currentPageNumber == 1}"
                      ng-click="getAccoutrementsPage(1)"></span>
                <span class="profile-accoutrements-page hidden"
                      ng-class="{'page-active': profileAccoutrementsLayout.currentPageNumber == 2}"
                      ng-click="getAccoutrementsPage(2)"></span>
                <span class="profile-accoutrements-page hidden"
                      ng-class="{'page-active': profileAccoutrementsLayout.currentPageNumber == 3}"
                      ng-click="getAccoutrementsPage(3)"></span>
                <span class="profile-accoutrements-page hidden"
                      ng-class="{'page-active': profileAccoutrementsLayout.currentPageNumber == 4}"
                      ng-click="getAccoutrementsPage(4)"></span>
                <span class="profile-accoutrements-page hidden"
                      ng-class="{'page-active': profileAccoutrementsLayout.currentPageNumber == 5}"
                      ng-click="getAccoutrementsPage(5)"></span>
                <span class="profile-accoutrements-page hidden"
                      ng-class="{'page-active': profileAccoutrementsLayout.currentPageNumber == 6}"
                      ng-click="getAccoutrementsPage(6)"></span>
                <span class="profile-accoutrements-page hidden"
                      ng-class="{'page-active': profileAccoutrementsLayout.currentPageNumber == 7}"
                      ng-click="getAccoutrementsPage(7)"></span>
                <span class="profile-accoutrements-page hidden"
                      ng-class="{'page-active': profileAccoutrementsLayout.currentPageNumber == 8}"
                      ng-click="getAccoutrementsPage(8)"></span>
                <span class="profile-accoutrements-page hidden"
                      ng-class="{'page-active': profileAccoutrementsLayout.currentPageNumber == 9}"
                      ng-click="getAccoutrementsPage(9)"></span>

    </div>
</div>
            </div>
        </div>
</div>

<?php if ($friendCount !== 0): ?>
	<div class="section home-friends">
		<div class=container-header>
				<h3>Friends (<?= $friendCount ?>)</h3>
				<a href=https://www.<?= $domain ?>/users/<?= $vars["user_id"] ?>/friends class="btn-secondary-xs btn-more btn-fixed-width">See All</a>
		</div>
		<div class=section-content>
			<ul class="hlist friend-list">
                <?php
                $count = 0;
                foreach ($friendsList as $friend){
                        if ($friend["accepted"] == 1){
                            $count++;

                        if ($count < 10){
                            $friendId = ($friend["requester"] == $vars["user_id"]) ? $friend["requested"] : $friend["requester"];
                            $friendName = UserAuthentication::lookupNameById($friendId);

                            echo'<li id=friend_' . $friendId . ' class="list-item friend">
                                <div class=avatar-container>
                                <a href=https://www.' . $domain . '/users/' . $friendId . '/profile class="avatar avatar-card-fullbody friend-link" title=' . $friendName . '>
                                <span class="avatar-card-link friend-avatar" data-3d-url="/avatar-thumbnail-3d/json?userId=' . $friendId . '" data-orig-retry-url="/avatar-thumbnail/json?userId=' . $friendId . '&amp;width=100&amp;height=100&amp;format=png">
                                <img alt=' . $friendName . ' class=avatar-card-image src=' . ThumbnailService::requestAvatarThumbnail($friendId, 100, 100, 0) . '>
                                </span>
                                <span class="text-overflow friend-name">' . $friendName . '</span>
                                </a>
                                </div>';
                        }
                    }
                }
                ?>
			</ul>
            </div>
	</div>
<?php endif; ?>

<?php 
$stmt = $pdo->prepare("SELECT assetId FROM favorites WHERE userId = :userId and typeId = 9 ORDER BY lastModified DESC LIMIT 6");
$stmt->bindParam(':userId', $vars["user_id"], PDO::PARAM_INT);
$stmt->execute();
$count = $stmt->rowCount();

if ($count !== 0):
?>
    <div class="container-list favorite-games-container">
        <div class="container-header">
            <h3>Favorite Games</h3>
            <a  href="https://www.<?= $domain ?>/users/<?= $vars["user_id"] ?>/favorites#!/places" class="btn-secondary-xs btn-fixed-width btn-more">Favorites</a>
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

        foreach ($stmt2->fetchAll(PDO::FETCH_ASSOC) as $result)
        {
            $playerCount = $playerCount + $result["playerCount"];
        }

        $game['totalPlayerCount'] = $playerCount;
		
		if ($game["creatorType"] === 1){
									$game["creatorName"] = UserAuthentication::lookupNameById($game["creatorId"]);
									$game["creatorProfile"] = "https://www.idk18.xyz/users/{$game["creatorId"]}/profile";
								}else{
									$game["creatorName"] = AssetService::getGroupName($game["creatorId"]);
									$game["creatorProfile"] = "https://www.idk18.xyz/groups/group.aspx?gid=" . $game["creatorId"];
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
                                    data-upvotes="0"
                                    data-downvotes="0">
                                    <div class="vote-background no-votes"></div>
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
                                <div class="vote-down-count">0</div>
                                <div class="vote-up-count">0</div>
                            </div>
                        </div>
                    </a>
                    <span class="game-card-footer">
                    <span class="text-label xsmall">By </span>
                    <a class="text-link xsmall text-overflow" href="', $game["creatorProfile"], '">', $game["creatorName"], '</a></span>
                </div>
            </li>';
    }
?>

</ul>
    </div>
<?php endif; ?>

<?php
$stmt = $pdo->prepare("SELECT * FROM inventory WHERE userId = :userId and assetType = 21 ORDER BY purchasedWhen DESC LIMIT 6");
$stmt->bindParam(':userId', $vars["user_id"], PDO::PARAM_INT);
$stmt->execute();
$count = $stmt->rowCount();

if ($count !== 0): ?>
    <div class="section" ng-controller="profileUtilitiesController">
                <div class="container-header">
                    <h3>Player Badges</h3>
                            <a href="https://www.<?= $domain ?>/users/<?= $vars["user_id"] ?>/inventory/#!/badges" class="btn-fixed-width btn-secondary-xs btn-more">See All</a>

                </div>


        <div class="section-content">
                    <ul class="hlist badge-list">
                        <?php 
                        foreach( $stmt->fetchAll(PDO::FETCH_ASSOC) as $badge ){
                            $badgeInfo = AssetService::getAssetInfo($badge["assetId"]);
							$thumbnail = ThumbnailService::requestAssetThumbnail($badgeInfo["imageid"], 140, 140);

                            print'<li class="list-item badge-item asset-item" ng-non-bindable>
                            <a href="https://www.' . $domain . '/badge-item?id=' . $badgeInfo["id"] . '" class="badge-link" title="' . $badgeInfo["name"] . '">
                                <img src="' . $thumbnail . '" alt="' . $badgeInfo["name"] . '" thumbnail=' . "'" . '{"Final":true,"Url":"' . $thumbnail . '","RetryUrl":null,"UserId":0,"EndpointType":"Avatar"}' . "'" . ' image-retry>
                                <span class="text-overflow item-name" ng-non-bindable>' . $badgeInfo["name"] . '</span>
                            </a>
                        </li>';
                        }
                        ?>
                </ul>

        </div>
    </div>
<?php endif; ?>



<div class="section profile-statistics">
    <h3>Statistics</h3>

    <div class="section-content">
        <ul class="profile-stats-container">
            <li class="profile-stat">
                <p class="text-label">Join Date</p>
                <p class="text-lead"><?= date("n/j/Y", $joinDate); ?></p>
            </li>
            <li class="profile-stat">
                <p class="text-label">Place Visits</p>
                <p class="text-lead"><?= $devVisits ?></p>
            </li>
            <li class="profile-stat">
                <p class="text-label">Forum Posts</p>
                <p class="text-lead">0</p>
            </li>
        </ul>
    </div>
</div>


            </div>
            <div class="tab-pane"
                 id="creations"
                 profile-empty-tab>
    <?php
	if ($gamesCount !== 0): ?>
    <div class="profile-game" ng-controller="profileGridController" ng-init="init('game-cards','game-container')">
        <div class="container-header">
            <h3 ng-non-bindable>Games</h3>
            <div class="container-buttons">
                <button class="profile-view-selector" title="Slideshow View" type="button" ng-click="updateDisplay(false)" ng-class="{'btn-secondary-xs': !isGridOn, 'btn-control-xs': isGridOn}">
                    <span class="icon-slideshow" ng-class="{'selected': !isGridOn}"></span>
                </button>
                <button class="profile-view-selector" title="Grid View" type="button" ng-click="updateDisplay(true)" ng-class="{'btn-secondary-xs': isGridOn, 'btn-control-xs': !isGridOn}">
                    <span class="icon-grid" ng-class="{'selected': isGridOn}"></span>
                </button>
            </div>
        </div>
        <div ng-show="isGridOn" class="game-grid">
            <ul class="hlist game-cards" style="max-height: {{containerHeight}}px" horizontal-scroll-bar="loadMore()">


                        <?php
						$index = 0;
						$gameCount = $gamesCount - 1;
						
						if ($gameCount !== -1){
							foreach ($gamesTitle as $game){
								$stmt2 = $pdo->prepare("SELECT playerCount FROM assets WHERE universeId = :universeId and assetTypeId = 9");
								$stmt2->bindParam(':universeId', $game["universeId"]);
								$stmt2->execute();
								$playerCount = 0;
								
								$stmt = $pdo->prepare("SELECT vote FROM votes WHERE assetId = :assetId");
								$stmt->bindParam(':assetId', $game['assetId'], PDO::PARAM_INT);
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
								
								if ($totalDown == 0 && $totalUp == 0){
									$extra = "no-votes";
								}

								foreach ($stmt2->fetchAll(PDO::FETCH_ASSOC) as $result)
								{
									$playerCount = $playerCount + $result["playerCount"];
								}

								$game['totalPlayerCount'] = $playerCount;
								
								if ($game["creatorType"] === 1){
									$game["creatorName"] = UserAuthentication::lookupNameById($game["creatorId"]);
									$game["creatorProfile"] = "https://www.idk18.xyz/users/{$game["creatorId"]}/profile";
								}else{
									$game["creatorName"] = AssetService::getGroupName($game["creatorId"]);
									$game["creatorProfile"] = "https://www.idk18.xyz/groups/group.aspx?gid=" . $game["creatorId"];
								}
                                $thumbnail = ThumbnailService::requestAssetThumbnail( $game["assetId"], 150, 150, 1);
	
								echo '
								<div class="game-container" data-index="' . $index . '" ng-class="{'. "'shown': $index < visibleItems}" . '">
										<li class="list-item game-card">
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
								
									if ($gameCount !== $index){
										echo '</div>';
									}
									
									$index++;
							}
						}
?>

                        </div>

            </ul>

            <a ng-click="loadMore()" class="btn btn-control-xs load-more-button" ng-show="<?= $index ?> > 6 * NumberOfVisibleRows">Load More</a>
        </div>
        <div id="games-switcher" class="switcher slide-switcher games" ng-hide="isGridOn" switcher itemscount="switcher.games.itemsCount" currpage="switcher.games.currPage">
                        <ul class="slide-items-container switcher-items hlist">
						<?php
						$index = 0;
						
							foreach ($gamesTitle as $game){
								$stmt2 = $pdo->prepare("SELECT playerCount FROM assets WHERE universeId = :universeId and assetTypeId = 9");
								$stmt2->bindParam(':universeId', $game["universeId"]);
								$stmt2->execute();
								$playerCount = 0;
								
								if ($game["iconImageAssetId"] == 0){
									$game["iconImageAssetId"] = $game["assetId"];
								}
								
								$thumbnail = ThumbnailService::requestAssetThumbnail($game["iconImageAssetId"], 352, 352, 1);

								foreach ($stmt2->fetchAll(PDO::FETCH_ASSOC) as $result)
								{
									$playerCount = $playerCount + $result["playerCount"];
								}
								
								$extra = ($index == 0) ? 'active' : "";

								$game['totalPlayerCount'] = $playerCount;
								echo '
								<li class="switcher-item slide-item-container ', $extra, '" ng-class="{' .  "'active'" . ': switcher.games.currPage == ' . $index . '}" data-index="' . $index . '">
											<div class="col-sm-6 slide-item-container-left">
									<div class="slide-item-emblem-container">
										<a href="https://www.', $domain, '/games/', $game["assetId"], '">
									<img class="slide-item-image"
										 src="', $thumbnail, '"
										 data-src="', $thumbnail, '"
										 data-emblem-id="', $game["assetId"], '" thumbnail=', "'", '{"Final":true,"Url":"', $thumbnail, '","RetryUrl":null,"UserId":0,"EndpointType":"Avatar"}', "'", ' image-retry />

										</a>
									</div>
								</div>
								<div class="col-sm-6 slide-item-container-right games">
									<div class="slide-item-info">
										<h2 class="text-overflow slide-item-name games" ng-non-bindable>', htmlspecialchars($game["assetName"]), '</h2>
										<p class="text-description para-overflow slide-item-description games" ng-non-bindable>', htmlspecialchars($game["assetDescription"]), '</p>
									</div>
									<div class="slide-item-stats">
										<ul class="hlist">
											<li class="list-item">
												<div class="text-label slide-item-stat-title">Playing</div>
												<div class="text-lead slide-item-members-count">', $game['totalPlayerCount'], '</div>
											</li>
											<li class="list-item">
												<div class="text-label slide-item-stat-title">Visits</div>
												<div class="text-lead text-overflow slide-item-my-rank games">', $game['visitCache'], '</div>
											</li>
										</ul>
									</div>
								</div>
							</li>';
									
									$index++;
							}
?>
                    
                        

                        </ul>

                    <a class="carousel-control left" data-switch="prev"><span class="icon-carousel-left"></span></a>
                    <a class="carousel-control right" data-switch="next"><span class="icon-carousel-right"></span></a>

        </div>
    </div>
<?php endif; ?>

                <div class="col-xs-12 section-content-off section-content"
                     ng-if="profileLayout.userHasNoCreations">
                    <?= htmlspecialchars($username) ?> has no creations.
                </div>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="profile-ads-container">
        <div id="ProfilePageAdDiv1" class="profile-ad">


<iframe name="Roblox_Profile_Left_300x250" 
        allowtransparency="true"
        frameborder="0"
        height="270"
        scrolling="no"
        src="https://www.<?= $domain ?>/user-sponsorship/3"
        width="300"
        data-js-adtype="iframead"
        data-ad-slot="Roblox_Profile_Left_300x250"></iframe>

        </div>
        <div id="ProfilePageAdDiv2" class="profile-ad">


<iframe name="Roblox_Profile_Right_300x250" 
        allowtransparency="true"
        frameborder="0"
        height="270"
        scrolling="no"
        src="https://www.<?= $domain ?>/user-sponsorship/3"
        width="300"
        data-js-adtype="iframead"
        data-ad-slot="Roblox_Profile_Right_300x250"></iframe>

        </div>
    </div>
</div>

            
        </div>
            </div> 

<?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"); ?>


</div> 



    <script type="text/javascript">function urchinTracker() {}</script>


    <?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/placelauncher.php"); ?>
<?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/modals/legacygenericconfirmationmodal.php"); ?>
<?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/modals/confirmationmodal.php"); ?>





<script type="text/javascript">
    var Roblox = Roblox || {};
    Roblox.jsConsoleEnabled = false;
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

        </div>
                        

        <?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/configPaths.php"); ?>
    
    <script>
        Roblox.XsrfToken.setToken('Hqs0INhCUuHg');
    </script>

        <script>
            $(function () {
                Roblox.DeveloperConsoleWarning.showWarning();
            });
        </script>
    <script type="text/javascript">
    $(function () {
        Roblox.JSErrorTracker.initialize({ 'suppressConsoleError': true});
    });
</script>

<?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/eventmanager.php"); ?>
    
    

<?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/modals/upsellAdModal.php"); ?>

    
    <script type='text/javascript' src='https://js.idk18.xyz/241ef13a8b3f5ec5797c6cab80326019.js'></script>
    </noscript>
</body>
</html>