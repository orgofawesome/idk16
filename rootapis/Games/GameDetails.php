<?php
$pageName = "gameDetail";

//if ($userId !== 15)
//	die("The [GameDetail] page is currently unavailable.");

$game = AssetService::getAssetInfo($vars["place_id"]);

if ($game["typeid"] !== 9)
	die(header("Location: https://www.".$domain."/request-error?code=404"));

$gameName = preg_replace('/[^a-zA-Z0-9 ]/', '', $game["name"]);
$gameName = str_replace(' ', '-', $gameName);
//$gameName = strtolower($gameName);

$gameUsedName = explode('/', $_SERVER["REQUEST_URI"], 4);
$gameUsedName = $gameUsedName[3];

if ($gameUsedName !== $gameName){
	die(header("Location: https://www.".$domain."/games/".$game["id"]."/".$gameName));
}

$stmt = $pdo->prepare("SELECT assetId FROM assets WHERE universeId = :universeId and isRootPlace = 1 and assetTypeId = 9");
$stmt->bindParam(':universeId', $game["universeid"]);
$stmt->execute();
$result = $stmt->fetchColumn();
if ($stmt->rowCount() == 0){
    $gameRootId = 0;
}elseif ($vars["place_id"] !== $result){
    $gameRootId = $result;
    $game = AssetService::getAssetInfo($result);
}

if ($game["creatorType"] === 1){
	$game["creatorName"] = UserAuthentication::lookupNameById($game["creatorId"]);
    $game["HasTeamCreatePermissions"] = ($game["creatorId"] == $userInfo['id'] || $game["uncopylocked"] == 1) ? true : false;
    $game["HasFullPermissions"] = ($game["creatorId"] == $userInfo['id']);
    $game["creatorProfile"] = "https://www.$domain/users/{$game["creatorId"]}/profile";
}else{
    $game["creatorName"] = AssetService::getGroupName($game["creatorId"]);
    $game["HasFullPermissions"] = false;
    $game["HasTeamCreatePermissions"] = ($game["uncopylocked"] == 1) ? true : false;
    $game["creatorProfile"] = "https://www.$domain/groups/group.aspx?gid=" . $game["creatorId"];
}
?>
<!DOCTYPE html>
<!--[if IE 8]><html class="ie8" ng-app="robloxApp"><![endif]-->
<!--[if gt IE 8]><!-->
<html>
<!--<![endif]-->
<head>
    <!-- MachineID: <?= $webServerName ?> -->
    <title><?= htmlspecialchars($game["name"]) ?> - ROBLOX</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,requiresActiveX=true" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="ROBLOX Corporation" />
<meta name="description" content="<?= htmlspecialchars($game["description"]) ?>" />
<meta name="keywords" content="free games, online games, building games, virtual worlds, free mmo, gaming cloud, physics engine" />
<meta name="apple-itunes-app" content="app-id=431946152" />
<meta name="google-site-verification" content="KjufnQUaDv5nXJogvDMey4G-Kb7ceUVxTdzcMaP9pCY" />
    <meta property="og:site_name" content="ROBLOX" />
    <meta property="og:title" content="<?= htmlspecialchars($game["name"]) ?>" />
    <meta property="og:type" content="game" />
    <meta property="og:url" content="<?= $requestUrl ?>" />
    <meta property="og:description" content="<?= htmlspecialchars($game["description"]) ?>"/>
    <meta property="og:image" content="https://t7.rbxcdn.com/5853546595bc94f5b5b8e1618ef29a50" />


        <link href="https://images.idk18.xyz/7aee41db80c1071f60377c3575a0ed87.ico" rel="icon" />
                <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600" rel="stylesheet" type="text/css">

    <link rel="canonical" href="<?= $requestUrl ?>" />
    
    
<link rel='stylesheet' href='https://static.idk18.xyz/css/leanbase___9b9fc145916d65f94e610d1f02775894_m.css/fetch' />


            
<link rel='stylesheet' href='https://static.idk18.xyz/css/page___389ed0a988813a08f7ca9def2107173b_m.css/fetch' />

    
    
    
    <script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js'></script>
<script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-1.11.1.js'><\/script>")</script>
<script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/jquery.migrate/jquery-migrate-1.2.1.min.js'></script>
<script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-migrate-1.2.1.js'><\/script>")</script>


    
    <script type='text/javascript' src='https://js.idk18.xyz/86411e39f51e0ef39c7fa2f1f92fe7b3.js'></script>


    
    
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>

<script type="text/javascript">
    var Roblox = Roblox || {};
    Roblox.AdsHelper = Roblox.AdsHelper || {};
    Roblox.AdsLibrary = Roblox.AdsLibrary || {};

    Roblox.AdsHelper.toggleAdsSlot = function (slotId, GPTRandomSlotIdentifier) {
        var gutterAdsEnabled = false;
        if (gutterAdsEnabled) {
            googletag.display(GPTRandomSlotIdentifier);
            return;
        }
        
        if (typeof slotId !== 'undefined' && slotId && slotId.length > 0) {
            var slotElm = $("#"+slotId);
            if (slotElm.is(":visible")) {
                googletag.display(GPTRandomSlotIdentifier);
            }else {
                var adParam = Roblox.AdsLibrary.adsParameters[slotId];
                if (adParam) {
                    adParam.template = slotElm.html();
                    slotElm.empty();
                }
            }
        }
    }
</script><script type="text/javascript">
    $(function () {
        Roblox.JSErrorTracker.initialize({ 'suppressConsoleError': true});
    });
</script>    <script type="text/javascript">
        $(function () {
            RobloxEventManager.triggerEvent('rbx_evt_newuser', {});
        });

    </script>



        <meta property="al:ios:url" content="idk16mobile://placeID=<?= $game["id"] ?>" />
        <meta property="al:ios:app_store_id" content="431946152" />
        <meta property="al:ios:app_name" content="Roblox Mobile" />
        <meta property="al:web:should_fallback" content="false" />
    


    
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
   <?php require_once("../includes/googleanalytics.php"); ?>

	<?php require_once("../includes/eventstreaminit.php"); ?>



<script type="text/javascript">
    if (Roblox && Roblox.PageHeartbeatEvent) {
        Roblox.PageHeartbeatEvent.Init([2,8,20,60]);
    }
