<?php
$pageName = "Games";
$keyword = $_GET["keyword"] ?? "";
$keywordPage = htmlspecialchars($keyword);

?>

<!DOCTYPE html>
<!--[if IE 8]><html class="ie8" ng-app="robloxApp"><![endif]-->
<!--[if gt IE 8]><!-->
<html>
<!--<![endif]-->
<head>
    <!-- MachineID: <?= $webServerName ?> -->
    <title>Games - ROBLOX</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,requiresActiveX=true" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="ROBLOX Corporation" />
<meta name="description" content="Welcome to the ultimate virtual universe powered by imagination where over six million players come to create adventures, play games, role play, and discover with their friends." />
<meta name="keywords" content="free games, online games, building games, virtual worlds, free mmo, gaming cloud, physics engine" />
    <meta property="og:site_name" content="ROBLOX" />
    <meta property="og:title" content="ROBLOX Games" />
    <meta property="og:type" content="game" />
    <meta property="og:url" content="<?= $requestUrl ?>" />
    <meta property="og:description" content="Welcome to the ultimate virtual universe powered by imagination where over six million players come to create adventures, play games, role play, and discover with their friends."/>
    <meta property="og:image" content="https://images.idk18.xyz/1a29ba559cd121807b2a11a4edaf0e88.png" />


        <link href="https://images.idk18.xyz/7aee41db80c1071f60377c3575a0ed87.ico" rel="icon" />
                <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600" rel="stylesheet" type="text/css">

    <link rel="canonical" href="<?= $requestUrl ?>" />
    
    
<link rel='stylesheet' href='https://static.idk18.xyz/css/leanbase___9b9fc145916d65f94e610d1f02775894_m.css/fetch' />


            
<link rel='stylesheet' href='https://static.idk18.xyz/css/page___3ea052e2a129d788efa6be4e308bc23d_m.css/fetch' />

    
    
    
    <script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js'></script>
<script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-1.11.1.js'><\/script>")</script>
<script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/jquery.migrate/jquery-migrate-1.2.1.min.js'></script>
<script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-migrate-1.2.1.js'><\/script>")</script>


    
    <script type='text/javascript' src='https://js.idk18.xyz/86411e39f51e0ef39c7fa2f1f92fe7b3.js'></script>


    
    
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>



<?php 
require_once("../includes/adshelper.php"); 
require_once("../includes/jsErrorTrackerInit.php"); 
?>


    
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
      data-internal-page-name="Games"
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

    


<div id="fb-root"></div>

<div id="wrap" class="wrap no-gutter-ads <?php if ($isUserAuthenticated) echo 'logged-in'; else echo 'logged-out'; ?>"
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

                                    


<div id="ResponsiveWrapper" class="games-responsive-wrapper hover-on-touch"
     data-gamessearchonpage="true"
     data-adsingamesearchresultsenabled="true">
    
    <div id="GamesPageRightColumn" class="games-page-right">
        <div id="GamesPageRightColumnSidebar" class="sidebar-no-ad games-page-right-sidebar">
                    <div id="GamePageAdDiv1" class="ads-container">


<iframe name="Roblox_Games_Middle_300x250" 
        allowtransparency="true"
        frameborder="0"
        height="270"
        scrolling="no"
        src="https://www.<?= $domain ?>/user-sponsorship/3"
        width="300"
        data-js-adtype="iframead"></iframe>

                    </div>
                        <div id="GamePageAdDiv2" class="ads-container">


<iframe name="Roblox_Games_Middle_300x250_1" 
        allowtransparency="true"
        frameborder="0"
        height="270"
        scrolling="no"
        src="https://www.<?= $domain ?>/user-sponsorship/3"
        width="300"
        data-js-adtype="iframead"></iframe>

                        </div>

        </div>
    </div>

    <div id="GamesPageLeftColumn" class="games-page-left ">

        <!-- New Filters and sort -->
        
           

