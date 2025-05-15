<?php 
if (!$userLookup->doesUserExist($vars["user_id"])){
    die(header("Location: https://www.$domain/request-error?code=404"));
}

$username = UserAuthentication::lookupNameById($vars["user_id"]);
?>
<!DOCTYPE html>
<!--[if IE 8]><html class="ie8" ng-app="robloxApp"><![endif]-->
<!--[if gt IE 8]><!-->
<html>
<!--<![endif]-->
<head>
    <!-- MachineID: <?= $webServerName ?> -->
    <title>Friends - ROBLOX</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,requiresActiveX=true" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="ROBLOX Corporation" />
<meta name="description" content="ROBLOX is powered by a growing community of over 300,000 creators who produce an infinite variety of highly immersive experiences. These experiences range from 3D multiplayer games and competitions, to interactive adventures where friends can take on new personas imagining what it would be like to be a dinosaur, a miner in a quarry or an astronaut on a space exploration." />
<meta name="keywords" content="free games, online games, building games, virtual worlds, free mmo, gaming cloud, physics engine" />
<meta name="apple-itunes-app" content="app-id=431946152" />
<meta name="google-site-verification" content="KjufnQUaDv5nXJogvDMey4G-Kb7ceUVxTdzcMaP9pCY" />


        <link href="https://images.idk18.xyz/7aee41db80c1071f60377c3575a0ed87.ico" rel="icon" />
                <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600" rel="stylesheet" type="text/css">

    <link rel="canonical" href="<?= $requestUrl ?>" />
    
    
    <link rel='stylesheet' href='https://static.idk18.xyz/css/leanbase___9b9fc145916d65f94e610d1f02775894_m.css/fetch' />

            
<link rel='stylesheet' href='https://static.idk18.xyz/css/page___60f9a6d2069a06a25ebd1082e30d53cf_m.css/fetch' />

    
    
    
    <script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js'></script>
<script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-1.11.1.js'><\/script>")</script>
<script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/jquery.migrate/jquery-migrate-1.2.1.min.js'></script>
<script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-migrate-1.2.1.js'><\/script>")</script>


    
    <script type='text/javascript' src='https://js.idk18.xyz/86411e39f51e0ef39c7fa2f1f92fe7b3.js'></script>


    
    
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>

        <?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/adshelper.php"); ?><script type="text/javascript">
    $(function () {
        Roblox.JSErrorTracker.initialize({ 'suppressConsoleError': true});
    });
</script>   

    </script>



    
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/googleanalytics.php"); ?>


    <?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/eventstreaminit.php"); ?>



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
      data-internal-page-name="Friends"
      data-send-event-percentage="0.01">
      <?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/robloxlinkify.php"); ?>
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


     <?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/header.php"); ?>

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

                                    

<script type="text/javascript">
    Roblox.uiBootstrap = {};
    Roblox.uiBootstrap = {
        tooltipPopupTemplateLink: "/viewapp/common/template/tooltip/tooltip-popup.html",
        tooltipHtmlUnsafePopupTemplateLink: "/viewapp/common/template/tooltip/tooltip-html-unsafe-popup.html"
    };
    Roblox.FriendsTemplates = {
        CardMenuTemplateLink: "friend-card-menu"
    }
</script>


<div id="state-properties"
     data-userid="<?= $vars["user_id"] ?>"
     data-loggedinuserid="<?php if ($isUserAuthenticated) echo $userInfo["id"]; else echo '0'; ?>"
     data-removefriendurl="/api/friends/removefriend"
     data-acceptfriendurl="/api/friends/acceptfriendrequest"
     data-declinefriendurl="/api/friends/declinefriendrequest"
     data-declineallfriendsurl="/api/friends/declineallfriendrequests"
     data-followurl="/user/follow"
     data-unfollowurl="/api/user/unfollow"
     data-unfriendurl="/api/friends/removefriend"
     data-isfriendshiprealtimeupdateenabled=true
     data-username="<?= htmlspecialchars($username) ?>"></div>


