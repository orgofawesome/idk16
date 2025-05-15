<?php
$pageName = "";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <!-- MachineID: <?= $webServerName ?> -->
    <title>Badges - ROBLOX</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,requiresActiveX=true" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="ROBLOX Corporation" />
<meta name="description" content="ROBLOX is powered by a growing community of over 300,000 creators who produce an infinite variety of highly immersive experiences. These experiences range from 3D multiplayer games and competitions, to interactive adventures where friends can take on new personas imagining what it would be like to be a dinosaur, a miner in a quarry or an astronaut on a space exploration." />
<meta name="keywords" content="free games, online games, building games, virtual worlds, free mmo, gaming cloud, physics engine" />

    
    

    <link rel="canonical" href="<?= $requestUrl ?>" />

            <link href="https://images.idk18.xyz/7aee41db80c1071f60377c3575a0ed87.ico" rel="icon" />
    


<link rel='stylesheet' href='https://static.idk18.xyz/css/MainCSS___58dd044044005dc0e887c80110c9a567_m.css/fetch' />
<link rel='stylesheet' href='https://static.idk18.xyz/css/page___7be1666722ff491378201a44663573d2_m.css/fetch' />
    

        <script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js'></script>
<script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-1.11.1.js'><\/script>")</script>
<script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/jquery.migrate/jquery-migrate-1.2.1.min.js'></script>
<script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-migrate-1.2.1.js'><\/script>")</script>
<script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/4.0/1/MicrosoftAjax.js'></script>
<script type='text/javascript'>window.Sys || document.write("<script type='text/javascript' src='/js/Microsoft/MicrosoftAjax.js'><\/script>")</script>


<?php require_once("../includes/googleanalytics.php"); ?>


    <script type='text/javascript' src='https://js.idk18.xyz/54b73269bcd426ec956755cb8cac7033.js'></script>

<?php require_once("../includes/eventstreaminit.php"); ?>



<script type="text/javascript">
    if (Roblox && Roblox.PageHeartbeatEvent) {
        Roblox.PageHeartbeatEvent.Init([2,8,20,60]);
    }
</script>    
<script type='text/javascript' src='https://js.idk18.xyz/42ffb266402d8366444aa39d4fc517b9.js'></script>

   <?php require_once("../includes/configPaths.php"); ?>
   
   <script type='text/javascript' src='https://js.idk18.xyz/custom_ReferenceGenericConf.js'></script>
   

    
<?php require_once("../includes/jsErrorTrackerInit.php"); ?>


<?php require_once("../includes/modals/upsellAdModal.php"); ?>
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
<?php require_once("../includes/robloxlinkify.php"); ?>
<div id="image-retry-data"
     data-image-retry-max-times="10"
     data-image-retry-timer="1500">
</div>
<div id="http-retry-data"
     data-http-retry-max-timeout="0"
     data-http-retry-base-timeout="0">
</div>
    

<script type="text/javascript">
        if (top.location != self.location) {
            top.location = self.location.href;
        }
</script>
  
<style type="text/css">
    
</style>
<form name="aspnetForm" method="post" action="/Badges.aspx" id="aspnetForm" class="nav-container no-gutter-ads">
<div>
<input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="" />
<input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="" />
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/kUDksbbh6SoDVShxLMJOeVa2uQFYYBJWh8KRvaVsn1sN+PbKUywb2mdaW7zjkAudAPo9LA3horrD3X+j5lxh0LN3/82h4Ce+1F6F1ZMq/Q0Kn8F8ZwoVxD3bXxdE4Q1mY+GJ449F7be2cR+3A2qMuLA3FR0fWgtqfXRk78J9WTl/ll2WSqNoONcX4ZLP4UKJU6Jioc3UufL4uyVfspKqBMnY7MvSfvjJHgwXuhOy0nhCmTMcvTvlWqvGneEQFI5isAFRA==" />
</div>

<script type="text/javascript">
//<![CDATA[
var theForm = document.forms['aspnetForm'];
if (!theForm) {
    theForm = document.aspnetForm;
}
function __doPostBack(eventTarget, eventArgument) {
    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
        theForm.__EVENTTARGET.value = eventTarget;
        theForm.__EVENTARGUMENT.value = eventArgument;
        theForm.submit();
    }
}
//]]>
</script>