</script>        <script type="text/javascript">
if (typeof(Roblox) === "undefined") { Roblox = {}; }
Roblox.Endpoints = Roblox.Endpoints || {};
Roblox.Endpoints.Urls = Roblox.Endpoints.Urls || {};
Roblox.Endpoints.Urls['/api/item.ashx'] = 'https://www.<?php echo $domain ?>/api/item.ashx';
Roblox.Endpoints.Urls['/asset/'] = 'https://assetgame.<?php echo $domain ?>/asset/';
Roblox.Endpoints.Urls['/client-status/set'] = 'https://www.<?php echo $domain ?>/client-status/set';
Roblox.Endpoints.Urls['/client-status'] = 'https://www.<?php echo $domain ?>/client-status';
Roblox.Endpoints.Urls['/game/'] = 'https://assetgame.<?php echo $domain ?>/game/';
Roblox.Endpoints.Urls['/game-auth/getauthticket'] = 'https://www.<?php echo $domain ?>/game-auth/getauthticket';
Roblox.Endpoints.Urls['/game/edit.ashx'] = 'https://assetgame.<?php echo $domain ?>/game/edit.ashx';
Roblox.Endpoints.Urls['/game/getauthticket'] = 'https://assetgame.<?php echo $domain ?>/game/getauthticket';
Roblox.Endpoints.Urls['/game/placelauncher.ashx'] = 'https://assetgame.<?php echo $domain ?>/game/placelauncher.ashx';
Roblox.Endpoints.Urls['/game/preloader'] = 'https://assetgame.<?php echo $domain ?>/game/preloader';
Roblox.Endpoints.Urls['/game/report-stats'] = 'https://assetgame.<?php echo $domain ?>/game/report-stats';
Roblox.Endpoints.Urls['/game/report-event'] = 'https://assetgame.<?php echo $domain ?>/game/report-event';
Roblox.Endpoints.Urls['/game/updateprerollcount'] = 'https://assetgame.<?php echo $domain ?>/game/updateprerollcount';
Roblox.Endpoints.Urls['/login/default.aspx'] = 'https://www.<?php echo $domain ?>/login/default.aspx';
Roblox.Endpoints.Urls['/my/character.aspx'] = 'https://www.<?php echo $domain ?>/my/character.aspx';
Roblox.Endpoints.Urls['/my/money.aspx'] = 'https://www.<?php echo $domain ?>/my/money.aspx';
Roblox.Endpoints.Urls['/chat/chat'] = 'https://www.<?php echo $domain ?>/chat/chat';
Roblox.Endpoints.Urls['/presence/users'] = 'https://www.<?php echo $domain ?>/presence/users';
Roblox.Endpoints.Urls['/presence/user'] = 'https://www.<?php echo $domain ?>/presence/user';
Roblox.Endpoints.Urls['/friends/list'] = 'https://www.<?php echo $domain ?>/friends/list';
Roblox.Endpoints.Urls['/navigation/getCount'] = 'https://www.<?php echo $domain ?>/navigation/getCount';
Roblox.Endpoints.Urls['/catalog/browse.aspx'] = 'https://www.<?php echo $domain ?>/catalog/browse.aspx';
Roblox.Endpoints.Urls['/catalog/html'] = 'https://search.<?php echo $domain ?>/catalog/html';
Roblox.Endpoints.Urls['/catalog/json'] = 'https://search.<?php echo $domain ?>/catalog/json';
Roblox.Endpoints.Urls['/catalog/contents'] = 'https://search.<?php echo $domain ?>/catalog/contents';
Roblox.Endpoints.Urls['/catalog/lists.aspx'] = 'https://search.<?php echo $domain ?>/catalog/lists.aspx';
Roblox.Endpoints.Urls['/asset-hash-thumbnail/image'] = 'https://assetgame.<?php echo $domain ?>/asset-hash-thumbnail/image';
Roblox.Endpoints.Urls['/asset-hash-thumbnail/json'] = 'https://assetgame.<?php echo $domain ?>/asset-hash-thumbnail/json';
Roblox.Endpoints.Urls['/asset-thumbnail-3d/json'] = 'https://assetgame.<?php echo $domain ?>/asset-thumbnail-3d/json';
Roblox.Endpoints.Urls['/asset-thumbnail/image'] = 'https://assetgame.<?php echo $domain ?>/asset-thumbnail/image';
Roblox.Endpoints.Urls['/asset-thumbnail/json'] = 'https://assetgame.<?php echo $domain ?>/asset-thumbnail/json';
Roblox.Endpoints.Urls['/asset-thumbnail/url'] = 'https://assetgame.<?php echo $domain ?>/asset-thumbnail/url';
Roblox.Endpoints.Urls['/asset/request-thumbnail-fix'] = 'https://assetgame.<?php echo $domain ?>/asset/request-thumbnail-fix';
Roblox.Endpoints.Urls['/avatar-thumbnail-3d/json'] = 'https://www.<?php echo $domain ?>/avatar-thumbnail-3d/json';
Roblox.Endpoints.Urls['/avatar-thumbnail/image'] = 'https://www.<?php echo $domain ?>/avatar-thumbnail/image';
Roblox.Endpoints.Urls['/avatar-thumbnail/json'] = 'https://www.<?php echo $domain ?>/avatar-thumbnail/json';
Roblox.Endpoints.Urls['/avatar-thumbnails'] = 'https://www.<?php echo $domain ?>/avatar-thumbnails';
Roblox.Endpoints.Urls['/avatar/request-thumbnail-fix'] = 'https://www.<?php echo $domain ?>/avatar/request-thumbnail-fix';
Roblox.Endpoints.Urls['/bust-thumbnail/json'] = 'https://www.<?php echo $domain ?>/bust-thumbnail/json';
Roblox.Endpoints.Urls['/group-thumbnails'] = 'https://www.<?php echo $domain ?>/group-thumbnails';
Roblox.Endpoints.Urls['/groups/getprimarygroupinfo.ashx'] = 'https://www.<?php echo $domain ?>/groups/getprimarygroupinfo.ashx';
Roblox.Endpoints.Urls['/headshot-thumbnail/json'] = 'https://www.<?php echo $domain ?>/headshot-thumbnail/json';
Roblox.Endpoints.Urls['/item-thumbnails'] = 'https://www.<?php echo $domain ?>/item-thumbnails';
Roblox.Endpoints.Urls['/outfit-thumbnail/json'] = 'https://www.<?php echo $domain ?>/outfit-thumbnail/json';
Roblox.Endpoints.Urls['/place-thumbnails'] = 'https://www.<?php echo $domain ?>/place-thumbnails';
Roblox.Endpoints.Urls['/thumbnail/asset/'] = 'https://www.<?php echo $domain ?>/thumbnail/asset/';
Roblox.Endpoints.Urls['/thumbnail/avatar-headshot'] = 'https://www.<?php echo $domain ?>/thumbnail/avatar-headshot';
Roblox.Endpoints.Urls['/thumbnail/avatar-headshots'] = 'https://www.<?php echo $domain ?>/thumbnail/avatar-headshots';
Roblox.Endpoints.Urls['/thumbnail/user-avatar'] = 'https://www.<?php echo $domain ?>/thumbnail/user-avatar';
Roblox.Endpoints.Urls['/thumbnail/resolve-hash'] = 'https://www.<?php echo $domain ?>/thumbnail/resolve-hash';
Roblox.Endpoints.Urls['/thumbnail/place'] = 'https://www.<?php echo $domain ?>/thumbnail/place';
Roblox.Endpoints.Urls['/thumbnail/get-asset-media'] = 'https://www.<?php echo $domain ?>/thumbnail/get-asset-media';
Roblox.Endpoints.Urls['/thumbnail/remove-asset-media'] = 'https://www.<?php echo $domain ?>/thumbnail/remove-asset-media';
Roblox.Endpoints.Urls['/thumbnail/set-asset-media-sort-order'] = 'https://www.<?php echo $domain ?>/thumbnail/set-asset-media-sort-order';
Roblox.Endpoints.Urls['/thumbnail/place-thumbnails'] = 'https://www.<?php echo $domain ?>/thumbnail/place-thumbnails';
Roblox.Endpoints.Urls['/thumbnail/place-thumbnails-partial'] = 'https://www.<?php echo $domain ?>/thumbnail/place-thumbnails-partial';
Roblox.Endpoints.Urls['/thumbnail_holder/g'] = 'https://www.<?php echo $domain ?>/thumbnail_holder/g';
Roblox.Endpoints.Urls['/users/{id}/profile'] = 'https://www.<?php echo $domain ?>/users/{id}/profile';
Roblox.Endpoints.Urls['/service-workers/push-notifications'] = 'https://www.<?php echo $domain ?>/service-workers/push-notifications';
Roblox.Endpoints.Urls['/notification-stream/notification-stream-data'] = 'https://www.<?php echo $domain ?>/notification-stream/notification-stream-data';
Roblox.Endpoints.Urls['/api/friends/acceptfriendrequest'] = 'https://www.<?php echo $domain ?>/api/friends/acceptfriendrequest';
Roblox.Endpoints.Urls['/api/friends/declinefriendrequest'] = 'https://www.<?php echo $domain ?>/api/friends/declinefriendrequest';
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
      data-internal-page-name="GameDetail"
      data-send-event-percentage="0.01">
    <div id="roblox-linkify" data-enabled="true" data-regex="(https?\:\/\/)?(?:www\.)?([a-z0-9\-]{2,}\.)*(((m|de|www|web|api|blog|wiki|help|corp|polls|bloxcon|developer|devforum|forum)\.roblox\.com|robloxlabs\.com)|(www\.shoproblox\.com))((\/[A-Za-z0-9-+&amp;@#\/%?=~_|!:,.;]*)|(\b|\s))" data-regex-flags="gm" data-as-http-regex="((blog|wiki|[^.]help|corp|polls|bloxcon|developer|devforum)\.roblox\.com|robloxlabs\.com)"></div>

<div id="image-retry-data"
     data-image-retry-max-times="10"
     data-image-retry-timer="1500">
</div>
<div id="http-retry-data"
     data-http-retry-max-timeout="0"
     data-http-retry-base-timeout="0">
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

<?php if (!str_contains($_SERVER['HTTP_USER_AGENT'], "ROBLOX")): ?>
    <div class="container-main  
                 
                
                
                ">
<?php endif; ?>
            <script type="text/javascript">
                if (top.location != self.location) {
                    top.location = self.location.href;
                }
            </script>
        <noscript><div><div class="alert-info" role="alert">Please enable Javascript to use all the features on this site.</div></div></noscript>
        <div class="content ">

                                        <div id="Leaderboard-Abp" class="abp leaderboard-abp">
                    

<iframe name="Roblox_GameDetail_Top_728x90" 
        allowtransparency="true"
        frameborder="0"
        height="110"
        scrolling="no"
        src="https://www.<?php echo $domain ?>/user-sponsorship/1"
        width="728"
        data-js-adtype="iframead"></iframe>

                </div>
            
