<?php
$pageName = "";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <!-- MachineID: <?= $webServerName ?> -->
    <title>Create Game - <?= $domain ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,requiresActiveX=true" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="ROBLOX Corporation" />
<meta name="description" content="ROBLOX is powered by a growing community of over 300,000 creators who produce an infinite variety of highly immersive Games. These Games range from 3D multiplayer games and competitions, to interactive adventures where friends can take on new personas imagining what it would be like to be a dinosaur, a miner in a quarry or an astronaut on a space exploration." />
<meta name="keywords" content="free games, online games, building games, virtual worlds, free mmo, gaming cloud, physics engine" />

    
    

    <link rel="canonical" href="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"] ?>" />

            <link href="https://images.idk18.xyz/7aee41db80c1071f60377c3575a0ed87.ico" rel="icon" />
    


<link rel='stylesheet' href='https://static.idk18.xyz/css/MainCSS___58dd044044005dc0e887c80110c9a567_m.css/fetch' />
<link rel='stylesheet' href='https://static.rbxcdn.com/css/page___69c248f950f753a394984c0eb5dacab0_m.css/fetch' />
    

        <script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js'></script>
<script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-1.11.1.js'><\/script>")</script>
<script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/jquery.migrate/jquery-migrate-1.2.1.min.js'></script>
<script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-migrate-1.2.1.js'><\/script>")</script>
<script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/4.0/1/MicrosoftAjax.js'></script>
<script type='text/javascript'>window.Sys || document.write("<script type='text/javascript' src='/js/Microsoft/MicrosoftAjax.js'><\/script>")</script>


<?php require_once("../includes/googleAnalytics.php"); ?>


    <script type='text/javascript' src='https://js.idk18.xyz/54b73269bcd426ec956755cb8cac7033.js'></script>
    <script onerror='Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)' data-monitor='true' data-bundlename='page' type='text/javascript' src='https://js.rbxcdn.com/a1ec30f16d5202192e1d89ed4aca2c58.js'></script>


<?php require_once("../includes/eventStreamInit.php"); ?>



<script type="text/javascript">
    if (Roblox && Roblox.PageHeartbeatEvent) {
        Roblox.PageHeartbeatEvent.Init([2,8,20,60]);
    }
</script>    
<script type='text/javascript' src='https://js.idk18.xyz/180999c528c0c58ad608e5834294cd42.js'></script>

   <?php require_once("../includes/configPaths.php"); ?>
   
   <script type='text/javascript' src='https://js.idk18.xyz/custom_ReferenceGenericConf.js'></script>
   

    
<?php require_once("../includes/jsErrorTrackerInit.php"); ?>


<?php require_once("../includes/modals/upselladmodal.php"); ?>
<?php require_once("../getXrsfToken.php"); ?>
    <script type="text/javascript">
        Roblox.FixedUI.gutterAdsEnabled = false;
    </script>
    

    <script type="text/javascript">
        var Roblox = Roblox || {};
        Roblox.jsConsoleEnabled = false;
    </script>

<?php require_once("../includes/devConsoleWarning.php"); ?>

    <script type="text/javascript">
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
      data-internal-page-name=""
      data-send-event-percentage="0.01">
<?php require_once("../includes/robloxLinkify.php"); ?>
<div id="image-retry-data"
     data-image-retry-max-times="10"
     data-image-retry-timer="1500">
</div>
<div id="http-retry-data"
     data-http-retry-max-timeout="0"
     data-http-retry-base-timeout="0">
</div>
    




<div id="fb-root"></div>

<div class="nav-container no-gutter-ads">




<?php require_once("../includes/header.php"); ?>

<script type="text/javascript">
    var Roblox = Roblox || {};
    (function() {
        if (Roblox && Roblox.Performance) {
            Roblox.Performance.setPerformanceMark("navigation_end");
        }
    })();
</script>

    <div id="navContent" class="nav-content
                                
                                
                                logged-in">
        <div class="nav-content-inner">
            <div id="MasterContainer">
                    <script type="text/javascript">
                        if (top.location != self.location) {
                            top.location = self.location.href;
                        }
                    </script>
                

<script type="text/javascript">
    $(function(){
        function trackReturns() {
            function dayDiff(d1, d2) {
                return Math.floor((d1-d2)/86400000);
            }
            if (!localStorage) {
                return false;
            }

            var cookieName = 'RBXReturn';
            var cookieOptions = {expires:9001};
            var cookieStr = localStorage.getItem(cookieName) || "";
            var cookie = {};

            try {
                cookie = JSON.parse(cookieStr);
            } catch (ex) {
                // busted cookie string from old previous version of the code
            }

            try {
                if (typeof cookie.ts === "undefined" || isNaN(new Date(cookie.ts))) {
                    localStorage.setItem(cookieName, JSON.stringify({ ts: new Date().toDateString() }));
                    return false;
                }
            } catch (ex) {
                return false;
            }

            var daysSinceFirstVisit = dayDiff(new Date(), new Date(cookie.ts));
            if (daysSinceFirstVisit == 1 && typeof cookie.odr === "undefined") {
                RobloxEventManager.triggerEvent('rbx_evt_odr', {});
                cookie.odr = 1;
            }
            if (daysSinceFirstVisit >= 1 && daysSinceFirstVisit <= 7 && typeof cookie.sdr === "undefined") {
                RobloxEventManager.triggerEvent('rbx_evt_sdr', {});
                cookie.sdr = 1;
            }
            try {
                localStorage.setItem(cookieName, JSON.stringify(cookie));
            } catch (ex) {
                return false;
            }
        }

        GoogleListener.init();


    
        RobloxEventManager.initialize(true);
        RobloxEventManager.triggerEvent('rbx_evt_pageview');
        trackReturns();
        

    
        RobloxEventManager._idleInterval = 450000;
        RobloxEventManager.registerCookieStoreEvent('rbx_evt_initial_install_start');
        RobloxEventManager.registerCookieStoreEvent('rbx_evt_ftp');
        RobloxEventManager.registerCookieStoreEvent('rbx_evt_initial_install_success');
        RobloxEventManager.registerCookieStoreEvent('rbx_evt_fmp');
        

    });

