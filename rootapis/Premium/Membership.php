<?php
$pageName = "";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <!-- MachineID: <?= $webServerName ?> -->
    <title>Upgrade - ROBLOX</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,requiresActiveX=true" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="ROBLOX Corporation" />
<meta name="description" content="ROBLOX is powered by a growing community of over 300,000 creators who produce an infinite variety of highly immersive experiences. These experiences range from 3D multiplayer games and competitions, to interactive adventures where friends can take on new personas imagining what it would be like to be a dinosaur, a miner in a quarry or an astronaut on a space exploration." />
<meta name="keywords" content="free games, online games, building games, virtual worlds, free mmo, gaming cloud, physics engine" />

    
    

    <link rel="canonical" href="<?= $requestUrl ?>" />

            <link href="https://images.idk18.xyz/7aee41db80c1071f60377c3575a0ed87.ico" rel="icon" />
    


<link rel='stylesheet' href='https://static.idk18.xyz/css/MainCSS___58dd044044005dc0e887c80110c9a567_m.css/fetch' />
<link rel='stylesheet' href='https://static.idk18.xyz/css/page___5e340a637183a0d3e92f15ad04285831_m.css/fetch' />
    

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

<script type='text/javascript' src='https://js.idk18.xyz/2664b2ea8f5caff5f0d2c3574829d03f.js'></script>
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

<div id="navContent" class="nav-content">
        <div class="nav-content-inner">
        <div class="alert-info"><b>This page is for decorative purposes only. Prices will not reflect the ability to purchase these products.</b></div>
    <div id="Container">
        <div style="clear: both"></div>
        
        <div id="Body" class="simple-body">
            
        <div id="BCPageContainer">
	<div id="UserDataInfo" data-auth="<?php if ($isUserAuthenticated) echo 'true'; else echo 'false'; ?>" data-active-bc="<?php if ($userInfo['membershipType'] >= 1) echo 'true'; else echo 'false'; ?>"></div>
	<div class="header">
		<span><h1>Upgrade to ROBLOX Builders Club</h1></span>
	</div>
	<div class="left-column">
		<table cellspacing="0" border="0">
			<thead class="product-title">
				<tr>
					<td class="center-bold">
						<h2 class="product-space">Free</h2>
						<img data-attribute="free" src="https://images.idk18.xyz/77add140640c3388e6c9603bc5983846.png" alt="free" />
					</td>
					<td class="center-bold">
						<h2 class="product-space">Classic</h2>
                        <img data-attribute="classic" src="https://images.idk18.xyz/ba707f47bb20a1f4804da461fb5d3c31.png" alt=" bc" />
					</td>
					<td class="center-bold">
						<h2 class="product-space">Turbo</h2>
                        <img data-attribute="turbo" src="https://images.idk18.xyz/d7eb3ed186e351d99ce8c11503675721.png" alt="tbc" />
					</td>
					<td class="center-bold">
						<h2 class="product-space">Outrageous</h2>
                        <img data-attribute="outrageous" src="https://images.idk18.xyz/ca1d0aef06c5fc06a2d8b23aea5e20d2.png" alt="obc" />
					</td>
				</tr>
			</thead>
			
	<tbody class="product-summary summary-big">
			<tr>
				<td class="divider-top">
					<span class="product-description">Daily ROBUX</span>
					<span class="nbc-product">No</span>
				</td>
				<td class="divider-top bc-product ">
					R$15
				</td>
				<td class="divider-top tbc-product 		emphasis
">
					R$35
				</td>
			    <td class="divider-top obc-product 		emphasis
">
			        R$60
			    </td>
			</tr>
			<tr>
				<td class="divider-top">
					<span class="product-description">Join Groups</span>
					<span class="nbc-product">5</span>
				</td>
				<td class="divider-top bc-product ">
					10
				</td>
				<td class="divider-top tbc-product ">
					20
				</td>
			    <td class="divider-top obc-product ">
			        100!
			    </td>
			</tr>
			<tr>
				<td class="divider-top">
					<span class="product-description">Create Groups</span>
					<span class="nbc-product">No</span>
				</td>
				<td class="divider-top bc-product ">
					10
				</td>
				<td class="divider-top tbc-product ">
					20
				</td>
			    <td class="divider-top obc-product ">
			        100!
			    </td>
			</tr>
			<tr>
				<td class="divider-top">
					<span class="product-description">Signing Bonus*</span>
					<span class="nbc-product">No</span>
				</td>
				<td class="divider-top bc-product ">
					R$100
				</td>
				<td class="divider-top tbc-product ">
					R$100
				</td>
			    <td class="divider-top obc-product ">
			        R$100
			    </td>
			</tr>
			<tr>
				<td class="divider-top">
					<span class="product-description">Paid Access</span>
					<span class="nbc-product">10%</span>
				</td>
				<td class="divider-top bc-product ">
					70%
				</td>
				<td class="divider-top tbc-product ">
					70%
				</td>
			    <td class="divider-top obc-product ">
			        70%
			    </td>
			</tr>
                    <tr>
                <td colspan="4">* Signing bonus is for first time membership purchase only.</td>
            </tr>
	</tbody>