<div class="col-xs-12 games-page-filters loading" id="FiltersAndSort"
     data-defaulttoppaidtoweekly="true"
     data-defaultweeklyratings="true">

        <div class="input-group-btn games-page-filter" id="SortFilter">
            <button type="button" class="input-dropdown-btn" data-toggle="dropdown">
                <span class="rbx-selection-label" data-bind="label" data-value="default" data-default="default">Filter by</span>
                <span class="icon-down-16x16"></span>
            </button>
            <ul data-toggle="dropdown-menu" class="dropdown-menu" role="menu">
                <li data-hidetimefilter data-value="default"><a href="#">Default</a></li>
                        <li data-hidetimefilter
                            
                            data-value="1">
                            <a href="#">Popular</a>
                        </li>
                        <li data-hidetimefilter
                            
                            data-value="8">
                            <a href="#">Top Earning</a>
                        </li>
                        <li 
                            
                            data-value="11">
                            <a href="#">Top Rated</a>
                        </li>
                        <li data-hidetimefilter
                            
                            data-value="16">
                            <a href="#">Recommended</a>
                        </li>
                        <li data-hidetimefilter
                            data-hidegenrefilter
                            data-value="3">
                            <a href="#">Featured</a>
                        </li>
                        <li 
                            
                            data-value="2">
                            <a href="#">Top Favorite</a>
                        </li>
                        <li 
                            
                            data-value="9">
                            <a href="#">Top Paid</a>
                        </li>
                        <li 
                            
                            data-value="14">
                            <a href="#">Builders Club</a>
                        </li>
                        <li data-hidetimefilter
                            
                            data-value="19">
                            <a href="#">Popular in VR</a>
                        </li>

            </ul>
        </div>

        <div class="input-group-btn games-page-filter" id="TimeFilter">
            <button type="button" class="input-dropdown-btn" data-toggle="dropdown">
                <span class="rbx-selection-label" data-bind="label" data-value="0" data-default="0">Time</span>
                <span class="icon-down-16x16"></span>
            </button>
            <ul data-toggle="dropdown-menu" class="dropdown-menu" role="menu">
                <li class="dropdown-option hidden" data-value="0"><a href="#">Now</a></li>
                <li class="dropdown-option" data-value="1"><a href="#">Past Day</a></li>
                <li class="dropdown-option" data-value="2"><a href="#">Past Week</a></li>
                <li class="dropdown-option" data-value="4"><a href="#">All Time</a></li>
            </ul>
        </div>
            <div class="input-group-btn games-page-filter" id="GenreFilter">
            <button type="button" class="input-dropdown-btn" data-toggle="dropdown">
                <span class="rbx-selection-label" data-bind="label" data-value="1" data-default="1">Genre</span>
                <span class="icon-down-16x16"></span>
            </button>
            <ul data-toggle="dropdown-menu" class="dropdown-menu" role="menu">
                    <li class="dropdown-option" data-value="1"><a href="#">All</a></li>
                    <li class="dropdown-option" data-value="13"><a href="#">Adventure</a></li>
                    <li class="dropdown-option" data-value="19"><a href="#">Building</a></li>
                    <li class="dropdown-option" data-value="15"><a href="#">Comedy</a></li>
                    <li class="dropdown-option" data-value="10"><a href="#">Fighting</a></li>
                    <li class="dropdown-option" data-value="20"><a href="#">FPS</a></li>
                    <li class="dropdown-option" data-value="11"><a href="#">Horror</a></li>
                    <li class="dropdown-option" data-value="8"><a href="#">Medieval</a></li>
                    <li class="dropdown-option" data-value="17"><a href="#">Military</a></li>
                    <li class="dropdown-option" data-value="12"><a href="#">Naval</a></li>
                    <li class="dropdown-option" data-value="21"><a href="#">RPG</a></li>
                    <li class="dropdown-option" data-value="9"><a href="#">Sci-Fi</a></li>
                    <li class="dropdown-option" data-value="14"><a href="#">Sports</a></li>
                    <li class="dropdown-option" data-value="7"><a href="#">Town and City</a></li>
                    <li class="dropdown-option" data-value="16"><a href="#">Western</a></li>
            </ul>
        </div>
</div>

        <div id="GamesPageSearch" class="hidden" data-keyword="<?= $keywordPage ?>">
            <a name="CancelSearch" class="cancel-search">Cancel</a>
            <input data-default="<?= $keywordPage ?>" id="searchbox" class="translate" type="text" name="search" />
            <div class="SearchIconButton" title="Search"></div>
        </div>

        <div id="GamesListsContainer" class="games-page-lists-container">



