<?php
$pageName = "FulfillConstraint";
?>
<!DOCTYPE html>
<html id="www-roblox-com">
<!-- MachineID: <?= $webServerName ?> -->
<head><title>
	Site Offline
</title><meta http-equiv="X-UA-Compatible" content="IE=edge,requiresActiveX=true" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="ROBLOX Corporation" />
<meta name="description" content="ROBLOX is powered by a growing community of over 300,000 creators who produce an infinite variety of highly immersive experiences. These experiences range from 3D multiplayer games and competitions, to interactive adventures where friends can take on new personas imagining what it would be like to be a dinosaur, a miner in a quarry or an astronaut on a space exploration." />
<meta name="keywords" content="free games, online games, building games, virtual worlds, free mmo, gaming cloud, physics engine" />
<meta name="apple-itunes-app" content="app-id=431946152" />
<meta name="google-site-verification" content="KjufnQUaDv5nXJogvDMey4G-Kb7ceUVxTdzcMaP9pCY" />

<link rel='stylesheet' href='https://static.idk18.xyz/css/MainCSS___58dd044044005dc0e887c80110c9a567_m.css/fetch' />

<link rel='stylesheet' href='https://static.idk18.xyz/css/page___416f6a87bd8555a184393b67d573ff07_m.css/fetch' />

        <link href="https://images.idk18.xyz/7aee41db80c1071f60377c3575a0ed87.ico" rel="icon" />
    
    <link rel="canonical" href="<?= $requestUrl ?>" />
    <script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js'></script>
<script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-1.11.1.js'><\/script>")</script>
<script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/jquery.migrate/jquery-migrate-1.2.1.min.js'></script>
<script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-migrate-1.2.1.js'><\/script>")</script>

    <?php require_once("../includes/googleanalytics.php"); ?>
<script type='text/javascript' src='https://js.idk18.xyz/0c76b6335f007581efc1e7446d528283.js'></script>
        <?php require_once("../includes/eventstreaminit.php"); ?>


<script type="text/javascript">
    if (Roblox && Roblox.PageHeartbeatEvent) {
        Roblox.PageHeartbeatEvent.Init([2,8,20,60]);
    }
