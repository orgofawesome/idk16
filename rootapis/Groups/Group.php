<?php

if ($userInfo["id"] !== 15)
	die(header("Location: https://www.$domain/home"));

$groupId = $_GET["gid"] ?? 0;

$stmt = $pdo->prepare("SELECT * FROM groups WHERE id = :groupId");
$stmt->bindParam(':groupId', $groupId, PDO::PARAM_INT);
$stmt->execute();

if ($stmt->rowCount() == 0)
	die(header("Location: https://www.$domain/request-error?code=400"));

$group = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT * FROM groupmembers WHERE groupId = :groupId");
$stmt->bindParam(':groupId', $groupId, PDO::PARAM_INT);
$stmt->execute();
$membercount = $stmt->rowCount();

$stmt = $pdo->prepare("SELECT * FROM grouproles WHERE groupId = :groupId ORDER BY groupRankId ASC");
$stmt->bindParam(':groupId', $groupId, PDO::PARAM_INT);
$stmt->execute();
$groupRoles = $stmt->fetchAll(PDO::FETCH_ASSOC);

$username = htmlspecialchars(UserAuthentication::lookupNameById($group["creatorId"]));

if (isset($_POST["page"])){
	die(require_once("GroupMembers.php"));
}
?>



<!DOCTYPE html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<!-- MachineID: WEB353 -->
<head id="ctl00_Head1"><title>
	<?= htmlspecialchars($group["name"]) ?> - ROBLOX
</title>

<link rel='stylesheet' href='https://static.idk18.xyz/css/MainCSS___58dd044044005dc0e887c80110c9a567_m.css/fetch' />

<link rel='stylesheet' href='https://static.idk18.xyz/css/page___600daafe241d1e853b9e96a24ba72cde_m.css/fetch' />

            <link href="https://images.idk18.xyz/7aee41db80c1071f60377c3575a0ed87.ico" rel="icon" />
        <link rel="icon" type="image/vnd.microsoft.icon" href="/favicon.ico" /><meta http-equiv="X-UA-Compatible" content="IE=edge,requiresActiveX=true" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="ROBLOX Corporation" />
<meta name="description" content="<?= htmlspecialchars($group["name"]) ?> is a group on ROBLOX owned by <?= $username ?> with <?= $membercount ?> members. <?= htmlspecialchars($group["description"]) ?>" />
<meta name="keywords" content="free games, online games, building games, virtual worlds, free mmo, gaming cloud, physics engine" />
<meta name="apple-itunes-app" content="app-id=431946152" />
<meta name="google-site-verification" content="KjufnQUaDv5nXJogvDMey4G-Kb7ceUVxTdzcMaP9pCY" />
    <meta property="og:site_name" content="ROBLOX" />
    <meta property="og:title" content="<?= htmlspecialchars($group["name"]) ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= $requestUrl ?>" />
    <meta property="og:description" content="<?= htmlspecialchars($group["name"]) ?> is a group on ROBLOX owned by <?= $username ?> with <?= $membercount ?> members. <?= htmlspecialchars($group["description"]) ?>"/>
    <meta property="og:image" content="" />
    <meta property="fb:app_id" content="190191627665278">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@ROBLOX">
    <meta name="twitter:title" content="<?= htmlspecialchars($group["name"]) ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($group["name"]) ?> is a group on ROBLOX owned by <?= $username ?> with <?= $membercount ?> members. <?= htmlspecialchars($group["description"]) ?>">
    <meta name="twitter:creator">
    <meta name=twitter:image1 content="" />
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
<script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js'></script>
<script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-1.11.1.js'><\/script>")</script>
<script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/jquery.migrate/jquery-migrate-1.2.1.min.js'></script>
<script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-migrate-1.2.1.js'><\/script>")</script>

 <?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/googleanalytics.php" ); ?>

<script type='text/javascript' src='https://js.idk18.xyz/37c8aab8fa1734925842c16675a6f7fd.js'></script>

<?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/eventstreaminit.php" ); ?>


<script type="text/javascript">
    if (Roblox && Roblox.PageHeartbeatEvent) {
        Roblox.PageHeartbeatEvent.Init([2,8,20,60]);
    }
</script>        <?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/configPaths.php"); ?><script type="text/javascript">
    $(function () {
        Roblox.JSErrorTracker.initialize({ 'suppressConsoleError': true});
    });