<div class="games-list-container hidden container-0" id="GamesListContainer1"
     data-sortfilter="1"
     data-gamefilter="1"
     data-minbclevel="0"
     data-numberofrows="1"
     data-personalized-universe-id="0">
    <div class="games-list-header games-filter-changer">
            <h3>Popular</h3>

    </div>
        <div class="show-in-multiview-mode-only">
            <div class="see-all-button games-filter-changer btn-fixed-width btn-secondary-xs btn-more">
                See All
            </div>
        </div>
    <div class="games-list">
        <div class="show-in-multiview-mode-only">
            <div class="horizontally-scrollable">
                <ul class="hlist games game-cards"></ul>
            </div>
            <div class="scroller prev disabled">
                <div class="arrow">
                    <span class="icon-games-carousel-left"></span>
                </div>
            </div>
            <div class="scroller next">
                <div class="arrow">
                    <span class="icon-games-carousel-right"></span>
                </div>
            </div>
        </div>
        <ul class="hlist games game-cards game-cards-grid">
            <div class="abp-spacer "></div>
        </ul>
    </div>
</div>



<div class="games-list-container hidden container-1" id="GamesListContainer8"
     data-sortfilter="8"
     data-gamefilter="1"
     data-minbclevel="0"
     data-numberofrows="1"
     data-personalized-universe-id="0">
    <div class="games-list-header games-filter-changer">
            <h3>Top Earning</h3>

    </div>
        <div class="show-in-multiview-mode-only">
            <div class="see-all-button games-filter-changer btn-fixed-width btn-secondary-xs btn-more">
                See All
            </div>
        </div>
    <div class="games-list">
        <div class="show-in-multiview-mode-only">
            <div class="horizontally-scrollable">
                <ul class="hlist games game-cards"></ul>
            </div>
            <div class="scroller prev disabled">
                <div class="arrow">
                    <span class="icon-games-carousel-left"></span>
                </div>
            </div>
            <div class="scroller next">
                <div class="arrow">
                    <span class="icon-games-carousel-right"></span>
                </div>
            </div>
        </div>
        <ul class="hlist games game-cards game-cards-grid">
            <div class="abp-spacer "></div>
        </ul>
    </div>
</div>



<div class="games-list-container hidden container-2" id="GamesListContainer11"
     data-sortfilter="11"
     data-gamefilter="1"
     data-minbclevel="0"
     data-numberofrows="1"
     data-personalized-universe-id="0">
    <div class="games-list-header games-filter-changer">
            <h3>Top Rated</h3>

    </div>
        <div class="show-in-multiview-mode-only">
            <div class="see-all-button games-filter-changer btn-fixed-width btn-secondary-xs btn-more">
                See All
            </div>
        </div>
    <div class="games-list">
        <div class="show-in-multiview-mode-only">
            <div class="horizontally-scrollable">
                <ul class="hlist games game-cards"></ul>
            </div>
            <div class="scroller prev disabled">
                <div class="arrow">
                    <span class="icon-games-carousel-left"></span>
                </div>
            </div>
            <div class="scroller next">
                <div class="arrow">
                    <span class="icon-games-carousel-right"></span>
                </div>
            </div>
        </div>
        <ul class="hlist games game-cards game-cards-grid">
            <div class="abp-spacer "></div>
        </ul>
    </div>
</div>



<div class="games-list-container hidden container-3" id="GamesListContainer16"
     data-sortfilter="16"
     data-gamefilter="1"
     data-minbclevel="0"
     data-numberofrows="1"
     data-personalized-universe-id="0">
    <div class="games-list-header games-filter-changer">
            <h3>Recommended</h3>

    </div>
        <div class="show-in-multiview-mode-only">
            <div class="see-all-button games-filter-changer btn-fixed-width btn-secondary-xs btn-more">
                See All
            </div>
        </div>
    <div class="games-list">
        <div class="show-in-multiview-mode-only">
            <div class="horizontally-scrollable">
                <ul class="hlist games game-cards"></ul>
            </div>
            <div class="scroller prev disabled">
                <div class="arrow">
                    <span class="icon-games-carousel-left"></span>
                </div>
            </div>
            <div class="scroller next">
                <div class="arrow">
                    <span class="icon-games-carousel-right"></span>
                </div>
            </div>
        </div>
        <ul class="hlist games game-cards game-cards-grid">
            <div class="abp-spacer "></div>
        </ul>
    </div>