</script>


                <main id="container-main" tabindex="-1">
                    <div class="alert-container">
                        <noscript><div class="alert-info">Please enable Javascript to use all the features on this site.</div></noscript>
                    </div>

                                        <div id="BodyWrapper" class="">
                        <div id="RepositionBody">
                            <div id="Body" class="body-width">
                                

<h1>Create Game</h1>
<div data-isBC="false">


    <form id="placeForm" method="POST" action="https://www.roblox.com/places/create">
        <div class="validation-summary-valid" data-valmsg-summary="true"><ul><li style="display:none"></li>
</ul></div>
        <input name="__RequestVerificationToken" type="hidden" value="RGP2TWfXDiRrZYF9ko9wWXps4_sqO4GfBLm4ayFUyxaDRMOiJCAFV_QQW8I0jGWyTndYNRy_cuErghFf3n1Ss5cPn8fV2qK2im1b7K6aDjLNIC4P0" />
        <div class="tab-container">
            <div class="tab active" data-id="templates_tab">Templates</div>
            <div class="tab" data-id="basicsettings_tab">Basic Settings</div>
            <div class="tab" data-id="access_tab">Access</div>
            <div class="tab" data-id="advancedsettings_tab">Advanced Settings</div>
        </div>
        <div>
            <div class="tab-content tab-active" id="templates_tab">
                
<h2 id="StudioGameTemplates">GAME TEMPLATES</h2>
<div class="templatetypes">
    <ul class="templatetypes">
            <li data-templatetype="All"><a href="#All">All</a></li>
            <li data-templatetype="Generic"><a href="#Generic">Generic</a></li>
            <li data-templatetype="Theme"><a href="#Theme">Theme</a></li>
            <li data-templatetype="Gameplay"><a href="#Gameplay">Gameplay</a></li>
    </ul>