</script><script type='text/javascript' src='https://js.idk18.xyz/450b88c78d27e45b81c9e59189b8ec49.js'></script>


        <link rel="canonical" href="<?= $requestUrl ?>" />
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
    data-internal-page-name="GroupDetailsLegacy"
    data-send-event-percentage="0.01">
    <div id="roblox-linkify" data-enabled="true" data-regex="(https?\:\/\/)?(?:www\.)?([a-z0-9\-]{2,}\.)*(((m|de|www|web|api|blog|wiki|help|corp|polls|bloxcon|developer|devforum|forum)\.roblox\.com|robloxlabs\.com)|(www\.shoproblox\.com))((\/[A-Za-z0-9-+&amp;@#\/%?=~_|!:,.;]*)|(\b|\s))" data-regex-flags="gm" data-as-http-regex=""></div>
<div id="image-retry-data"
     data-image-retry-max-times="10"
     data-image-retry-timer="1500">
</div>
<div id="http-retry-data"
     data-http-retry-max-timeout="0"
     data-http-retry-base-timeout="0">
</div>
    <script type="text/javascript">Roblox.XsrfToken.setToken('FEV1GmM1QJXQ');</script>
 
    <script type="text/javascript">
        if (top.location != self.location) {
            top.location = self.location.href;
        }
    </script>
  
<style type="text/css">
    
</style>
<form name="aspnetForm" method="post" action="<?= $_SERVER["REQUEST_URI"] ?>" id="aspnetForm" class="nav-container no-gutter-ads">
<div>
<input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="" />
<input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="" />
<input type="hidden" name="__LASTFOCUS" id="__LASTFOCUS" value="" />
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="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" />
</div>

<script type="text/javascript">
//<![CDATA[
var theForm = document.forms['aspnetForm'];
if (!theForm) {
    theForm = document.aspnetForm;
}
function __doPostBack(eventTarget, eventArgument) {
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

<script src="/ScriptResource.axd?d=cIhd8jIoRKA_xNLU-QcGhf0aQ_SkgLzc8LbA9dmSQZ1lzRDbx9N3kIgQiLr4ouC9qM0xxGPZbMqfoiK5xtQJ0_jTsCLJaUB3nq2wSWQf8x79uthNSuFmAOP6fDoZAcB6DU-8l0Y_ut3oO7KOh1sgUGPGmKW8-c3LQgFqOhitqzCkuiXM-SJVtC-IMnTKWy-xXIEB-RW1HkDt4V1s9nzn7-INmcY1" type="text/javascript"></script>
<div>

	<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="3D1CCC47" />
	<input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="XtbjPXGm7hJaBHc9OK8NK53rvo1JWR48+oe7ktd2z8ThxlPQ3vVIk/ThnM2yWtyXe5TkH8Gj3SiSh778nOHfMJVBjoCyyCfHGUIn3Xk0Yx554wXjT782FyNgtFVBkH7HNlzHrorgdEaQE+d6BkZyukMy8c7DbCx2Dcrdho9oVaSIufUwUu8GDvG31W2OVI1YeCJHU3c6CpRMvHAnLFwxoiVhBxcMtus6gyAvSaHruXqI3PMB07S+NJqBIZvlErYVosYhz4//eYszbhDRoJx/gB5s05t2ygPY90A40rhpxFy9pHybAJRDWa0gYlq/q0NepFKlm+/XxoVx1fmuqqeSP9wBZHGJSKllCNL4mcTeGNkE5CPhWbZ1yTwKU7WKsZbmfjfz8LuoVwInKneIOlYVjcx0Hj5L8W7SYN5qJ+t6hHnhkgC87YOk+i9q/Mg9i+dYPxExg8E4iz1R688cuWssXveXJ5H0ZTHyqwvsPnRmyzaFupeyE03RYf8Pqjby8mlaNhl18ysVcwhpzBaMCOcDqyHY3cie/+sDHMcaGnaCjRMDjrhkvaQDytrSizQj424B8smW5hr5MiYGJ9KzOhbf6Wo6r5+GvZkFaqlrKYcvou2XdsNvKGDdhXqk2++LUWyTIKrJrP1PLAkRMKCXSfLSV7wTWiI=" />
</div>
    <div id="fb-root">
    </div>
    <script type="text/javascript">
//<![CDATA[
Sys.WebForms.PageRequestManager._initialize('ctl00$ScriptManager', 'aspnetForm', ['tctl00$cphRoblox$rbxGroupRoleSetMembersPane$GroupMembersUpdatePanel','','tctl00$cphRoblox$rbxGroupAlliesPane$RelationshipsUpdatePanel',''], ['ctl00$cphRoblox$rbxGroupRoleSetMembersPane$dlUsers_Footer',''], [], 90, 'ctl00');
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


        <div id="navContent" class="nav-content logged-out"><div class="nav-content-inner">
    <div id="MasterContainer" >
        

<?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/eventmanager.php"); ?>
    



        <script type="text/javascript">Roblox.FixedUI.gutterAdsEnabled=false;</script>

        

        <div id="Container">
            
            
        </div>

		
        
        <noscript><div class="alert-info"><h5>Please enable Javascript to use all the features on this site.</h5></div></noscript>
        
        
        
        
        
        
            <div id="AdvertisingLeaderboard">
                

<iframe name="Roblox_Default_Top_728x90" 
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
                    
    <style type="text/css">
        #Body {
            padding: 10px;
            width: 970px;
        }
    </style>
    <div class="MyRobloxContainer">
        <div id="mid-column" class="GroupsPage">
            