<script src="https://ajax.aspnetcdn.com/ajax/4.5.1/1/WebForms.js" type="text/javascript"></script>
<script type="text/javascript">
//<![CDATA[
window.WebForm_PostBackOptions||document.write('<script type="text/javascript" src="/WebResource.axd?d=pynGkmcFUV13He1Qd6_TZH6GgOgBQtqMPCPjRUnhj_pzNesAXKuAdu2pj-Sq-3JDJIgwEw2&amp;t=635792847671809273"><\/script>');//]]>
</script>



<script src="https://ajax.aspnetcdn.com/ajax/4.5.1/1/MicrosoftAjax.js" type="text/javascript"></script>
<script type="text/javascript">
//<![CDATA[
(window.Sys && Sys._Application && Sys.Observer)||document.write('<script type="text/javascript" src="/ScriptResource.axd?d=uHIkleVeDJf4xS50Krz-yA3kt4iEPLwQOcXDJXuiLb543xmSxgoBWyWb-0CTRrqRXPsCyYHFJoMX6TPqspOUhmvwRxW7JGKByJCuSKPDJkedBK4vZ68d-hQEQYwPVMjKP6tsCULlkgnx_6P0HwSsu1ZPvc01&t=72e85ccd"><\/script>');//]]>
</script>

<script src="https://ajax.aspnetcdn.com/ajax/4.5.1/1/MicrosoftAjaxWebForms.js" type="text/javascript"></script>
<script type="text/javascript">
//<![CDATA[
(window.Sys && Sys.WebForms)||document.write('<script type="text/javascript" src="/ScriptResource.axd?d=Jw6tUGWnA15YEa3ai3FadCEDqusVaOyrhfy39auVd1FmNPcggz_w8ujNbCmSe3d-g1mfv3ai8xe7-2Ze2qr2BxMVxfFYswV1Y4rdnmWJF2uUrOEaDJiBEGKAzXrJcfxb_Yfc2xbZMZu9pLQP2d6b-KwvlK01&t=72e85ccd"><\/script>');//]]>
</script>

<script src="/ScriptResource.axd?d=j-TwZWlN9R-GEP1CDJVE8Gj6Fs4xHn1pYcm5eGFJrTKxmWrmIuc6cgXXrB8E0RiKpanXsjR9-tnV-SuTy0Q6bPSsCPS-_6gzjA0FkzIYlE7xruB4QQG3hwpExIsjxkmPrMhsqdtHNFvtcELMheFyU8Xy6P9ydm_67W4CYymb8FEagDiDdqC0Zb9G8J0yKs5l6xC75K500FeVBvs2Mc6Nv_2jvuw1" type="text/javascript"></script>
<div>

	<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="8D20B63A" />
</div>

<div id="fb-root"></div>
<script type="text/javascript">
//<![CDATA[
Sys.WebForms.PageRequestManager._initialize('ctl00$ScriptManager', 'aspnetForm', [], [], [], 90, 'ctl00');
//]]>
</script>


<?php require_once("../includes/header.php"); ?>

<script type="text/javascript">
    var Roblox = Roblox || {};
    (function() {
        if (Roblox && Roblox.Performance) {
            Roblox.Performance.setPerformanceMark("navigation_end");
        }
    })();
</script>

    <div id="navContent" class="nav-content">
        <div class="nav-content-inner">

   <script type="text/javascript">Roblox.FixedUI.gutterAdsEnabled=false;</script>

        

        <div id="Container">
            
            
        </div>

		
        
        <noscript><div class="alert-info"><h5>Please enable Javascript to use all the features on this site.</h5></div></noscript>
        
        
        
        
        
        
    <div id="AdvertisingLeaderboard">
        

