<?php
$pageName = "ideWelcome";
?>
<!DOCTYPE html>

<html>
<head>
    <title>Start Page</title>
    <script type='text/javascript' src='//static.idk18.xyz/js/jquery-1.11.1.min.js'></script>
<script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-1.11.1.js'><\/script>")</script>
<script type='text/javascript' src='//static.idk18.xyz/js/jquery-migrate-1.2.1.min.js'></script>
<script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-migrate-1.2.1.js'><\/script>")</script>
<script type='text/javascript' src='//static.idk18.xyz/js/MicrosoftAjax.js'></script>
<script type='text/javascript'>window.Sys || document.write("<script type='text/javascript' src='/js/Microsoft/MicrosoftAjax.js'><\/script>")</script>

    
<link rel='stylesheet' href='https://static.idk18.xyz/css/page___1f1bf1b7bd1bd43baefcf4f55c33bd51_m.css/fetch' />

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


    <script type='text/javascript' src='https://js.idk18.xyz/180999c528c0c58ad608e5834294cd42.js'></script>

	<?php require_once( $_SERVER['DOCUMENT_ROOT'] . "/includes/configPaths.php"); ?>
	<script type="text/javascript">
            function editTemplateInStudio(play_placeId) { RobloxLaunch._GoogleAnalyticsCallback = function() { var isInsideRobloxIDE = 'website'; if (Roblox && Roblox.Client && Roblox.Client.isIDE && Roblox.Client.isIDE()) { isInsideRobloxIDE = 'Studio'; };GoogleAnalyticsEvents.FireEvent(['Plugin Location', 'Launch Attempt', isInsideRobloxIDE]);GoogleAnalyticsEvents.FireEvent(['Plugin', 'Launch Attempt', 'Edit']);EventTracker.fireEvent('GameLaunchAttempt_Unknown', 'GameLaunchAttempt_Unknown_Plugin'); if (typeof Roblox.GamePlayEvents != 'undefined') { Roblox.GamePlayEvents.SendClientStartAttempt(null, play_placeId); }  };  Roblox.Client.WaitForRoblox(function() { RobloxLaunch.StartGame('https://assetgame.<?= $domain ?>/Game/edit.ashx?PlaceID='+play_placeId+'&upload=', 'edit.ashx', 'https://www.<?= $domain ?>/Login/Negotiate.ashx', 'FETCH', true); }); }
        </script>
</head>
<body id="StudioWelcomeBody">
    <div class="header">
	<?php if (!$isUserAuthenticated): ?>
            <div id="header-login-wrapper" class="iframe-login-signup" data-display-opened="">
                <a href="https://www.<?= $domain ?>/" target="_blank" class="btn-control btn-control-large translate" id="studio-header-signup"><span>Sign Up</span></a>
                <span id="header-or">or</span>
                <span class="studioiFrameLogin">
                    <span id="login-span">
                        <a id="header-login" class="btn-control btn-control-large">Login <span class="grey-arrow">▼</span></a>
                    </span>

                    <div id="iFrameLogin" class="studioiFrameLogin" style="display: none">
                            <iframe id="iframe-login" class="login-frame" name="iframe-login" data-delaysrc="https://www.<?= $domain ?>/Login/iFrameLogin.aspx?loginRedirect=True&amp;parentUrl=http%3a%2f%2fwww.<?= $domain ?>%2fide%2fwelcome" scrolling="no" frameborder="0"></iframe>
                    </div>
                </span>
            </div>
	<?php else: ?>
			<div id="header-login-wrapper" class="iframe-login-signup" data-display-opened="">
                Logged in as <?= htmlspecialchars( $userInfo['name'] ) ?>
                <span id="header-or"></span>
                <span class="studioiFrameLogin">
                    <span id="login-span">
                        <a id="header-login" class="btn-control btn-control-large"><b>Logout</b></span></a>
                    </span>
                </span>
            </div>
	<?php endif; ?>
        <!-- This is only after the login stuff because IE7 demands floated elements be before non-floated -->
            <img src="https://images.idk18.xyz/63c8081b4b083e1b75685aef06cdfa77.png" alt="Roblox Studio Title" />
        <p id="HomeLink">
            <a class="text-link" href="https://www.<?= $domain ?>/develop">Switch to Classic View</a>
        </p>
    </div>
    <div class="container">
        <div class="navbar">
            <ul class="navlist" style="border-bottom: none;">
                <li id="NewProject" data-toggle="TemplatesView"><p>New Project</p></li>
                <li id="GamesToggle" data-toggle="GamesView"><p>Games</p></li>
                    <li id="MyProjects" data-toggle="MyProjectsView"><p>My Projects</p></li>
                            </ul>

        </div>
        <div class="main">
            <div id="TemplatesView" class="welcome-content-area">