<div id="SearchControls">
    
    <div class="content">
        <input name="ctl00$cphRoblox$GroupSearchBar$SearchKeyword" type="text" id="ctl00_cphRoblox_GroupSearchBar_SearchKeyword" onclick="if(this.value == &#39;Search all groups&#39;){ this.value = &#39;&#39;};$(this).removeClass(&#39;default&#39;);" class="SearchKeyword default translate" maxlength="100" value="Search all groups" />
        <!--<select name="ctl00$cphRoblox$GroupSearchBar$SearchFiltersDropdown2" id="ctl00_cphRoblox_GroupSearchBar_SearchFiltersDropdown2">

</select>-->
        <input type="submit" name="ctl00$cphRoblox$GroupSearchBar$SearchButton" value="Search" onclick="javascript:if ($get(SearchKeywordText).value == &#39;&#39; || $get(SearchKeywordText).value == &#39;Search all groups&#39;) return false;" id="ctl00_cphRoblox_GroupSearchBar_SearchButton" class="group-search-button translate" />
        <input type="text" style="visibility: hidden; position: absolute">
        <!-- Enter key submission hack - IE -->
    </div>
</div>

<script type="text/javascript">
    var SearchKeywordText = 'ctl00_cphRoblox_GroupSearchBar_SearchKeyword';       
</script>


            <div id="description">
                <div class="GroupPanelContainer">
                    <div class="left-col">
                        <div class="GroupThumbnail">
                            <a id="ctl00_cphRoblox_GroupDescriptionEmblem" title="<?= htmlspecialchars($group["name"]) ?>" onclick="__doPostBack(&#39;ctl00$cphRoblox$GroupDescriptionEmblem&#39;,&#39;&#39;)" style="display:inline-block;cursor:pointer;"><img src="<?= ThumbnailService::requestAssetThumbnail( $group["iconImageAssetId"], 150, 150, 1) ?>" height="150" width="150" border="0" alt="<?= htmlspecialchars($group["name"]) ?>" /></a>
                        </div>
                        <script type="text/javascript">
                            (function() {
                                $("#ctl00_cphRoblox_GroupDescriptionEmblem img").on('load', function () {
                                    if (Roblox && Roblox.Performance) {
                                        Roblox.Performance.setPerformanceMark("group_image");
                                    }
                                });
                            })();
                        </script>
                        <div class="GroupOwner">
                            <div id="ctl00_cphRoblox_OwnershipPanel">
	Owned By:<br />
                                <a style="font-style: italic;" href="https://www.<?= $domain ?>/users/<?= $group["creatorId"] ?>/profile" onclick=""><?= $username ?></a>
</div>
                            <div id="MemberCount">Members: <?= $membercount ?></div>
                            
                        </div>
                        <div id="ctl00_cphRoblox_JoinGroup" class="btn-neutral btn-large" OnClick="__doPostBack(&#39;JoinGroupDiv&#39;, &#39;Click&#39;);" style="margin-top: 10px;">
	Join Group
</div>
                        
                        <div>
                            
                        </div>
                        
                    </div>
                    <div class="right-col">
                        <h2 class="notranslate"><?= htmlspecialchars($group["name"]) ?></h2>
                        <div id="GroupDescP" class="linkify">
                            <pre class="notranslate"><?= htmlspecialchars($group["description"]) ?></pre>
                        </div>
                        <div id="ctl00_cphRoblox_AbuseReportButton_AbuseReportPanel" class="ReportAbuse">
	
    <span class="AbuseIcon"><a id="ctl00_cphRoblox_AbuseReportButton_ReportAbuseIconHyperLink" href="https://www.<?= $domain ?>/abusereport/group?id=<?= $group["id"] ?>&amp;RedirectUrl=<?= urlencode("https" . "://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]) ?>"><img src="https://static.idk18.xyz/images/abuse.png" alt="Report Abuse" style="border-width:0px;" /></a></span>
    <span class="AbuseButton"><a id="ctl00_cphRoblox_AbuseReportButton_ReportAbuseTextHyperLink" href="https://www.<?= $domain ?>/abusereport/group?id=<?= $group["id"] ?>&amp;RedirectUrl=<?= urlencode("https" . "://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]) ?>">Report Abuse</a></span>

