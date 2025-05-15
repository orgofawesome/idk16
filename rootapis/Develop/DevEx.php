<?php
$pageName = "";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <!-- MachineID: <?= $webServerName ?> -->
    <title><?= $domain ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,requiresActiveX=true" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="ROBLOX Corporation" />
<meta name="description" content="ROBLOX is powered by a growing community of over 300,000 creators who produce an infinite variety of highly immersive experiences. These experiences range from 3D multiplayer games and competitions, to interactive adventures where friends can take on new personas imagining what it would be like to be a dinosaur, a miner in a quarry or an astronaut on a space exploration." />
<meta name="keywords" content="free games, online games, building games, virtual worlds, free mmo, gaming cloud, physics engine" />

    
    

    <link rel="canonical" href="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"] ?>" />

            <link href="https://images.idk18.xyz/7aee41db80c1071f60377c3575a0ed87.ico" rel="icon" />
    


<link rel='stylesheet' href='https://static.idk18.xyz/css/MainCSS___58dd044044005dc0e887c80110c9a567_m.css/fetch' />
<link rel='stylesheet' href='https://static.idk18.xyz/css/page___91825b3be413a38849e2e953de59bd55_m.css/fetch' />
    

        <script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js'></script>
<script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-1.11.1.js'><\/script>")</script>
<script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/jquery.migrate/jquery-migrate-1.2.1.min.js'></script>
<script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-migrate-1.2.1.js'><\/script>")</script>
<script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/4.0/1/MicrosoftAjax.js'></script>
<script type='text/javascript'>window.Sys || document.write("<script type='text/javascript' src='/js/Microsoft/MicrosoftAjax.js'><\/script>")</script>


<?php require_once("../includes/googleAnalytics.php"); ?>


    <script type='text/javascript' src='https://js.idk18.xyz/54b73269bcd426ec956755cb8cac7033.js'></script>

<?php require_once("../includes/eventStreamInit.php"); ?>



<script type="text/javascript">
    if (ROBLOX && ROBLOX.PageHeartbeatEvent) {
        ROBLOX.PageHeartbeatEvent.Init([2,8,20,60]);
    }
</script>    
<script type='text/javascript' src='https://js.idk18.xyz/42ffb266402d8366444aa39d4fc517b9.js'></script>

   <?php require_once("../includes/configPaths.php"); ?>
   
   <script type='text/javascript' src='https://js.idk18.xyz/custom_ReferenceGenericConf.js'></script>
   

    
<?php require_once("../includes/jsErrorTrackerInit.php"); ?>


<?php require_once("../includes/modals/upselladmodal.php"); ?>
<?php require_once("../getXrsfToken.php"); ?>
    <script type="text/javascript">
        ROBLOX.FixedUI.gutterAdsEnabled = false;
    </script>
    

    <script type="text/javascript">
        var ROBLOX = ROBLOX || {};
        ROBLOX.jsConsoleEnabled = false;
    </script>

<?php require_once("../includes/devConsoleWarning.php"); ?>

    <script type="text/javascript">