</script><?php require_once("../includes/jsErrorTrackerInit.php"); ?>
<script type="text/javascript">
if (typeof(Roblox) === "undefined") { Roblox = {}; }
Roblox.Endpoints = Roblox.Endpoints || {};
Roblox.Endpoints.Urls = Roblox.Endpoints.Urls || {};
Roblox.Endpoints.Urls['/api/item.ashx'] = 'http://www.<?= $domain ?>/api/item.ashx';
Roblox.Endpoints.Urls['/asset/'] = 'http://assetgame.<?= $domain ?>/asset/';
Roblox.Endpoints.Urls['/client-status/set'] = 'http://www.<?= $domain ?>/client-status/set';
Roblox.Endpoints.Urls['/client-status'] = 'http://www.<?= $domain ?>/client-status';
Roblox.Endpoints.Urls['/game/'] = 'http://assetgame.<?= $domain ?>/game/';
Roblox.Endpoints.Urls['/game-auth/getauthticket'] = 'https://www.<?= $domain ?>/game-auth/getauthticket';
Roblox.Endpoints.Urls['/game/edit.ashx'] = 'http://assetgame.<?= $domain ?>/game/edit.ashx';
Roblox.Endpoints.Urls['/game/getauthticket'] = 'http://assetgame.<?= $domain ?>/game/getauthticket';
Roblox.Endpoints.Urls['/game/placelauncher.ashx'] = 'http://assetgame.<?= $domain ?>/game/placelauncher.ashx';
Roblox.Endpoints.Urls['/game/preloader'] = 'http://assetgame.<?= $domain ?>/game/preloader';
Roblox.Endpoints.Urls['/game/report-stats'] = 'http://assetgame.<?= $domain ?>/game/report-stats';
Roblox.Endpoints.Urls['/game/report-event'] = 'http://assetgame.<?= $domain ?>/game/report-event';
Roblox.Endpoints.Urls['/game/updateprerollcount'] = 'http://assetgame.<?= $domain ?>/game/updateprerollcount';
Roblox.Endpoints.Urls['/login/default.aspx'] = 'https://www.<?= $domain ?>/login/default.aspx';
Roblox.Endpoints.Urls['/my/character.aspx'] = 'https://www.<?= $domain ?>/my/character.aspx';
Roblox.Endpoints.Urls['/my/money.aspx'] = 'https://www.<?= $domain ?>/my/money.aspx';
Roblox.Endpoints.Urls['/chat/chat'] = 'https://www.<?= $domain ?>/chat/chat';
Roblox.Endpoints.Urls['/presence/users'] = 'http://www.<?= $domain ?>/presence/users';
Roblox.Endpoints.Urls['/presence/user'] = 'http://www.<?= $domain ?>/presence/user';
Roblox.Endpoints.Urls['/friends/list'] = 'http://www.<?= $domain ?>/friends/list';
Roblox.Endpoints.Urls['/navigation/getCount'] = 'http://www.<?= $domain ?>/navigation/getCount';
Roblox.Endpoints.Urls['/catalog/browse.aspx'] = 'https://www.<?= $domain ?>/catalog/browse.aspx';
Roblox.Endpoints.Urls['/catalog/html'] = 'https://search.<?= $domain ?>/catalog/html';
Roblox.Endpoints.Urls['/catalog/json'] = 'http://search.<?= $domain ?>/catalog/json';
Roblox.Endpoints.Urls['/catalog/contents'] = 'https://search.<?= $domain ?>/catalog/contents';
Roblox.Endpoints.Urls['/catalog/lists.aspx'] = 'https://search.<?= $domain ?>/catalog/lists.aspx';
Roblox.Endpoints.Urls['/asset-hash-thumbnail/image'] = 'http://assetgame.<?= $domain ?>/asset-hash-thumbnail/image';
Roblox.Endpoints.Urls['/asset-hash-thumbnail/json'] = 'http://assetgame.<?= $domain ?>/asset-hash-thumbnail/json';
Roblox.Endpoints.Urls['/asset-thumbnail-3d/json'] = 'http://assetgame.<?= $domain ?>/asset-thumbnail-3d/json';
Roblox.Endpoints.Urls['/asset-thumbnail/image'] = 'http://assetgame.<?= $domain ?>/asset-thumbnail/image';
Roblox.Endpoints.Urls['/asset-thumbnail/json'] = 'http://assetgame.<?= $domain ?>/asset-thumbnail/json';
Roblox.Endpoints.Urls['/asset-thumbnail/url'] = 'http://assetgame.<?= $domain ?>/asset-thumbnail/url';
Roblox.Endpoints.Urls['/asset/request-thumbnail-fix'] = 'http://assetgame.<?= $domain ?>/asset/request-thumbnail-fix';
Roblox.Endpoints.Urls['/avatar-thumbnail-3d/json'] = 'http://www.<?= $domain ?>/avatar-thumbnail-3d/json';
Roblox.Endpoints.Urls['/avatar-thumbnail/image'] = 'http://www.<?= $domain ?>/avatar-thumbnail/image';
Roblox.Endpoints.Urls['/avatar-thumbnail/json'] = 'http://www.<?= $domain ?>/avatar-thumbnail/json';
Roblox.Endpoints.Urls['/avatar-thumbnails'] = 'http://www.<?= $domain ?>/avatar-thumbnails';
Roblox.Endpoints.Urls['/avatar/request-thumbnail-fix'] = 'https://www.<?= $domain ?>/avatar/request-thumbnail-fix';
Roblox.Endpoints.Urls['/bust-thumbnail/json'] = 'https://www.<?= $domain ?>/bust-thumbnail/json';
Roblox.Endpoints.Urls['/group-thumbnails'] = 'https://www.<?= $domain ?>/group-thumbnails';
Roblox.Endpoints.Urls['/groups/getprimarygroupinfo.ashx'] = 'https://www.<?= $domain ?>/groups/getprimarygroupinfo.ashx';
Roblox.Endpoints.Urls['/headshot-thumbnail/json'] = 'https://www.<?= $domain ?>/headshot-thumbnail/json';
Roblox.Endpoints.Urls['/item-thumbnails'] = 'https://www.<?= $domain ?>/item-thumbnails';
Roblox.Endpoints.Urls['/outfit-thumbnail/json'] = 'https://www.<?= $domain ?>/outfit-thumbnail/json';
Roblox.Endpoints.Urls['/place-thumbnails'] = 'https://www.<?= $domain ?>/place-thumbnails';
Roblox.Endpoints.Urls['/thumbnail/asset/'] = 'https://www.<?= $domain ?>/thumbnail/asset/';
Roblox.Endpoints.Urls['/thumbnail/avatar-headshot'] = 'http://www.<?= $domain ?>/thumbnail/avatar-headshot';
Roblox.Endpoints.Urls['/thumbnail/avatar-headshots'] = 'http://www.<?= $domain ?>/thumbnail/avatar-headshots';
Roblox.Endpoints.Urls['/thumbnail/user-avatar'] = 'https://www.<?= $domain ?>/thumbnail/user-avatar';
Roblox.Endpoints.Urls['/thumbnail/resolve-hash'] = 'https://www.<?= $domain ?>/thumbnail/resolve-hash';
Roblox.Endpoints.Urls['/thumbnail/place'] = 'http://www.<?= $domain ?>/thumbnail/place';
Roblox.Endpoints.Urls['/thumbnail/get-asset-media'] = 'https://www.<?= $domain ?>/thumbnail/get-asset-media';
Roblox.Endpoints.Urls['/thumbnail/remove-asset-media'] = 'https://www.<?= $domain ?>/thumbnail/remove-asset-media';
Roblox.Endpoints.Urls['/thumbnail/set-asset-media-sort-order'] = 'https://www.<?= $domain ?>/thumbnail/set-asset-media-sort-order';
Roblox.Endpoints.Urls['/thumbnail/place-thumbnails'] = 'http://www.<?= $domain ?>/thumbnail/place-thumbnails';
Roblox.Endpoints.Urls['/thumbnail/place-thumbnails-partial'] = 'http://www.<?= $domain ?>/thumbnail/place-thumbnails-partial';
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

	<script type="text/javascript">
	    $(function () {
	        $('.tooltip').tipsy();
	        $('.tooltip-top').tipsy({ gravity: 's' });
	        $('.tooltip-right').tipsy({ gravity: 'w' });
	        $('.tooltip-left').tipsy({ gravity: 'e' });
	        $('.tooltip-bottom').tipsy({ gravity: 'n' });
	        $('.tooltip-right-html').tipsy({ gravity: 'w', html: true, delayOut: 1000 });
	        $('.tooltip-left-html').tipsy({ gravity: 'e', html: true, delayOut: 1000 });
	    });
    </script>