<div class="row page-content" ng-modules="robloxApp, ui.bootstrap, friends, robloxApp.helpers" ng-cloak ng-controller="friendsController">
    <h1 ng-show="currentData.isMyProfile" class="friends-title">My Friends</h1>
    <h1 ng-hide="currentData.isMyProfile" class="friends-title">{{ currentData.userName }}'s Friends</h1>
    <div class="rbx-tabs-horizontal">
        <ul id="horizontal-tabs" class="nav nav-tabs" role="tablist">
            <li id="friends" class="rbx-tab" ng-class="{'active': currentData.activeTab == 'friends', 'subtract-item': !currentData.isMyProfile}" ui-sref="friends">
                <a class="rbx-tab-heading">
                    <span class="text-lead">Friends</span>
                </a>
            </li>
            <li id="following" class="rbx-tab" ng-class="{'active': currentData.activeTab == 'following', 'subtract-item': !currentData.isMyProfile}" ui-sref="following">
                <a class="rbx-tab-heading">
                    <span class="text-lead">Following</span>
                </a>
            </li>
            <li id="followers" class="rbx-tab" ng-class="{'active': currentData.activeTab == 'followers', 'subtract-item': !currentData.isMyProfile}" ui-sref="followers">
                <a class="rbx-tab-heading">
                    <span class="text-lead">Followers</span>
                </a>
            </li>
            <li id="requests" class="rbx-tab" ng-show="currentData.isMyProfile" ng-class="{'active': currentData.activeTab == 'friend-requests', 'subtract-item': !currentData.isMyProfile}" ui-sref="friend-requests">
                <a class="rbx-tab-heading">
                    <span class="text-lead">Requests</span>
                </a>
            </li>
        </ul>
        <div class="friends-content" ng-class="{'hide-template': !currentData.templateVisible}">
    <h3 class="friends-subtitle">{{ currentData.stateLabel }} ({{ friendsContent.friends.data.TotalFriends | number }})</h3>
    <button ng-show="currentData.activeTab == 'friend-requests' && friendsContent.friends.data.TotalFriends > 0"
            type="button" class="btn-fixed-width btn-control-xs ignore-button" 
            ng-click="declineAllFriendRequests()" ng-disabled="disabled">Ignore All</button>
    <span class="tooltip-container" data-toggle="tooltip" data-toggle-mobile="true" title="{{ currentData.tooltipLabel }}">
        <span class="icon-moreinfo"></span>
    </span>
    <div class="tab-content rbx-tab-content" ui-view>
        <ul class="hlist avatar-cards">
            <li ng-repeat="friend in friendsContent.friends.data.Friends" class="list-item avatar-card friends-container" ng-show="friend.UserId && !currentData.ignoreAll && friend.isAvailable">
                <div class="avatar-card-container"
                     ng-class="{'disabled': friend.IsDeleted}">
                    <div class="avatar-card-content">
                        <div class="avatar-card-fullbody">
                            <a ng-href="{{friend.AbsoluteURL}}" class="avatar-card-link" ng-if="!friend.IsDeleted">
                                <img ng-class="{'online': friend.IsOnline && !friend.InGame && !friend.InStudio, 'game': friend.InGame && friend.IsOnline, 'studio': friend.InStudio && friend.IsOnline}"
                                     class="avatar-card-image"
                                     ng-src="{{ friend.AvatarUri }}"
                                     thumbnail='friend.Thumbnail'
                                     image-retry />
                            </a>
                            <img ng-if="friend.IsDeleted"
                                    class="avatar-card-image"
                                    ng-src="{{ friend.AvatarUri }}"
                                    thumbnail='friend.Thumbnail'
                                    image-retry />
                            <div ng-hide="currentData.activeTab == 'followers' || currentData.activeTab == 'friend-requests'" ng-if="!friend.IsDeleted">
                                <a ng-href="{{ friend.AbsoluteURL}}" class="avatar-status"> <span ng-show="friend.IsOnline && !friend.InGame && !friend.InStudio" class="icon-online" title="{{friend.LastLocation}}"></span></a>
                                <a ng-href="{{ friend.AbsolutePlaceURL }}" class="avatar-status"><span ng-show="friend.InGame && friend.IsOnline" class="icon-game" title="{{friend.LastLocation}}"></span></a>
                                <div class="avatar-status"><span ng-show="friend.InStudio && friend.IsOnline" class="icon-studio" title="{{friend.LastLocation}}"></span></div>
                            </div>
                        </div>
                        <div class="avatar-card-caption">
                            <div id="{{ friend.UserId }}" class="text-overflow">
                                <a ng-href="{{friend.AbsoluteURL}}" title="{{friend.Username}}" ng-if="!friend.IsDeleted" class="avatar-name">{{ friend.Username }}</a>
                                <span title="{{friend.Username}}" ng-if="friend.IsDeleted" class="avatar-name">{{ friend.Username }}</span>
                            </div>
                            <div class="avatar-card-label" ng-if="!friend.IsDeleted">{{friend.IsOnline ? "Online" : "Offline"}}</div>
                            <div  class="avatar-card-label" ng-if="friend.IsDeleted">User has been restricted</div>
                            <div ng-show="currentData.activeTab == 'friends' || (currentData.activeTab == 'following' && friend.IsFollowed)" class="avatar-status-container">
                                <div ng-show="friend.IsOnline && !friend.InGame && !friend.InStudio" class="avatar-card-label">Website</div>
                                <div ng-show="friend.InGame && friend.IsOnline">
                                    <div class="text-label small">Playing</div>
                                    <a ng-href="{{ friend.AbsolutePlaceURL }}" class="text-link text-overflow avatar-status-link">
                                        {{ friend.LastLocation }}
                                    </a>
                                </div>
                                
                                <div ng-show="friend.InStudio && friend.IsOnline">
                                    <div class="text-label small">Working</div>
                                    <div class="text-link text-overflow avatar-status-link">
                                        {{ friend.LastLocation }}
                                    </div>
                                </div>
                            </div>
                            <div ng-show="currentData.activeTab == 'following' && !friend.IsFollowed" class="avatar-card-label fail" ng-cloak>Unfollowed</div>
                        </div>
                        <div class="avatar-card-menu"
                             card-menu
                             id="{{friend.UserId}}"
                             ng-if="hasMenu(currentData, friend)">
                        </div>
                    </div> <!-- avatar-card-content-->
                    <div class="avatar-card-btns" ng-show="currentData.hasBtns">
                        <button type="button" class="btn-control-md ignore-friend" ng-click="declineFriendRequest(friend.UserId, friend,currentData.currentPage)">Ignore</button>
                        <button type="button" class="btn-secondary-md accept-friend" ng-click="acceptFriendRequest(friend.UserId, friend,currentData.currentPage)">Accept</button>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="pager-holder">
    <ul class="pager" ng-show="currentData.totalPages > 1">
        <li class="pager-prev"
            ng-class="{'disabled': (currentData.currentPage /18) + 1 == 1}">
            <a ng-click="newPage(((currentData.currentPage /18) - 1))"><span class="icon-left"></span></a>
        </li>
        <li class="pager-cur">
            <span>{{(currentData.currentPage /18) + 1}}</span>
        </li>
        <li class="pager-total">
            <span class="fixed-spacing">of</span>
            <span>{{currentData.totalPages | number }}</span>
        </li>
        <li class="pager-next" 
            ng-class="{'disabled': (currentData.currentPage /18) + 1 == currentData.totalPages}">
            <a ng-click="newPage(((currentData.currentPage /18) + 1))"><span class="icon-right"></span></a>
        </li>
    </ul>