<h2 id="StudioGameTemplates">GAME TEMPLATES</h2>
            <div class="templatetypes">
                <ul class="templatetypes">
                        <li data-templatetype="All"><a href="#All">All</a></li>
                        <li data-templatetype="Theme"><a href="#Theme">Theme</a></li>
                        <li data-templatetype="Gameplay"><a href="#Gameplay">Gameplay</a></li>
                </ul>
                <!--div class="tool-tip">
                    <img alt="Recommended for users new to ROBLOX studio" src="/images/IDE/img-tail-top.png" class="top" />
                    <p>Recommended for users new to ROBLOX studio</p>
                    <a class="closeButton"></a>
                </div -->
            </div>
            
                <div class="templates" data-templatetype="All">
				<?php
				/*
                        <div class="template" placeid="95206881">
                            <a href="" class="game-image" ><img  class='' src='https://t4.rbxcdn.com/437e5a1ef10e12231e8dd92f3d5423a1' /></a>
                            <p>Baseplate</p>
                        </div>
                        <div class="template" placeid="95206192">
                            <a href="" class="game-image" ><img  class='' src='https://t0.rbxcdn.com/84782e12ef917af4c3b6c67385a0294a' /></a>
                            <p>Flat Terrain</p>
                        </div>
                        <div class="template" placeid="520390648">
                            <a href="" class="game-image" ><img  class='' src='https://t0.rbxcdn.com/3ae7aad89f4596cfa2157d74f9bde747' /></a>
                            <p>Village</p>
                        </div>
                        <div class="template" placeid="203810088">
                            <a href="" class="game-image" ><img  class='' src='https://t4.rbxcdn.com/89b06ab46d4db3120df84b81e4587b14' /></a>
                            <p>Castle</p>
                        </div>
                        <div class="template" placeid="366130569">
                            <a href="" class="game-image" ><img  class='' src='https://t4.rbxcdn.com/afd2a8622948d55c53ee0194b6e8ca35' /></a>
                            <p>Suburban</p>
                        </div>
                        <div class="template" placeid="215383192">
                            <a href="" class="game-image" ><img  class='' src='https://t7.rbxcdn.com/3ef8c3cc1fb06a9afe8064a61db97f56' /></a>
                            <p>Racing</p>
                        </div>
                        <div class="template" placeid="264719325">
                            <a href="" class="game-image" ><img  class='' src='https://t5.rbxcdn.com/0bb4461b2a053bbb4fc37675d6e91dc1' /></a>
                            <p>Pirate Island</p>
                        </div>
                        <div class="template" placeid="366120910">
                            <a href="" class="game-image" ><img  class='' src='https://t7.rbxcdn.com/32a8003137fea846bbe541664dd9aec9' /></a>
                            <p>Western</p>
                        </div>
                        <div class="template" placeid="203783329">
                            <a href="" class="game-image" ><img  class='' src='https://t0.rbxcdn.com/e4864dd5b7e4824f346ea872ffd350eb' /></a>
                            <p>City</p>
                        </div>
                        <div class="template" placeid="203812057">
                            <a href="" class="game-image" ><img  class='' src='https://t1.rbxcdn.com/75af252c9f36755d98db3296e7e08750' /></a>
                            <p>Obby</p>
                        </div>
                        <div class="template" placeid="379736082">
                            <a href="" class="game-image" ><img  class='' src='https://t2.rbxcdn.com/ff35071bf429ec022e33587dcc20feb0' /></a>
                            <p>Starting Place</p>
                        </div>
                        <div class="template" placeid="301530843">
                            <a href="" class="game-image" ><img  class='' src='https://t3.rbxcdn.com/3c5e97a9e7e25de299ac713e6d429c6c' /></a>
                            <p>Line Runner</p>
                        </div>
                        <div class="template" placeid="264715997">
                            <a href="" class="game-image" ><img  class='' src='https://t2.rbxcdn.com/245ad7724f4f1a688efac0dea30086fe' /></a>
                            <p>Infinite Runner</p>
                        </div>
                        <div class="template" placeid="92721754">
                            <a href="" class="game-image" ><img  class='' src='https://t6.rbxcdn.com/cc6dd833e23a1ea730eda2476b40cbe6' /></a>
                            <p>Capture The Flag</p>
                        </div>
                        <div class="template" placeid="301529772">
                            <a href="" class="game-image" ><img  class='' src='https://t1.rbxcdn.com/f2169bb0b3db528714b32dc785e6456d' /></a>
                            <p>Team/FFA Arena</p>
                        </div>
                        <div class="template" placeid="203885589">
                            <a href="" class="game-image" ><img  class='' src='https://t6.rbxcdn.com/455d0f9e82e94c171181c2412c219376' /></a>
                            <p>Shooter</p>
                        </div>
						*/
						?>
                </div>
                <div class="templates" data-templatetype="Theme">
				<?php /*
                        <div class="template" placeid="520390648">
                            <a href="" class="game-image" ><img  class='' src='https://t0.rbxcdn.com/3ae7aad89f4596cfa2157d74f9bde747' /></a>
                            <p>Village</p>
                        </div>
                        <div class="template" placeid="203810088">
                            <a href="" class="game-image" ><img  class='' src='https://t4.rbxcdn.com/89b06ab46d4db3120df84b81e4587b14' /></a>
                            <p>Castle</p>
                        </div>
                        <div class="template" placeid="366130569">
                            <a href="" class="game-image" ><img  class='' src='https://t4.rbxcdn.com/afd2a8622948d55c53ee0194b6e8ca35' /></a>
                            <p>Suburban</p>
                        </div>
                        <div class="template" placeid="264719325">
                            <a href="" class="game-image" ><img  class='' src='https://t5.rbxcdn.com/0bb4461b2a053bbb4fc37675d6e91dc1' /></a>
                            <p>Pirate Island</p>
                        </div>
                        <div class="template" placeid="366120910">
                            <a href="" class="game-image" ><img  class='' src='https://t7.rbxcdn.com/32a8003137fea846bbe541664dd9aec9' /></a>
                            <p>Western</p>
                        </div>
                        <div class="template" placeid="203783329">
                            <a href="" class="game-image" ><img  class='' src='https://t0.rbxcdn.com/e4864dd5b7e4824f346ea872ffd350eb' /></a>
                            <p>City</p>
                        </div>
                        <div class="template" placeid="379736082">
                            <a href="" class="game-image" ><img  class='' src='https://t2.rbxcdn.com/ff35071bf429ec022e33587dcc20feb0' /></a>
                            <p>Starting Place</p>
                        </div>
						*/ ?>
                </div>
                <div class="templates" data-templatetype="Gameplay">
				<?php /*
                        <div class="template" placeid="215383192">
                            <a href="" class="game-image" ><img  class='' src='https://t7.rbxcdn.com/3ef8c3cc1fb06a9afe8064a61db97f56' /></a>
                            <p>Racing</p>
                        </div>
                        <div class="template" placeid="203812057">
                            <a href="" class="game-image" ><img  class='' src='https://t1.rbxcdn.com/75af252c9f36755d98db3296e7e08750' /></a>
                            <p>Obby</p>
                        </div>
                        <div class="template" placeid="301530843">
                            <a href="" class="game-image" ><img  class='' src='https://t3.rbxcdn.com/3c5e97a9e7e25de299ac713e6d429c6c' /></a>
                            <p>Line Runner</p>
                        </div>
                        <div class="template" placeid="264715997">
                            <a href="" class="game-image" ><img  class='' src='https://t2.rbxcdn.com/245ad7724f4f1a688efac0dea30086fe' /></a>
                            <p>Infinite Runner</p>
                        </div>
                        <div class="template" placeid="92721754">
                            <a href="" class="game-image" ><img  class='' src='https://t6.rbxcdn.com/cc6dd833e23a1ea730eda2476b40cbe6' /></a>
                            <p>Capture The Flag</p>
                        </div>
                        <div class="template" placeid="301529772">
                            <a href="" class="game-image" ><img  class='' src='https://t1.rbxcdn.com/f2169bb0b3db528714b32dc785e6456d' /></a>
                            <p>Team/FFA Arena</p>
                        </div>
                        <div class="template" placeid="203885589">
                            <a href="" class="game-image" ><img  class='' src='https://t6.rbxcdn.com/455d0f9e82e94c171181c2412c219376' /></a>
                            <p>Shooter</p>
                        </div>
						*/ ?>
                </div>

            </div>
            <div id="MyProjectsView" class="welcome-content-area" style="display: none">
                <div>
                        <h2>My Places</h2>
                    <div id="assetList" class="tab-active">

     
    <div>
        <?php if (!$isUserAuthenticated): ?>
        <span>You must be logged in to view your published projects!</span>
        <?php else: ?>
        <?php 
        $stmt = $pdo->prepare("SELECT * FROM assets WHERE assetTypeId = 9 AND creatorId = :userId AND creatorType = 1");
        $stmt->bindValue(":userId", $userInfo['id']);
        $stmt->execute();

        if ($stmt->rowCount() == 0){
            echo 'You do not have any place.';
        }else{
            foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $game){
                echo '<div class="template" placeid="', $game["assetId"], '">
                <a href="" class="game-image" ><img  class="" src="', ThumbnailService::requestAssetThumbnail( $game['assetId'], 420, 420, 1) ,'" /></a>
                <p>' . htmlspecialchars($game["assetName"]) . '</p>
            </div>';
            }   
        }
        ?>
        <?php endif; ?>
    </div>
    <script type="text/javascript">
        $('#MyProjects').click(function() {
            $('#header-login').addClass('active');
            $('#iFrameLogin').css('display', 'block');
        });
    </script>

                    </div>
                </div>
            </div>
            <div id="GamesView" class="welcome-content-area" style="display: none">
                <div>
                        <h2>My Games</h2>
                    <div id="universeList" class="tab-active">


    <div>
        <span>You must be logged in to view your published projects!</span>
    </div>
    <script type="text/javascript">
        $('#MyProjects').click(function () {
            $('#header-login').addClass('active');
            $('#iFrameLogin').css('display', 'block');
        });
    </script>

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
                    <img class="GenericModalImage" alt="generic image" />
                </div>
                <div class="Message"></div>
            </div>
            <div class="clear"></div>
            <div id="GenericModalButtonContainer" class="GenericModalButtonContainer">
                <a class="ImageButton btn-neutral btn-large roblox-ok">OK</a>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            if (typeof Roblox.IDEWelcome === "undefined")
                Roblox.IDEWelcome = {};

            Roblox.IDEWelcome.Resources = {
                //<sl:translate>
                openProject: "Open Project",
                openProjectText: "To open your project, open to this page in ",
                robloxStudio: "ROBLOX Studio",
                editPlace: "Edit Place",
                toEdit: "To edit ",
                openPage: ", open to this page in ",
                placeInactive: "Place Inactive",
                activate: ", activate this place by going to File->My Published Projects.",
                emailVerifiedTitle: "Verify Your Email",
                emailVerifiedMessage: "You must verify your email before you can work on your place. You can verify your email on the <a href='https://www.<?= $domain ?>/my/account?confirmemail=1'>Account</a> page.",
                verify: "Verify",
                OK: "OK"
                //</sl:translate>
            };
        });
    </script>
    

<?php require_once( $_SERVER['DOCUMENT_ROOT'] . "/includes/legacyGenericConfirmationModal.php"); ?>


    <script type="text/javascript">function urchinTracker() {}</script>

</body>
</html>
