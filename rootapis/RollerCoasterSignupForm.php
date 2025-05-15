<?php
$pageName = "RollerCoaster";
?>
<!DOCTYPE html>
<!--[if IE 8]><html class="ie8" ng-app="robloxApp"><![endif]-->
<!--[if gt IE 8]><!-->
<html>
<!--<![endif]-->
<head>
    <!-- MachineID: <?= $webServerName ?> -->
    <title><?= $domain ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,requiresActiveX=true" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="ROBLOX Corporation" />
<meta name="description" content="ROBLOX is powered by a growing community of over 300,000 creators who produce an infinite variety of highly immersive experiences. These experiences range from 3D multiplayer games and competitions, to interactive adventures where friends can take on new personas imagining what it would be like to be a dinosaur, a miner in a quarry or an astronaut on a space exploration." />
<meta name="keywords" content="free games, online games, building games, virtual worlds, free mmo, gaming cloud, physics engine" />
    <meta property="og:site_name" content="ROBLOX" />
    <meta property="og:title" content="ROBLOX" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= $requestUrl ?>" />
    <meta property="og:description" content="ROBLOX is powered by a growing community of over 300,000 creators who produce an infinite variety of highly immersive experiences. These experiences range from 3D multiplayer games and competitions, to interactive adventures where friends can take on new personas imagining what it would be like to be a dinosaur, a miner in a quarry or an astronaut on a space exploration."/>
    <meta property="og:image" content="https://images.idk18.xyz/fb70fd2b56107a0d43f2f98658885702.jpg" />



        <link href="https://images.idk18.xyz/7aee41db80c1071f60377c3575a0ed87.ico" rel="icon" />
                <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600" rel="stylesheet" type="text/css">

    <link rel="canonical" href="<?= $requestUrl ?>" />
    
    
<link rel='stylesheet' href='https://static.idk18.xyz/css/leanbase___1dcd1e0de30c586ac1ff4e343528e881_m.css/fetch' />            
<link rel='stylesheet' href='https://static.idk18.xyz/css/page___7a8c9c78f95c59dfd147a65d6a5c1b34_m.css/fetch' />

    
    
    
    <script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js'></script>
<script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-1.11.1.js'><\/script>")</script>
<script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/jquery.migrate/jquery-migrate-1.2.1.min.js'></script>
<script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-migrate-1.2.1.js'><\/script>")</script>


    
    <script type='text/javascript' src='https://js.idk18.xyz/86411e39f51e0ef39c7fa2f1f92fe7b3.js'></script>


    
    


    
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
<?php 
require_once("../includes/googleanalytics.php"); 
require_once("../includes/eventstreaminit.php");

?>


        



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
      data-internal-page-name="RollerCoaster"
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

    

<style type="text/css">
    .coverSprite {
        background-repeat: no-repeat;
        background-image: url('https://images.idk18.xyz/20e7d1543d2c5caf201184d86530fc35.png');
    }

    #RollerContainer {
        background-image: url('https://images.idk18.xyz/dcbdfaf1c08058e71f65c09f7b98ff04.jpg');
        background-repeat: no-repeat;
        background-size: cover;
    }

    .special-dropdown select {
        border: 0 !important;
        -webkit-appearance: none;
        -moz-appearance: none;
        background: url('https://images.idk18.xyz/379f4f1018f31cbb62ef52a22d9f2118.png') no-repeat;
        background-position: 92% 40%;
        width: 100px;
        text-indent: 0.01px;
        text-overflow: "";
    }
    #InnerWhatsRobloxContainer1 {
        height: 70%;
        background-image: url('https://images.idk18.xyz/cca69eca62f23ca413fc920549e936ea.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: 30% center;
        color: white;
    }
    #GameImage1 {
        background-image: url('https://images.idk18.xyz/42268b6264d89827401ef912f174f288.jpg');
        margin-right: 5px;
    }

    #GameImage2 {
        background-image: url('https://images.idk18.xyz/04baeb33ef66ef1395cd5464309fece6.jpg');
        margin-right: 5px;
    }

    #GameImage3 {
        background-image: url('https://images.idk18.xyz/e8b89d14690203420d64b5b2fda0b461.jpg');
        margin-right: -10px;
        width: calc(33.333333% - 10px);
    }