</div>
        
    </div>
<div>
    <script type="text/javascript">
        Roblox.uiBootstrap = Roblox.uiBootstrap || {};
        Roblox.uiBootstrap.modalBackdropTemplateLink = "/viewapp/common/template/modal/backdrop.html";
        Roblox.uiBootstrap.modalWindowTemplateLink = "/viewapp/common/template/modal/window.html";
    </script>
    <script type="text/ng-template" id="current-user-reached-friends-max.html">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" ng-click="close()">
                    <span aria-hidden="true"><span class="icon-close"></span></span><span class="sr-only">Close</span>
                </button>
                <h5>
                    Error
                </h5>
            </div>
            <div class="modal-body">
                <p>Unable to process Request.You currently have the max number of Friends allowed. </p>
            </div>
            <div class="modal-footer">
                    <button type="submit" id="purchaseConfirm" class="btn-control-md" ng-click="submit()">
                        Ok
                    </button>
                            </div>
                <p class="small modal-footer-note">Unfriend someone before accepting any more Friend Requests.</p>
            </div><!-- /.modal-content -->
    </script>
</div><div>
    <script type="text/javascript">
        Roblox.uiBootstrap = Roblox.uiBootstrap || {};
        Roblox.uiBootstrap.modalBackdropTemplateLink = "/viewapp/common/template/modal/backdrop.html";
        Roblox.uiBootstrap.modalWindowTemplateLink = "/viewapp/common/template/modal/window.html";
    </script>
    <script type="text/ng-template" id="requester-reached-friends-max.html">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" ng-click="close()">
                    <span aria-hidden="true"><span class="icon-close"></span></span><span class="sr-only">Close</span>
                </button>
                <h5>
                    Error
                </h5>
            </div>
            <div class="modal-body">
                <p>Unable to process Request. That user currently has the max number of Friends allowed.</p>
            </div>
            <div class="modal-footer">
                    <button type="submit" id="purchaseConfirm" class="btn-control-md" ng-click="submit()">
                        Ok
                    </button>
                            </div>
                <p class="small modal-footer-note">You can not accept their Friend Request until they remove a Friend.</p>
            </div><!-- /.modal-content -->
    </script>