<div id="game-detail-page" 
     class="row page-content">

    



    <div class="col-xs-12 section-content game-main-content">
        <div class="game-thumb-container">
            <script>
    var Roblox = Roblox || {};
    Roblox.Carousel = function () {
        var carouselId = "#carousel-game-details";
        var checkedForVideo = false;
        var isMobile = false;

        var initialize = function () {
            // acquire isMobile setting from DOM
            isMobile = $(carouselId).data('is-mobile');

            // set up carousel
            if(!isMobile) {
                $(carouselId).carousel({
                    interval: 6000,
                    pause: "hover"
                });
            } else {
                // do not cycle automatically on mobile because user might be playing video
                $(carouselId).carousel({
                    interval: false,
                    pause: "hover"
                });
            }


            // bindings
            $(carouselId)
                .on("slide.bs.carousel", function () {
                    // pause ALL the videos
                    Roblox.Carousel.pauseAllVideos();
                    // restart the carousel sliding
                    $(carouselId).carousel('cycle');
                })
                .hover(
                    function () {
                        $(this).addClass("hover");
                    },
                    function () {
                        $(this).removeClass("hover");
                    }
                );

            // hide controls when there's only one slide
            if ($(carouselId + " .item").length < 2) {
                $(carouselId).find(".carousel-control").css("display", "none");
            }

            $(document).on("playButton:gamePlayIntent", function () {
                // we pressed the play button - stop playing the video
                Roblox.Carousel.pauseAllVideos();
            });

            Roblox.Carousel.setUpYouTubeAPI();

            // retry thumbnails in carousel
            $(function () {
                $(carouselId + " .item span").loadRobloxThumbnails();
            });
        }

        var setUpYouTubeAPI = function () {
            var tag = document.createElement('script');

            tag.src = "https://www.youtube.com/iframe_api";
            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);


        }

        var toggleVideo = function (state) {
            var div = $('.flex-video');
            if(div.length > 0){
                var iframe = div.find('iframe')[0].contentWindow;
                var func = state == 'hide' ? 'pauseVideo' : 'playVideo';
                iframe.postMessage('{"event":"command","func":"' + func + '","args":""}', '*');
            }
        }

        var pauseVideoAtIndex = function (idx) {
            if (rbxplayer && rbxplayer.length > 0 && !isMobile) {
                try {
                    rbxplayer[idx].pauseVideo();
                } catch (e) {
                    // tried to pause before player was ready
                }

            } else {
                return false;
            }
        }

        var playVideoAtIndex = function (idx) {
            if(rbxplayer && rbxplayer.length > 0 && rbxplayer[idx] && !isMobile) {
                rbxplayer[idx].playVideo();
                return true;
            } else {
                return false;
            }
        }

        var pauseAllVideos = function () {
            // pause ALL the videos
            if (rbxplayer && rbxplayer.length > 0) {
                var rbxplayerlen = rbxplayer.length;
                for (var i = 0; i < rbxplayerlen; i++) {
                    Roblox.Carousel.pauseVideoAtIndex(i);
                }
            }
        }

        var checkForVideo = function () {
            if(checkedForVideo) {
                return false;
            }
            var carousel = $(carouselId);
            carousel.find('.item').each(function (idx, val) {
                if ($(val).find('.flex-video').length > 0) {
                    carousel.carousel(idx);
                    carousel.carousel("pause");
                    var successfulPlay = Roblox.Carousel.playVideoAtIndex(0);
                    checkedForVideo = successfulPlay;
                    return false; // stop
                } else {
                    return true; // keep going
                }
            });
        }
        var onPlayerReady = function () {
            // This first moment get the video and auto-play it
            var autoplay = $(carouselId).data('is-video-autoplayed-on-ready');
            if (autoplay && !isMobile) {
                Roblox.Carousel.checkForVideo();
            }
        }
        var onPlayerPlaying = function () {
            // We are playing the video. Stop the carousel.
            var carousel = $(carouselId);
            carousel.carousel("pause");
        }


        return {
            initialize: initialize,
            toggleVideo: toggleVideo,
            checkForVideo: checkForVideo,
            setUpYouTubeAPI: setUpYouTubeAPI,
            onPlayerReady: onPlayerReady,
            onPlayerPlaying: onPlayerPlaying,
            pauseVideoAtIndex: pauseVideoAtIndex,
            playVideoAtIndex: playVideoAtIndex,
            pauseAllVideos: pauseAllVideos
        }

    }();

    // For YouTube API. Must be global.

    var rbxplayer = [];
    function onYouTubeIframeAPIReady() {
        var carouselId = "#carousel-game-details";
        $(carouselId).find(".flex-video").each(function (idx, el) {
            youTubeId = $(el).find("iframe").attr("id");
            rbxplayer[rbxplayer.length] = new YT.Player(youTubeId, {});
        });

        // listen for postMessage from YouTube
        $(window).on("message", function (e) {
            var originalData = e.originalEvent.data;

            // data is not JSON
            if (originalData.charAt(0) != "{") {
                return ;
            }
            var data = $.parseJSON(originalData);

            if (data.event == "onReady") {
                Roblox.Carousel.onPlayerReady();
            }
            if(data.event == "infoDelivery" && data.info.playerState && data.info.playerState == 1) {
                Roblox.Carousel.onPlayerPlaying();
            }
        });
    }


    $(document).ready(function () {
        Roblox.Carousel.initialize();
    });
</script>



<div id="carousel-game-details" class="carousel slide" data-ride="carousel"
     data-is-video-autoplayed-on-ready="true"
     data-is-mobile="false">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
    <?php if ($game["thumbnails"] == null || $game["thumbnails"] == ""): ?>
     <div class="item active">
        <span ><img  class='carousel-thumb' src='<?= ThumbnailService::requestAssetThumbnail( $game['id'], 768, 432 ) ?>' /></span>            </div>
    <?php else: ?>
        <?php 
        $count = 1;
        foreach (json_decode($game["thumbnails"]) as $imageId){
            if ($count == 1){
                $item = "item active";
            }else{
                $item = "item ";
            }

            echo "<div class=" , '"' , $item , '"' . ">
            <span ><img  class='carousel-thumb' src='" , ThumbnailService::requestAssetThumbnail( $imageId, 768, 432 ) , "' /></span>            </div>";
            $count++;
        }
        ?>
    <?php endif; ?>
    </div>
    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-game-details" role="button" data-slide="prev">
        <span class="icon-carousel-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-game-details" role="button" data-slide="next">
        <span class="icon-carousel-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


        </div>
        <div class="game-calls-to-action">

        <?php 
        $isContextMenuNeeded = false;

        if ($game["HasTeamCreatePermissions"] || $game["HasFullPermissions"])
            $isContextMenuNeeded = true;

        //if ($game["creatorId"] == $userId)
        //    $isContextMenuNeeded = true;

        ?>
        <?php if ($isContextMenuNeeded): ?>
		<div id="game-context-menu">
                <a class="rbx-menu-item game-context-menu" data-toggle="popover" data-bind="popover-content">
                    <span class="icon-more"></span>
                </a>
                <div class="rbx-popover-content" data-toggle="popover-content">
                    <ul class="dropdown-menu" role="menu">
					
						<?php if ($game["HasTeamCreatePermissions"]): ?>
						<li>
							<div class="VisitButton VisitButtonEditGLI" placeid="<?= $game["id"] ?>" data-universeid="<?= $game["universeid"] ?>" data-allowupload="true">
								<a>Edit</a>
							</div>
						</li>
						<?php endif; ?>
					
						<?php if ($game["HasFullPermissions"]): ?>
						<li>
							<div class="rbx-context-menu-shutdown-all" data-place-id="<?= $game["id"] ?>">
								<a>Shut Down All Servers</a>
							</div>
						</li>
						<?php endif; ?>
						
                    </ul>
                </div>
        </div>
        <?php endif; ?>
        
            <div class="game-title-container">
                <h2 class="game-name" title="<?= htmlspecialchars($game["name"]) ?>"><?= htmlspecialchars($game["name"]) ?></h2>
                <div class="game-creator"><span class="text-label">By</span> <a class="text-name" href="<?= $game["creatorProfile"] ?>"><?= htmlspecialchars($game["creatorName"]) ?></a></div>
            </div>
            <div class="game-play-buttons" data-autoplay="false">

            <?php if (str_contains($_SERVER['HTTP_USER_AGENT'], "ROBLOX")): ?>
                        <div id="MultiplayerVisitButton" class="">
                            <a class="btn-primary-lg" href="/games/start?placeid=<?= $game["id"] ?>">Play</a>
                        </div>
            <?php else: ?>
                        <div id="MultiplayerVisitButton" class="VisitButton VisitButtonPlayGLI" placeid="<?= $game["id"] ?>" data-action="play" data-is-membership-level-ok="true">
                            <a class="btn-primary-lg">Play</a>
                        </div>
            <?php endif; ?>
            





<script type="text/javascript">
    Roblox = Roblox || {};

    Roblox.BCUpsellModal = function () {
        var resources = {
            //<sl:translate>
            title: "Builders Club Only",
            body: "This is a premium feature only available to our Builders Club members.",
            accept: "Upgrade Now"
            //</sl:translate>
        };

        var open = function () {
            var options = {
                titleText: Roblox.BCUpsellModal.Resources.title,
                bodyContent: Roblox.BCUpsellModal.Resources.body,
                footerText: "",
                acceptText: Roblox.BCUpsellModal.Resources.accept,
                declineText: Roblox.Resources.GenericConfirmation.No,
                acceptColor: Roblox.GenericConfirmation.green,
                onAccept: function () { window.location.href = '/premium/membership?ctx=bc-only-game'; },
                imageUrl: 'https://images.idk18.xyz/43ac54175f3f3cd403536fedd9170c10.png'
            };

            Roblox.GenericConfirmation.open(
                options
            );
        };

        return {
            open: open,
            Resources:resources
        };
    } ();
</script>
<script type="text/javascript">
    $(function() {
        Roblox.PlaceItemPurchase = new Roblox.ItemPurchase(function (obj) {
            $(".PurchaseButton[data-item-id="+ obj.AssetID +"]").each(function (index, htmlElem) {
                $("#rbx-place-purchase-required").hide();
                $("#MultiplayerVisitButton").show();
            });
        });

        if("False".toLowerCase() == "true") {
            $(function () {
                $("#rbx-place-purchase-required").on("click", function(e) {
                    Roblox.PlaceItemPurchase.openPurchaseVerificationView(this);
                    return false;
                });
            });
        }
    });