</head>
<body class=" cookie-constraint-body">
<?php require_once( $_SERVER['DOCUMENT_ROOT'] . "/includes/robloxlinkify.php"); ?>
<form name="aspnetForm" method="post" action="<?= urlencode($requestUrl) ?>" id="aspnetForm" class="nav-container no-gutter-ads">
<div>
<input type="hidden" name="__LASTFOCUS" id="__LASTFOCUS" value="" />
<input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="" />
<input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="" />
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="PdBhCebjgkZB+sCLqqT+UICBw1lxLmdYiHyVIxL5O2JHP3Hh5vgJWcgrI/49AeofmEwlYuPBXby9qoTiKwJkYECAY+Eb+ePNz3it/BHJvGEUWSKeg8kI9IGtEVZZvcM2JXCYI2KlZUZXz3pdcdbNZOLeWt2LoNunfKubwo6FAMUqsLsEcGsN34MtaxbN5fDv7io0w5KiFRD2WszN25DMjS8ToYroRN6wFPLsJZdgAbnybsTn9euNqidyY4+A3LXiH7GyQ8DxvdmMuhnfJJGd7/7GyNfF82uKttgYeachLSE81PtyG+QmV1hzEeI+55MS1Y1MULzBcpYk5Je/ayBmxJITPqbi+6TT6WY3SQE8m6xgqW8tIESrWvmHkev/OKIxTJZ2mcNJuv4e63vX1xl8ixEb00k=" />
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
window.WebForm_PostBackOptions||document.write('<script type="text/javascript" src="/WebResource.axd?d=pynGkmcFUV13He1Qd6_TZH6GgOgBQtqMPCPjRUnhj_pzNesAXKuAdu2pj-Sq-3JDJIgwEw2&amp;t=635589219571259667"><\/script>');//]]>
</script>



<script src="https://ajax.aspnetcdn.com/ajax/4.5.1/1/MicrosoftAjax.js" type="text/javascript"></script>
<script type="text/javascript">
//<![CDATA[
(window.Sys && Sys._Application && Sys.Observer)||document.write('<script type="text/javascript" src="/ScriptResource.axd?d=uHIkleVeDJf4xS50Krz-yA3kt4iEPLwQOcXDJXuiLb543xmSxgoBWyWb-0CTRrqRXPsCyYHFJoMX6TPqspOUhmvwRxW7JGKByJCuSKPDJkedBK4vZ68d-hQEQYwPVMjKP6tsCULlkgnx_6P0HwSsu1ZPvc01&t=ffffffff805766b3"><\/script>');//]]>
</script>