if (typeof(ROBLOX) === "undefined") { ROBLOX = {}; }
ROBLOX.Endpoints = ROBLOX.Endpoints || {};
ROBLOX.Endpoints.Urls = ROBLOX.Endpoints.Urls || {};
ROBLOX.Endpoints.Urls['/api/item.ashx'] = 'https://www.<?= $domain ?>/api/item.ashx';
ROBLOX.Endpoints.Urls['/asset/'] = 'https://assetgame.<?= $domain ?>/asset/';
ROBLOX.Endpoints.Urls['/client-status/set'] = 'https://www.<?= $domain ?>/client-status/set';
ROBLOX.Endpoints.Urls['/client-status'] = 'https://www.<?= $domain ?>/client-status';
ROBLOX.Endpoints.Urls['/game/'] = 'https://assetgame.<?= $domain ?>/game/';
ROBLOX.Endpoints.Urls['/game-auth/getauthticket'] = 'https://www.<?= $domain ?>/game-auth/getauthticket';
ROBLOX.Endpoints.Urls['/game/edit.ashx'] = 'https://assetgame.<?= $domain ?>/game/edit.ashx';
ROBLOX.Endpoints.Urls['/game/getauthticket'] = 'https://assetgame.<?= $domain ?>/game/getauthticket';
ROBLOX.Endpoints.Urls['/game/placelauncher.ashx'] = 'https://assetgame.<?= $domain ?>/game/placelauncher.ashx';
ROBLOX.Endpoints.Urls['/game/preloader'] = 'https://assetgame.<?= $domain ?>/game/preloader';
ROBLOX.Endpoints.Urls['/game/report-stats'] = 'https://assetgame.<?= $domain ?>/game/report-stats';
ROBLOX.Endpoints.Urls['/game/report-event'] = 'https://assetgame.<?= $domain ?>/game/report-event';
ROBLOX.Endpoints.Urls['/game/updateprerollcount'] = 'https://assetgame.<?= $domain ?>/game/updateprerollcount';
ROBLOX.Endpoints.Urls['/login/default.aspx'] = 'https://www.<?= $domain ?>/login/default.aspx';
ROBLOX.Endpoints.Urls['/my/character.aspx'] = 'https://www.<?= $domain ?>/my/character.aspx';
ROBLOX.Endpoints.Urls['/my/money.aspx'] = 'https://www.<?= $domain ?>/my/money.aspx';
ROBLOX.Endpoints.Urls['/chat/chat'] = 'https://www.<?= $domain ?>/chat/chat';
ROBLOX.Endpoints.Urls['/presence/users'] = 'https://www.<?= $domain ?>/presence/users';
ROBLOX.Endpoints.Urls['/presence/user'] = 'https://www.<?= $domain ?>/presence/user';
ROBLOX.Endpoints.Urls['/friends/list'] = 'https://www.<?= $domain ?>/friends/list';
ROBLOX.Endpoints.Urls['/navigation/getCount'] = 'https://www.<?= $domain ?>/navigation/getCount';
ROBLOX.Endpoints.Urls['/catalog/browse.aspx'] = 'https://www.<?= $domain ?>/catalog/browse.aspx';
ROBLOX.Endpoints.Urls['/catalog/html'] = 'https://search.<?= $domain ?>/catalog/html';
ROBLOX.Endpoints.Urls['/catalog/json'] = 'https://search.<?= $domain ?>/catalog/json';
ROBLOX.Endpoints.Urls['/catalog/contents'] = 'https://search.<?= $domain ?>/catalog/contents';
ROBLOX.Endpoints.Urls['/catalog/lists.aspx'] = 'https://search.<?= $domain ?>/catalog/lists.aspx';
ROBLOX.Endpoints.Urls['/asset-hash-thumbnail/image'] = 'https://assetgame.<?= $domain ?>/asset-hash-thumbnail/image';
ROBLOX.Endpoints.Urls['/asset-hash-thumbnail/json'] = 'https://assetgame.<?= $domain ?>/asset-hash-thumbnail/json';
ROBLOX.Endpoints.Urls['/asset-thumbnail-3d/json'] = 'https://assetgame.<?= $domain ?>/asset-thumbnail-3d/json';
ROBLOX.Endpoints.Urls['/asset-thumbnail/image'] = 'https://assetgame.<?= $domain ?>/asset-thumbnail/image';
ROBLOX.Endpoints.Urls['/asset-thumbnail/json'] = 'https://assetgame.<?= $domain ?>/asset-thumbnail/json';
ROBLOX.Endpoints.Urls['/asset-thumbnail/url'] = 'https://assetgame.<?= $domain ?>/asset-thumbnail/url';
ROBLOX.Endpoints.Urls['/asset/request-thumbnail-fix'] = 'https://assetgame.<?= $domain ?>/asset/request-thumbnail-fix';
ROBLOX.Endpoints.Urls['/avatar-thumbnail-3d/json'] = 'https://www.<?= $domain ?>/avatar-thumbnail-3d/json';
ROBLOX.Endpoints.Urls['/avatar-thumbnail/image'] = 'https://www.<?= $domain ?>/avatar-thumbnail/image';
ROBLOX.Endpoints.Urls['/avatar-thumbnail/json'] = 'https://www.<?= $domain ?>/avatar-thumbnail/json';
ROBLOX.Endpoints.Urls['/avatar-thumbnails'] = 'https://www.<?= $domain ?>/avatar-thumbnails';
ROBLOX.Endpoints.Urls['/avatar/request-thumbnail-fix'] = 'https://www.<?= $domain ?>/avatar/request-thumbnail-fix';
ROBLOX.Endpoints.Urls['/bust-thumbnail/json'] = 'https://www.<?= $domain ?>/bust-thumbnail/json';
ROBLOX.Endpoints.Urls['/group-thumbnails'] = 'https://www.<?= $domain ?>/group-thumbnails';
ROBLOX.Endpoints.Urls['/groups/getprimarygroupinfo.ashx'] = 'https://www.<?= $domain ?>/groups/getprimarygroupinfo.ashx';
ROBLOX.Endpoints.Urls['/headshot-thumbnail/json'] = 'https://www.<?= $domain ?>/headshot-thumbnail/json';
ROBLOX.Endpoints.Urls['/item-thumbnails'] = 'https://www.<?= $domain ?>/item-thumbnails';
ROBLOX.Endpoints.Urls['/outfit-thumbnail/json'] = 'https://www.<?= $domain ?>/outfit-thumbnail/json';
ROBLOX.Endpoints.Urls['/place-thumbnails'] = 'https://www.<?= $domain ?>/place-thumbnails';
ROBLOX.Endpoints.Urls['/thumbnail/asset/'] = 'https://www.<?= $domain ?>/thumbnail/asset/';
ROBLOX.Endpoints.Urls['/thumbnail/avatar-headshot'] = 'https://www.<?= $domain ?>/thumbnail/avatar-headshot';
ROBLOX.Endpoints.Urls['/thumbnail/avatar-headshots'] = 'https://www.<?= $domain ?>/thumbnail/avatar-headshots';
ROBLOX.Endpoints.Urls['/thumbnail/user-avatar'] = 'https://www.<?= $domain ?>/thumbnail/user-avatar';
ROBLOX.Endpoints.Urls['/thumbnail/resolve-hash'] = 'https://www.<?= $domain ?>/thumbnail/resolve-hash';
ROBLOX.Endpoints.Urls['/thumbnail/place'] = 'https://www.<?= $domain ?>/thumbnail/place';
ROBLOX.Endpoints.Urls['/thumbnail/get-asset-media'] = 'https://www.<?= $domain ?>/thumbnail/get-asset-media';
ROBLOX.Endpoints.Urls['/thumbnail/remove-asset-media'] = 'https://www.<?= $domain ?>/thumbnail/remove-asset-media';
ROBLOX.Endpoints.Urls['/thumbnail/set-asset-media-sort-order'] = 'https://www.<?= $domain ?>/thumbnail/set-asset-media-sort-order';
ROBLOX.Endpoints.Urls['/thumbnail/place-thumbnails'] = 'https://www.<?= $domain ?>/thumbnail/place-thumbnails';
ROBLOX.Endpoints.Urls['/thumbnail/place-thumbnails-partial'] = 'https://www.<?= $domain ?>/thumbnail/place-thumbnails-partial';
ROBLOX.Endpoints.Urls['/thumbnail_holder/g'] = 'https://www.<?= $domain ?>/thumbnail_holder/g';
ROBLOX.Endpoints.Urls['/users/{id}/profile'] = 'https://www.<?= $domain ?>/users/{id}/profile';
ROBLOX.Endpoints.Urls['/service-workers/push-notifications'] = 'https://www.<?= $domain ?>/service-workers/push-notifications';
ROBLOX.Endpoints.Urls['/notification-stream/notification-stream-data'] = 'https://www.<?= $domain ?>/notification-stream/notification-stream-data';
ROBLOX.Endpoints.Urls['/api/friends/acceptfriendrequest'] = 'https://www.<?= $domain ?>/api/friends/acceptfriendrequest';
ROBLOX.Endpoints.Urls['/api/friends/declinefriendrequest'] = 'https://www.<?= $domain ?>/api/friends/declinefriendrequest';
ROBLOX.Endpoints.addCrossDomainOptionsToAllRequests = true;
</script>

    <script type="text/javascript">