</script>
            </div>


            <ul class="share-rate-favorite">
        	 
		<?php
		$favoriteModel = [];
		$stmt = $pdo->prepare("SELECT assetId FROM favorites WHERE assetId = :assetId");
		$stmt->bindParam(':assetId', $vars["place_id"], PDO::PARAM_INT);
		$stmt->execute();
		$favoriteModel["favoriteCount"] = $stmt->rowCount();
		
		$stmt = $pdo->prepare("SELECT assetId FROM favorites WHERE assetId = :assetId AND userId = :userId");
		$stmt->bindParam(':assetId', $vars["place_id"], PDO::PARAM_INT);
		$stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
		$stmt->execute();
		$favoriteModel["hasFavorited"] = (boolean)$stmt->rowCount();
		?>
		
		
        <li class="favorite-button-container">
            <div class="tooltip-container" data-toggle="tooltip" title="" data-original-title="Add to Favorites">
                <a id="toggle-favorite" data-toggle-url="/favorite/toggle" data-assetid="<?= $vars["place_id"] ?>" data-isguest="<?php if ($isUserAuthenticated) echo 'False'; else echo "True"; ?>"
                   data-signin-url="https://www.<?= $domain ?>/newlogin?returnUrl=<?= urlencode($_SERVER["REQUEST_URI"]) ?>">
                    <span title="<?= $favoriteModel["favoriteCount"] ?>" class="text-favorite favoriteCount <?= number_format($favoriteModel["favoriteCount"]) ?>" id="result"><?= $favoriteModel["favoriteCount"] ?></span>
                    <div id="favorite-icon" class="icon-favorite <?php if ($favoriteModel["hasFavorited"]) echo "favorited" ?>"></div>
                </a>
            </div>
        </li>
 	  <?php
	  $up = "";
	  $down = "";
	  $stmt = $pdo->prepare("SELECT vote FROM votes WHERE assetId = :assetId");
	  $stmt->bindParam(':assetId', $vars["place_id"], PDO::PARAM_INT);
	  $stmt->execute();
	  
	  if ($isUserAuthenticated){
		  $stmt2 = $pdo->prepare("SELECT vote FROM votes WHERE assetId = :assetId AND userId = :userId");
		  $stmt2->bindParam(':assetId', $vars["place_id"], PDO::PARAM_INT);
		  $stmt2->bindParam(':userId', $userInfo['id'], PDO::PARAM_INT);
		  $stmt2->execute();
		  
		  if ($stmt2->rowCount() !== 0){
			  $voteResult = $stmt2->fetchColumn();
			  
			  if ($voteResult == 1){
				  $up = "selected";
			  }
			  
			  if ($voteResult === 0){
				  $down = "selected";
			  }
		  }
	  }
	
	  $totalUp = 0;
	  $totalDown = 0;
	
	  foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $result){
		if ($result["vote"] == 1)
			$totalUp++;
		
		if ($result["vote"] == 0)
			$totalDown++;
	  }
	  ?>
        <li id="voting-section"
             class="voting-panel body new-design"
             data-asset-id="<?= $vars["place_id"] ?>"
             data-total-up-votes="<?= $totalUp ?>"
             data-total-down-votes="<?= $totalDown ?>"
             data-vote-modal=""
             data-user-authenticated="<?php if ($isUserAuthenticated) echo 'True'; else echo "False"; ?>">
            <div class="loading"></div>
                <div class="vote-summary">
                    <div class="voting-details">
                        <div class="users-vote ">

                            <div class="upvote">
                                <span class="icon-like <?= $up ?>"></span>
                            </div>

                            <div class="vote-details">
                                <div class="vote-container">
                                    <div class="vote-background"></div>
                                    <div class="vote-percentage"></div>
                                    <div class="vote-mask">
                                        <div class="segment seg-1"></div>
                                        <div class="segment seg-2"></div>
                                        <div class="segment seg-3"></div>
                                        <div class="segment seg-4"></div>
                                    </div>
                                </div>

                                <div class="vote-numbers">
                                    <div class="count-left">
                                        <span id="vote-up-text" title="<?= number_format($totalUp) ?>" class="vote-text"><?= formatNumber($totalUp) ?></span>
                                    </div>
                                    <div class="count-right">
                                        <span id="vote-down-text" title="<?= number_format($totalDown) ?>" class="vote-text"><?= formatNumber($totalDown) ?></span>                                    
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="downvote">
                                <span class="icon-dislike <?= $down ?>"></span>
                            </div>

                        </div>
                    </div>

                </div>
        </li>




<script>
    $(function () {
        Roblox.Voting.Initialize();

        Roblox.Voting.Resources = {
            //<sl:translate>
            emailVerifiedTitle: "Verify Your Email",
            emailVerifiedMessage: "You must verify your email before you can vote. You can verify your email on the <a href='/my/account?confirmemail=1'>Account</a> page.",

            playGameTitle: "Play Game",
            playGameMessage: "You must play the game before you can vote on it.",

            useModelTitle: "Use Model",
            useModelMessage: "You must use this model before you can vote on it.",

            installPluginTitle: "Install Plugin",
            installPluginMessage: "You must install this plugin before you can vote on it.",

            buyGamePassTitle: "Buy Game Pass",
            buyGamePassMessage: "You must own this game pass before you can vote on it.",

            floodCheckThresholdMetTitle: "Slow Down",
            floodCheckThresholdMetMessage: "You're voting too quickly. Come back later and try again.",

            unknownProblemTitle: "Something Broke",
            unknownProblemMessage: "There was an unknown problem voting. Please try again.",

            guestUserTitle: "Login to Vote",
            guestUserMessage: "<div>You must login to vote.</div> <div>Please <a href='/newlogin?returnUrl=%2Fgames%2F<?= $game["id"] ?>%2F'>login or register</a> to continue.</div>",
            returnUrl: '/newlogin?returnUrl=%2Fgames%2F<?= $game["id"] ?>%2F',

            accountUnderOneDayTitle: "Voter Feedback",
            accountUnderOneDayMessage: "You will be able to vote on Games and Studio Models later, after you've had a chance to experience ROBLOX a bit more. Come back to this page in a couple days.",

            accept: "Verify",
            decline: "Cancel",
            login: "Login"
            //<sl:translate>
        };
    });
</script>

                
                <li class="social-media-share">

                </li><!-- .social-media-share -->
            </ul><!-- .share-rate-favorite-->
        </div>
    </div>

    <div class="col-xs-12 rbx-tabs-horizontal"
         data-place-id="<?= $game["id"] ?>">
        <ul id="horizontal-tabs" class="nav nav-tabs" role="tablist">
            <li id="tab-about" class="rbx-tab tab-about active">
                <a class="rbx-tab-heading" href="#about">
                    <span class="text-lead">About</span>
                </a>
            </li>
            <li id="tab-store" class="rbx-tab tab-store">
                <a class="rbx-tab-heading" href="#store">
                    <span class="text-lead">Store</span>
                </a>
            </li>
                <li id="tab-leaderboards" class="rbx-tab tab-leaderboards">
                    <a class="rbx-tab-heading" href="#leaderboards">
                        <span class="text-lead">Leaderboards</span>
                    </a>
                </li>

            <li id="tab-game-instances" class="rbx-tab tab-game-instances">
                <a class="rbx-tab-heading" href="#game-instances">
                    <span class="text-lead">Servers</span>
                </a>
            </li>
        </ul>
        <div class="tab-content rbx-tab-content">
            <div class="tab-pane active" id="about">
                <div class="section game-about-container">
                    <h3>Description</h3>
                    <div class="section-content">
                        <p class="game-description linkify"><?= htmlspecialchars($game["description"]) ?></p>

                        <ul class="game-stats-container">
                            <li class="game-stat">
                                <p class="text-label">Visits</p>
                                <p class="text-lead" title="<?= $game["visitCache"] ?>"><?= $game["visitCache"] ?></p>
                            </li>
                            <li class="game-stat">
                                <p class="text-label">Created</p>
                                <p class="text-lead"><?php echo date("n/j/Y", $game["created"]); ?></p>
                            </li>
                            <li class="game-stat">
                                <p class="text-label">Updated</p>
                                <p class="text-lead"><?php echo date("n/j/Y", $game["updated"]); ?></p>
                            </li>
                            <li class="game-stat">
                                <p class="text-label">Max Players</p>
                                <p class="text-lead"><?= $game["maxPlayers"] ?></p>
                            </li>
                            <li class="game-stat">
                                <p class="text-label">Genre</p>
                                    <p class="text-lead">
                                        <a class="text-name" href="https://www.<?= $domain ?>/games?GenreFilter=<?= $game["genretype"] ?>"><?= $genre_types[$game['genretype']] ?></a>
                                    </p>
                            </li>
                            <li class="game-stat">
                                <p class="text-label">Allowed Gear types</p>
                                <p class="text-lead stat-gears">
                                     <span class="icon-nogear" data-toggle="tooltip" data-original-title="No Gear Allowed"></span>
                                </p>
                            </li>
                        </ul>
                        <div class="game-stat-footer">
                            <?php if ($game["uncopylocked"] == 0): ?>
                                    <span class="text-pastname game-copylocked-footnote">This game is copylocked</span>
                            <?php endif; ?>

                            <span class="game-report-abuse"><a class="text-report" href="https://www.<?= $domain ?>/abusereport/asset?id=<?= $game["id"] ?>&amp;RedirectUrl=<?= urlencode($_SERVER["REQUEST_URI"]) ?>">Report Abuse</a></span>
                        </div>
                    </div>
                </div>