<script src="https://ajax.aspnetcdn.com/ajax/4.5.1/1/MicrosoftAjaxWebForms.js" type="text/javascript"></script>
<script type="text/javascript">
//<![CDATA[
(window.Sys && Sys.WebForms)||document.write('<script type="text/javascript" src="/ScriptResource.axd?d=Jw6tUGWnA15YEa3ai3FadCEDqusVaOyrhfy39auVd1FmNPcggz_w8ujNbCmSe3d-g1mfv3ai8xe7-2Ze2qr2BxMVxfFYswV1Y4rdnmWJF2uUrOEaDJiBEGKAzXrJcfxb_Yfc2xbZMZu9pLQP2d6b-KwvlK01&t=ffffffff805766b3"><\/script>');//]]>
</script>

<script src="https://ajax.aspnetcdn.com/ajax/4.5.1/1/Focus.js" type="text/javascript"></script>
<div>

	<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="15E92DB9" />
	<input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="3Wgs+Y6s8wklpkIP2kzqlYV2Kp6cgZxBf/dO2O24++G24KelC01QQh3Cr4C/nDAKndKyug8sCosR4wycp1lYVmv/fkgV+7iQi54/CdjHYk5kl47TSwjzYlADEuy5MgCcUPf2Nv9xC2iZQFYOYttW6A4kL+hLytFRfYcYx1TzRW2WbD+mL7/vgFBi+9MogcbiwrJUiHCCSozbJPJMUEcxiTdwgFnlECoJ6MGUB6Nf/s4Zpbj3" />
</div>
        <script type="text/javascript">
//<![CDATA[
Sys.WebForms.PageRequestManager._initialize('ctl00$ScriptManager', 'aspnetForm', [], [], [], 90, 'ctl00');
//]]>
</script>

    
    
        <div id="navContent" class="nav-content">
        <div class="nav-content-inner">

    <div id="Container">
        <div style="clear: both"></div>
        
        <div id="Body" class="simple-body">
            
    <div class="header">
        <img id="imgRobloxTeam" src="https://images.idk18.xyz/3a6c1b7385d6bf02a4e9b59e5091462c.jpg"  alt="Roblox Offline" />
    </div>
    <div id="cookie-constraint-container" class="content" data-refresh-rate="60000" data-count-down-utc-time="10/13/2015 6:00:00 AM">
        <p id="offlineTxt" class="notification">
            The site is currently offline for maintenance and upgrades. <br/>Please check back soon!
        </p>
        <div class="cookie-constraint-form">
            <input name="ctl00$cphRoblox$Textbox1" type="password" id="ctl00_cphRoblox_Textbox1" class="cookie-constraint-input" />
            <input type="submit" name="ctl00$cphRoblox$Button1" value="R" id="ctl00_cphRoblox_Button1" class="cookie-constraint-btn" />
            <input type="submit" name="ctl00$cphRoblox$Button2" value="O" id="ctl00_cphRoblox_Button2" class="cookie-constraint-btn" />
            <input type="submit" name="ctl00$cphRoblox$Button3" value="B" id="ctl00_cphRoblox_Button3" class="cookie-constraint-btn" />
            <input type="submit" name="ctl00$cphRoblox$Button4" value="L" id="ctl00_cphRoblox_Button4" class="cookie-constraint-btn" />
            <input type="submit" name="ctl00$cphRoblox$Button5" value="O" id="ctl00_cphRoblox_Button5" class="cookie-constraint-btn" />
            <input type="submit" name="ctl00$cphRoblox$Button6" value="X" id="ctl00_cphRoblox_Button6" class="cookie-constraint-btn" />
        </div>
        <div id="countDown" class="count-down">
            <h1>Down time: </h1>
            <h1 id="timer" class="timer"></h1>
        </div>

    </div>

        </div>
        
    </div>
        </div></div>
      

<?php require_once("../includes/modals/legacygenericconfirmationmodal.php"); ?>
    

<?php require_once("../includes/modals/upsellAdModal.php"); ?>
        <script type="text/javascript">
            function urchinTracker() { };
            GoogleAnalyticsReplaceUrchinWithGAJS = true;
        </script>
    

    
<?php require_once("../includes/eventmanager.php"); ?>


<script type="text/javascript">
//<![CDATA[
WebForm_AutoFocus('ctl00_cphRoblox_Textbox1');//]]>
</script>
</form>
</body>
</html>