</style>
<div class="navbar navbar-landing navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="row">
            <div class="navbar-header col-md-6">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#LandingNavbar">
                    Log In
                </button>
                <div class="navbar-brand hidden-xs">
                    <img alt="Roblox Logo" class="robloxLogo" src="https://images.idk18.xyz/e870a0b9bcd987fbe7f730c8002f8faa.png" />
                </div>
                <ul id="TopLeftNavLinks" class="nav navbar-nav">
                    <li id="PlayLink" class="pull-left"><a href="#RollerContainer" onclick="return scrollTo(1, '#RollerContainer');">Play</a></li>
                    <li id="AboutLink" class="pull-left"><a href="#WhatsRobloxContainer" onclick="return scrollTo(2, '#WhatsRobloxContainer');">About</a></li>
                    <li id="PlatformLink" class="pull-left"><a href="#RobloxDeviceText" onclick="return scrollTo(3, '#RobloxDeviceText');">Platforms</a></li>
                    <li id="magic-line"></li>
                </ul>
            </div>
            

<div class="collapse navbar-collapse col-sm-6" id="LandingNavbar" ng-modules="roblox.formEvents" >
    <form name="loginForm" action="https://www.<?= $domain ?>/newlogin" id="LogInForm" class="navbar-form form-inline navbar-right" method="post" role="form" rbx-form-context context="RollerCoaster" novalidate>
        <div class="form-group" id="LoginUsernameParent">
            <input id="LoginUsername" type="text" placeholder="Username" class="form-control" name="username" rbx-form-interaction />
        </div>
        <div class="form-group" id="LoginPasswordParent">
            <input id="LoginPassword" type="password" placeholder="Password" class="form-control" name="password" rbx-form-interaction />
        </div>
        <div class="form-group">
            <input type="submit" id="LoginButton" class="form-control" value="Log In" rbx-form-interaction name="submitLogin" />
        </div>
        <a id="HeaderForgotPassword" class="navbar-link" href="https://www.<?= $domain ?>/Login/ResetPasswordRequest.aspx">Forgot Username/Password?</a>
        <input id="ReturnUrl" name="ReturnUrl" type="hidden" value="" />
    </form>
</div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <!-- Roller Coaster-->
    <section class="row full-height-section" id="RollerContainer">
        <div class="col-md-12 inner-full-height-section" id="InnerRollerContainer">
            <div id="MainCenterContainer" class="row">
                <div class="col-xs-12 col-md-6">
                    <div id="MainLogo" class="text-right">
                        <div id="LogoAndSlogan" class="text-center">
                            <img id="MainLogoImage" title="ROBLOX" class="center-block img-responsive" src="https://images.idk18.xyz/39ae3ca577c8488487ef492031b8e264.png" />
                            <div class="clearfix"></div>
                                <h1>Powering Imagination<span> &#8482 </span></h1>
                        </div>
                    </div>
                </div>

                

<!-- Modal -->
<div id="BootstrapConfirmationModal" data-modal-handle="bootstrap-confirmation" class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" id="roblox-close-btn" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                <div class="ImageContainer roblox-item-image" data-image-size="small" data-no-overlays data-no-click>
                    <img class="GenericModalImage" alt="generic image" />
                </div>
                <p class="modal-body-text"></p>
                <p id="roblox-captcha-error" class="text-center text-danger"></p>
            </div>
            <div class="modal-footer">
                <button type="button" id="roblox-decline-btn" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="roblox-confirm-btn" class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<script type="text/javascript">
    Roblox = Roblox || {};
    Roblox.Resources = Roblox.Resources || {};

    //<sl:translate>
    Roblox.Resources.GenericConfirmation = {
        yes: "Yes",
        No: "No",
        Confirm: "Confirm",
        Cancel: "Cancel"
    };
    //</sl:translate>
</script>

                <div class="clearfix visible-sm"></div>
                <div class="col-xs-12 col-md-6">
                    <div id="SignUpFormContainer"
                         data-return-url="<?php if (isset($_GET["returnurl"])) echo $_GET["returnurl"]; ?>">
                        
    <div class=""
         data-parent-url="" data-is-from-studio="false"
         data-is-facebook-button-shown="false">
        <div class="rbx-login-partial-legacy">
                <h3 class="text-center signup-header">
                    Sign up and start having fun!
                </h3>
                <h3 class="text-center login-header" style="display: none;">
                    Log in and start having fun!
                </h3>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