</div>



<div class="games-list-container hidden container-4" id="GamesListContainer3"
     data-sortfilter="3"
     data-gamefilter="1"
     data-minbclevel="0"
     data-numberofrows="1"
     data-personalized-universe-id="0">
    <div class="games-list-header games-filter-changer">
            <h3>Featured</h3>

    </div>
        <div class="show-in-multiview-mode-only">
            <div class="see-all-button games-filter-changer btn-fixed-width btn-secondary-xs btn-more">
                See All
            </div>
        </div>
    <div class="games-list">
        <div class="show-in-multiview-mode-only">
            <div class="horizontally-scrollable">
                <ul class="hlist games game-cards"></ul>
            </div>
            <div class="scroller prev disabled">
                <div class="arrow">
                    <span class="icon-games-carousel-left"></span>
                </div>
            </div>
            <div class="scroller next">
                <div class="arrow">
                    <span class="icon-games-carousel-right"></span>
                </div>
            </div>
        </div>
        <ul class="hlist games game-cards game-cards-grid">
            <div class="abp-spacer "></div>
        </ul>
    </div>
</div>



<div class="games-list-container hidden container-5" id="GamesListContainer2"
     data-sortfilter="2"
     data-gamefilter="1"
     data-minbclevel="0"
     data-numberofrows="1"
     data-personalized-universe-id="0">
    <div class="games-list-header games-filter-changer">
            <h3>Top Favorite</h3>

    </div>
        <div class="show-in-multiview-mode-only">
            <div class="see-all-button games-filter-changer btn-fixed-width btn-secondary-xs btn-more">
                See All
            </div>
        </div>
    <div class="games-list">
        <div class="show-in-multiview-mode-only">
            <div class="horizontally-scrollable">
                <ul class="hlist games game-cards"></ul>
            </div>
            <div class="scroller prev disabled">
                <div class="arrow">
                    <span class="icon-games-carousel-left"></span>
                </div>
            </div>
            <div class="scroller next">
                <div class="arrow">
                    <span class="icon-games-carousel-right"></span>
                </div>
            </div>
        </div>
        <ul class="hlist games game-cards game-cards-grid">
            <div class="abp-spacer "></div>
        </ul>
    </div>
</div>



<div class="games-list-container hidden container-6" id="GamesListContainer9"
     data-sortfilter="9"
     data-gamefilter="1"
     data-minbclevel="0"
     data-numberofrows="1"
     data-personalized-universe-id="0">
    <div class="games-list-header games-filter-changer">
            <h3>Top Paid</h3>

    </div>
        <div class="show-in-multiview-mode-only">
            <div class="see-all-button games-filter-changer btn-fixed-width btn-secondary-xs btn-more">
                See All
            </div>
        </div>
    <div class="games-list">
        <div class="show-in-multiview-mode-only">
            <div class="horizontally-scrollable">
                <ul class="hlist games game-cards"></ul>
            </div>
            <div class="scroller prev disabled">
                <div class="arrow">
                    <span class="icon-games-carousel-left"></span>
                </div>
            </div>
            <div class="scroller next">
                <div class="arrow">
                    <span class="icon-games-carousel-right"></span>
                </div>
            </div>
        </div>
        <ul class="hlist games game-cards game-cards-grid">
            <div class="abp-spacer "></div>
        </ul>
    </div>
</div>



<div class="games-list-container hidden container-7" id="GamesListContainer14"
     data-sortfilter="14"
     data-gamefilter="1"
     data-minbclevel="0"
     data-numberofrows="1"
     data-personalized-universe-id="0">
    <div class="games-list-header games-filter-changer">
            <h3>Builders Club</h3>

    </div>
        <div class="show-in-multiview-mode-only">
            <div class="see-all-button games-filter-changer btn-fixed-width btn-secondary-xs btn-more">
                See All
            </div>
        </div>
    <div class="games-list">
        <div class="show-in-multiview-mode-only">
            <div class="horizontally-scrollable">
                <ul class="hlist games game-cards"></ul>
            </div>
            <div class="scroller prev disabled">
                <div class="arrow">
                    <span class="icon-games-carousel-left"></span>
                </div>
            </div>
            <div class="scroller next">
                <div class="arrow">
                    <span class="icon-games-carousel-right"></span>
                </div>
            </div>
        </div>
        <ul class="hlist games game-cards game-cards-grid">
            <div class="abp-spacer "></div>
        </ul>
    </div>