<tbody class="product-grid">
        <tr>
            
            <td class="product-cell divider-left">
                <div class="product-nbc divider-bottom"></div>
            </td>
                <td class="product-cell divider-left">
                    <div class="product-cell">
                        	<div class="product-text">
		<h3>Monthly</h3>
	</div>

                        <a  data-pid="1" data-rank="BC" data-duration="Monthly" class="btn-medium btn-primary product-button">$5.95</a>
                    </div>
                </td>
                <td class="product-cell divider-left">
                    <div class="product-cell">
                        	<div class="product-text">
		<h3>Monthly</h3>
	</div>

                        <a  data-pid="34" data-rank="TBC" data-duration="Monthly" class="btn-medium btn-disabled-negative">$11.95</a>
                    </div>
                </td>
                <td class="product-cell divider-left">
                    <div class="product-cell">
                        	<div class="product-text">
		<h3>Monthly</h3>
	</div>

                        <a  data-pid="28" data-rank="OBC" data-duration="Monthly" class="btn-medium btn-disabled-negative">$19.95</a>
                    </div>
                </td>
        </tr>
        <tr>
            
            <td class="product-cell divider-left">
                <div class="product-nbc divider-bottom"></div>
            </td>
                <td class="product-cell divider-left">
                    <div class="product-cell">
                        	<div class="product-text">
		<h3>Annually</h3>
	</div>

                        <a  data-pid="24" data-rank="BC" data-duration="Annually" class="btn-medium btn-disabled-negative">$57.95</a>
                    </div>
                </td>
                <td class="product-cell divider-left">
                    <div class="product-cell">
                        	<div class="product-text">
		<h3>Annually</h3>
	</div>

                        <a  data-pid="27" data-rank="TBC" data-duration="Annually" class="btn-medium btn-disabled-negative">$85.95</a>
                    </div>
                </td>
                <td class="product-cell divider-left">
                    <div class="product-cell">
                        	<div class="product-text">
		<h3>Annually</h3>
	</div>

                        <a  data-pid="33" data-rank="OBC" data-duration="Annually" class="btn-medium btn-disabled-negative">$129.95</a>
                    </div>
                </td>
        </tr>
</tbody>
	<tbody class="product-summary summary-small">
			<tr>
				<td class="divider-top">
					<span class="product-description">Ad Free</span>
					<span class="nbc-product">No</span>
				</td>
				<td class="divider-top bc-product 		emphasis
">
					✔
				</td>
				<td class="divider-top tbc-product 		emphasis
">
					✔
				</td>
			    <td class="divider-top obc-product 		emphasis
">
			        ✔
			    </td>
			</tr>
			<tr>
				<td class="divider-top">
					<span class="product-description">Sell Stuff</span>
					<span class="nbc-product">No</span>
				</td>
				<td class="divider-top bc-product 		emphasis
">
					✔
				</td>
				<td class="divider-top tbc-product 		emphasis
">
					✔
				</td>
			    <td class="divider-top obc-product 		emphasis
">
			        ✔
			    </td>
			</tr>
			<tr>
				<td class="divider-top">
					<span class="product-description">Virtual Hat</span>
					<span class="nbc-product">No</span>
				</td>
				<td class="divider-top bc-product 		emphasis
">
					✔
				</td>
				<td class="divider-top tbc-product 		emphasis
">
					✔
				</td>
			    <td class="divider-top obc-product 		emphasis
">
			        ✔
			    </td>
			</tr>
			<tr>
				<td class="divider-top">
					<span class="product-description">Bonus Gear</span>
					<span class="nbc-product">No</span>
				</td>
				<td class="divider-top bc-product 		emphasis