<?php /*
    <div id="rbx-vip-servers" class="stack"
         data-placeid="<?= $game["id"] ?>"
         data-universeid="113491250"
         data-showshutdown
         data-slow-game-fps-threshold="15"
         data-private-server-name-max-length="50"
         data-private-server-name-error-text="The name of a VIP Server cannot be blank and can be no more than {0} characters."
         data-configure-base-url="/private-server/configure?privateServerId={0}"
         data-game-instances-base-url="/private-server/instance-list?universeId=113491250"
         data-game-shutdown-url="/game-instances/shutdown"
         data-is-user-authenticated="False"
         data-instance-list-url="/private-server/instance-list-json"
         data-renew-url="/private-server/renew"
         data-avatar-headshot-enabled=true>

        <div class="container-header">
            <h3>VIP Servers</h3>
            <span class="tooltip-container" data-toggle="tooltip" data-original-title="VIP servers let you play this game privately with friends, your clan, or people you invite!">
                <span class="icon-moreinfo"></span>
            </span>
        </div>

        <ul class="stack-list create-server-banner">
            
            <li class="stack-row">
                    <div id="private-server-purchase-body-content" class="hidden">
                        <div class="private-server-purchase">
                            <div class="modal-list-item private-server-main-text">
                                Create a VIP Server for {0}?
                            </div>
                            <div class="modal-list-item">
                                <span class="text-label private-server-game-name">
                                    Game Name
                                </span>
                                <span class="game-name">
                                    <?= $game["name"] ?>
                                </span>
                            </div>
                            <div class="modal-list-item private-server-name-input">
                                <span class="text-label">Server Name</span>
                                <div class="form-group">
                                    <input type="text" class="form-control input-field private-server-name" maxlength="50">
                                </div>
                                <div class="form-control-label private-server-name-error-message"></div>
                            </div>
                        </div>
                    </div>
                    <span class="btn-secondary-md btn-more rbx-vip-server-create"
                          data-is-private-server="true"
                          data-product-id="34269210"
                          data-item-id="<?= $game["id"] ?>"
                          data-item-name="<?= $game["name"] ?>"
                          data-expected-price="500"
                          data-expected-currency="1"
                          data-seller-name="<?= $game["creatorName"] ?>"
                          data-expected-seller-id="1103278"
                          data-continueshopping-url="/games/<?= $game["id"] ?>/"
                          data-purchase-title-text="Create VIP Server"
                          data-purchase-body-content=""
                          data-purchase-url="/private-server/purchase"
                          data-universe-id="113491250"
                          data-modal-field-validation-required="true"
                          data-footer-text="Your balance after this transaction will be &lt;span class=&#39;icon-robux-gray-16x16&#39;&gt;&lt;/span&gt;{0}. This is a subscription-based feature. It will auto-renew once a month until you cancel the subscription."
                          name="CreatePrivateServer">Create VIP Server</span>
                                    <span class="create-server-banner-text">Play this game with friends and other people you invite.<br />See all your VIP servers in the <a class="text-link" href="#!/game-instances">Servers</a> tab.</span>
            </li>

        </ul>
        <div class="section tab-server-only">

        </div>
    </div>
/*
?>
<script>
    var Roblox = Roblox || {};

    Roblox.PrivateServers = Roblox.PrivateServers || {};
    //<sl:translate>
    Roblox.PrivateServers.RenewRecurringTitle = "Renew Private Server";
    Roblox.PrivateServers.RenewRecurringBody = "Are you sure you want to enable future payments for your private VIP version of "
    + "<?= $game["name"] ?> by <?= $game["creatorName"] ?>?<br><br>This VIP Server will start renewing every month at "
    + "<span class=\"icon-robux-16x16\"></span><span class=\"text-robux\">500</span> until you cancel.";
    Roblox.PrivateServers.RenewRecurringAcceptText = "Renew";
    Roblox.PrivateServers.RenewRecurringDeclineText = "Cancel";
    Roblox.PrivateServers.UserProfileAbsoluteUrlPattern = "https://www.<?php echo $domain ?>/users/0/profile";
    //<sl:translate>
</script>

*/
?>

<?php 

$stmt = $pdo->prepare("SELECT * FROM assets WHERE assetTypeId = 21 AND universeId = :universeId");
$stmt->bindParam(':universeId', $game["universeid"]);
$stmt->execute();

if ($stmt->rowCount() !== 0){
    echo '<div class="stack badge-container">
    <div class="container-header">
        <h3>Game Badges</h3>
    </div>
    <ul class="stack-list">';

    $badgeCount = 0;

    $yesterday = date('Y-m-d', strtotime('-1 day'));
    $midnight = strtotime($yesterday . ' 00:00:00');
    $end_of_day = strtotime($yesterday . ' 23:59:59');

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $badge){
        $badgeCount++;
        $badgeName = preg_replace('/[^a-zA-Z0-9 ]/', '', $badge["assetName"]);
        $badgeName = str_replace(' ', '-', $badgeName);
        $url = "https://www.$domain/$badgeName-item?id={$badge["assetId"]}";
        $additional = ($badgeCount > 3) ? "badge-see-more-row" : "";

        $stmt = $pdo->prepare("SELECT * FROM inventory WHERE assetType = 21 AND assetId = :badgeId");
        $stmt->bindParam(":badgeId", $badge["assetId"]);
        $stmt->execute();
        $badgesAwarded = $stmt->rowCount();

        $stmt = $pdo->prepare("SELECT * FROM inventory WHERE assetType = 21 AND assetId = :badgeId AND purchasedWhen < $end_of_day AND purchasedWhen > $midnight");
        $stmt->bindParam(":badgeId", $badge["assetId"]);
        $stmt->execute();
        $yesterdayAwarded = $stmt->rowCount();

        echo'<li class="stack-row badge-row ', $additional, '">
                    <div class="badge-image">
                        <a href="', $url, '"><img src="', ThumbnailService::requestAssetThumbnail($badge["iconImageAssetId"], 150, 150), '" alt="', htmlspecialchars($badge["assetName"]), '"></a>
                    </div>
                    <div class="badge-content">
                        <div class="badge-data-container">
                            <div class="badge-name">', htmlspecialchars($badge["assetName"]), '</div>
                            <p class="para-overflow">
                                ', htmlspecialchars($badge["assetDescription"]), '
                            </p>
                        </div>
                        <ul class="badge-stats-container">
                            <li>
                                <div class="text-label">Rarity</div>
                                <div class="badge-stats-info">?</div>
                            </li>
                            <li>
                                <div class="text-label">Won Yesterday</div>
                                <div class="badge-stats-info">', $yesterdayAwarded, '</div>
                            </li>
                            <li>
                                <div class="text-label">Won Ever</div>
                                <div class="badge-stats-info">', $badgesAwarded, '</div>
                            </li>
                        </ul>
                    </div>
                </li>';
    }

    if ($badgeCount > 3){
        echo '<li>
                    <button type="button" class="btn-full-width btn-control-sm" id="badges-see-more">See More</button>

                </li>';
    }

        echo '</ul>

        </div>';
}
?>