</div>



<div class="games-list-container hidden container-8" id="GamesListContainer19"
     data-sortfilter="19"
     data-gamefilter="1"
     data-minbclevel="0"
     data-numberofrows="1"
     data-personalized-universe-id="0">
    <div class="games-list-header games-filter-changer">
            <h3>Popular in VR</h3>

    </div>
        <div class="show-in-multiview-mode-only">
            <div class="see-all-button games-filter-changer btn-fixed-width btn-secondary-xs btn-more">
                See All
            </div>
        </div>
    <div class="games-list">
        <div class="show-in-multiview-mode-only">
            <div class="horizontally-scrollable">
                <ul class="hlist games game-cards"></ul>
            </div>
            <div class="scroller prev disabled">
                <div class="arrow">
                    <span class="icon-games-carousel-left"></span>
                </div>
            </div>
            <div class="scroller next">
                <div class="arrow">
                    <span class="icon-games-carousel-right"></span>
                </div>
            </div>
        </div>
        <ul class="hlist games game-cards game-cards-grid">
            <div class="abp-spacer "></div>
        </ul>
    </div>
</div>


            <!-- on page search results container-->
            <div class="games-list-container hidden search-results-container" id="SearchResultsContainer">
                <div class="games-list-header">
                    <h3>Results for <span class="search-query-text"></span></h3>
                </div>
                <div class="games-list">
                    <ul class="list-item game-cards"></ul>
                    <div class="abp-spacer "></div>
                </div>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {

        Roblox.SearchBox = {};
        Roblox.SearchBox.Resources = {
            //<sl:translate>
            search: "Search",
            zeroResults: "No Search Results Found"
            //</sl:translate>
        };
        Roblox.GamesPageContainerBehavior.Resources = {
            //<sl:translate>
            pageTitle: "Games - ROBLOX"
            //</sl:translate>
        };

        var defaultGamesListsCsv = "1,8,11,16,3";
        Roblox.GamesPageContainerBehavior.FilterValueToGamesListsIdSuffixMapping = {"default": defaultGamesListsCsv.split(',')};

        Roblox.GamesPageContainerBehavior.IsUserLoggedIn = <?php if ($isUserAuthenticated) echo 'true'; else echo 'false'; ?>;
        Roblox.GamesPageContainerBehavior.adRefreshRateMilliSeconds = 3000;
        Roblox.GamesPageContainerBehavior.MinimumNumberOfGamesForPersonalizedByLikedToAppear = 1;
        Roblox.GamesPageContainerBehavior.DeviceTypeId = 1;
        Roblox.GamesPageContainerBehavior.isCreateNewAd = true;
        Roblox.GamesPageContainerBehavior.setIntervalId = null;
        Roblox.GamesListBehavior.RefreshAdsInGamesPageEnabled = true;
        Roblox.GamesListBehavior.isUserEligibleForMultirowFirstSort = false;

    })

</script>

            
        </div>
            </div> 

<?php require_once("../includes/footer.php"); ?>

</div> 



<?php require_once("../includes/placelauncher.php"); ?>

<?php require_once("../includes/modals/legacygenericconfirmationmodal.php"); ?>

<?php require_once("../includes/modals/confirmationmodal.php"); ?>




<script type="text/javascript">
    var Roblox = Roblox || {};
    Roblox.jsConsoleEnabled = false;
</script>
    
                       
<?php 
require_once("../includes/cookieupgrader.php");

require_once("../includes/robloxjs.php"); 

require_once("../includes/configPaths.php"); 
    
//require_once("../getxrsftoken.php");

require_once("../includes/devConsoleWarning.php");

require_once("../includes/jsErrorTrackerInit.php");

require_once("../includes/eventmanager.php"); 

require_once("../includes/modals/upsellAdModal.php");
?>
    
    <script type='text/javascript' src='https://js.idk18.xyz/5ac37bea23ec728222376919b154ac76.js'></script>

</body>
</html>