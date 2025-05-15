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
    if (Roblox && Roblox.PageHeartbeatEvent) {
        Roblox.PageHeartbeatEvent.Init([2,8,20,60]);
    }
</script>    
<script type='text/javascript' src='https://js.idk18.xyz/42ffb266402d8366444aa39d4fc517b9.js'></script>

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

<div id=navContent class="nav-content logged-out">
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
									RobloxEventManager.triggerEvent('rbx_evt_odr', {});
									cookie.odr = 1;
								}
								if(daysSinceFirstVisit >= 1 && daysSinceFirstVisit <= 7 && typeof cookie.sdr === "undefined") {
									RobloxEventManager.triggerEvent('rbx_evt_sdr', {});
									cookie.sdr = 1;
								}
								try {
									localStorage.setItem(cookieName, JSON.stringify(cookie));
								} catch(ex) {
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
							RobloxEventManager.startMonitor();
						});
						</script>
						<div>
							<div class=alert-container>
								<noscript>
									<div class=alert-info>Please enable Javascript to use all the features on this site.</div>
								</noscript>
							</div>
							<div id=AdvertisingLeaderboard>
								<iframe name=Roblox_Default_Top_728x90 allowtransparency=true frameborder=0 height=110 scrolling=no data-src="" src=https://www.<?= $domain ?>/user-sponsorship/1 width=728 data-js-adtype=iframead data-ad-slot=Roblox_Default_Top_728x90></iframe>
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
														Roblox.PlaceSelector.Init();
														Roblox.PlaceSelector.Resources = {
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
													Roblox = Roblox || {};
													Roblox.BuildPage = Roblox.BuildPage || {};
													Roblox.BuildPage.AlertURL = "https://images.rbxcdn.com/43ac54175f3f3cd403536fedd9170c10.png";
													</script>
												</div>
												<div class=Ads_WideSkyscraper>
													<iframe name=Roblox_Build_Right_160x600 allowtransparency=true frameborder=0 height=612 scrolling=no data-src="" src=https://www.<?= $domain ?>/user-sponsorship/2 width=160 data-js-adtype=iframead data-ad-slot=Roblox_Build_Right_160x600></iframe>
												</div>
												<script>
												if(typeof Roblox === "undefined") {
													Roblox = {};
												}
												if(typeof Roblox.BuildPage === "undefined") {
													Roblox.BuildPage = {};
												}
												Roblox.BuildPage.Resources = {
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
														Roblox.PlaceSelector.Init();
														Roblox.PlaceSelector.Resources = {
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
													Roblox = Roblox || {};
													Roblox.BuildPage = Roblox.BuildPage || {};
													Roblox.BuildPage.AlertURL = "https://images.rbxcdn.com/43ac54175f3f3cd403536fedd9170c10.png";
													</script>
												</div>
												<div class=Ads_WideSkyscraper>
													<iframe name=Roblox_Build_Right_160x600 allowtransparency=true frameborder=0 height=612 scrolling=no data-src="" src=https://www.roblox.com/user-sponsorship/2 width=160 data-js-adtype=iframead data-ad-slot=Roblox_Build_Right_160x600></iframe>
												</div>
												<script>
												if(typeof Roblox === "undefined") {
													Roblox = {};
												}
												if(typeof Roblox.BuildPage === "undefined") {
													Roblox.BuildPage = {};
												}
												Roblox.BuildPage.Resources = {
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
													<p class=indet>The Developer Exchange allows you to earn money by creating awesome games on ROBLOX. Once you collect 100,000 ROBUX or more, you are eligible to convert your virtual earnings to real-world cash.

															<p>To use DevEx, you meet to the simple requirements:
																<ul>
																	<li>Belong to <a href="https://www.roblox.com/premium/membership?cashout=obc">Outrageous Builders Club;</a>;
																		<li>Have accumulated 100,000 ROBUX;
																			<li>Have a verified email address;
																				<li>Have a valid PayPal account;
																					<li>Sign up for the program and provide all necessary documentation;
																						<li>Be a community member in good standing;
																							<li>Be 13 years of age or older.</ul>
																<p>Once you have acquired 100,000 ROBUX or more, you will be able to select the "Cash Out" button. Click that button and enter all requested information (i.e. full name and full address*), along with your phone number, PayPal email address, and ROBLOX password. Once done, select from the available payout (exchange rate) options, mark the Terms and Conditions check-box, and again click "Cash Out".
																	<p>*Note: If your country is not available, select United States. After submitting the form, send an email to DevEx@roblox.com with an explanation of your issue, along with the desired country not in the list. Make sure to include your username in the email.
																		<p>The Current Exchange Rate is 100,000 ROBUX for $250 USD. The maximum exchange each month is $50,000 USD.
																			<p>
																				<div><a href=https://en.help.roblox.com/hc/en-us/articles/203314100 target=_blank>More info about DevEx</a></div>
																				<div><a href=https://www.roblox.com/developer-exchange/tos target=_blank>DevEx Terms of Service</a></div>
												</div>
												<div id=DevExRightColumn class=columnar-container>
													<div id=CashOutWidget data-modal="">
														<h2>Developer Exchange: Trade ROBUX for cash!</h2>
														<div>
															<h3 id=ExchangeRatesHeader class=space-above>Current Exchange Rates:</h3>
															<div class=subtitle>
																<div>100K ROBUX for <span class=robux-text>$250 USD</span></div>
																<div>250K ROBUX for <span class=robux-text>$675 USD</span></div>
																<div>500K ROBUX for <span class=robux-text>$1,250 USD</span></div>
																<div>1M ROBUX for <span class=robux-text>$2,500 USD</span></div>
																<div>2M ROBUX for <span class=robux-text>$5,000 USD</span></div>
																<div>5M ROBUX for <span class=robux-text>$12,500 USD</span></div>
																<div>8M ROBUX for <span class=robux-text>$20,000 USD</span></div>
															</div>
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
										Roblox.CatalogValues = Roblox.CatalogValues || {};
										Roblox.CatalogValues.CatalogContentsUrl = "/catalog/contents";
										Roblox.CatalogValues.CatalogContext = 2;
										Roblox.CatalogValues.CatalogContextDevelopOnly = 2;
										Roblox.CatalogValues.ContainerID = "LibraryTab";
										$(function() {
											if(Roblox && Roblox.AdsHelper && Roblox.AdsHelper.AdRefresher) {
												Roblox.AdsHelper.AdRefresher.globalCreateNewAdEnabled = true;
												Roblox.AdsHelper.AdRefresher.adRefreshRateInMilliseconds = 3000;
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