<?php
 /*                
                    <div id="my-recommended-games" class="container-list games-detail">
                        <div class="container-header">
                            <h3>Recommended Games</h3>
                        </div>
                        
                        

<ul class="hlist game-cards game-cards-sm">


<li class="list-item game-card">
    <div class="game-card-container">
        <a href="https://www.<?php echo $domain ?>/games/refer?RecommendationAlgorithm=2&amp;RecommendationSourceId=<?= $game["id"] ?>&amp;PlaceId=314608134&amp;Position=1&amp;PageType=GameDetail" class="game-card-link">
            <div class="game-card-thumb-container">
                <img class="game-card-thumb"
                     src="https://t4.rbxcdn.com/bfb9dc3b5e4ab491fa8f6d4621d56738"
                     
                     alt="Stealth"
                     thumbnail='{"Final":true,"Url":"https://t4.rbxcdn.com/bfb9dc3b5e4ab491fa8f6d4621d56738","RetryUrl":null}' image-retry/>
            </div>
            <div class="text-overflow game-card-name" title="Stealth" ng-non-bindable>
                Stealth
            </div>
            <div class="game-card-name-secondary">
                171 Playing
            </div>
            <div class="game-card-vote">
                <div class="vote-bar"
                     data-voting-processed="false">
                    <div class="vote-thumbs-up">
                        <span class="icon-thumbs-up"></span>
                    </div>
                    <div class="vote-container"
                         data-upvotes="48960"
                         data-downvotes="4415">
                        <div class="vote-background "></div>
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
                    <div class="vote-down-count">4,415</div>
                    <div class="vote-up-count">48,960</div>

                </div>
            </div>
        </a>
        <span class="game-card-footer">
        <span class="text-label xsmall">By </span>
        <a class="text-link xsmall text-overflow" href="https://www.<?php echo $domain ?>/groups/group.aspx?gid=2547129" ng-non-bindable>Mailbox Games</a>
    </span>
    </div>
</li>


<li class="list-item game-card">
    <div class="game-card-container">
        <a href="https://www.<?php echo $domain ?>/games/refer?RecommendationAlgorithm=2&amp;RecommendationSourceId=<?= $game["id"] ?>&amp;PlaceId=21532277&amp;Position=2&amp;PageType=GameDetail" class="game-card-link">
            <div class="game-card-thumb-container">
                <img class="game-card-thumb"
                     src="https://t4.rbxcdn.com/af8843cccbce3659db73fb51d24e7bd9"
                     
                     alt="[Beta] Notoriety"
                     thumbnail='{"Final":true,"Url":"https://t4.rbxcdn.com/af8843cccbce3659db73fb51d24e7bd9","RetryUrl":null}' image-retry/>
            </div>
            <div class="text-overflow game-card-name" title="[Beta] Notoriety" ng-non-bindable>
                [Beta] Notoriety
            </div>
            <div class="game-card-name-secondary">
                268 Playing
            </div>
            <div class="game-card-vote">
                <div class="vote-bar"
                     data-voting-processed="false">
                    <div class="vote-thumbs-up">
                        <span class="icon-thumbs-up"></span>
                    </div>
                    <div class="vote-container"
                         data-upvotes="73134"
                         data-downvotes="8546">
                        <div class="vote-background "></div>
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
                    <div class="vote-down-count">8,546</div>
                    <div class="vote-up-count">73,134</div>

                </div>
            </div>
        </a>
        <span class="game-card-footer">
        <span class="text-label xsmall">By </span>
        <a class="text-link xsmall text-overflow" href="https://www.<?php echo $domain ?>/users/5283599/profile" ng-non-bindable>Brick_man</a>
    </span>
    </div>
</li>


<li class="list-item game-card">
    <div class="game-card-container">
        <a href="https://www.<?php echo $domain ?>/games/refer?RecommendationAlgorithm=2&amp;RecommendationSourceId=<?= $game["id"] ?>&amp;PlaceId=1600503&amp;Position=3&amp;PageType=GameDetail" class="game-card-link">
            <div class="game-card-thumb-container">
                <img class="game-card-thumb"
                     src="https://t5.rbxcdn.com/828ce7dbf8c37969975e3231fc72326b"
                     
                     alt="Apocalypse Rising "
                     thumbnail='{"Final":true,"Url":"https://t5.rbxcdn.com/828ce7dbf8c37969975e3231fc72326b","RetryUrl":null}' image-retry/>
            </div>
            <div class="text-overflow game-card-name" title="Apocalypse Rising " ng-non-bindable>
                Apocalypse Rising 
            </div>
            <div class="game-card-name-secondary">
                2,791 Playing
            </div>
            <div class="game-card-vote">
                <div class="vote-bar"
                     data-voting-processed="false">
                    <div class="vote-thumbs-up">
                        <span class="icon-thumbs-up"></span>
                    </div>
                    <div class="vote-container"
                         data-upvotes="141356"
                         data-downvotes="18385">
                        <div class="vote-background "></div>
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
                    <div class="vote-down-count">18,385</div>
                    <div class="vote-up-count">141,356</div>

                </div>
            </div>
        </a>
        <span class="game-card-footer">
        <span class="text-label xsmall">By </span>
        <a class="text-link xsmall text-overflow" href="https://www.<?php echo $domain ?>/users/281519/profile" ng-non-bindable>Gusmanak</a>
    </span>
    </div>
</li>


<li class="list-item game-card">
    <div class="game-card-container">
        <a href="https://www.<?php echo $domain ?>/games/refer?RecommendationAlgorithm=2&amp;RecommendationSourceId=<?= $game["id"] ?>&amp;PlaceId=265237962&amp;Position=4&amp;PageType=GameDetail" class="game-card-link">
            <div class="game-card-thumb-container">
                <img class="game-card-thumb"
                     src="https://t4.rbxcdn.com/8426aecda21064a1ad457a528b5bf204"
                     
                     alt="Streets of Bloxwood  [4.0.4] "
                     thumbnail='{"Final":true,"Url":"https://t4.rbxcdn.com/8426aecda21064a1ad457a528b5bf204","RetryUrl":null}' image-retry/>
            </div>
            <div class="text-overflow game-card-name" title="Streets of Bloxwood  [4.0.4] " ng-non-bindable>
                Streets of Bloxwood  [4.0.4] 
            </div>
            <div class="game-card-name-secondary">
                117 Playing
            </div>
            <div class="game-card-vote">
                <div class="vote-bar"
                     data-voting-processed="false">
                    <div class="vote-thumbs-up">
                        <span class="icon-thumbs-up"></span>
                    </div>
                    <div class="vote-container"
                         data-upvotes="32702"
                         data-downvotes="6195">
                        <div class="vote-background "></div>
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
                    <div class="vote-down-count">6,195</div>
                    <div class="vote-up-count">32,702</div>

                </div>
            </div>
        </a>
        <span class="game-card-footer">
        <span class="text-label xsmall">By </span>
        <a class="text-link xsmall text-overflow" href="https://www.<?php echo $domain ?>/groups/group.aspx?gid=2521353" ng-non-bindable>GameLoaded Entertainment</a>
    </span>
    </div>
</li>


<li class="list-item game-card">
    <div class="game-card-container">
        <a href="https://www.<?php echo $domain ?>/games/refer?RecommendationAlgorithm=2&amp;RecommendationSourceId=<?= $game["id"] ?>&amp;PlaceId=244121573&amp;Position=5&amp;PageType=GameDetail" class="game-card-link">
            <div class="game-card-thumb-container">
                <img class="game-card-thumb"
                     src="https://t0.rbxcdn.com/e34db216088f2b74214cb921b6cf62c1"
                     
                     alt="Mad Games (v2.28)"
                     thumbnail='{"Final":true,"Url":"https://t0.rbxcdn.com/e34db216088f2b74214cb921b6cf62c1","RetryUrl":null}' image-retry/>
            </div>
            <div class="text-overflow game-card-name" title="Mad Games (v2.28)" ng-non-bindable>
                Mad Games (v2.28)
            </div>
            <div class="game-card-name-secondary">
                1,157 Playing
            </div>
            <div class="game-card-vote">
                <div class="vote-bar"
                     data-voting-processed="false">
                    <div class="vote-thumbs-up">
                        <span class="icon-thumbs-up"></span>
                    </div>
                    <div class="vote-container"
                         data-upvotes="86766"
                         data-downvotes="16516">
                        <div class="vote-background "></div>
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
                    <div class="vote-down-count">16,516</div>
                    <div class="vote-up-count">86,766</div>

                </div>
            </div>
        </a>
        <span class="game-card-footer">
        <span class="text-label xsmall">By </span>
        <a class="text-link xsmall text-overflow" href="https://www.<?php echo $domain ?>/users/2312310/profile" ng-non-bindable>loleris</a>
    </span>
    </div>
</li>


<li class="list-item game-card">
    <div class="game-card-container">
        <a href="https://www.<?php echo $domain ?>/games/refer?RecommendationAlgorithm=2&amp;RecommendationSourceId=<?= $game["id"] ?>&amp;PlaceId=155615604&amp;Position=6&amp;PageType=GameDetail" class="game-card-link">
            <div class="game-card-thumb-container">
                <img class="game-card-thumb"
                     src="https://t1.rbxcdn.com/087a1d4cc1d2a24f079e6869ec3267f5"
                     
                     alt="Prison Life v2.0"
                     thumbnail='{"Final":true,"Url":"https://t1.rbxcdn.com/087a1d4cc1d2a24f079e6869ec3267f5","RetryUrl":null}' image-retry/>
            </div>
            <div class="text-overflow game-card-name" title="Prison Life v2.0" ng-non-bindable>
                Prison Life v2.0
            </div>
            <div class="game-card-name-secondary">
                13,036 Playing
            </div>
            <div class="game-card-vote">
                <div class="vote-bar"
                     data-voting-processed="false">
                    <div class="vote-thumbs-up">
                        <span class="icon-thumbs-up"></span>
                    </div>
                    <div class="vote-container"
                         data-upvotes="202607"
                         data-downvotes="27417">
                        <div class="vote-background "></div>
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
                    <div class="vote-down-count">27,417</div>
                    <div class="vote-up-count">202,607</div>

                </div>
            </div>
        </a>
        <span class="game-card-footer">
        <span class="text-label xsmall">By </span>
        <a class="text-link xsmall text-overflow" href="https://www.<?php echo $domain ?>/users/53537032/profile" ng-non-bindable>Aesthetical</a>
    </span>
    </div>
</li>


<li class="list-item game-card">
    <div class="game-card-container">
        <a href="https://www.<?php echo $domain ?>/games/refer?RecommendationAlgorithm=2&amp;RecommendationSourceId=<?= $game["id"] ?>&amp;PlaceId=146449216&amp;Position=7&amp;PageType=GameDetail" class="game-card-link">
            <div class="game-card-thumb-container">
                <img class="game-card-thumb"
                     src="https://t5.rbxcdn.com/b02579afe8485689d6dd319d839121f6"
                     
                     alt="HEX - ARENA SHOOTER!"
                     thumbnail='{"Final":true,"Url":"https://t5.rbxcdn.com/b02579afe8485689d6dd319d839121f6","RetryUrl":null}' image-retry/>
            </div>
            <div class="text-overflow game-card-name" title="HEX - ARENA SHOOTER!" ng-non-bindable>
                HEX - ARENA SHOOTER!
            </div>
            <div class="game-card-name-secondary">
                34 Playing
            </div>
            <div class="game-card-vote">
                <div class="vote-bar"
                     data-voting-processed="false">
                    <div class="vote-thumbs-up">
                        <span class="icon-thumbs-up"></span>
                    </div>
                    <div class="vote-container"
                         data-upvotes="32691"
                         data-downvotes="4702">
                        <div class="vote-background "></div>
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
                    <div class="vote-down-count">4,702</div>
                    <div class="vote-up-count">32,691</div>

                </div>
            </div>
        </a>
        <span class="game-card-footer">
        <span class="text-label xsmall">By </span>
        <a class="text-link xsmall text-overflow" href="https://www.<?php echo $domain ?>/users/212423/profile" ng-non-bindable>SO_Games</a>
    </span>
    </div>
</li>
</ul>
                    </div>
*/
?>                
            </div>
            <div class="tab-pane store" id="store">