<style type="text/css">
    .male {
        background-image: url('https://images.idk18.xyz/856241927a2ac609e3033feada3ef9f9.png');
        background-repeat: no-repeat;
    }
    .female {
        background-image: url('https://images.idk18.xyz/a0afd0556163477e1023c5aa55d1b9f6.png');
        background-repeat: no-repeat;
    }
</style>

<div class="signup-or-log-in new-username-pwd-rule" ng-modules="SignupOrLogin" ng-controller="SignupOrLoginController"
     data-metadata-params="{&quot;isEligibleForHideAdsAbTest&quot;:&quot;True&quot;}"
     data-v2-username-password-rules-enabled="1"
     data-is-login-default-section="false">

    

    <div class="signup-container" ng-controller="SignupController" >
	<?php if (!UserAuthentication::isEligibleForAccount())
			echo '<b>You are not allowed to make (more) accounts as per your verification status. If you would like to create an account, contact management team.</b>';
		else require_once("../includes/registrationForm.php");
	?>
    </div>
</div>



        </div>
    </div>
         

                    </div>
                </div>
            </div>

        </div>
        <div class="attribution hidden-xs">
            <span class="notranslate">Game: ROBLOX Point</span><br>
            Developer: <span class="notranslate">StarMarine614</span>
        </div>
    </section>

    <!-- What is Roblox -->
    <section class="row full-height-section" id="WhatsRobloxContainer">

        <div class="col-md-12 inner-full-height-section">

            <div class="row" id="InnerWhatsRobloxContainer1">
                <div id="WhatIsRobloxTextBg" class="col-sm-5 col-sm-offset-6 col-xs-8 col-xs-offset-2">
                    <h1 class="text-center">WHAT IS ROBLOX?</h1>
                    <p class="lead text-justify">
                        ROBLOX is the best place to Imagine with Friends™. With the largest user-generated online gaming platform, and over 15 million games created by users, ROBLOX is the #1 gaming site for kids and teens (comScore). Every day, virtual explorers come to ROBLOX to create adventures, play games, role play, and learn with their friends in a family-friendly, immersive, 3D environment.
                    </p>
                </div>
            </div>

            <div class="row" id="InnerWhatsRobloxContainer2">
                <div id="GameImage1" class="col-sm-4 col-xs-12 game-image"></div>
                <div id="GameImage2" class="hidden-xs col-sm-4 game-image"></div>
                <div id="GameImage3" class="col-sm-4 hidden-xs game-image"></div>
            </div>

        </div>
    </section>
    <div class="clearfix"></div>

    <!-- Roblox on your device -->
    <section id="DeviceSection">
        <div class="row" id="RobloxDeviceText">
            <div class="col-md-6 col-md-offset-3 text-center">
                <h2>ROBLOX ON YOUR DEVICE</h2>
                <p class="lead center-block">
                    You can access ROBLOX on PC, Mac, iOS, Android, Amazon Devices, and Xbox One. ROBLOX adventures are accessible from any device, so players can imagine with their friends regardless of where they are.
                </p>
            </div>
        </div>

        <div class="row" id="DeviceImageContainer">
            <div class="col-md-12">
                <div class="row text-center">
                    <img id="ComputerImgSmall" class="center-block img-responsive hidden-lg ComputerImg" src="https://images.idk18.xyz/0ad1ae4bf929fb82cad6f30fdf03b6db.png" />
                    <img class="center-block img-responsive visible-lg-block ComputerImg" src="https://images.idk18.xyz/9edeef823842e76479587a57c05cb5bc.png" />
                </div>
            </div>
        </div>
        <ul id="AppStoreContainer" class="row text-center app-store-container row-five">
            <li>
                <a href="https://itunes.apple.com/us/app/roblox-mobile/id431946152" target="_blank" class="app-store-link-apple">
                    <img class="app-store-logo" src="https://images.idk18.xyz/9819a104fc46fb90d183387ba81065a0.png" title="ROBLOX on App Store" />
                </a>
            </li>
            <li>    
                <a href="https://play.google.com/store/apps/details?id=com.roblox.client&hl=en&utm_source=global_co&utm_medium=prtnr&utm_content=Mar2515&utm_campaign=PartBadge&pcampaignid=MKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1" target="_blank" class="app-store-link-android">
                    <img class="app-store-logo android" src="https://images.idk18.xyz/c3f1d2562c735775d7fa2fc3ddb0dfdd.png" title="Get it on Google Play" alt="Get it on Google Play"/>
                </a>
            </li>
            <li>
                <a href="http://amzn.com/B00NUF4YOA" target="_blank" class="app-store-link-amazon">
                    <img class="app-store-logo" src="https://images.idk18.xyz/29d56f5d7a8c1d6d4a267b28134e221d.png" title="ROBLOX on Amazon Store" />
                </a>
            </li>
            <li>
                <a href="http://store.xbox.com/en-US/Xbox-One/Games/ROBLOX/c79323fd-00f8-462a-a97a-39a0eb61791e" target="_blank" class="app-store-link-xbox">
                    <img class="app-store-logo" src="https://images.idk18.xyz/cfbff08ccdfe3e51898dfecf5635dc2a.png" title="ROBLOX on Xbox Store" />
                </a>
            </li>
                <li>
                    <a href="https://www.microsoft.com/en-us/store/games/roblox/9nblgggzm6wm" target="_blank" class="app-store-link-windows10">
                        <img class="app-store-logo" src="https://images.idk18.xyz/6e6e44a25ac2fc28a678880c2fec24a9.png" title="ROBLOX on Windows Store" />
                    </a>

                </li>
        </ul>
    </section>