if (typeof(ROBLOX) === "undefined") { ROBLOX = {}; }
ROBLOX.Endpoints = ROBLOX.Endpoints || {};
ROBLOX.Endpoints.Urls = ROBLOX.Endpoints.Urls || {};
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
    var ROBLOX = ROBLOX || {};
    (function() {
        if (ROBLOX && ROBLOX.Performance) {
            ROBLOX.Performance.setPerformanceMark("navigation_end");
        }
    })();
</script>

<div id=navContent class="nav-content logged-in">
				<div class=nav-content-inner>
					<div id=MasterContainer>
						<script>
						if(top.location != self.location) {
							top.location = self.location.href;
						}
						</script>
						<script>
						$(function() {
							function trackReturns() {
								function dayDiff(d1, d2) {
									return Math.floor((d1 - d2) / 86400000);
								}
								if(!localStorage) {
									return false;
								}
								var cookieName = 'RBXReturn';
								var cookieOptions = {
									expires: 9001
								};
								var cookieStr = localStorage.getItem(cookieName) || "";
								var cookie = {};
								try {
									cookie = JSON.parse(cookieStr);
								} catch(ex) {}
								try {
									if(typeof cookie.ts === "undefined" || isNaN(new Date(cookie.ts))) {
										localStorage.setItem(cookieName, JSON.stringify({
											ts: new Date().toDateString()
										}));
										return false;
									}
								} catch(ex) {
									return false;
								}
								var daysSinceFirstVisit = dayDiff(new Date(), new Date(cookie.ts));
								if(daysSinceFirstVisit == 1 && typeof cookie.odr === "undefined") {
									ROBLOXEventManager.triggerEvent('rbx_evt_odr', {});
									cookie.odr = 1;
								}
								if(daysSinceFirstVisit >= 1 && daysSinceFirstVisit <= 7 && typeof cookie.sdr === "undefined") {
									ROBLOXEventManager.triggerEvent('rbx_evt_sdr', {});
									cookie.sdr = 1;
								}
								try {
									localStorage.setItem(cookieName, JSON.stringify(cookie));
								} catch(ex) {
									return false;
								}
							}
							GoogleListener.init();
							ROBLOXEventManager.initialize(true);
							ROBLOXEventManager.triggerEvent('rbx_evt_pageview');
							trackReturns();
							ROBLOXEventManager._idleInterval = 450000;
							ROBLOXEventManager.registerCookieStoreEvent('rbx_evt_initial_install_start');
							ROBLOXEventManager.registerCookieStoreEvent('rbx_evt_ftp');
							ROBLOXEventManager.registerCookieStoreEvent('rbx_evt_initial_install_success');
							ROBLOXEventManager.registerCookieStoreEvent('rbx_evt_fmp');
							ROBLOXEventManager.startMonitor();
						});
						</script>
						<div>
							<div class=alert-container>
								<noscript>
									<div class=alert-info>Please enable Javascript to use all the features on this site.</div>
								</noscript>
							</div>
							<div id=AdvertisingLeaderboard>
								<iframe name=ROBLOX_Default_Top_728x90 allowtransparency=true frameborder=0 height=110 scrolling=no data-src="" src=https://www.<?= $domain ?>/user-sponsorship/1 width=728 data-js-adtype=iframead data-ad-slot=ROBLOX_Default_Top_728x90></iframe>
							</div>
							<div id=BodyWrapper>
								<div id=RepositionBody>
									<div id=Body class=body-width>
										<div id=TosAgreementInfo data-terms-check-needed=True></div>
										<input name=__RequestVerificationToken type=hidden value=Ec4y_K8LiE04p0fzCWwwWIYY78dkQitS7GsNGibV2Z9WYmNO2WtB0EPYT4Zg1WOEvc_NRbKqfqcIpOYPZZVjp99-4EiauGyW_kjli9osvqLBXKTU0>
										<div id=DevelopTabs class=tab-container>
											<div id=MyCreationsTabLink class=tab-active data-url=/develop>My Creations</div>
											<div id=GroupCreationsTabLink data-url=/develop/groups data-default-get-url=/build/buildview style=display:none>Group Creations</div>
											<div id=LibraryTabLink data-url=/develop/library data-library-get-url="/catalog/contents?CatalogContext=DevelopOnly&amp;Category=Models">Library</div>
											<div id=DevExTabLink data-url=/develop/developer-exchange>Developer Exchange</div>
										</div>
										<div>
											<div id=MyCreationsTab class=tab-active>
												<div class=BuildPageContent data-groupid="">
													<input id=assetTypeId name=assetTypeId type=hidden value=0>
													<input data-val=true data-val-required="The IsTgaUploadEnabled field is required." id=isTgaUploadEnabled name=isTgaUploadEnabled type=hidden value=True>
													<table id=build-page data-asset-type-id=0 data-showcases-enabled=true data-edit-opens-studio=False>
														<tr>
															<td class="menu-area divider-right"><a href="https://www.roblox.com/develop?Page=universes" class="tab-item tab-item-selected">Games</a> <a href="https://www.roblox.com/develop?View=9" class=tab-item>Places</a> <a href="https://www.roblox.com/develop?View=10" class=tab-item>Models</a> <a href="https://www.roblox.com/develop?View=13" class=tab-item>Decals</a> <a href="https://www.roblox.com/develop?View=21" class=tab-item>Badges</a> <a href="https://www.roblox.com/develop?Page=game-passes" class=tab-item>Game Passes</a> <a href="https://www.roblox.com/develop?View=3" class=tab-item>Audio</a> <a href="https://www.roblox.com/develop?View=24" class=tab-item>Animations</a> <a href="https://www.roblox.com/develop?View=40" class=tab-item>Meshes</a> <a href="https://www.roblox.com/develop?Page=ads" class=tab-item>User Ads</a> <a href="https://www.roblox.com/develop?Page=sponsored-games" class=tab-item>Sponsored Games</a> <a href="https://www.roblox.com/develop?View=11" class=tab-item>Shirts</a> <a href="https://www.roblox.com/develop?View=2" class=tab-item>T-Shirts</a> <a href="https://www.roblox.com/develop?View=12" class=tab-item>Pants</a> <a href="https://www.roblox.com/develop?View=38" class=tab-item>Plugins</a>
																<div id=StudioWidget>
																	<div class=widget-name>
																		<h3>Developer Resources</h3></div>
																	<div class=content>
																		<div id=LeftColumn>
																			<div class=studio-icon><img src=https://images.rbxcdn.com/3da410727fa2670dcb4f31316643138a.svg.gzip></div>
																		</div>
																		<div id=RightColumn>
																			<ul>
																				<li><a href="https://www.robloxdev.com/">Docs</a>
																					<li><a href="https://devforum.roblox.com/">Community</a></ul>
																		</div>
																	</div>
																</div>
																<td class=content-area><a href=https://www.roblox.com/places/create id=CreatePlace class="create-new-button btn-medium btn-primary">Create New Game</a>
																	<table class=section-header>
																		<tr>
																			<td class=content-title>
																				<div>
																					<h2 class=header-text>Games</h2><span class=aside-text data-active-count=1 data-max-active-count=200></span>
																					<label class="checkbox-label active-only-checkbox">
																						<input type=checkbox>Show Public Only</label>
																				</div>
																	</table>
																	<div class=items-container>
																		<table class=item-table data-item-id=945325985 data-rootplace-id=2633036893 data-in-showcase=false data-configure-url="https://www.roblox.com/universes/configure?id=945325985" data-configure-localization-url=https://www.roblox.com/localization/games/945325985/configure data-create-badge-url="https://www.roblox.com/develop?selectedPlaceId=2633036893&amp;View=21" data-create-gamepass-url="https://www.roblox.com/develop?selectedPlaceId=2633036893&amp;View=34" data-developerstats-url=https://www.roblox.com/places/2633036893/stats data-advertise-url="https://www.roblox.com/My/NewUserAd.aspx?targetId=2633036893&amp;targettype=Asset" data-activate-universe-url=https://develop.roblox.com/v1/universes/945325985/activate data-deactivate-universe-url=https://develop.roblox.com/v1/universes/945325985/deactivate data-type=universes>
																			<tr>
																				<td class="image-col universe-image-col" style=text-align:center>
																					<a href="https://www.roblox.com/universes/configure?id=945325985" class=game-image> <img src=https://t0.rbxcdn.com/f57581e621a200d45ac8f2144f4665de alt="pepsiboy6000's Place"> </a>
																					<td class=universe-name-col><a class="title notranslate" href="https://www.roblox.com/universes/configure?id=945325985">pepsiboy6000&#39;s Place</a>
																						<table class=details-table>
																							<tr>
																								<td class=item-universe><span>Start Place:</span> <a class="title notranslate start-place-url" href=https://www.roblox.com/games/2633036893/pepsiboy6000s-Place>pepsiboy6000&#39;s Place</a>
																									<tr class=activate-cell>
																										<td><a class=place-active href="https://www.roblox.com/universes/configure?id=945325985">Public</a></tr>
																						</table>
																						<td class=edit-col><a class="roblox-edit-button btn-control btn-control-large" href=javascript:>Edit</a>
																							<td class=menu-col>
																								<div class=gear-button-wrapper>
																									<a href=# class=gear-button></a>
																								</div>
																		</table>
																		<div class=separator></div><a href=javascript: class="load-more-universes btn-control btn-control-small">More Games</a></div>
																	<div class=build-loading-container style=display:none>
																		<div class=buildpage-loading-container><img alt=^_^ src=https://images.rbxcdn.com/ec4e85b0c4396cf753a06fade0a8d8af.gif></div>
																	</div>
													</table>
													<div id=build-dropdown-menu><a href=# data-href-reference=configure-url>Configure Game</a> <a href=# data-require-root-place=true data-configure-place-template=https://www.roblox.com/places/0/update>Configure Start Place</a> <a href=# data-href-reference=configure-localization-url id=configure-localization-link>Configure Localization</a> <a href=# class=divider-top data-href-reference=create-badge-url data-require-root-place=true>Create Badge</a> <a href=# data-href-reference=create-gamepass-url data-require-root-place=true>Create Game Pass</a> <a href="https://www.roblox.com/catalog/browse.aspx?Category=5&amp;showInstructions=true" data-require-root-place=true>Add Gear</a> <a href=# data-href-reference=developerstats-url data-require-root-place=true>Developer Stats</a> <a href=# data-href-reference=advertise-url class=divider-top>Advertise</a> <a href=# class=sponsorGameLink data-href-template=https://www.roblox.com/sponsored-games/create/0 data-require-root-place=true>Sponsor</a> <a class="shutdown-all-servers-button divider-top" href=# data-require-root-place=true>Shut Down All Servers</a></div>
													<div class="PlaceSelectorModal modalPopup unifiedModal" style=display:none>
														<div class=Title>Select Place</div>
														<div class="GenericModalBody text">
															<div class=place-selector-modal data-place-loader-url="/universes/get-places-by-context?creationContext=NonGameCreation&amp;universeId=0&amp;groupId=">
																<div class=place-selector-container>
																	<div id=PlaceSelectorItemContainer class=place-selector-item-container></div>
																	<div id=PlaceSelectorPagerContainer class=place-selector-pager-container></div>
																</div>
																<div class="place-selector selectable template" title=Place style=display:none>
																	<div class=place-image data-retry-url-template="/asset-thumbnail/json?height=100&amp;width=160&amp;format=jpeg&amp;returnAutoGenerated=True"><img alt=^_^ class=item-image src=https://images.rbxcdn.com/ec5c01d220bf1b73403fa51519267742.gif></div>
																	<div class=InfoContainer>
																		<div class=place-name></div>
																		<div class=game-name><span class=form-label>Game: </span><span class=game-name-text></span></div>
																		<div class=root-place style=display:none><span>Cannot choose start places</span></div>
																	</div>
																	<div style=clear:both></div>
																</div>
															</div>
														</div>
													</div>
													<script>
													$(function() {
														ROBLOX.PlaceSelector.Init();
														ROBLOX.PlaceSelector.Resources = {
															anErrorOccurred: 'An error occurred, please try again.'
														};
													});
													</script>
													<div class="GenericModal modalPopup unifiedModal smallModal" style=display:none>
														<div class=Title></div>
														<div class=GenericModalBody>
															<div>
																<div class=ImageContainer><img class=GenericModalImage alt="generic image"></div>
																<div class=Message></div>
															</div>
															<div class=GenericModalButtonContainer><a class="ImageButton btn-neutral btn-large roblox-ok">OK</a></div>
														</div>
													</div>
													<script>
													ROBLOX = ROBLOX || {};
													ROBLOX.BuildPage = ROBLOX.BuildPage || {};
													ROBLOX.BuildPage.AlertURL = "https://images.rbxcdn.com/43ac54175f3f3cd403536fedd9170c10.png";
													</script>
												</div>
												<div class=Ads_WideSkyscraper>
													<iframe name=ROBLOX_Build_Right_160x600 allowtransparency=true frameborder=0 height=612 scrolling=no data-src="" src=https://www.<?= $domain ?>/user-sponsorship/2 width=160 data-js-adtype=iframead data-ad-slot=ROBLOX_Build_Right_160x600></iframe>
												</div>
												<script>
												if(typeof ROBLOX === "undefined") {
													ROBLOX = {};
												}
												if(typeof ROBLOX.BuildPage === "undefined") {
													ROBLOX.BuildPage = {};
												}
												ROBLOX.BuildPage.Resources = {
													active: "Public",
													inactive: "Private",
													activatePlace: "Make Place Public",
													editGame: "Edit Game",
													ok: "OK",
													robloxStudio: "ROBLOX Studio",
													openIn: "To edit this game, open to this page in ",
													placeInactive: "Make Place Private",
													toBuileHere: "To build here, please activate this place by clicking the ",
													inactiveButton: "inactive button. ",
													createModel: "Create Model",
													toCreate: "To create models, please use ",
													makeActive: "Make Public",
													makeInactive: "Make Private",
													purchaseComplete: "Purchase Complete!",
													youHaveBid: "You have successfully bid ",
													confirmBid: "Confirm the Bid",
													placeBid: "Place Bid",
													cancel: "Cancel",
													errorOccurred: "Error Occurred",
													adDeleted: "Ad Deleted",
													theAdWasDeleted: "The Ad has been deleted.",
													confirmDelete: "Confirm Deletion",
													areYouSureDelete: "Are you sure you want to delete this Ad?",
													bidRejected: "Your bid was Rejected",
													bidRange: "Bid value must be a number between ",
													bidRange2: "Bid value must be a number greater than ",
													and: " and ",
													yourRejected: "Your bid was Rejected",
													estimatorExplanation: "This estimator uses data from ads run yesterday to guess how many impressions your ad will recieve.",
													estimatedImpressions: "Estimated Impressions ",
													makeAdBid: "Make Ad Bid",
													wouldYouLikeToBid: "Would you like to bid ",
													verify: "Verify",
													emailVerifiedTitle: "Verify Your Email",
													emailVerifiedMessage: "You must verify your email before you can work on your place. You can verify your email on the <a href='https://www.roblox.com/my/account?confirmemail=1'>Account</a> page.",
													continueText: "Continue",
													profileRemoveTitle: "Remove from profile?",
													profileRemoveMessage: "This game is private and listed on your profile, do you wish to remove it?",
													profileAddTitle: "Add to profile?",
													profileAddMessage: "This game is public, but not listed on your profile, do you wish to add it?",
													deactivateTitle: "Make Game Private",
													deactivateBody: "This will shut down any running games <br /><br />Do you still want to make this game private?",
													deactivateButton: "Make Private",
													questionmarkImgUrl: "https://static.rbxcdn.com/images/Buttons/questionmark-12x12.png",
													activationRequestFailed: "Request to make game public failed. Please retry in a few minutes!",
													deactivationRequestFailed: "Request to make game private failed. Please retry in a few minutes!",
													tooManyActiveMessage: "You have reached the maximum number of public places for your membership level. Make one of your existing places private before making this place public.",
													activeSlotsMessage: "{0} of {1} public slots used"
												};
												</script>
											</div>
											<div id=GroupCreationsTab style=display:none>
												<div class=BuildPageContent data-groupid="">
													<input id=assetTypeId name=assetTypeId type=hidden value=0>
													<input data-val=true data-val-required="The IsTgaUploadEnabled field is required." id=isTgaUploadEnabled name=isTgaUploadEnabled type=hidden value=True>
													<table id=build-page data-asset-type-id=0 data-showcases-enabled=true data-edit-opens-studio=False>
														<tr>
															<td class="menu-area divider-right"><a href="https://www.roblox.com/develop?Page=universes" class="tab-item tab-item-selected">Games</a> <a href="https://www.roblox.com/develop?View=9" class=tab-item>Places</a> <a href="https://www.roblox.com/develop?View=10" class=tab-item>Models</a> <a href="https://www.roblox.com/develop?View=13" class=tab-item>Decals</a> <a href="https://www.roblox.com/develop?View=21" class=tab-item>Badges</a> <a href="https://www.roblox.com/develop?Page=game-passes" class=tab-item>Game Passes</a> <a href="https://www.roblox.com/develop?View=3" class=tab-item>Audio</a> <a href="https://www.roblox.com/develop?View=24" class=tab-item>Animations</a> <a href="https://www.roblox.com/develop?View=40" class=tab-item>Meshes</a> <a href="https://www.roblox.com/develop?Page=ads" class=tab-item>User Ads</a> <a href="https://www.roblox.com/develop?Page=sponsored-games" class=tab-item>Sponsored Games</a> <a href="https://www.roblox.com/develop?View=11" class=tab-item>Shirts</a> <a href="https://www.roblox.com/develop?View=2" class=tab-item>T-Shirts</a> <a href="https://www.roblox.com/develop?View=12" class=tab-item>Pants</a> <a href="https://www.roblox.com/develop?View=38" class=tab-item>Plugins</a>
																<div id=StudioWidget>
																	<div class=widget-name>
																		<h3>Developer Resources</h3></div>
																	<div class=content>
																		<div id=LeftColumn>
																			<div class=studio-icon><img src=https://images.rbxcdn.com/3da410727fa2670dcb4f31316643138a.svg.gzip></div>
																		</div>
																		<div id=RightColumn>
																			<ul>
																				<li><a href="https://www.robloxdev.com/">Docs</a>
																					<li><a href="https://devforum.roblox.com/">Community</a></ul>
																		</div>
																	</div>
																</div>
																<td class=content-area><a href=https://www.roblox.com/places/create id=CreatePlace class="create-new-button btn-medium btn-primary">Create New Game</a>
																	<table class=section-header>
																		<tr>
																			<td class=content-title>
																				<div>
																					<h2 class=header-text>Games</h2><span class=aside-text data-active-count=1 data-max-active-count=200></span>
																					<label class="checkbox-label active-only-checkbox">
																						<input type=checkbox>Show Public Only</label>
																				</div>
																	</table>
																	<div class=items-container>
																		<table class=item-table data-item-id=945325985 data-rootplace-id=2633036893 data-in-showcase=false data-configure-url="https://www.roblox.com/universes/configure?id=945325985" data-configure-localization-url=https://www.roblox.com/localization/games/945325985/configure data-create-badge-url="https://www.roblox.com/develop?selectedPlaceId=2633036893&amp;View=21" data-create-gamepass-url="https://www.roblox.com/develop?selectedPlaceId=2633036893&amp;View=34" data-developerstats-url=https://www.roblox.com/places/2633036893/stats data-advertise-url="https://www.roblox.com/My/NewUserAd.aspx?targetId=2633036893&amp;targettype=Asset" data-activate-universe-url=https://develop.roblox.com/v1/universes/945325985/activate data-deactivate-universe-url=https://develop.roblox.com/v1/universes/945325985/deactivate data-type=universes>
																			<tr>
																				<td class="image-col universe-image-col" style=text-align:center>
																					<a href="https://www.roblox.com/universes/configure?id=945325985" class=game-image> <img src=https://t0.rbxcdn.com/f57581e621a200d45ac8f2144f4665de alt="pepsiboy6000's Place"> </a>
																					<td class=universe-name-col><a class="title notranslate" href="https://www.roblox.com/universes/configure?id=945325985">pepsiboy6000&#39;s Place</a>
																						<table class=details-table>
																							<tr>
																								<td class=item-universe><span>Start Place:</span> <a class="title notranslate start-place-url" href=https://www.roblox.com/games/2633036893/pepsiboy6000s-Place>pepsiboy6000&#39;s Place</a>
																									<tr class=activate-cell>
																										<td><a class=place-active href="https://www.roblox.com/universes/configure?id=945325985">Public</a></tr>
																						</table>
																						<td class=edit-col><a class="roblox-edit-button btn-control btn-control-large" href=javascript:>Edit</a>
																							<td class=menu-col>
																								<div class=gear-button-wrapper>
																									<a href=# class=gear-button></a>
																								</div>
																		</table>
																		<div class=separator></div><a href=javascript: class="load-more-universes btn-control btn-control-small">More Games</a></div>
																	<div class=build-loading-container style=display:none>
																		<div class=buildpage-loading-container><img alt=^_^ src=https://images.rbxcdn.com/ec4e85b0c4396cf753a06fade0a8d8af.gif></div>
																	</div>
													</table>
													<div id=build-dropdown-menu><a href=# data-href-reference=configure-url>Configure Game</a> <a href=# data-require-root-place=true data-configure-place-template=https://www.roblox.com/places/0/update>Configure Start Place</a> <a href=# data-href-reference=configure-localization-url id=configure-localization-link>Configure Localization</a> <a href=# class=divider-top data-href-reference=create-badge-url data-require-root-place=true>Create Badge</a> <a href=# data-href-reference=create-gamepass-url data-require-root-place=true>Create Game Pass</a> <a href="https://www.roblox.com/catalog/browse.aspx?Category=5&amp;showInstructions=true" data-require-root-place=true>Add Gear</a> <a href=# data-href-reference=developerstats-url data-require-root-place=true>Developer Stats</a> <a href=# data-href-reference=advertise-url class=divider-top>Advertise</a> <a href=# class=sponsorGameLink data-href-template=https://www.roblox.com/sponsored-games/create/0 data-require-root-place=true>Sponsor</a> <a class="shutdown-all-servers-button divider-top" href=# data-require-root-place=true>Shut Down All Servers</a></div>
													<div class="PlaceSelectorModal modalPopup unifiedModal" style=display:none>
														<div class=Title>Select Place</div>
														<div class="GenericModalBody text">
															<div class=place-selector-modal data-place-loader-url="/universes/get-places-by-context?creationContext=NonGameCreation&amp;universeId=0&amp;groupId=">
																<div class=place-selector-container>
																	<div id=PlaceSelectorItemContainer class=place-selector-item-container></div>
																	<div id=PlaceSelectorPagerContainer class=place-selector-pager-container></div>
																</div>
																<div class="place-selector selectable template" title=Place style=display:none>
																	<div class=place-image data-retry-url-template="/asset-thumbnail/json?height=100&amp;width=160&amp;format=jpeg&amp;returnAutoGenerated=True"><img alt=^_^ class=item-image src=https://images.rbxcdn.com/ec5c01d220bf1b73403fa51519267742.gif></div>
																	<div class=InfoContainer>
																		<div class=place-name></div>
																		<div class=game-name><span class=form-label>Game: </span><span class=game-name-text></span></div>
																		<div class=root-place style=display:none><span>Cannot choose start places</span></div>
																	</div>
																	<div style=clear:both></div>
																</div>
															</div>
														</div>
													</div>
													<script>
													$(function() {
														ROBLOX.PlaceSelector.Init();
														ROBLOX.PlaceSelector.Resources = {
															anErrorOccurred: 'An error occurred, please try again.'
														};
													});
													</script>
													<div class="GenericModal modalPopup unifiedModal smallModal" style=display:none>
														<div class=Title></div>
														<div class=GenericModalBody>
															<div>
																<div class=ImageContainer><img class=GenericModalImage alt="generic image"></div>
																<div class=Message></div>
															</div>
															<div class=GenericModalButtonContainer><a class="ImageButton btn-neutral btn-large roblox-ok">OK</a></div>
														</div>
													</div>
													<script>
													ROBLOX = ROBLOX || {};
													ROBLOX.BuildPage = ROBLOX.BuildPage || {};
													ROBLOX.BuildPage.AlertURL = "https://images.rbxcdn.com/43ac54175f3f3cd403536fedd9170c10.png";
													</script>
												</div>
												<div class=Ads_WideSkyscraper>
													<iframe name=ROBLOX_Build_Right_160x600 allowtransparency=true frameborder=0 height=612 scrolling=no data-src="" src=https://www.roblox.com/user-sponsorship/2 width=160 data-js-adtype=iframead data-ad-slot=ROBLOX_Build_Right_160x600></iframe>
												</div>
												<script>
												if(typeof ROBLOX === "undefined") {
													ROBLOX = {};
												}
												if(typeof ROBLOX.BuildPage === "undefined") {
													ROBLOX.BuildPage = {};
												}
												ROBLOX.BuildPage.Resources = {
													active: "Public",
													inactive: "Private",
													activatePlace: "Make Place Public",
													editGame: "Edit Game",
													ok: "OK",
													robloxStudio: "ROBLOX Studio",
													openIn: "To edit this game, open to this page in ",
													placeInactive: "Make Place Private",
													toBuileHere: "To build here, please activate this place by clicking the ",
													inactiveButton: "inactive button. ",
													createModel: "Create Model",
													toCreate: "To create models, please use ",
													makeActive: "Make Public",
													makeInactive: "Make Private",
													purchaseComplete: "Purchase Complete!",
													youHaveBid: "You have successfully bid ",
													confirmBid: "Confirm the Bid",
													placeBid: "Place Bid",
													cancel: "Cancel",
													errorOccurred: "Error Occurred",
													adDeleted: "Ad Deleted",
													theAdWasDeleted: "The Ad has been deleted.",
													confirmDelete: "Confirm Deletion",
													areYouSureDelete: "Are you sure you want to delete this Ad?",
													bidRejected: "Your bid was Rejected",
													bidRange: "Bid value must be a number between ",
													bidRange2: "Bid value must be a number greater than ",
													and: " and ",
													yourRejected: "Your bid was Rejected",
													estimatorExplanation: "This estimator uses data from ads run yesterday to guess how many impressions your ad will recieve.",
													estimatedImpressions: "Estimated Impressions ",
													makeAdBid: "Make Ad Bid",
													wouldYouLikeToBid: "Would you like to bid ",
													verify: "Verify",
													emailVerifiedTitle: "Verify Your Email",
													emailVerifiedMessage: "You must verify your email before you can work on your place. You can verify your email on the <a href='https://www.roblox.com/my/account?confirmemail=1'>Account</a> page.",
													continueText: "Continue",
													profileRemoveTitle: "Remove from profile?",
													profileRemoveMessage: "This game is private and listed on your profile, do you wish to remove it?",
													profileAddTitle: "Add to profile?",
													profileAddMessage: "This game is public, but not listed on your profile, do you wish to add it?",
													deactivateTitle: "Make Game Private",
													deactivateBody: "This will shut down any running games <br /><br />Do you still want to make this game private?",
													deactivateButton: "Make Private",
													questionmarkImgUrl: "https://static.rbxcdn.com/images/Buttons/questionmark-12x12.png",
													activationRequestFailed: "Request to make game public failed. Please retry in a few minutes!",
													deactivationRequestFailed: "Request to make game private failed. Please retry in a few minutes!",
													tooManyActiveMessage: "You have reached the maximum number of public places for your membership level. Make one of your existing places private before making this place public.",
													activeSlotsMessage: "{0} of {1} public slots used"
												};
												</script>
											</div>
											<div id=LibraryTab>
												<div class=loading id=LibraryLoadingIndicatorContainer><img id=LibraryLoadingIndicator src=https://images.rbxcdn.com/ec4e85b0c4396cf753a06fade0a8d8af.gif alt=Progress></div>
											</div>
											<div id=DeveloperExchangeTab>
												<div id=TosAgreementInfo data-terms-check-needed=True></div>
												<div id=DevExLeftColumn class=columnar-container>
													<h2>Welcome to the ROBLOX Developer Exchange!</h2>
													<p class=indet>The Developer Exchange Program (also known as DevEx) allows you to earn money by creating awesome games on ROBLOX.
														<p>Once you earn 100,000 ROBUX or more, you are eligible to convert your virtual earnings to real-world cash.
															<p>To use DevEx, you must agree to DevEx Terms of Service and meet the simple requirements set out in those Terms, some of which are as follows:
																<ul>
																	<li>Member of the Outrageous Builders Club;
																		<li>Minimum of 100,000 earned ROBUX in your account;
																			<li>Have a verified email address;
																				<li>Valid DevEx portal account;
																					<li>13 years of age or older; and
																						<li>Community member in good standing, having complied with <a href=https://www.roblox.com/info/terms>ROBLOX's Terms of Use</a>.</ul>
																<p>When you meet all the requirements, you will see a "Cash Out" button on this page. Click it and follow the instructions to get your payment started.
																	<p>We recommend that you familiarize yourself with the tax treatment of DevEx payments and the fees associated with different payment methods on DevEx transactions before you cash out.
																		<p>If your request is approved, and if this is your first time cashing out, you will receive an email inviting you to create an account on our DevEx portal. You will be prompted to enter your information at account creation. <strong> Please make sure your information is entered accurately into the DevEx portal, and is kept up to date at all times. </strong> The information you provide is used to ensure all payments comply with laws and regulations. Inaccuracies in information provided could impact your payment.
																			<p>
																				<div><a href=https://en.help.roblox.com/hc/en-us/articles/203314100 target=_blank>More info about DevEx</a></div>
																				<div><a href=https://www.roblox.com/developer-exchange/tos target=_blank>DevEx Terms of Service</a></div>
												</div>
												<div id=DevExRightColumn class=columnar-container>
													<div id=CashOutWidget data-modal="">
														<h2>Developer Exchange: Create games, earn money.</h2>
														<div>
															<h3 id=ExchangeRatesHeader class=space-above>Current Exchange Rates <span>*</span> :</h3>
															<div class=subtitle>
																<div>100K ROBUX for <span class=robux-text>$350 USD</span></div>
																<div>250K ROBUX for <span class=robux-text>$875 USD</span></div>
																<div>500K ROBUX for <span class=robux-text>$1,750 USD</span></div>
																<div>1M ROBUX for <span class=robux-text>$3,500 USD</span></div>
																<div>2M ROBUX for <span class=robux-text>$7,000 USD</span></div>
																<div>4M ROBUX for <span class=robux-text>$14,000 USD</span></div>
																<div>7M ROBUX for <span class=robux-text>$24,500 USD</span></div>
																<div>10M ROBUX for <span class=robux-text>$35,000 USD</span></div>
																<div>15M ROBUX for <span class=robux-text>$52,500 USD</span></div>
																<div>20M ROBUX for <span class=robux-text>$70,000 USD</span></div>
																<div>30M ROBUX for <span class=robux-text>$105,000 USD</span></div>
																<div>40M ROBUX for <span class=robux-text>$140,000 USD</span></div>
																<div>60M ROBUX for <span class=robux-text>$210,000 USD</span></div>
																<div>80M ROBUX for <span class=robux-text>$280,000 USD</span></div>
																<div>115M ROBUX for <span class=robux-text>$402,500 USD</span></div>
																<div>150M ROBUX for <span class=robux-text>$525,000 USD</span></div>
																<div>225M ROBUX for <span class=robux-text>$787,500 USD</span></div>
																<div>300M ROBUX for <span class=robux-text>$1,050,000 USD</span></div>
																<div>450M ROBUX for <span class=robux-text>$1,575,000 USD</span></div>
																<div>600M ROBUX for <span class=robux-text>$2,100,000 USD</span></div>
															</div>
														</div>
														<div class=xsmall>
															<br> * Old ROBUX may be cashed out at a different rate. Please click <a href=https://en.help.roblox.com/hc/en-us/articles/203314100 target=_blank>here</a> for more information.</div>
													</div>
												</div>
											</div>
										</div>
										<div id=AdPreviewModal class=simplemodal-data style=display:none>
											<div id=ConfirmationDialog style=overflow:hidden>
												<div id=AdPreviewContainer style=overflow:hidden></div>
											</div>
										</div>
										<script>
										ROBLOX.CatalogValues = ROBLOX.CatalogValues || {};
										ROBLOX.CatalogValues.CatalogContentsUrl = "/catalog/contents";
										ROBLOX.CatalogValues.CatalogContext = 2;
										ROBLOX.CatalogValues.CatalogContextDevelopOnly = 2;
										ROBLOX.CatalogValues.ContainerID = "LibraryTab";
										$(function() {
											if(ROBLOX && ROBLOX.AdsHelper && ROBLOX.AdsHelper.AdRefresher) {
												ROBLOX.AdsHelper.AdRefresher.globalCreateNewAdEnabled = true;
												ROBLOX.AdsHelper.AdRefresher.adRefreshRateInMilliseconds = 3000;
											}
										});
										</script>
										<div style=clear:both></div>
									</div>
								</div>
							</div>
							<?php require_once("../includes/footer.php"); ?>
						</div>
					</div>
				</div>
			</div>




<?php require_once("../includes/placelauncher.php"); ?>

<?php require_once("../includes/modals/legacyGenericConfirmationModal.php"); ?>

<script type='text/javascript' src='https://js.rbxcdn.com/ef653c76672de145916c9dafa5f20959.js.gzip'></script>

<?php require_once("../includes/cookieupgrader.php"); ?>
</body>
</html>