<?php
$stmt = $pdo->prepare("SELECT assetName,assetId,productId,priceInRobux,iconImageAssetId,creatorId FROM assets WHERE universeId = :universeId and assetTypeId = 34");
$stmt->bindParam(':universeId', $game["universeid"]);
$stmt->execute();

if ($stmt->rowCount() == 0): ?>
                        <p class="section-content-off">
                            This game does not sell any virtual items or power-ups.
                        </p>
<?php else: ?>
						<div id="rbx-game-passes" class="container-list game-dev-store game-passes">
							<div class="container-header">
								<h3>Passes for this game</h3>
							</div>
							<ul id="rbx-passes-container" class="hlist store-cards gear-passes-container">
								<?php 
									$result = $stmt->fetchAll();
									
									foreach ($result as $gamepass){
										echo'<li class="list-item">
												<div class="store-card">
													<a href="https://www.', $domain, '/gamepass-item?id=', $gamepass["assetId"], '" class="gear-passes-asset" ><img  class="" src="', ThumbnailService::requestAssetThumbnail($gamepass["iconImageAssetId"], 150, 150), '" /></a>
													<div class="store-card-caption">
														<div class="text-overflow store-card-name" title="', htmlspecialchars($gamepass["assetName"]), '">
															', htmlspecialchars($gamepass["assetName"]), '
														</div>

														<div class="store-card-price">
															<span class="icon-robux-16x16"></span>
															<span class="text-robux">', $gamepass["priceInRobux"], '</span>
														</div>

														<div class="store-card-footer">';
														
														if ($isUserAuthenticated && AssetService::doesUserOwnAsset($gamepass["assetId"], $userId)){
															echo'<h5>Owned</h5>';
														}else{
															echo'
																<button class="PurchaseButton btn-buy-md btn-full-width rbx-gear-passes-purchase"
																		data-item-id="', $gamepass["assetId"], '"
																		data-item-name="', htmlspecialchars($gamepass["assetName"]), '"
																		data-product-id="', $gamepass["productId"], '"
																		data-expected-price="', $gamepass["priceInRobux"], '"
																		data-asset-type="Game Pass"
																		data-bc-requirement=""
																		data-expected-seller-id="', $gamepass["creatorId"], '"
																		data-seller-name="', UserAuthentication::lookupNameById($gamepass["creatorId"]), '"
																		data-expected-currency="1">
																	<span>Buy</span>
																</button>';
														}
														echo'
														</div>

													</div>

												</div>
											</li>';
									}
								?>
							</ul>
						</div>
<?php endif; ?>
                


<script>
    $(function () {
        Roblox.GamePassJSData = { };
        Roblox.GamePassJSData.PlaceID = <?= $game["id"] ?>;

        var purchaseConfirmationCallback = function (obj) {
            var originalContainer = $('.PurchaseButton[data-item-id=' + obj.AssetID + ']').parent('.store-card-caption');
            originalContainer.find('.rbx-purchased').hide();
            originalContainer.find('.rbx-item-buy').show();

        };
        Roblox.GamePassItemPurchase = new Roblox.ItemPurchase(purchaseConfirmationCallback);

        $("#store #rbx-game-passes").on("click", ".PurchaseButton", function (e) {
            Roblox.PlaceProductPromotionItemPurchase.openPurchaseVerificationView($(this), 'game-pass');
        });

        $("#store #rbx-game-passes .btn-more").on("click", function (e) {
            $("#rbx-game-passes #rbx-passes-container").toggleClass("collapsed");
        });
    });
</script>


                


<input name="__RequestVerificationToken" type="hidden" value="xFsRBRJxfskplnOX8UDVI6Dzf0E5Jv8Iw4POMhMMtYNFor82Rj4oj-koM-tn2Vo2lFUgQES-0JPSFMkiTrbzXXWD_VQ1" />

<script>
    // From DisplayProductPromotions
    $(function() {
        Roblox.PlaceProductPromotion.Resources = {
            //<sl:translate>
            anErrorOccurred: 'An error occurred, please try again.'
            , youhaveAdded: "You have added "
            , toYourGame: " to your game, "
            , youhaveRemoved: "You have removed "
            , fromYourGame: " from your game."
            , ok: "OK"
            , success: "Success!"
            , error: "Error"
            , sorryWeCouldnt: "Sorry, we couldn't remove the item from your game. Please try again."
            , notForSale: "This item is not for sale."
            , rent: "Rent"
            //<sl:translate>
        };

        var purchaseConfirmationCallback = function (obj) {
            var originalContainer = $('.PurchaseButton[data-item-id=' + obj.AssetID + ']').parent('.store-card-caption');
            originalContainer.find('.rbx-purchased').hide();
            originalContainer.find('.rbx-item-buy').show();
            
        };
        Roblox.PlaceProductPromotionItemPurchase = new Roblox.ItemPurchase(purchaseConfirmationCallback);
        Roblox.PlaceProductPromotion.PlaceID = <?= $game["id"] ?>;

        $("#store").on("click", ".icon-alert", function(e) {
            var promoId = $(this).data('delete-promotion-id');
            Roblox.PlaceProductPromotion.DeleteGear(promoId);
        });

        $("#store #rbx-game-gear").on("click", ".PurchaseButton", function (e) {
            Roblox.PlaceProductPromotionItemPurchase.openPurchaseVerificationView($(this), 'game-gear');
        });

        $("#store #rbx-game-gear .btn-more").on("click", function (e) {
            $("#rbx-game-gear .rbx-gear-container").toggleClass("collapsed");
        });

    });

</script>

<div id="DeleteProductPromotionModal" class="PurchaseModal">
    <div id="simplemodal-close" class="simplemodal-close">
        <a></a>
    </div>
    <div class="titleBar" style="text-align: center">
    </div>
    <div class="PurchaseModalBody">
        <div class="PurchaseModalMessage">
            <div class="PurchaseModalMessageImage">
                <div class="thumbs-up-green">
                </div>
            </div>
            <div class="PurchaseModalMessageText">
            </div>
        </div>
        <div class="PurchaseModalButtonContainer">
            <div class="ImageButton btn-blue-ok-sharp simplemodal-close"></div>
        </div>
        <div class="PurchaseModalFooter"></div>
    </div>
</div>




            </div>

            <div class="tab-pane" id="leaderboards">
                
                    <div class="col-md-6">
                        

<div id="rbx-leaderboard-container-player" class="section rbx-leaderboard-container rbx-leaderboard-player" data-associated-leaderboard-more="rbx-leaderboard-btn-player">
    <div class="rbx-leaderboard-data"
         data-distributor-target-id="<?= $game["universeid"] ?>"
         data-max="20"
         data-rank-max="4"
         data-target-type="0"
         data-time-filter="1"
         data-player-id="<?php if ($isUserAuthenticated) echo $userId; else echo "-1"; ?>"
         data-clan-id="-1"></div>
    <div class="rbx-leaderboard-item-template hidden">
        <div class="rbx-leaderboard-item">
            <div class="rank"></div>
            <div class="avatar avatar-headshot-sm"></div>
            <div class="name-and-group"></div>
            <div class="font-fold points"></div>
        </div>
    </div>
    <div class="rbx-popover-content" data-toggle="popover-leaderboard-player">
        <ul class="dropdown-menu" role="menu">
            <li>
                <a data-time-filter="0">Today</a>
            </li>
            <li>
                <a data-time-filter="1">Past Week</a>
            </li>
            <li>
                <a data-time-filter="2">Past Month</a>
            </li>
            <li>
                <a data-time-filter="3">All Time</a>
            </li>
        </ul>
    </div>
    <div class="rbx-leaderboard-header">
        <h3>Players</h3>
        <div class="rbx-leaderboard-controls">
            <div class="rbx-leaderboard-filter">
                <span class="rbx-leaderboard-filtername">Past Week</span>
                <a class="rbx-menu-item" data-toggle="popover" data-bind="popover-leaderboard-player"
                   data-original-title="" title=""
                   data-viewport=".rbx-leaderboard-player"
                   data-placement="left"><span class="icon-sorting" id="rbx-leaderboard-popover-player"></span></a>
            </div>
        </div>

    </div>
    <div class="rbx-leaderboard-my"></div>
    <div class="section-content rbx-leaderboard-items">
        <div class="rbx-leaderboard-more-container rbx-leaderboard-btn-player" data-associated-leaderboard="rbx-leaderboard-player">
            <button type="button" class="btn-control-sm rbx-leaderboard-see-more hidden">
                See More
            </button>
        </div>
        <img class="spinner" src="https://images.idk18.xyz/4bed93c91f909002b1f17f05c0ce13d1.gif" alt="loading..." />
    </div>

