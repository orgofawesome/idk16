<?php
$allowedTypes = [ 8, 19, 41, 11, 12, 18 ];
$allowedPurchasables = [ 8, 19, 41, 11, 12, 18 ];
$asset = AssetService::getAssetInfo($vars["asset_id"]);

if (!in_array($asset["typeid"], $allowedTypes))
    die(header("Location: https://www.".$domain."/request-error?code=404"));

$showPurchase = false;
$isAccessory = false;
$isWearable = true;

switch ($asset["typeid"])
{
    case 11:
    case 12:
    case 18:
    case 19:
        $thumbnailType = "thumbnail-Large";
        $showPurchase = true;
        $isAccessory = false;
    break;

    case 8:
    case 41:
        $thumbnailType = "thumbnail-Large";
        $showPurchase = true;
        $isAccessory = true;
    break;

    default:
        $thumbnailType = "thumbnail-Large";
    break;
}

//if ($asset["typeid"] !== 21)
//	die(header("Location: https://www.".$domain."/request-error?code=404"));

$assetName = preg_replace('/[^a-zA-Z0-9 ]/', '', $asset["name"]);
$assetName = str_replace(' ', '-', $assetName);
//$gameName = strtolower($gameName);

$assetUsedName = explode('/', $_SERVER["REQUEST_URI"], 4);
$assetUsedName = $assetUsedName[3];

if ($assetUsedName !== $assetName){
	die(header("Location: https://www.".$domain."/catalog/".$asset["id"]."/".$assetName));
}

if ($asset["creatorType"] === 1)
	$asset["creatorName"] = UserAuthentication::lookupNameById($asset["creatorId"]);

$assetIcon = ($asset["imageid"] !== 0) ? ThumbnailService::requestAssetThumbnail($asset["imageid"], 420, 420) : ThumbnailService::requestAssetThumbnail($asset["id"], 420, 420);


$showReportButton = ($asset["creatorId"] == 1) ? false : true;


if ($isUserAuthenticated){
    $userId = $userInfo['id'];
    $userOwnItem = (AssetService::doesUserOwnAsset($asset["id"], $userId)) ? "true" : "false";
}

$canUserWear = ($isWearable && $userOwnItem == "true") ? true : false;
$showDropdown = ($showReportButton || $canUserWear) ? true : false;
?>




<!DOCTYPE html>
<!--[if IE 8]><html class="ie8" ng-app="robloxApp"><![endif]-->
<!--[if gt IE 8]><!-->
<html>
<!--<![endif]-->
<head>
    <!-- MachineID: <?= $webServerName ?> -->
    <title><?= htmlspecialchars($asset["name"]) ?> - ROBLOX</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,requiresActiveX=true" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="ROBLOX Corporation" />
<meta name="description" content="Customize an avatar with the <?= htmlspecialchars($asset["name"]) ?> and millions of other items. Mix &amp; match this <?= $asset_types[$asset["typeid"]] ?> with packages and clothing to have an avatar that is unique to you!" />
<meta name="keywords" content="free games, online games, building games, virtual worlds, free mmo, gaming cloud, physics engine" />
<meta name="apple-itunes-app" content="app-id=431946152" />
<meta name="google-site-verification" content="KjufnQUaDv5nXJogvDMey4G-Kb7ceUVxTdzcMaP9pCY" />
    <meta property="og:site_name" content="ROBLOX" />
    <meta property="og:title" content="<?= htmlspecialchars($asset["name"]) ?>" />
    <meta property="og:type" content="game" />
    <meta property="og:url" />
    <meta property="og:description" content="Customize an avatar with the <?= htmlspecialchars($asset["name"]) ?> and millions of other items. Mix &amp; match this <?= $asset_types[$asset["typeid"]] ?> with packages and clothing to have an avatar that is unique to you!"/>
    <meta property="og:image" content="<?= $assetIcon ?>" />
    <meta property="fb:app_id" content="190191627665278">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@ROBLOX">
    <meta name="twitter:title" content="<?= htmlspecialchars($asset["name"]) ?>">
    <meta name="twitter:description" content="Customize an avatar with the <?= htmlspecialchars($asset["name"]) ?> and millions of other items. Mix &amp; match this <?= $asset_types[$asset["typeid"]] ?> with packages and clothing to have an avatar that is unique to you!">
    <meta name="twitter:creator" content="">
    <meta name=twitter:image1 content="<?= $assetIcon ?>" />
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


        <link href="https://images.idk18.xyz/7aee41db80c1071f60377c3575a0ed87.ico" rel="icon" />
                <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600" rel="stylesheet" type="text/css">

    <link rel="canonical" href="<?php echo "https" . "://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"] ?>" />
    
    
    <link rel='stylesheet' href='https://static.idk18.xyz/css/leanbase___9b9fc145916d65f94e610d1f02775894_m.css/fetch' />


            