</div>  
    <div class="templates" data-templatetype="All">
            <div class="template" placeid="95206881">
                <a href="" class="game-image" data-retry-url="" ><img  class='' src='https://t2.rbxcdn.com/ca113ac9186a32970b36aa07bc6f8cfb'/></a>
                <p>Baseplate</p>
            </div>
            <div class="template" placeid="6560363541">
                <a href="" class="game-image" data-retry-url="" ><img  class='' src='https://t2.rbxcdn.com/ca113ac9186a32970b36aa07bc6f8cfb'/></a>
                <p>Classic Baseplate</p>
            </div>
            <div class="template" placeid="95206192">
                <a href="" class="game-image" data-retry-url="" ><img  class='' src='https://t2.rbxcdn.com/ca113ac9186a32970b36aa07bc6f8cfb'/></a>
                <p>Flat Terrain</p>
            </div>
            <div class="template" placeid="10275826693">
                <a href="" class="game-image" data-retry-url="" ><img  class='' src='https://t2.rbxcdn.com/ca113ac9186a32970b36aa07bc6f8cfb'/></a>
                <p>Concert</p>
            </div>
            <div class="template" placeid="520390648">
                <a href="" class="game-image" data-retry-url="" ><img  class='' src='https://t2.rbxcdn.com/ca113ac9186a32970b36aa07bc6f8cfb'/></a>
                <p>Village</p>
            </div>
            <div class="template" placeid="203810088">
                <a href="" class="game-image" data-retry-url="" ><img  class='' src='https://t2.rbxcdn.com/ca113ac9186a32970b36aa07bc6f8cfb'/></a>
                <p>Castle</p>
            </div>
            <div class="template" placeid="366130569">
                <a href="" class="game-image" data-retry-url="" ><img  class='' src='https://t2.rbxcdn.com/ca113ac9186a32970b36aa07bc6f8cfb'/></a>
                <p>Suburban</p>
            </div>
            <div class="template" placeid="215383192">
                <a href="" class="game-image" data-retry-url="" ><img  class='' src='https://t2.rbxcdn.com/ca113ac9186a32970b36aa07bc6f8cfb'/></a>
                <p>Racing</p>
            </div>
            <div class="template" placeid="264719325">
                <a href="" class="game-image" data-retry-url="" ><img  class='' src='https://t2.rbxcdn.com/ca113ac9186a32970b36aa07bc6f8cfb'/></a>
                <p>Pirate Island</p>
            </div>
            <div class="template" placeid="203783329">
                <a href="" class="game-image" data-retry-url="" ><img  class='' src='https://t2.rbxcdn.com/ca113ac9186a32970b36aa07bc6f8cfb'/></a>
                <p>City</p>
            </div>
            <div class="template" placeid="203812057">
                <a href="" class="game-image" data-retry-url="" ><img  class='' src='https://t2.rbxcdn.com/ca113ac9186a32970b36aa07bc6f8cfb'/></a>
                <p>Obby</p>
            </div>
            <div class="template" placeid="379736082">
                <a href="" class="game-image" data-retry-url="" ><img  class='' src='https://t2.rbxcdn.com/ca113ac9186a32970b36aa07bc6f8cfb'/></a>
                <p>Starting Place</p>
            </div>
            <div class="template" placeid="301530843">
                <a href="" class="game-image" data-retry-url="" ><img  class='' src='https://t2.rbxcdn.com/ca113ac9186a32970b36aa07bc6f8cfb'/></a>
                <p>Line Runner</p>
            </div>
            <div class="template" placeid="92721754">
                <a href="" class="game-image" data-retry-url="" ><img  class='' src='https://t2.rbxcdn.com/ca113ac9186a32970b36aa07bc6f8cfb'/></a>
                <p>Capture The Flag</p>
            </div>
            <div class="template" placeid="301529772">
                <a href="" class="game-image" data-retry-url="" ><img  class='' src='https://t2.rbxcdn.com/ca113ac9186a32970b36aa07bc6f8cfb'/></a>
                <p>Team/FFA Arena</p>
            </div>
            <div class="template" placeid="203885589">
                <a href="" class="game-image" data-retry-url="" ><img  class='' src='https://t2.rbxcdn.com/ca113ac9186a32970b36aa07bc6f8cfb'/></a>
                <p>Combat</p>
            </div>
            <div class="template" placeid="5353920686">
                <a href="" class="game-image" ><img  class='' src='https://t2.rbxcdn.com/d5e35111825ef9878e1a4952de1d6a6f'/></a>
                <p>Move It Simulator</p>
            </div>
            <div class="template" placeid="6936227200">
                <a href="" class="game-image" ><img  class='' src='https://s3.amazonaws.com/images.roblox.com/325472601571f31e1bf00674c368d335.gif'/></a>
                <p>Mansion of Wonder</p>
            </div>
    </div>
    <div class="templates" data-templatetype="Generic">
            <div class="template" placeid="95206881">
                <a href="" class="game-image" data-retry-url="" ><img  class='' src='https://t2.rbxcdn.com/ca113ac9186a32970b36aa07bc6f8cfb'/></a>
                <p>Baseplate</p>
            </div>
            <div class="template" placeid="6560363541">
                <a href="" class="game-image" data-retry-url="" ><img  class='' src='https://t2.rbxcdn.com/ca113ac9186a32970b36aa07bc6f8cfb'/></a>
                <p>Classic Baseplate</p>
            </div>
            <div class="template" placeid="95206192">
                <a href="" class="game-image" data-retry-url="" ><img  class='' src='https://t2.rbxcdn.com/ca113ac9186a32970b36aa07bc6f8cfb'/></a>
                <p>Flat Terrain</p>
            </div>
            <div class="template" placeid="5353920686">
                <a href="" class="game-image" ><img  class='' src='https://t2.rbxcdn.com/d5e35111825ef9878e1a4952de1d6a6f'/></a>
                <p>Move It Simulator</p>
            </div>
            <div class="template" placeid="6936227200">
                <a href="" class="game-image" ><img  class='' src='https://s3.amazonaws.com/images.roblox.com/325472601571f31e1bf00674c368d335.gif'/></a>
                <p>Mansion of Wonder</p>
            </div>
    </div>
    <div class="templates" data-templatetype="Theme">
            <div class="template" placeid="10275826693">
                <a href="" class="game-image" data-retry-url="" ><img  class='' src='https://t2.rbxcdn.com/ca113ac9186a32970b36aa07bc6f8cfb'/></a>
                <p>Concert</p>
            </div>
            <div class="template" placeid="520390648">
                <a href="" class="game-image" data-retry-url="" ><img  class='' src='https://t2.rbxcdn.com/ca113ac9186a32970b36aa07bc6f8cfb'/></a>
                <p>Village</p>
            </div>
            <div class="template" placeid="203810088">
                <a href="" class="game-image" data-retry-url="" ><img  class='' src='https://t2.rbxcdn.com/ca113ac9186a32970b36aa07bc6f8cfb'/></a>
                <p>Castle</p>
            </div>
            <div class="template" placeid="366130569">
                <a href="" class="game-image" data-retry-url="" ><img  class='' src='https://t2.rbxcdn.com/ca113ac9186a32970b36aa07bc6f8cfb'/></a>
                <p>Suburban</p>
            </div>
            <div class="template" placeid="264719325">
                <a href="" class="game-image" data-retry-url="" ><img  class='' src='https://t2.rbxcdn.com/ca113ac9186a32970b36aa07bc6f8cfb'/></a>
                <p>Pirate Island</p>
            </div>
            <div class="template" placeid="203783329">
                <a href="" class="game-image" data-retry-url="" ><img  class='' src='https://t2.rbxcdn.com/ca113ac9186a32970b36aa07bc6f8cfb'/></a>
                <p>City</p>
            </div>
            <div class="template" placeid="379736082">
                <a href="" class="game-image" data-retry-url="" ><img  class='' src='https://t2.rbxcdn.com/ca113ac9186a32970b36aa07bc6f8cfb'/></a>
                <p>Starting Place</p>
            </div>
    </div>
    <div class="templates" data-templatetype="Gameplay">
            <div class="template" placeid="215383192">
                <a href="" class="game-image" data-retry-url="" ><img  class='' src='https://t2.rbxcdn.com/ca113ac9186a32970b36aa07bc6f8cfb'/></a>
                <p>Racing</p>
            </div>
            <div class="template" placeid="203812057">
                <a href="" class="game-image" data-retry-url="" ><img  class='' src='https://t2.rbxcdn.com/ca113ac9186a32970b36aa07bc6f8cfb'/></a>
                <p>Obby</p>
            </div>
            <div class="template" placeid="301530843">
                <a href="" class="game-image" data-retry-url="" ><img  class='' src='https://t2.rbxcdn.com/ca113ac9186a32970b36aa07bc6f8cfb'/></a>
                <p>Line Runner</p>
            </div>
            <div class="template" placeid="92721754">
                <a href="" class="game-image" data-retry-url="" ><img  class='' src='https://t2.rbxcdn.com/ca113ac9186a32970b36aa07bc6f8cfb'/></a>
                <p>Capture The Flag</p>
            </div>
            <div class="template" placeid="301529772">
                <a href="" class="game-image" data-retry-url="" ><img  class='' src='https://t2.rbxcdn.com/ca113ac9186a32970b36aa07bc6f8cfb'/></a>
                <p>Team/FFA Arena</p>
            </div>
            <div class="template" placeid="203885589">
                <a href="" class="game-image" data-retry-url="" ><img  class='' src='https://t2.rbxcdn.com/ca113ac9186a32970b36aa07bc6f8cfb'/></a>
                <p>Combat</p>
            </div>
    </div>

            </div>
            <div class="tab-content" id="basicsettings_tab">
                <div class="headline">
    <h2>Basic Settings</h2>