<iframe name="Roblox_Item_Top_728x90" 
        allowtransparency="true"
        frameborder="0"
        height="110"
        scrolling="no"
        src="https://www.<?= $domain ?>/user-sponsorship/1"
        width="728"
        data-js-adtype="iframead"></iframe>

    </div>

        
        <div id="BodyWrapper">
            
            <div id="RepositionBody">
                <div id="Body" class="body-width">
                    
    <div id="BadgesContainer" class="text">
    <h1>Badges</h1>
        <div class="BadgeCategory">
            <h2 >Membership Badges</h2>
            <ul>
                    <li id="Badge18" class="divider-bottom">
                        <div class="BadgePadding">&nbsp;</div>
                        <div class="BadgeContent">
                            <div class="BadgeImage">
                                    <img src="https://images.idk18.xyz/6c2a598114231066a386fa716ac099c4.png" alt="Welcome To The Club" width="75" height="75" />
                            </div>
                            <div class="BadgeDescription">
                                <h3>Welcome To The Club Badge</h3>
                                <p class="notranslate">This badge is awarded to players who have ever belonged to the illustrious Builders Club. These players are part of a long tradition of ROBLOX greatness.</p>
                            </div>
                            <div style="clear:both"></div>
                        </div>
                    </li>
                    <li id="Badge11" class="divider-bottom">
                        <div class="BadgePadding">&nbsp;</div>
                        <div class="BadgeContent">
                            <div class="BadgeImage">
                                    <img src="https://images.idk18.xyz/3b3ab51727ad660e1569cb53e0b2d4a5.png" alt="Builders Club" width="75" height="75" />
                            </div>
                            <div class="BadgeDescription">
                                <h3>Builders Club Badge</h3>
                                <p class="notranslate">Members of the illustrious Builders Club display this badge proudly. The Builders Club is a paid premium service. Members receive several benefits: they get ten places on their account instead of one, they earn a daily income of 15 ROBUX, they can sell their creations to others in the ROBLOX Catalog, they get the ability to browse the web site without external ads, and they receive the exclusive Builders Club construction hat.</p>
                            </div>
                            <div style="clear:both"></div>
                        </div>
                    </li>
                    <li id="Badge15" class="divider-bottom">
                        <div class="BadgePadding">&nbsp;</div>
                        <div class="BadgeContent">
                            <div class="BadgeImage">
                                    <img src="https://images.idk18.xyz/61f5f43c05222fc2ce06b9983d4e1107.png" alt="Turbo Builders Club" width="75" height="75" />
                            </div>
                            <div class="BadgeDescription">
                                <h3>Turbo Builders Club Badge</h3>
                                <p class="notranslate">Members of the exclusive Turbo Builders Club are some of the most dedicated ROBLOXians. The Turbo Builders Club is a paid premium service. Members receive many of the benefits received in the regular Builders Club, in addition to a few more exclusive upgrades: they get twenty-five places on their account instead of ten from regular Builders Club, they earn a daily income of 35 ROBUX, they can sell their creations to others in the ROBLOX Catalog, they get the ability to browse the web site without external ads, they receive the exclusive Turbo Builders Club red site managers hat, and they receive an exclusive gear item.</p>
                            </div>
                            <div style="clear:both"></div>
                        </div>
                    </li>
                    <li id="Badge16" class="divider-bottom">
                        <div class="BadgePadding">&nbsp;</div>
                        <div class="BadgeContent">
                            <div class="BadgeImage">
                                    <img src="https://images.idk18.xyz/7df6357ab1eb2dcf5267d2c5184732ab.png" alt="Outrageous Builders Club" width="75" height="75" />
                            </div>
                            <div class="BadgeDescription">
                                <h3>Outrageous Builders Club Badge</h3>
                                <p class="notranslate">Members of Outrageous Builders Club are VIP ROBLOXians. They are the cream of the crop. The Outrageous Builders Club is a paid premium service. Members receive 100 places, 100 groups, 60 ROBUX per day, unlock the Outrageous website theme, and many other benefits.</p>
                            </div>
                            <div style="clear:both"></div>
                        </div>
                    </li>
            </ul>
        </div>
        <div class="BadgeCategory">
            <h2 >Community Badges</h2>
            <ul>
                    <li id="Badge1" class="divider-bottom">
                        <div class="BadgePadding">&nbsp;</div>
                        <div class="BadgeContent">
                            <div class="BadgeImage">
                                    <img src="https://images.idk18.xyz/def12ef9c8501334987a642eb11b7c91.png" alt="Administrator" width="75" height="75" />
                            </div>
                            <div class="BadgeDescription">
                                <h3>Administrator Badge</h3>
                                <p class="notranslate">This badge identifies an account as belonging to a Roblox administrator. Only official Roblox administrators will possess this badge. If someone claims to be an admin, but does not have this badge, they are potentially trying to mislead you. If this happens, please report abuse and we will delete the imposter&#39;s account.</p>
                            </div>
                            <div style="clear:both"></div>
                        </div>
                    </li>
                    <li id="Badge12" class="divider-bottom">
                        <div class="BadgePadding">&nbsp;</div>
                        <div class="BadgeContent">
                            <div class="BadgeImage">
                                    <img src="https://images.idk18.xyz/b7e6cabb5a1600d813f5843f37181fa3.png" alt="Veteran" width="75" height="75" />
                            </div>
                            <div class="BadgeDescription">
                                <h3>Veteran Badge</h3>
                                <p class="notranslate">This badge recognizes members who have played ROBLOX for one year or more. They are stalwart community members who have stuck with us over countless releases, and have helped shape ROBLOX into the game that it is today. These medalists are the true steel, the core of the Robloxian history ... and its future.</p>
                            </div>
                            <div style="clear:both"></div>
                        </div>
                    </li>
                    <li id="Badge2" class="divider-bottom">
                        <div class="BadgePadding">&nbsp;</div>
                        <div class="BadgeContent">
                            <div class="BadgeImage">
                                    <img src="https://images.idk18.xyz/5eb20917cf530583e2641c0e1f7ba95e.png" alt="Friendship" width="75" height="75" />
                            </div>
                            <div class="BadgeDescription">
                                <h3>Friendship Badge</h3>
                                <p class="notranslate">This badge is given to players who have embraced the Roblox community and have made at least 20 friends. People who have this badge are good people to know and can probably help you out if you are having trouble.</p>
                            </div>
                            <div style="clear:both"></div>
                        </div>
                    </li>
                    <li id="Badge14" class="divider-bottom">
                        <div class="BadgePadding">&nbsp;</div>
                        <div class="BadgeContent">
                            <div class="BadgeImage">
                                    <img src="https://images.idk18.xyz/b853909efc7fdcf590363d01f5894f09.png" alt="Ambassador" width="75" height="75" />
                            </div>
                            <div class="BadgeDescription">
                                <h3>Ambassador Badge</h3>
                                <p class="notranslate">This badge was awarded during the Ambassador Program, which ran from 2009 to 2012. It has been retired and is no longer attainable.</p>
                            </div>
                            <div style="clear:both"></div>
                        </div>
                    </li>
                    <li id="Badge8" class="divider-bottom">
                        <div class="BadgePadding">&nbsp;</div>
                        <div class="BadgeContent">
                            <div class="BadgeImage">
                                    <img src="https://images.idk18.xyz/01044aca1d917eb20bfbdc5e25af1294.png" alt="Inviter" width="75" height="75" />
                            </div>
                            <div class="BadgeDescription">
                                <h3>Inviter Badge</h3>
                                <p class="notranslate">This badge was awarded during the Inviter Program, which ran from 2009 to 2013. It has been retired and is no longer attainable.</p>
                            </div>
                            <div style="clear:both"></div>
                        </div>
                    </li>
            </ul>
        </div>
        <div class="BadgeCategory">
            <h2 >Developer Badges</h2>
            <ul>
                    <li id="Badge6" class="divider-bottom">
                        <div class="BadgePadding">&nbsp;</div>
                        <div class="BadgeContent">
                            <div class="BadgeImage">
                                    <img src="https://images.idk18.xyz/b66bc601e2256546c5dd6188fce7a8d1.png" alt="Homestead" width="75" height="75" />
                            </div>
                            <div class="BadgeDescription">
                                <h3>Homestead Badge</h3>
                                <p class="notranslate">The homestead badge is earned by having your personal place visited 100 times. Players who achieve this have demonstrated their ability to build cool things that other Robloxians were interested enough in to check out. Get a jump-start on earning this reward by inviting people to come visit your place.</p>
                            </div>
                            <div style="clear:both"></div>
                        </div>
                    </li>
                    <li id="Badge7" class="divider-bottom">
                        <div class="BadgePadding">&nbsp;</div>
                        <div class="BadgeContent">
                            <div class="BadgeImage">
                                    <img src="https://images.idk18.xyz/49f3d30f5c16a1c25ea0f97ea8ef150e.png" alt="Bricksmith" width="75" height="75" />
                            </div>
                            <div class="BadgeDescription">
                                <h3>Bricksmith Badge</h3>
                                <p class="notranslate">The Bricksmith badge is earned by having a popular personal place. Once your place has been visited 1000 times, you will receive this award. Robloxians with Bricksmith badges are accomplished builders who were able to create a place that people wanted to explore a thousand times. They no doubt know a thing or two about putting bricks together.</p>
                            </div>
                            <div style="clear:both"></div>
                        </div>
                    </li>
                    <li id="Badge17" class="divider-bottom">
                        <div class="BadgePadding">&nbsp;</div>
                        <div class="BadgeContent">
                            <div class="BadgeImage">
                                    <img src="https://images.idk18.xyz/45710972c9c8d556805f8bee89389648.png" alt="Official Model Maker" width="75" height="75" />
                            </div>
                            <div class="BadgeDescription">
                                <h3>Official Model Maker Badge</h3>
                                <p class="notranslate">This badge is awarded to players whose creations are so awesome, ROBLOX endorsed them. Owners of this badge probably have great scripting and building skills.</p>
                            </div>
                            <div style="clear:both"></div>
                        </div>
                    </li>
            </ul>
        </div>
        <div class="BadgeCategory">
            <h2 >Gamer Badges</h2>
            <ul>
                    <li id="Badge3" class="divider-bottom">
                        <div class="BadgePadding">&nbsp;</div>
                        <div class="BadgeContent">
                            <div class="BadgeImage">
                                    <img src="https://images.idk18.xyz/8d77254fc1e6d904fd3ded29dfca28cb.png" alt="Combat Initiation" width="75" height="75" />
                            </div>
                            <div class="BadgeDescription">
                                <h3>Combat Initiation Badge</h3>
                                <p class="notranslate">This badge was granted when a player scored 10 victories in games that use classic combat scripts. It was retired Summer 2015 and is no longer attainable.</p>
                            </div>
                            <div style="clear:both"></div>
                        </div>
                    </li>
                    <li id="Badge4" class="divider-bottom">
                        <div class="BadgePadding">&nbsp;</div>
                        <div class="BadgeContent">
                            <div class="BadgeImage">
                                    <img src="https://images.idk18.xyz/0a010c31a8b482731114810590553be3.png" alt="Warrior" width="75" height="75" />
                            </div>
                            <div class="BadgeDescription">
                                <h3>Warrior Badge</h3>
                                <p class="notranslate">This badge was granted when a player scored 100 or more victories in games that use classic combat scripts. It was retired Summer 2015 and is no longer attainable.</p>
                            </div>
                            <div style="clear:both"></div>
                        </div>
                    </li>
                    <li id="Badge5" class="divider-bottom">
                        <div class="BadgePadding">&nbsp;</div>
                        <div class="BadgeContent">
                            <div class="BadgeImage">
                                    <img src="https://images.idk18.xyz/139a7b3acfeb0b881b93a40134766048.png" alt="Bloxxer" width="75" height="75" />
                            </div>
                            <div class="BadgeDescription">
                                <h3>Bloxxer Badge</h3>
                                <p class="notranslate">This badge was granted when a player scored at least 250 victories, and fewer than 250 wipeouts, in games that use classic combat scripts. It was retired Summer 2015 and is no longer attainable.</p>
                            </div>
                            <div style="clear:both"></div>
                        </div>
                    </li>
            </ul>
        </div>
</div>

<script type="text/javascript">
    $(function () {
        function addHighlight(elem) {
            elem.addClass('selectedInitial');
            setTimeout(function () {
                elem.addClass("selectedFadeOut");
            }, 0);
        }

        // Has a hash, highlight that element
        if (window.location.hash.length !== 0) {
            var hash = window.location.hash.substr(1);

            $(".BadgeCategory li").each(function () {
                if (this.id === hash) {
                    addHighlight($(this).find(".BadgeContent"));
                    return false;
                }
            });
        }
    });
</script>

                    <div style="clear:both"></div>
                </div>
            </div>
        </div> 
        </div>

<?php require_once("../includes/footer.php"); ?>

 </div></div>


<?php require_once("../includes/placelauncher.php"); ?>

<?php require_once("../includes/modals/legacygenericconfirmationmodal.php"); ?>



<?php require_once("../includes/cookieupgrader.php"); ?>
</body>
</html>