<link rel='stylesheet' href='https://static.idk18.xyz/css/page___86dbb193611f6607618c29a70d76a8e3_m.css/fetch' />

    
    
    
    <script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js'></script>
<script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-1.11.1.js'><\/script>")</script>
<script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/jquery.migrate/jquery-migrate-1.2.1.min.js'></script>
<script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-migrate-1.2.1.js'><\/script>")</script>


    
    <script type='text/javascript' src='https://js.idk18.xyz/86411e39f51e0ef39c7fa2f1f92fe7b3.js'></script>


    
    
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>

        <?php require_once( $_SERVER["DOCUMENT_ROOT"] . "/includes/adshelper.php" ); ?>
    <script type="text/javascript">
    $(function () {
        Roblox.JSErrorTracker.initialize({ 'suppressConsoleError': true});
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
      data-internal-page-name="LibraryItem"
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

                                        <div id="Leaderboard-Abp" class="abp leaderboard-abp">
                    

<iframe name="Roblox_Item_Top_728x90" 
        allowtransparency="true"
        frameborder="0"
        height="110"
        scrolling="no"
        src="https://www.<?= $domain ?>/user-sponsorship/1"
        width="728"
        data-js-adtype="iframead"></iframe>

                </div>
            
<div id="item-container"
     class="section page-content menu-shown library-item "
     data-item-id="<?= $asset["id"] ?>"
     data-item-name="<?= htmlspecialchars($asset["name"]) ?>"
     data-asset-type="<?= $asset_types[$asset["typeid"]] ?>"
     data-userasset-id="<?php if (($isUserAuthenticated)) echo 1; ?>"
     data-is-purchase-enabled="False"
     data-product-id="<?= $asset["productid"] ?>"
     data-bc-requirement=""
     data-expected-currency="1"
     data-expected-price="0"
     data-seller-name=""
     data-expected-seller-id=""
     data-lowest-private-sale-userasset-id=""
     data-user-id="<?php if (($isUserAuthenticated)) echo $userId; ?>"
     data-asset-granted="<?php if ($isUserAuthenticated) echo $userOwnItem; ?>"
     data-forward-url=""
     data-current-time="<?= date("n/j/Y g:i:s A") ?>">
    <div class="system-feedback">
        <div class="alert-system-feedback">
            <div class="alert alert-success">Purchase Completed</div>
        </div>
        <div class="alert-system-feedback">
            <div class="alert alert-warning">Error occurred</div>
        </div>
    </div>
    <div class="section-content top-section">
        <div class="item-name-container">
            <h2><?= htmlspecialchars($asset["name"]) ?></h2>
            <div>
                    <span class="text-label">By <a href="https://www.<?= $domain ?>/users/<?= $asset["creatorId"] ?>/profile" class="text-name"><?= $asset["creatorName"] ?></a></span>
                    <?php if ($userOwnItem == "true"): ?>                
                    <div class="divider">&nbsp;</div>
                                    <div class="label-checkmark attribution-checkmark">
                                        <span class="icon-checkmark-white-bold"></span>
                                    </div>
                                    <span>Item Owned</span>
                    <?php endif; ?>
            </div>
        </div>
        <div class="item-thumbnail-container">


<div id="AssetThumbnail" class="thumbnail-holder  <?= $thumbnailType ?> has-related-info"
     data-reset-enabled-every-page
     <?php if (in_array($asset["typeid"], $allowedPurchasables)) echo 'data-3d-thumbs-enabled'; ?>

     data-url="/thumbnail/asset?assetId=<?= $asset["id"] ?>&amp;thumbnailFormatId=78&amp;width=150&amp;height=150">
    <span class="thumbnail-span" <?php if (in_array($asset["typeid"], $allowedPurchasables)) echo'data-3d-url="/asset-thumbnail-3d/json?assetId=' . $asset["id"] . '"  data-js-files="https://js.idk18.xyz/95518cef4aea4b89a95e61452d70c3bb.js"'; ?>><img  class='' src='<?= $assetIcon ?>' /></span>
    <div class="equipped-marker"></div>


    <?php if (in_array($asset["typeid"], $allowedPurchasables)): ?>
        <span class="enable-three-dee rbx-btn-control-sm"></span>
    <?php endif; ?>
</div>


            <script type="text/javascript">
                (function () {
                    if (Roblox && Roblox.Performance) {
                        Roblox.Performance.setPerformanceMark("itemReskin_thumbnail_loaded");
                    }
                })();
            </script>
        </div>
        <div id="item-details" class="content-overflow-toggle content-height content-overflow-page-loading item-details">
            <?php if ($showPurchase): ?>
                    <div class="clearfix price-container">
                            <?php if ($userOwnItem == "true"): ?>
                                    <div class="price-container-text">
                                            <div class="item-first-line">This item is available in your inventory.</div>
                                    </div>
                                    <div class=action-button><a href="https://www.<?= $domain ?>/My/Character.aspx"><button type=button class="btn-control-md">Edit Avatar</button></a></div>
                            <?php elseif ($asset["forsale"] == 1): ?>
									<div class="price-container-text">
                                              <div class="text-label field-label price-label">Price</div>
											<div class="price-info">

													<div class="icon-text-wrapper clearfix icon-robux-price-container">
														<?php if ($asset["price"] !== 0): ?> <span class="icon-robux "></span><?php endif; ?>
														<span class="text-robux-lg "><?php if ($asset["price"] == 0) echo "Free"; else echo $asset["price"] ?></span>
													</div>
											</div>
									</div>
									<div class="action-button">
														<button type="button"
																class="btn-fixed-width-lg btn-primary-lg PurchaseButton"
																data-button-type="main"
																data-button-action="buy"
																data-se="item-buyforrobux">
															Buy
														</button>
									</div>
										<?php else: ?>
									<div class="price-container-text">
                                            <div class="item-first-line">This item is not currently for sale.</div>
                                    </div>
                                    <div class=action-button><button type=button class="btn-fixed-width-lg btn-primary-lg" disabled>Get</button></div>
							<?php endif; ?>
                    </div>
            <?php endif; ?>
                    <div class="clearfix item-mobile-description item-field-container">
                        <p class="description-content"><?php if ($asset["description"] !== "") echo htmlspecialchars($asset["description"]); else echo "No description available." ?></p>
                    </div>
                <div class="clearfix item-type-field-container">
                    <div class="text-label field-label">Type</div>
                    <span class="field-content"><?php if ($isAccessory) echo "Accessory | "; ?><?= $asset_types[$asset["typeid"]] ?></span>
                </div>
                <?php if ($asset["genretype"] !== null): ?>
                <div class="clearfix item-field-container">
                                <div class="text-label field-label">Genres</div>
                                <span class="field-content">
                                            <a class="text-name item-genre" href="https://www.<?= $domain ?>/all-catalog">
                                                <?= $genre_types[$asset["genretype"]] ?>
                                            </a>
                                </span>
                            </div>
                <?php endif; ?>
                <?php if ($asset["creatorId"] !== 1): ?>
                            <div class="clearfix item-field-container">
                        <div class="text-label field-label">Updated</div>
                        <div class="field-content">
                            <?= date("M. d, Y", $asset["updated"]) ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php 
                if ($asset["typeid"] == 19): ?>
                    <div class="clearfix item-field-container">
                        <div class="text-label text-overflow field-label">Attributes</div>
                            <?php
                                $attributes = json_decode($asset["gearattributes"]);
                                foreach($attributes as $attribute){
                                    echo '<div class="attribute-container">
                                            <span class="icon-', $gear_attributes_html[$attribute], ' attribute-icon "></span>
                                            <span class="">', $gear_attributes_catalog[$attribute], '</span>
                                        </div>';
                                }
                            ?>  
                        <div class="field-content">
                        </div>
                    </div>
                <?php endif; ?>
                    <div class="clearfix item-description item-field-container">
                        <div class="text-label field-label">Description</div>
                        <p id="item-details-description" class="content-overflow-toggle content-height content-overflow-page-loading field-content description-content"><?php if ($asset["description"] !== "") echo htmlspecialchars($asset["description"]); else echo "No description available." ?>
                            <span class="hidden toggle-content" data-container-id="item-details-description">Read More</span>
                        </p>
                    </div>
                <div class="hide show-more-end" data-container-id="item-details"></div>
                <button type="button" class="hidden btn-full-width btn-control-md toggle-content" data-container-id="item-details">Read More</button>

        </div>
        <ul class="item-social-container clearfix  ">

        <?php
		$favoriteModel = [];
		
		$stmt = $pdo->prepare("SELECT assetId FROM favorites WHERE assetId = :assetId");
		$stmt->bindParam(':assetId', $asset["id"]);
		$stmt->execute();
		$favoriteModel["favoriteCount"] = $stmt->rowCount();
		
        if ($isUserAuthenticated){
            $stmt = $pdo->prepare("SELECT assetId FROM favorites WHERE assetId = :assetId AND userId = :userId");
            $stmt->bindParam(':assetId', $asset["id"]);
            $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
            $stmt->execute();
            $favoriteModel["hasFavorited"] = (boolean)$stmt->rowCount();
        }else
            $favoriteModel["hasFavorited"] = false;
		
		?>
		
		
        <li class="favorite-button-container">
            <div class="tooltip-container" data-toggle="tooltip" title="" data-original-title="Add to Favorites">
                <a id="toggle-favorite" data-toggle-url="/favorite/toggle" data-assetid="<?= $asset["id"] ?>" data-isguest="<?php if ($isUserAuthenticated) echo 'False'; else echo "True"; ?>"
                   data-signin-url="https://www.<?= $domain ?>/newlogin?returnUrl=<?= urlencode($_SERVER["REQUEST_URI"]) ?>">
                    <span title="<?= $favoriteModel["favoriteCount"] ?>" class="text-favorite favoriteCount <?= number_format($favoriteModel["favoriteCount"]) ?>" id="result"><?= $favoriteModel["favoriteCount"] ?></span>
                    <div id="favorite-icon" class="icon-favorite <?php if ($favoriteModel["hasFavorited"]) echo "favorited" ?>"></div>
                </a>
            </div>
        </li>
 
                    </ul>
            <?php if ($showDropdown): ?>
            <div id="item-context-menu">
                <a class="rbx-menu-item item-context-menu" data-toggle="popover" data-bind="popover-content">
                    <span class="icon-more"></span>
                </a>
                <div class="rbx-popover-content" data-toggle="popover-content">
                    <ul class="dropdown-menu" role="menu">
                        <?php if ($canUserWear): ?>
                            <?php 
                            $stmt = $pdo->prepare("SELECT wearing FROM inventory WHERE userId = :userId and assetId = :assetId");
                            $stmt->bindParam(':assetId', $asset["id"]);
                            $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
                            $stmt->execute();
                            $isWearing = $stmt->fetchColumn();
                            $wearText = ($isWearing) ? "Take Off" : "Wear";
                            $wearFalseTrue = ($isWearing) ? "True" : "False";
                            ?>
                                <li>
                                    <a id="toggle-wear" class="toggle-wear" data-toggle="<?= $wearFalseTrue ?>">
                                        <?= $wearText ?>
                                    </a>
                                </li>
                        <?php endif; ?>
                        <?php if ($showReportButton): ?>
                                <li>
                                    <a id="report-item" href="https://www.<?= $domain ?>/abusereport/asset?id=<?= $asset["id"] ?>&amp;RedirectUrl=<?= "https" . "://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"] ?>">
                                        Report Item
                                    </a>
                                </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <?php endif; ?>
        
            </div>
</div>


<div class="GenericModal modalPopup unifiedModal smallModal" style="display:none;">
    <div class="Title"></div>
    <div class="GenericModalBody">
        <div>
            <div class="ImageContainer">
                <img class="GenericModalImage" alt="generic image"/>
            </div>
            <div class="Message"></div>
        </div>
        <div class="clear"></div>
        <div id="GenericModalButtonContainer" class="GenericModalButtonContainer">
            <a class="ImageButton btn-neutral btn-large roblox-ok">OK</a>
        </div>
    </div>
</div>


<div id="ItemPurchaseAjaxData"
     data-has-currency-service-error="False"
     data-currency-service-error-message=""
     data-authenticateduser-isnull="True"
     data-user-balance-robux="0"
     data-user-balance-tickets="0"
     data-user-bc="0"
     data-continueshopping-url="<?= "https://www.".$domain."/catalog/".$asset["id"]."/".$assetName ?>"
     data-imageurl ="<?= $assetIcon ?>"
     data-alerturl ="https://images.idk18.xyz/b7353602bbf9b927d572d5887f97d452.svg"
     data-inSufficentFundsurl ="https://images.idk18.xyz/b80339ddf867ccfe6ab23a2c263d8000.png"
     >
    
</div>

<script type="text/javascript">
    Roblox.Item = Roblox.Item || {};

    Roblox.Item.Resources = {
        //<sl:translate>
        DisableBadgeTitle: 'Disable Badge'
        , DisableBadgeMessage: 'Are you sure you want to disable this Badge?'
        , EnableBadgeTitle: "Enable Badge"
        , EnableBadgeMessage: "Are you sure you want to enable this Badge?"
        , assetGrantedModalTitle: "This item is now yours"
        , assetGrantedModalMessage: "You just got this item courtesy of our sponsor."
        //</sl:translate>
    };
</script>

                <div id="Skyscraper-Adp-Right" class="abp abp-container right-abp">
                    

<iframe name="Roblox_Item_Right_160x600" 
        allowtransparency="true"
        frameborder="0"
        height="612"
        scrolling="no"
        src="https://www.<?= $domain ?>/user-sponsorship/2"
        width="160"
        data-js-adtype="iframead"></iframe>

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


    
<script type='text/javascript' src='https://js.idk18.xyz/a7eafc0e9aa687140f5d41b73fc409ea.js.gzip'></script>
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

    
    <script type='text/javascript' src='https://js.idk18.xyz/37dc7aec0fbaabb59376a54521a48e7b.js'></script>
</body>
</html>