</div>
<span id="userData" style="display: none;" data-name="Robloxianj3n4i6x1m" data-place-number="2">{0}&#39;s Place Number: {1}</span>
<label class="form-label" for="Name">Name:</label>
<input autofocus="" class="text-box text-box-medium" data-val="true" data-val-regex="Illegal characters" data-val-regex-pattern="^[^&lt;>]+$" data-val-required="Name is required" id="Name" name="Name" type="text" value="" />
<span id="nameRow"><span class="field-validation-valid" data-valmsg-for="Name" data-valmsg-replace="true"></span></span>

<label class="form-label" for="Description">Description:</label>
<div>
    <span>If you have built <a>Premium benefits</a> into your Game, please list those benefits in the description.</span>
</div>
<textarea class="text-box text-area-medium" cols="80" id="Description" maxlength="1000" name="Description" rows="6">
</textarea>
<span class="field-validation-valid" data-valmsg-for="Description" data-valmsg-replace="true"></span>


<label class="form-label" for="Genre">Genre:</label>
<select class="form-select no-margins" id="Genre" name="Genre"><option selected="selected">All</option>
<option>Adventure</option>
<option>Building</option>
<option>Comedy</option>
<option>Fighting</option>
<option>FPS</option>
<option>Horror</option>
<option>Medieval</option>
<option>Military</option>
<option>Naval</option>
<option>RPG</option>
<option>Sci-Fi</option>
<option>Sports</option>
<option>Town and City</option>
<option>Western</option>
</select>
<span class="field-validation-valid" data-valmsg-for="Genre" data-valmsg-replace="true"></span>

<input data-val="true" data-val-number="The field TemplateID must be a number." id="TemplateID" name="TemplateID" type="hidden" value="95206881" />
            </div>
            <div class="tab-content" id="access_tab">
                

<div class="headline">
    <h2>Access</h2>
</div>
<script type="text/javascript">

    var Roblox = Roblox || {};
    Roblox.AccessData = {"isDevelopSiteForVipServersEnabled":true,"vipServerConfigurationLink":"https://develop.roblox.com/v1/universes//configuration/vip-servers","privateServersAllowed":true};
</script>

<!-- Checkbox list needs custom extensions in the current version of mvc. -->    
    <div class="deviceTypeSection" data-console-agreement-enabled="True">
        <label class="form-label" for="DeviceSectionHeader">Playable devices:</label>
            <label class="checkboxListItem" data-device="Computer">
                <input checked="checked" data-val="true" data-val-required="The Selected field is required." id="PlayableDevices_0__Selected" name="PlayableDevices[0].Selected" type="checkbox" value="true" /><input name="PlayableDevices[0].Selected" type="hidden" value="false" />
                <input data-val="true" data-val-required="The DeviceType field is required." id="PlayableDevices_0__DeviceType" name="PlayableDevices[0].DeviceType" type="hidden" value="Computer" />
                Computer
            </label>
            <label class="checkboxListItem" data-device="Phone">
                <input checked="checked" data-val="true" data-val-required="The Selected field is required." id="PlayableDevices_1__Selected" name="PlayableDevices[1].Selected" type="checkbox" value="true" /><input name="PlayableDevices[1].Selected" type="hidden" value="false" />
                <input data-val="true" data-val-required="The DeviceType field is required." id="PlayableDevices_1__DeviceType" name="PlayableDevices[1].DeviceType" type="hidden" value="Phone" />
                Phone
            </label>
            <label class="checkboxListItem" data-device="Tablet">
                <input checked="checked" data-val="true" data-val-required="The Selected field is required." id="PlayableDevices_2__Selected" name="PlayableDevices[2].Selected" type="checkbox" value="true" /><input name="PlayableDevices[2].Selected" type="hidden" value="false" />
                <input data-val="true" data-val-required="The DeviceType field is required." id="PlayableDevices_2__DeviceType" name="PlayableDevices[2].DeviceType" type="hidden" value="Tablet" />
                Tablet
            </label>
            <label class="checkboxListItem" data-device="Console">
                <input data-val="true" data-val-required="The Selected field is required." id="PlayableDevices_3__Selected" name="PlayableDevices[3].Selected" type="checkbox" value="true" /><input name="PlayableDevices[3].Selected" type="hidden" value="false" />
                <input data-val="true" data-val-required="The DeviceType field is required." id="PlayableDevices_3__DeviceType" name="PlayableDevices[3].DeviceType" type="hidden" value="Console" />
                Console
            </label>
        <div id="device-type-error" class="error-message">You must select one or more playable devices.</div>
    </div>