">
					✔
				</td>
				<td class="divider-top tbc-product 		emphasis
">
					✔
				</td>
			    <td class="divider-top obc-product 		emphasis
">
			        ✔
			    </td>
			</tr>
			<tr>
				<td class="divider-top">
					<span class="product-description">BC Beta Features</span>
					<span class="nbc-product">No</span>
				</td>
				<td class="divider-top bc-product 		emphasis
">
					✔
				</td>
				<td class="divider-top tbc-product 		emphasis
">
					✔
				</td>
			    <td class="divider-top obc-product 		emphasis
">
			        ✔
			    </td>
			</tr>
			<tr>
				<td class="divider-top">
					<span class="product-description">Trade System</span>
					<span class="nbc-product">No</span>
				</td>
				<td class="divider-top bc-product 		emphasis
">
					✔
				</td>
				<td class="divider-top tbc-product 		emphasis
">
					✔
				</td>
			    <td class="divider-top obc-product 		emphasis
">
			        ✔
			    </td>
			</tr>
        	</tbody>






		</table>
	</div>
	<div class="right-column">

<div id="RightColumnWrapper">
    <div class="cell cellDivider">
        For billing and payment questions: <span class="SL_swap" id="CsEmailLink"><a href="mailto:idk@idk18.xyz">idk@idk18.xyz</a></span>
    </div>
            <div class="cell cellDivider">
        <h3>Buy ROBUX</h3>
        <p>ROBUX is the virtual currency used in many of our online games. You can also use ROBUX for finding a great look for your avatar. Get cool gear to take into multiplayer battles. Buy Limited items to sell and trade. You’ll need ROBUX to make it all happen. What are you waiting for?</p>
        <p>
            <a  href="https://www.<?= $domain ?>/upgrades/robux?ctx=upgrade" class="btn-medium btn-primary">Buy ROBUX</a>
        </p>
        <h3>Buy ROBUX with</h3><br /><br />
        <a href="https://www.<?= $domain ?>/rixtypin"><img src="https://images.rbxcdn.com/028e16231452041ab6d702ea467e96dd.png" alt="rixty" /></a><br /><br />
        <a href="http://itunes.apple.com/us/app/roblox-mobile/id431946152?mt=8"><img src="https://images.rbxcdn.com/70deff83e869746b0bbc41a86f420844.png" alt="itunes" /></a>
    </div>
    <div class="cell cellDivider">
        <h3>Game Cards</h3>
        <a href="https://www.<?= $domain ?>/gamecards"><img alt="ROBLOX Gamecards" src="https://images.rbxcdn.com/863c65342816d665de28411cf47cde42.png" /></a>
        <div class="gameCardControls">
            <div class="gameCardButton">
                <a  href="https://www.<?= $domain ?>/gamecards" class="btn-small btn-primary">Where to Buy</a>
            </div>
            <div><a href="https://www.<?= $domain ?>/gamecard" class="redeemLink">Redeem Card</a></div>
            <div style="clear: both"></div>
        </div>
    </div>
    <div class="cell">
        <h3>Parents</h3>
        <p>Learn more about Builders Club and how we help <a href="http://corp.<?= $domain ?>/parents" class="roblox-interstitial">keep kids safe.</a></p>
        <h3>Cancellation</h3>
        <p>You can turn off membership auto renewal at any time before the renewal date and you will continue to receive Builders Club privileges for the remainder of the currently paid period. To turn off membership auto renewal, please click the 'Cancel Membership Renewal button' on the <a href="https://www.<?= $domain ?>/my/account?tab=billing" class="roblox-interstitial">Billing</a> tab of the Settings page and confirm the cancellation.</p>
    </div>
</div>
	</div>
    <div id="dialog-confirmation" style="display: none;"></div>
    <script>
        $(function() {
            if (GoogleAnalyticsEvents) {
                GoogleAnalyticsEvents.SetCustomVar(1, 'BCButtonClick', '', 2);
                GoogleAnalyticsEvents.FireEvent(['RobuxBcClick', 'BCButtonClick', '']);
            }
        });
    </script>
</div>
<div style="clear:both"></div>
        </div>
        <?php require_once("../includes/footer.php"); ?>
    </div>
        </div></div>




<?php require_once("../includes/placelauncher.php"); ?>

<?php require_once("../includes/modals/legacyGenericConfirmationModal.php"); ?>



<?php require_once("../includes/cookieupgrader.php"); ?>
</body>
</html>