</div>

    <script>
        var Roblox = Roblox || {};
        Roblox.Leaderboard = Roblox.Leaderboard || {};
        Roblox.Leaderboard.Resources = {};
        //<sl:translate>
        Roblox.Leaderboard.Resources.ErrorLoading = "Error loading rows.";
        Roblox.Leaderboard.Resources.Loading = "Loading...";
        Roblox.Leaderboard.Resources.GoGetPoints = "You are not yet ranked for this time period. Go earn some Points!";
        //</sl:translate>
    </script>

                    </div>
                    <div class="col-md-6">
                        

<div id="rbx-leaderboard-container-clan" class="section rbx-leaderboard-container rbx-leaderboard-clan" data-associated-leaderboard-more="rbx-leaderboard-btn-clan">
    <div class="rbx-leaderboard-data"
         data-distributor-target-id="<?= $game["universeid"] ?>"
         data-max="20"
         data-rank-max="4"
         data-target-type="1"
         data-time-filter="1"
         data-player-id="-1"
         data-clan-id="-1"></div>
    <div class="rbx-leaderboard-item-template hidden">
        <div class="rbx-leaderboard-item">
            <div class="rank"></div>
            <div class="avatar "></div>
            <div class="name-and-group"></div>
            <div class="font-fold points"></div>
        </div>
    </div>
    <div class="rbx-popover-content" data-toggle="popover-leaderboard-clan">
        <ul class="dropdown-menu" role="menu">
            <li>
                <a data-time-filter="0">Today</a>
            </li>
            <li>
                <a data-time-filter="1">Past Week</a>
            </li>
            <li>
                <a data-time-filter="2">Past Month</a>
            </li>
            <li>
                <a data-time-filter="3">All Time</a>
            </li>
        </ul>
    </div>
    <div class="rbx-leaderboard-header">
        <h3>Clans</h3>
        <div class="rbx-leaderboard-controls">
            <div class="rbx-leaderboard-filter">
                <span class="rbx-leaderboard-filtername">Past Week</span>
                <a class="rbx-menu-item" data-toggle="popover" data-bind="popover-leaderboard-clan"
                   data-original-title="" title=""
                   data-viewport=".rbx-leaderboard-clan"
                   data-placement="left"><span class="icon-sorting" id="rbx-leaderboard-popover-clan"></span></a>
            </div>
        </div>

    </div>
    <div class="rbx-leaderboard-my"></div>
    <div class="section-content rbx-leaderboard-items">
        <div class="rbx-leaderboard-more-container rbx-leaderboard-btn-clan" data-associated-leaderboard="rbx-leaderboard-clan">
            <button type="button" class="btn-control-sm rbx-leaderboard-see-more hidden">
                See More
            </button>
        </div>
        <img class="spinner" src="https://images.idk18.xyz/4bed93c91f909002b1f17f05c0ce13d1.gif" alt="loading..." />
    </div>

</div>

    <script>
        var Roblox = Roblox || {};
        Roblox.Leaderboard = Roblox.Leaderboard || {};
        Roblox.Leaderboard.Resources = {};
        //<sl:translate>
        Roblox.Leaderboard.Resources.ErrorLoading = "Error loading rows.";
        Roblox.Leaderboard.Resources.Loading = "Loading...";
        Roblox.Leaderboard.Resources.GoGetPoints = "You are not yet ranked for this time period. Go earn some Points!";
        //</sl:translate>
    </script>

                    </div>

                <script>

                    // lazy load
                    $(".rbx-tab a[href='#leaderboards']").on('shown.bs.tab', function(e) {
                        // e.target newly activated tab
                        // e.relatedTarget previous active tab
                        Roblox.Leaderboard.init();
                    });
                </script>
            </div>

            <div class="tab-pane game-instances" id="game-instances">
                


<div id="rbx-running-games" class="stack" data-placeid="<?= $vars["place_id"] ?>" data-showshutdown 
        data-avatar-headshot-enabled=true>
    <div class="container-header">
        <h3>Running Servers</h3>
        <span class="btn-fixed-width btn-control-xs btn-more rbx-running-games-refresh">Refresh</span>
    </div>
    <ul id="rbx-game-server-item-container" class="section rbx-game-server-item-container stack-list">
            
    </ul>
    <div class="rbx-running-games-footer">
            <button type="button" class="btn-control-sm btn-full-width rbx-running-games-load-more hidden">Load More</button>

    </div>
    <div class="rbx-game-server-template">
        <li class="stack-row rbx-game-server-item">
            <div class="section-header">
                <div class="link-menu rbx-game-server-menu"></div>
            </div>
            <div class="section-left rbx-game-server-details">
                <div class="rbx-game-status rbx-game-server-status">x of y players max</div>
                <div class="rbx-game-server-alert">
                    <span class="icon-remove"></span>Slow Game
                </div>
                <a class="btn-full-width btn-control-xs rbx-game-server-join"
                    href="#"
                    data-placeid>Join</a>

            </div>
            <div class="section-right rbx-game-server-players">
            </div>
        </li>
    </div>
</div>


            </div>
        </div>
    </div>
</div>



<div class="GenericModal modalPopup unifiedModal smallModal" style="display:none;">
    <div class="Title"></div>
    <div class="GenericModalBody">
        <div>
            <div class="ImageContainer">
                <img class="GenericModalImage" alt="generic image"/>
            </div>
            <div class="Message"></div>
        </div>
        <div class="clear"></div>
        <div id="GenericModalButtonContainer" class="GenericModalButtonContainer">
            <a class="ImageButton btn-neutral btn-large roblox-ok">OK</a>
        </div>
    </div>
</div>



<div id="ItemPurchaseAjaxData"
     data-has-currency-service-error="False"
     data-currency-service-error-message=""
     data-authenticateduser-isnull="<?php if ($isUserAuthenticated) echo 'False'; else echo 'True'; ?>"
     data-user-balance-robux="<?php if ($isUserAuthenticated) echo $userInfo["robuxBalance"]; else echo "0"; ?>"
     data-user-balance-tickets="0"
     data-user-bc="0"
     data-continueshopping-url="https://www.<?php echo $domain ?>/games/<?= $game["id"] ?>/"
     data-imageurl =""
     data-alerturl ="https://images.idk18.xyz/b7353602bbf9b927d572d5887f97d452.svg"
     data-inSufficentFundsurl ="https://images.idk18.xyz/b80339ddf867ccfe6ab23a2c263d8000.png"
     >
    
</div>


<div id="BCOnlyModal" class="modal-dialog" style="display: none;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" onclick="$.modal.close();">
                <span aria-hidden="true">
                    <span class="icon-close"></span>
                </span>
                <span class="sr-only">Close</span>
            </button>
            <h5>Builders Club Only</h5>
        </div>
        <div class="modal-body">
            <div id="BCMessageDiv">
                This is a premium item only available to our Builders Club members.
            </div>
            <div class="modal-image-container">
                <span class="icon-default-bc upgrade-icon-bc"></span>
            </div>
        </div>
        <div class="modal-footer">
            <a href="https://www.<?php echo $domain ?>/premium/membership?ctx=bc-only-item" class="btn-primary-md">Upgrade Now</a>
            <button type="button" class="btn-control-md" onclick="$.modal.close();">Cancel</button>
        </div>
    </div>
</div>

<script type="text/javascript">
    function showBCOnlyModal(modalId) {
        var modalProperties = { overlayClose: true, escClose: true, opacity: 80, overlayCss: { backgroundColor: "#000" } };
        if (typeof modalId === "undefined")
            $("#BCOnlyModal").modal(modalProperties);
        else
            $("#" + modalId).modal(modalProperties);
    }
    $(document).ready(function () {
        $('#VOID').click(function () {
            showBCOnlyModal("BCOnlyModal");
            return false;
        });
    });
</script>


                <div id="Skyscraper-Adp-Right" class="abp abp-container right-abp">
                    

<iframe name="Roblox_GameDetail_Right_160x600" 
        allowtransparency="true"
        frameborder="0"
        height="612"
        scrolling="no"
        src="https://www.<?php echo $domain ?>/user-sponsorship/2"
        width="160"
        data-js-adtype="iframead"></iframe>

                </div>
            
        </div>
            </div> 

<?php require_once("../includes/footer.php"); ?>

</div> 



<?php require_once("../includes/placelauncher.php"); ?>

<?php require_once( $_SERVER['DOCUMENT_ROOT'] . "/includes/modals/legacygenericconfirmationmodal.php" ); ?>

<?php require_once( $_SERVER['DOCUMENT_ROOT'] . "/includes/modals/confirmationmodal.php" ); ?>

<script type="text/javascript">
    var Roblox = Roblox || {};
    Roblox.jsConsoleEnabled = false;
</script>


     <?php require_once("../includes/cookieupgrader.php"); ?>



    
    <?php require_once("../includes/robloxjs.php"); ?>


    
                        

    
    <?php require_once("../includes/configPaths.php"); ?>

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

<?php require_once("../includes/eventmanager.php"); ?>

    
    

<?php require_once("../includes/modals/upsellAdModal.php"); ?>

<script type='text/javascript' src='https://js.idk18.xyz/5b0c9ab81871a27f956e825070a86908.js'></script>
</body>
</html>