<div id="NumPlayers">
    <div class="access-label">
        <label class="form-label" for="NumberOfPlayersMax">Maximum Visitor Count:</label>
    </div>
<select class="form-select" data-val="true" data-val-number="The field Maximum Visitor Count: must be a number." data-val-required="The Maximum Visitor Count: field is required." id="MaxPlayersInput" name="NumberOfPlayersMax"><option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
<option>8</option>
<option>9</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
<option>31</option>
<option>32</option>
<option>33</option>
<option>34</option>
<option>35</option>
<option>36</option>
<option>37</option>
<option>38</option>
<option>39</option>
<option>40</option>
<option>41</option>
<option>42</option>
<option>43</option>
<option>44</option>
<option>45</option>
<option>46</option>
<option>47</option>
<option>48</option>
<option>49</option>
<option selected="selected">50</option>
<option>51</option>
<option>52</option>
<option>53</option>
<option>54</option>
<option>55</option>
<option>56</option>
<option>57</option>
<option>58</option>
<option>59</option>
<option>60</option>
<option>61</option>
<option>62</option>
<option>63</option>
<option>64</option>
<option>65</option>
<option>66</option>
<option>67</option>
<option>68</option>
<option>69</option>
<option>70</option>
<option>71</option>
<option>72</option>
<option>73</option>
<option>74</option>
<option>75</option>
<option>76</option>
<option>77</option>
<option>78</option>
<option>79</option>
<option>80</option>
<option>81</option>
<option>82</option>
<option>83</option>
<option>84</option>
<option>85</option>
<option>86</option>
<option>87</option>
<option>88</option>
<option>89</option>
<option>90</option>
<option>91</option>
<option>92</option>
<option>93</option>
<option>94</option>
<option>95</option>
<option>96</option>
<option>97</option>
<option>98</option>
<option>99</option>
<option>100</option>
</select>    <img class="TipsyImg tooltip-bottom h2-tooltip number-of-players-max-tooltip" src="https://images.rbxcdn.com/65cb6e4009a00247ca02800047aafb87.png" data-toggle="tooltip" title="The maximum number of people allowed in one instance of the Game." />
    <span class="field-validation-valid" data-valmsg-for="NumberOfPlayersMax" data-valmsg-replace="true"></span>

    <div class="access-label">
        <label class="form-label" for="SocialSlotType">Server Fill:</label>
    </div>

    <div class="formRadio" id="FriendSlotRadioButtons">
        <label class="checkboxListItem"> <input checked="checked" data-val="true" data-val-required="The Server Fill: field is required." id="AutomaticFriendSlots" name="SocialSlotType" type="radio" value="Automatic" /> <span class="checkboxListItem">Roblox optimizes server fill for me</span> <img class="TipsyImg tooltip-bottom h2-tooltip" src="https://images.rbxcdn.com/65cb6e4009a00247ca02800047aafb87.png" data-toggle="tooltip" title="Roblox will fill your server to optimize for the best social Game." /> </label>
        <label class="checkboxListItem"> <input id="EmptyFriendSlots" name="SocialSlotType" type="radio" value="Empty" /> <span class="checkboxListItem">Fill each server as full as possible</span></label>
        <div id="EmptyFriendSlotError" hidden="hidden">
            <p class="status-error" id="FriendSlotWarning">Choosing this option will cause you to lose out on engagement time and Robux earned.</p>
        </div>
        <label class="checkboxListItem"> <input id="CustomFriendSlots" name="SocialSlotType" type="radio" value="Custom" /> <span class="checkboxListItem">Customize how many server slots to reserve</span> <img class="TipsyImg tooltip-bottom h2-tooltip" src="https://images.rbxcdn.com/65cb6e4009a00247ca02800047aafb87.png" data-toggle="tooltip" title="Friends are more likely to join people in your Game if you reserve more slots." /> </label>
        <div id="CustomFriendSlotDropdown" style="margin-left:3%" hidden="hidden">
<select class="form-select" data-val="true" data-val-number="The field NumberOfCustomSocialSlots must be a number." data-val-required="The NumberOfCustomSocialSlots field is required." id="FriendSlotsInput" name="NumberOfCustomSocialSlots"><option>1</option>
<option>2</option>
<option>3</option>
<option selected="selected">4</option>
<option>5</option>
<option>6</option>
<option>7</option>
<option>8</option>
<option>9</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
<option>31</option>
<option>32</option>
<option>33</option>
<option>34</option>
<option>35</option>
<option>36</option>
<option>37</option>
<option>38</option>
<option>39</option>
<option>40</option>
<option>41</option>
<option>42</option>
<option>43</option>
<option>44</option>
<option>45</option>
<option>46</option>
<option>47</option>
<option>48</option>
<option>49</option>
</select>        </div>
        <span class="field-validation-valid" data-valmsg-for="SocialSlotType" data-valmsg-replace="true"></span>
    </div>
</div>

<br />

<div id="GamePlaceAccess">
    <label class="form-label" for="Access">Access:</label>
    <select class="form-select" id="Access" name="Access"><option selected="selected">Everyone</option>
<option>Friends</option>
</select>
    <img class="TipsyImg tooltip-bottom h2-tooltip place-access-tooltip" src="https://images.rbxcdn.com/65cb6e4009a00247ca02800047aafb87.png" data-toggle="tooltip" alt="To restrict who may access this place, first you must disable private servers and not sell Game access." title="To restrict who may access this place, first you must disable private servers and not sell Game access." />
    <span class="field-validation-valid" data-valmsg-for="Access" data-valmsg-replace="true"></span>