</div>
                        <br />
                        
                        
                    </div>
                    <div style="clear: both;"></div>
                </div>

                <div id="GroupsPeopleContainer">
                    <div>
                    
                        <div id="GroupsPeople_Members" class="tab active">Members</div>
                        <div id="GroupsPeople_Allies" class="tab">Allies</div>
                        <div id="GroupsPeople_Enemies" class="tab">Enemies</div>
                        <div id="GroupsPeople_Items" class="tab">Store</div>
                        <div style="clear: both;"></div>
                    </div>
                    <div id="GroupsPeople_Pane">
                        
                        <div id="GroupsPeoplePane_Members" class="tab-content" style="display: block">
                            
<script>
function changePage(customPage = 0, ){
	var page = (customPage !== 0) ? customPage : document.getElementById('ctl00_cphRoblox_rbxGroupRoleSetMembersPane_dlUsers_Footer_ctl01_PageTextBox').value;
	var currentRole = document.getElementById('ctl00_cphRoblox_rbxGroupRoleSetMembersPane_currentRoleSetID').value;
	var changedRole = document.getElementById('ctl00_cphRoblox_rbxGroupRoleSetMembersPane_dlRolesetList').value; 
	
    $.ajax({
        url: '<?= $_SERVER["REQUEST_URI"] ?>', 
        type: 'POST',
        data: {
            page: page,
			current_role: currentRole,
			changed_role: changedRole
        },
        success: function(response) {
            $('#GroupRoleSetsMembersPane').html(response);
        },
        error: function() {
        }
	});
}
</script>


<div id="GroupRoleSetsMembersPane" >
    <?php require_once("GroupMembers.php"); ?>
</div>

                        </div>
                        <div id="GroupsPeoplePane_Allies" class="tab-content">

                        </div>
                        <div id="GroupsPeoplePane_Enemies" class="tab-content">
                            
                        </div>
                        <div id="GroupsPeoplePane_Items" class="tab-content">
                            
<div id="GroupItemPaneInstructions">
    <p>Groups have the ability to create and sell official shirts, pants, and t-shirts! All revenue goes to group funds.</p>
    
</div>
<div id="GroupItemContent">
    <div id="GroupItemPaneContent"></div>
    <div style="clear:both;text-align: center;padding-top:25px;">
        <a href="https://www.<?= $domain ?>/catalog/browse.aspx?CatalogContext=1&IncludeNotForSale=false&SortType=3&CreatorID=<?= $group["creatorId"] ?>">See more items for sale by this group</a>
        
    </div>
</div>
<script type="text/javascript">
    
    $(function () {
        var url = '/catalog/html?CreatorId=<?= $group["creatorId"] ?>&ResultsPerPage=3&IncludeNotForSale=false&SortType=3&' + new Date().getTime();
     $.ajax({
            method: "GET",
            url: url,
            crossDomain: true,
            xhrFields: {
                withCredentials: true
            }
        }).done(function (data) {
            if (data.indexOf("CatalogItem") == -1) {
                $('#GroupItemPaneContent').html('<p>This group has no items.</p>');
                return;
            }
            $('#GroupItemPaneContent').html(data);
            Roblox.require('Widgets.ItemImage', function (itemImage) {
                itemImage.populate();
            });
        }, "text");
        });
    
</script>
                        </div>
                    </div>
                </div>

                

<script type="text/javascript">
    Roblox.ExileModal.InitializeGlobalVars(7885720, 1196433);
</script>



            </div>
        </div>
        <div id="right-column">
            
            <div id="Div2" style="height: 600px">
                

<iframe name="Roblox_Default_Right_160x600" 
        allowtransparency="true"
        frameborder="0"
        height="612"
        scrolling="no"
        src="https://www.<?= $domain ?>/user-sponsorship/2"
        width="160"
        data-js-adtype="iframead"></iframe>

            </div>
        </div>
        <div style="clear: both;"></div>
        <script type="text/javascript">
            if (typeof Roblox === "undefined") {
                Roblox = {};
            }
            if (typeof Roblox.Resources === "undefined") {
                Roblox.Resources = {};
            }
            Roblox.Resources.more = "More";
            Roblox.Resources.less = "Less";
        </script>
    </div>

                    <div style="clear:both"></div>
                </div>
            </div>
        </div> 
        </div>
        
            
<?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"); ?>




        
        </div></div>
    </div>
    
        <script type="text/javascript">
            function urchinTracker() { };
            GoogleAnalyticsReplaceUrchinWithGAJS = true;
        </script>
    
    <?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/placelauncher.php"); ?>


<?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/modals/upsellAdModal.php"); ?>


<?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/modals/legacygenericconfirmationmodal.php"); ?>

    
        <script>
            $(function () {
                Roblox.DeveloperConsoleWarning.showWarning();
            });
        </script>
    

<?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/cookieupgrader.php"); ?>


</body>                
</html>
