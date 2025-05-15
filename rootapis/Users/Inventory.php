<?php 
if ($userInfo["id"] !== 15){
    exit("WIP");
}

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
<head data-machine-id="<?= $webServerName ?>">
    <!-- MachineID: <?= $webServerName ?> -->
    <title><?= htmlspecialchars($username) ?>'s Inventory - ROBLOX</title>
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

    <link rel="canonical" href="<?php echo "https" . "://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"] ?>" />
    
    
    <link rel='stylesheet' href='https://static.idk18.xyz/css/leanbase___9b9fc145916d65f94e610d1f02775894_m.css/fetch' />


            
<link rel='stylesheet' href='https://static.idk18.xyz/css/page___5090bcf9f54de7952b42c23a63624425_m.css/fetch' />

    
    
    
    <script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js'></script>
<script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-1.11.1.js'><\/script>")</script>
<script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/jquery.migrate/jquery-migrate-1.2.1.min.js'></script>
<script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-migrate-1.2.1.js'><\/script>")</script>


    
    <script type='text/javascript' src='https://js.rbxcdn.com/86411e39f51e0ef39c7fa2f1f92fe7b3.js'></script>


    
    
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
      data-internal-page-name="Inventory"
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

                                    

<script type="text/javascript">
    var Roblox = Roblox || {};
    Roblox.uiBootstrap = {
        tabTemplateLink: "/viewapp/common/template/tabs/tab.html",
        tabsetTemplateLink: "/viewapp/common/template/tabs/tabset.html"
    };
</script>



<script type="text/javascript">
    var Roblox = Roblox || {};
    Roblox.AssetsExplorerModel = {"assetCategories":[{"items":[{"name":"Packages","filter":null,"id":32,"type":"AssetType"}],"name":"Packages"},{"items":[{"name":"Heads","filter":null,"id":17,"type":"AssetType"}],"name":"Heads"},{"items":[{"name":"Faces","filter":null,"id":18,"type":"AssetType"}],"name":"Faces"},{"items":[{"name":"Gear","filter":null,"id":19,"type":"AssetType"}],"name":"Gear"},{"items":[{"name":"T-Shirts","filter":null,"id":2,"type":"AssetType"}],"name":"T-Shirts"},{"items":[{"name":"Shirts","filter":null,"id":11,"type":"AssetType"}],"name":"Shirts"},{"items":[{"name":"Pants","filter":null,"id":12,"type":"AssetType"}],"name":"Pants"},{"items":[{"name":"Decals","filter":null,"id":13,"type":"AssetType"}],"name":"Decals"},{"items":[{"name":"Models","filter":null,"id":10,"type":"AssetType"}],"name":"Models"},{"items":[{"name":"Plugins","filter":null,"id":38,"type":"AssetType"}],"name":"Plugins"},{"items":[{"name":"Animations","filter":null,"id":24,"type":"AssetType"}],"name":"Animations"},{"items":[{"name":"Game Passes","filter":null,"id":34,"type":"AssetType"}],"name":"Game Passes"},{"items":[{"name":"Audio","filter":null,"id":3,"type":"AssetType"}],"name":"Audio"},{"items":[{"name":"Badges","filter":null,"id":21,"type":"AssetType"}],"name":"Badges"},{"items":[{"name":"Meshes","filter":null,"id":40,"type":"AssetType"}],"name":"Meshes"},{"items":[{"name":"Hat","filter":null,"id":8,"type":"AssetType"},{"name":"Hair","filter":null,"id":41,"type":"AssetType"},{"name":"Face","filter":null,"id":42,"type":"AssetType"},{"name":"Neck","filter":null,"id":43,"type":"AssetType"},{"name":"Shoulder","filter":null,"id":44,"type":"AssetType"},{"name":"Front","filter":null,"id":45,"type":"AssetType"},{"name":"Back","filter":null,"id":46,"type":"AssetType"},{"name":"Waist","filter":null,"id":47,"type":"AssetType"}],"name":"Accessories"},{"items":[{"name":"Places","filter":null,"id":9,"type":"AssetType"}],"name":"Places"}],"defaultCategory":{"items":[{"name":"Hat","filter":null,"id":8,"type":"AssetType"},{"name":"Hair","filter":null,"id":41,"type":"AssetType"},{"name":"Face","filter":null,"id":42,"type":"AssetType"},{"name":"Neck","filter":null,"id":43,"type":"AssetType"},{"name":"Shoulder","filter":null,"id":44,"type":"AssetType"},{"name":"Front","filter":null,"id":45,"type":"AssetType"},{"name":"Back","filter":null,"id":46,"type":"AssetType"},{"name":"Waist","filter":null,"id":47,"type":"AssetType"}],"name":"Accessories"},"userId":<?= $vars["user_id"] ?>,"jPlayerVersion":"2.9.2","isOwnPage":<?php if ($vars["user_id"] == $userInfo["id"]) echo 'true'; else echo 'false'; ?>,"absoluteLibraryUrl":"https://www.<?= $domain ?>/develop/library","absoluteCatalogUrl":"https://www.<?= $domain ?>/catalog/","isLibraryLinkEnabled":true};
</script>

<div class="row page-content" ng-modules="robloxApp, ui.bootstrap, assetsExplorer, recommendations">
    <h1>
    <?= htmlspecialchars($username) ?>'s Inventory
    </h1>
    <div class="col-xs-12 rbx-tabs-vertical assets-explorer-main-content ng-cloak" ng-controller="assetsExplorerController">
        <div class="tab-content-group">