</div>


<div id="PrivateServersAccess" class="privateserversaccess">
    <label class="form-label" for="ArePrivateServersAllowed">Private Servers:</label>

    <label id="PrivateServerAccessLabel" class="checkboxListItem">
        <input checked="checked" data-val="true" data-val-required="The ArePrivateServersAllowed field is required." id="AllowPrivateServersCheckbox" name="ArePrivateServersAllowed" type="checkbox" value="true" /><input name="ArePrivateServersAllowed" type="hidden" value="false" />
        <span>
            Allow Private Servers                 <a href="https://developer.roblox.com/en-us/articles/Creating-a-VIP-Server-on-Roblox" target="_blank">
                    <img class="h2-tooltip private-server-tooltip" src="https://images.rbxcdn.com/65cb6e4009a00247ca02800047aafb87.png" alt="Click here to learn about private servers" data-toggle="tooltip" title="Click here to learn about private servers" />
                </a>
        </span>
    </label>
    <div id="PrivateServerDetails">

            <div id="PrivateServerDetailsError" class="status-error">Unable to load private server statistics. This may occur for Games with a large number of private servers.</div>
            <div id="PrivateServerCountsLoading">
                <img src="https://images.rbxcdn.com/e0802687d8357fbc484a75914e4447dc.gif" alt="Loading private server statistics...">
                Loading private server statistics...
            </div>
            <div id="ActivePrivateServersCount"></div>
            <div id="ActivePrivateServersSubscriptions"></div>

        <div class="formRadio" id="PrivateServerRadioButtons">
            <label class="checkboxListItem"> <input data-val="true" data-val-required="The IsFreePrivateServer field is required." id="FreePrivateServers" name="IsFreePrivateServer" type="radio" value="True" /> <span class="checkboxListItem">Free</span></label>
            <label class="checkboxListItem"> <input checked="checked" id="PaidPrivateServers" name="IsFreePrivateServer" type="radio" value="False" /> <span class="checkboxListItem">Paid</span></label>
        </div>
        <div id="PrivateServerPriceContainer" data-minprice="10" data-defaultprice="100" data-taxrate="0.3" style="display:none;">
            <div id="PrivateServerPrice" class="pricingrow">
                <div class="pricinglabel">Price:</div>
                <div class="toppricingfield">
                    <span class="icon-robux-16x16"></span><input class="TextBox priceinput" data-val="true" data-val-number="The field Price: must be a number." data-val-required="The Price: field is required." id="PrivateServerPriceInput" name="PrivateServersPrice" type="text" value="100" />
                </div>
                <span id="PrivateServerPricingError" class="status-error priceerror">
                    The minimum price for this item is
                    <span class="icon-robux-16x16"></span><span>10</span>
                </span>
                <div style="clear: both"></div>
            </div>
            <div id="PrivateServerMarketplaceFee" class="pricingrow">
                <div class="pricinglabel">
                    Marketplace Fee <img class="h2-tooltip private-server-tooltip" src="https://images.rbxcdn.com/65cb6e4009a00247ca02800047aafb87.png" data-toggle="tooltip" data-toggle-mobile="true" data-original-title="30% - minimum 1" />:<br />

                </div>
                <div class="pricingfield">
                    <span class="icon-robux-16x16"></span><span id="PrivateServerMarketplaceFeeText"></span>
                </div>
                <div style="clear: both"></div>
            </div>
            <div id="PrivateServerUserProfit" class="pricingrow">
                <div class="pricinglabel">You Earn:</div>
                <div class="pricingfield">
                    <span class="icon-robux-16x16"></span><span id="PrivateServerUserProfitText"></span>
                </div>
                <div style="clear: both"></div>
            </div>
        </div>
        <div id="PrivateServerPriceChangeWarning" class="status-error">Warning: Changing the price of private servers will cancel all existing subscriptions.</div>
    </div>
    <div id="PrivateServerDisableWarning" class="status-error">Warning: Disabling private servers will close all active private servers and cancel all subscriptions.</div>
    <div id="PrivateServersError" class="status-error">To create a private server for this Game, you must first allow access to Everyone, and you must disable Paid Access.</div>
</div>
<div style="clear:both;"></div>
<script type="text/javascript">
    Roblox.PlayerAccess.strings = {
        UsernameDoesNotExist: "That username does not exist.",
        UserAlreadyAdded: "You've already added that username.",
        UserLimitReached: "You've reached the user name limit.",
        SearchingFor: "Searching for ",
        InviteList: "Invite List",

        ConsoleAccessContentAgreementTitleText: "Content Agreement",
        ConsoleAccessContentAgreementBodyContent: "<div style='width: 350px; margin-left: 25px;'>Do you agree that your Game is controller compatible and contains NONE of the following? <ul style='text-align: left; margin-left: 110px; padding: 0;'><li style='list-style: disc;'>Blood or Gore</li> <li style='list-style: disc;'>Intense Violence</li> <li style='list-style: disc;'>Strong Language (Swearing)</li> <li style='list-style: disc;'>Robux Gambling</li> <li style='list-style: disc;'>Drug Reference or Use</li> <li style='list-style: disc;'>In-Game Messaging (Text Chat)</li> </ul> </div>",
        ConsoleAccessContentAgreementAcceptText: "AGREE",
        ConsoleAccessContentAgreementDeclineText: "DISAGREE"
    };
    Roblox.PlayerAccess.AlertImageUrl = 'https://images.rbxcdn.com/cbb24e0c0f1fb97381a065bd1e056fcb.png';
    Roblox.PlayerAccess.tailLeftImage = 'https://images.rbxcdn.com/77c4414271016f8257c136305b7888b4.png';