<footer class="container-footer">
    <div class="footer">
        <ul class="row footer-links">
                <li class="col-4 col-xs-1 footer-link">
                    <a href="http://corp.<?= $domain ?>" class="text-footer-nav roblox-interstitial" target="_blank">
                        About Us
                    </a>
                </li>
                <li class="col-4 col-xs-1 footer-link">
                    <a href="http://corp.<?= $domain ?>/jobs" class="text-footer-nav roblox-interstitial" target="_blank">
                        Jobs
                    </a>
                </li>
            <li class="col-4 col-xs-1 footer-link">
                <a href="http://blog.<?= $domain ?>" class="text-footer-nav" target="_blank">
                    Blog
                </a>
            </li>
            <li class="col-4 col-xs-1 footer-link">
                <a href="http://corp.<?= $domain ?>/parents" class="text-footer-nav roblox-interstitial" target="_blank">
                    Parents
                </a>
            </li>
            <li class="col-4 col-xs-1 footer-link">
                <a href="http://en.help.<?= $domain ?>/" class="text-footer-nav roblox-interstitial" target="_blank">
                    Help
                </a>
            </li>
            <li class="col-4 col-xs-1 footer-link">
                <a href="https://www.<?= $domain ?>/Info/terms-of-service" class="text-footer-nav" target="_blank">
                    Terms
                </a>
            </li>
            <li class="col-4 col-xs-1 footer-link">
                <a href="https://www.<?= $domain ?>/Info/Privacy.aspx" class="text-footer-nav privacy" target="_blank">
                    Privacy
                </a>
            </li>
        </ul>
        <!-- NOTE: "ROBLOX Corporation" is a healthcheck; be careful when updating! -->
        <p class="text-footer footer-note">
            ©2016 ROBLOX Corporation
                <br />
                <span class="footer-kid-safe-logo">


<a href="//www.kidsafeseal.com/certifiedproducts/roblox.html" target="_blank">
    <img border="0" 
         width="130"
         height="50"
         alt="<?= $domain ?> (under-13 user experience) is certified by the kidSAFE Seal Program." 
         src="https://www.kidsafeseal.com/sealimage/20308902961041304386/roblox_medium_darktm.png">
</a>
                </span>
        </p>
    </div>
</footer>

</div>
 

<img src="/timg/rbx" style="position: absolute"/>


<?php require_once("../includes/applicationInfo.php"); ?>


    
    <script type='text/javascript' src='https://js.idk18.xyz/6df9bc0534efbd8f409e764c1c275374.js'></script>


    
<script type='text/javascript' src='https://js.idk18.xyz/3b0c540bca77f11051d6358184298348.js'></script>
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
                        

    
<?php require_once("../includes/configPaths.php");


require_once("../getXrsfToken.php"); 
require_once("../includes/devConsoleWarning.php");
require_once("../includes/jsErrorTrackerInit.php");
require_once("../includes/eventmanager.php");

require_once("../includes/modals/upsellAdModal.php"); 
?>
    
    <script type='text/javascript' src='https://js.idk18.xyz/f0b07e9a299b010e3b2bdc2d5fa3f7b1.js'></script>
</body>
</html>