<div class="category-dropdown">
    <h3>Category</h3>
    <div class="input-group-btn" dropdown="">
        <button type="button" dropdown-toggle="" class="input-dropdown-btn" ng-disabled="disabled" aria-haspopup="true" aria-expanded="false">
            <span class="rbx-selection-label">{{ currentData.category.name }}</span>
            <span class="icon-down-16x16"></span>
        </button>
        <ul class="dropdown-menu" role="menu">
            <li ng-repeat="category in staticData.assetCategories | orderBy: 'name'" ui-sref="{{ category.name }}">
                <a>{{ category.name }}</a>
            </li>
        </ul>
    </div>
    <div ng-show="(currentData.category.items.length > 1)"
         ng-class="{'subcategory-dropdown': (currentData.category.items.length > 1)}">
        <h3>Subcategory</h3>
        <div class="input-group-btn" dropdown="">
            <button type="button" dropdown-toggle="" class="input-dropdown-btn" ng-disabled="disabled" aria-haspopup="true" aria-expanded="false">
                <span class="rbx-selection-label">{{ currentData.subcategory.name }}</span>
                <span class="icon-down-16x16"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li ng-repeat="subcategory in currentData.category.items" ui-sref="{{ currentData.category.name + '/' + subcategory.name }}">
                    <a>{{subcategory.name}}</a>
                </li>
            </ul>
        </div>
    </div>
</div>


<div class="menu-vertical-container category-tabs">
    <h3>Category</h3>
    <ul id="vertical-menu" class="menu-vertical" role="menulist" ng-init="currentData.category.name">
        <li class="menu-option" ng-repeat="category in staticData.assetCategories | orderBy: 'name'" ng-class="{'active': currentData.category.name == category.name}" ui-sref="{{ category.name }}">
            <a class="menu-option-content">
                <span class="menu-text">{{ category.name }}</span>
                <span ng-show="(category.items.length > 1)" class="icon-right-16x16"></span>
            </a>
            <ul ng-show="(category.items.length > 1)" class="menu-secondary">
                <li ng-repeat="subcategory in category.items" ui-sref="{{ category.name + '/' + subcategory.name }}" ng-click="$event.stopPropagation()" class="menu-secondary-option" ng-class="{'active': currentData.subcategory.name == subcategory.name}">
                    <span class="menu-text">{{ subcategory.name }}</span>
                </li>
            </ul>
        </li>
    </ul>
</div>
            
            <div class="tab-content rbx-tab-content ng-cloak"
                 id="assetsExplorer"
                 data-exclusivestartpaging-enabled="true"
                 ng-controller="inventoryContentController"
                 ng-include
                 src="'assets-list'"></div>
        </div>

<div class="current-items" ng-controller="recommendationsController" ng-init="initializeWithModelValues(0, 0, 6)" ng-show="recommendationsData.items.length > 0" ng-cloak>
    <div class="recommendations-container">
        <div class="container-header recommendations-header">
            <h3>Recommended {{ recommendationsData.assetTypeName | capitalize }}</h3>
        </div>
        <div class="recommended-items-slider">
            <ul class="hlist item-cards recommended-items" ng-class="{'item-cards-embed' : recommendationsLayout.numberOfItemsToDisplay < 7}">
                <li ng-repeat="item in recommendationsData.items" class="list-item item-card recommended-item">
                    <div class="item-card-container recommended-item-link">
                        <a ng-href="{{item.Item.AbsoluteUrl}}" class="item-card-link">
                            <div class="item-card-thumb-container recommended-thumb">
                                <img ng-src="{{item.Thumbnail.Url}}"
                                     thumbnail='item.Thumbnail' image-retry class="item-card-thumb"/>
                                <span ng-show="item.AssetRestrictionIcon" 
                                      ng-class="'icon-' + item.AssetRestrictionIcon.CssTag + '-label'">
                                </span>
                            </div>
                            <div class="text-overflow item-card-name recommended-name">{{ item.Item.Name }}</div>
                        </a>
                        <div ng-if="item.Item.AudioUrl" class="MediaPlayerControls">
                            <div class="MediaPlayerIcon icon-play" data-mediathumb-url="{{item.Item.AudioUrl}}" data-jplayer-version="2.9.2">
                            </div>
                        </div>
                        <div class="text-overflow item-card-creator recommended-creator">
                            <span class="xsmall text-label recommended-creator-by">By</span>
                            <a class="xsmall text-overflow text-link" ng-href="{{item.Creator.CreatorProfileLink}}">{{ item.Creator.Name }}</a>
                        </div>
                        <div class="text-overflow item-card-price">
                            <span class="icon-robux-16x16" ng-show="item.HasPrice"></span>
                            <span class="text-robux" ng-show="item.HasPrice">{{ item.Item.Price | abbreviate : 1 }}</span>
                            <span class="text-label" ng-hide="item.HasPrice">
                                <span ng-if="item.Product.NoPriceText.length > 0"
                                      ng-class="{'text-robux': item.Product.NoPriceText === 'Free'}">
                                    {{item.Product.NoPriceText}}
                                </span>
                            </span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
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


    
<script type='text/javascript' src='https://js.rbxcdn.com/f16973f0de5db83ba458162bf17880c4.js'></script>
        <div ng-modules="baseTemplateApp">
            <script type="text/javascript" src="https://js.rbxcdn.com/eccdbe4a2de694b92fc35ce9ecb30d6c.js"></script>
        </div>
        <div ng-modules="pageTemplateApp">
            <script type="text/javascript" src="https://js.rbxcdn.com/746e06e9d04cdf24f891347f3a974458.js"></script>
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
    


<script type='text/javascript' src='https://js.rbxcdn.com/612d27a75872d0a08370e6a371a0b442.js'></script>
</body>
</html>