</script>

            </div>
            <div class="tab-content" id="advancedsettings_tab">
                
<div class="headline">
    <h2>Gear Permissions</h2>
    <img class="TipsyImg tooltip-bottom h2-tooltip" data-toggle="tooltip" title="The type of gear allowed in your Game. By default the same genre of gear is allowed as the genre of the Game." height="13" width="12" src="https://images.rbxcdn.com/65cb6e4009a00247ca02800047aafb87.png" alt="The type of gear allowed in your Game. By default the same genre of gear is allowed as the genre of the Game." />
</div>
<label class="form-label radio-button-label" for="IsAllGenresAllowed">Allowed Genre:</label>
<label class="radio-selection">
    <input checked="checked" data-val="true" data-val-required="The Allowed Genre: field is required." id="IsAllGenresAllowed" name="IsAllGenresAllowed" type="radio" value="False" />
    <span class="checkboxListItem">Game genre (<span id="advancedsettings_genre">All</span>)</span>
</label>
<label class="radio-selection-last">
    <input id="IsAllGenresAllowed" name="IsAllGenresAllowed" type="radio" value="True" /><span class="checkboxListItem">All genres</span>
</label>
<span class="field-validation-valid" data-valmsg-for="IsAllGenresAllowed" data-valmsg-replace="true"></span>

<label class="form-label check-box-label">Gear types:</label>
<ul id="gearTypes">
<li class="gearCheckbox">
    <label class="checkboxListItem"><input data-val="true" data-val-required="The IsSelected field is required." id="AllowedGearTypes_0__IsSelected" name="AllowedGearTypes[0].IsSelected" type="checkbox" value="true" /><input name="AllowedGearTypes[0].IsSelected" type="hidden" value="false" /> Melee</label>
    <input id="AllowedGearTypes_0__GearTypeDisplayName" name="AllowedGearTypes[0].GearTypeDisplayName" type="hidden" value="Melee" />
    <input data-val="true" data-val-required="The Category field is required." id="AllowedGearTypes_0__Category" name="AllowedGearTypes[0].Category" type="hidden" value="Melee" />
</li><li class="gearCheckbox">
    <label class="checkboxListItem"><input data-val="true" data-val-required="The IsSelected field is required." id="AllowedGearTypes_1__IsSelected" name="AllowedGearTypes[1].IsSelected" type="checkbox" value="true" /><input name="AllowedGearTypes[1].IsSelected" type="hidden" value="false" /> Power ups</label>
    <input id="AllowedGearTypes_1__GearTypeDisplayName" name="AllowedGearTypes[1].GearTypeDisplayName" type="hidden" value="Power ups" />
    <input data-val="true" data-val-required="The Category field is required." id="AllowedGearTypes_1__Category" name="AllowedGearTypes[1].Category" type="hidden" value="PowerUps" />
</li><li class="gearCheckbox">
    <label class="checkboxListItem"><input data-val="true" data-val-required="The IsSelected field is required." id="AllowedGearTypes_2__IsSelected" name="AllowedGearTypes[2].IsSelected" type="checkbox" value="true" /><input name="AllowedGearTypes[2].IsSelected" type="hidden" value="false" /> Ranged</label>
    <input id="AllowedGearTypes_2__GearTypeDisplayName" name="AllowedGearTypes[2].GearTypeDisplayName" type="hidden" value="Ranged" />
    <input data-val="true" data-val-required="The Category field is required." id="AllowedGearTypes_2__Category" name="AllowedGearTypes[2].Category" type="hidden" value="Ranged" />
</li><li class="gearCheckbox">
    <label class="checkboxListItem"><input data-val="true" data-val-required="The IsSelected field is required." id="AllowedGearTypes_3__IsSelected" name="AllowedGearTypes[3].IsSelected" type="checkbox" value="true" /><input name="AllowedGearTypes[3].IsSelected" type="hidden" value="false" /> Navigation</label>
    <input id="AllowedGearTypes_3__GearTypeDisplayName" name="AllowedGearTypes[3].GearTypeDisplayName" type="hidden" value="Navigation" />
    <input data-val="true" data-val-required="The Category field is required." id="AllowedGearTypes_3__Category" name="AllowedGearTypes[3].Category" type="hidden" value="Navigation" />
</li><li class="gearCheckbox">
    <label class="checkboxListItem"><input data-val="true" data-val-required="The IsSelected field is required." id="AllowedGearTypes_4__IsSelected" name="AllowedGearTypes[4].IsSelected" type="checkbox" value="true" /><input name="AllowedGearTypes[4].IsSelected" type="hidden" value="false" /> Explosives</label>
    <input id="AllowedGearTypes_4__GearTypeDisplayName" name="AllowedGearTypes[4].GearTypeDisplayName" type="hidden" value="Explosives" />
    <input data-val="true" data-val-required="The Category field is required." id="AllowedGearTypes_4__Category" name="AllowedGearTypes[4].Category" type="hidden" value="Explosive" />
</li><li class="gearCheckbox">
    <label class="checkboxListItem"><input data-val="true" data-val-required="The IsSelected field is required." id="AllowedGearTypes_5__IsSelected" name="AllowedGearTypes[5].IsSelected" type="checkbox" value="true" /><input name="AllowedGearTypes[5].IsSelected" type="hidden" value="false" /> Musical</label>
    <input id="AllowedGearTypes_5__GearTypeDisplayName" name="AllowedGearTypes[5].GearTypeDisplayName" type="hidden" value="Musical" />
    <input data-val="true" data-val-required="The Category field is required." id="AllowedGearTypes_5__Category" name="AllowedGearTypes[5].Category" type="hidden" value="Musical" />