</div><div>
    <script type="text/javascript">
        Roblox.uiBootstrap = Roblox.uiBootstrap || {};
        Roblox.uiBootstrap.modalBackdropTemplateLink = "/viewapp/common/template/modal/backdrop.html";
        Roblox.uiBootstrap.modalWindowTemplateLink = "/viewapp/common/template/modal/window.html";
    </script>
    <script type="text/ng-template" id="something-went-wrong.html">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" ng-click="close()">
                    <span aria-hidden="true"><span class="icon-close"></span></span><span class="sr-only">Close</span>
                </button>
                <h5>
                    Error
                </h5>
            </div>
            <div class="modal-body">
                <p>Something went wrong.</p>
            </div>
            <div class="modal-footer">
                    <button type="submit" id="purchaseConfirm" class="btn-control-md" ng-click="submit()">
                        Ok
                    </button>
                            </div>
                <p class="small modal-footer-note">Please check back in few minutes.</p>
            </div><!-- /.modal-content -->
    </script>
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


    
<script type='text/javascript' src='https://js.idk18.xyz/3b0c540bca77f11051d6358184298348.js'></script>
        <div ng-modules="baseTemplateApp">
            <script type="text/javascript" src="https://js.idk18.xyz/eccdbe4a2de694b92fc35ce9ecb30d6c.js"></script>
        </div>
        <div ng-modules="pageTemplateApp">
            <script type="text/javascript" src="https://js.idk18.xyz/f5375aa9149deb5155ed61cee8bf8be8.js"></script>
        </div>
                        

    
        <?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/configPaths.php"); ?>
    
    <script>
        Roblox.XsrfToken.setToken('ExWDyeLpP3Rr');
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
    
    
    <script type='text/javascript' src='https://js.idk18.xyz/b69491d84fc9989cd460b9d8fba4fb35.js'></script>
</body>
</html>