</li><li class="gearCheckbox">
    <label class="checkboxListItem"><input data-val="true" data-val-required="The IsSelected field is required." id="AllowedGearTypes_6__IsSelected" name="AllowedGearTypes[6].IsSelected" type="checkbox" value="true" /><input name="AllowedGearTypes[6].IsSelected" type="hidden" value="false" /> Social</label>
    <input id="AllowedGearTypes_6__GearTypeDisplayName" name="AllowedGearTypes[6].GearTypeDisplayName" type="hidden" value="Social" />
    <input data-val="true" data-val-required="The Category field is required." id="AllowedGearTypes_6__Category" name="AllowedGearTypes[6].Category" type="hidden" value="Social" />
</li><li class="gearCheckbox">
    <label class="checkboxListItem"><input data-val="true" data-val-required="The IsSelected field is required." id="AllowedGearTypes_7__IsSelected" name="AllowedGearTypes[7].IsSelected" type="checkbox" value="true" /><input name="AllowedGearTypes[7].IsSelected" type="hidden" value="false" /> Transport</label>
    <input id="AllowedGearTypes_7__GearTypeDisplayName" name="AllowedGearTypes[7].GearTypeDisplayName" type="hidden" value="Transport" />
    <input data-val="true" data-val-required="The Category field is required." id="AllowedGearTypes_7__Category" name="AllowedGearTypes[7].Category" type="hidden" value="PersonalTransport" />
</li><li class="gearCheckbox">
    <label class="checkboxListItem"><input data-val="true" data-val-required="The IsSelected field is required." id="AllowedGearTypes_8__IsSelected" name="AllowedGearTypes[8].IsSelected" type="checkbox" value="true" /><input name="AllowedGearTypes[8].IsSelected" type="hidden" value="false" /> Building</label>
    <input id="AllowedGearTypes_8__GearTypeDisplayName" name="AllowedGearTypes[8].GearTypeDisplayName" type="hidden" value="Building" />
    <input data-val="true" data-val-required="The Category field is required." id="AllowedGearTypes_8__Category" name="AllowedGearTypes[8].Category" type="hidden" value="Building" />
</li></ul>
<div class="divider-bottom spacing"></div>
<div class="headline">
    <h2 id="otherSettings">Other Permissions</h2>
</div>

<input id="ChatType" name="ChatType" type="hidden" value="Classic" />

<fieldset>
    By checking this box, <b>you are granting every other user of Roblox the right to use</b> (in various ways) the content you are now sharing. <b>If you do not want to grant this right, please do not check this box</b>. For more information about sharing content, please review the Roblox <a class='text-link' href='https://www.roblox.com/info/terms' class='rbx-link'>Terms of Use</a>.
    <label id="copyLock">
        <input data-val="true" data-val-required="The Allow Copying field is required." id="IsCopyingAllowed" name="IsCopyingAllowed" type="checkbox" value="true" /><input name="IsCopyingAllowed" type="hidden" value="false" /> <span class="checkboxListItem">Allow Copying</span>
    </label>
</fieldset>

<input data-val="true" data-val-required="The Avatar Appearance Override: field is required." id="OverridesDefaultAvatar" name="OverridesDefaultAvatar" type="hidden" value="False" />

<script type="text/javascript">
    $(function () {
        if (typeof Roblox === "undefined") {
            Roblox = {};
        }
        if (typeof Roblox.IDE === "undefined") {
            Roblox.IDE = {};
        }
        if (typeof Roblox.IDE.Resources === "undefined") {
            Roblox.IDE.Resources = {};
        }
        $.extend(Roblox.IDE.Resources, {
            AllowCopyingTitleText: "Allow Copying",
            AllowCopyingTitleContent: "Are you sure you want to allow this place to be copied?",
            AllowCopyingAcceptText: "Save",
            AllowCopyingCancelText: "Cancel",

            DisableVIPServersWarningTitleText: "Turn Off Private Servers",
            DisableVIPServersWarningBodyContent: "Are you sure you want to turn off private servers? All private server subscriptions will be cancelled.",
            DisableVIPServersWarningAcceptText: "Turn Off",
            DisableVIPServersWarningDeclineText: "Cancel"
        });
    });
</script>
            </div>
        </div>
        <div>
            <div id="buttonRow">
                <a  class="btn-medium btn-primary" id="finishButton">Create Game</a>
                <a  data-return-url="/develop" class="btn-medium btn-negative" id="cancelButton">Cancel</a>
            </div>
        </div>
    </form>
</div>
<div id="ProcessingView" style="display:none">
    <div class="ProcessingModalBody">
        <p class="processing-indicator"><img src='https://images.rbxcdn.com/ec4e85b0c4396cf753a06fade0a8d8af.gif' alt="Creating place..." /></p>
        <p class="processing-text">Creating Game...</p>
    </div>
</div>

                                <div style="clear: both"></div>
                            </div>
                        </div>
                    </div>
<!--Bootstrap Footer React Component -->

<footer class="container-footer" id="footer-container"
        data-is-giftcards-footer-enabled="True">
</footer>                </main>
            </div> 
        </div> 
    </div> 
</div> 




<?php require_once("../includes/placelauncher.php"); ?>

<?php require_once("../includes/modals/legacyGenericConfirmationModal.php"); ?>



<?php require_once("../includes/cookieupgrader.php"); ?>
</body>
</html>
