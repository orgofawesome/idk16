<?php
if (!$isUserAuthenticated && $userInfo["id"] !== 15)
    die;

$assetId = $_GET["placeid"] ?? 0;



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" xmlns:fb="http://www.facebook.com/2008/fbml">
<head data-machine-id="<?= $webServerName ?>">
    <!-- MachineID: <?= $webServerName ?> -->
    <title>Publish New Model</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,requiresActiveX=true" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="ROBLOX Corporation" />
<meta name="description" content="ROBLOX is powered by a growing community of over 300,000 creators who produce an infinite variety of highly immersive experiences. These experiences range from 3D multiplayer games and competitions, to interactive adventures where friends can take on new personas imagining what it would be like to be a dinosaur, a miner in a quarry or an astronaut on a space exploration." />
<meta name="keywords" content="free games, online games, building games, virtual worlds, free mmo, gaming cloud, physics engine" />

    <meta name="apple-itunes-app" content="app-id=431946152" />




<?php require_once( $_SERVER['DOCUMENT_ROOT'] . "/includes/applicationInfo.php" );  ?>
    <meta ng-csp="no-unsafe-eval">

    
    <link href="https://images.idk18.xyz/7aee41db80c1071f60377c3575a0ed87.ico" rel="icon" />


    
    
<link onerror='Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)' rel='stylesheet'  href='https://static.rbxcdn.com/css/studio___37a1532dfd340c90425ec3f92abd0d2d_m.css/fetch' />

    
<link onerror='Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)' rel='stylesheet'  href='https://static.rbxcdn.com/css/page___a728f0284e3e0112adcd0482fc50935c_m.css/fetch' />



    <script type='text/javascript' src='https://js.idk18.xyz/3719f3fb35135d05cf6b72d5b0f46333.js'></script>
    <?php require_once( $_SERVER['DOCUMENT_ROOT'] . "/includes/configPaths.php" ); ?>
    <script type='text/javascript' src='https://js.idk18.xyz/a1ec30f16d5202192e1d89ed4aca2c58.js'></script>

    <script type="text/javascript">
if (typeof(Roblox) === "undefined") { Roblox = {}; }
Roblox.Endpoints = Roblox.Endpoints || {};
Roblox.Endpoints.Urls = Roblox.Endpoints.Urls || {};
Roblox.Endpoints.Urls['/asset/'] = 'https://assetgame.<?= $domain ?>/asset/';
Roblox.Endpoints.Urls['/client-status/set'] = 'https://www.<?= $domain ?>/client-status/set';
Roblox.Endpoints.Urls['/client-status'] = 'https://www.<?= $domain ?>/client-status';
Roblox.Endpoints.Urls['/game/'] = 'https://assetgame.<?= $domain ?>/game/';
Roblox.Endpoints.Urls['/game/edit.ashx'] = 'https://assetgame.<?= $domain ?>/game/edit.ashx';
Roblox.Endpoints.Urls['/game/placelauncher.ashx'] = 'https://assetgame.<?= $domain ?>/game/placelauncher.ashx';
Roblox.Endpoints.Urls['/game/preloader'] = 'https://assetgame.<?= $domain ?>/game/preloader';
Roblox.Endpoints.Urls['/game/report-stats'] = 'https://assetgame.<?= $domain ?>/game/report-stats';
Roblox.Endpoints.Urls['/game/report-event'] = 'https://assetgame.<?= $domain ?>/game/report-event';
Roblox.Endpoints.Urls['/game/updateprerollcount'] = 'https://assetgame.<?= $domain ?>/game/updateprerollcount';
Roblox.Endpoints.Urls['/login/default.aspx'] = 'https://www.<?= $domain ?>/login/default.aspx';
Roblox.Endpoints.Urls['/my/avatar'] = 'https://www.<?= $domain ?>/my/avatar';
Roblox.Endpoints.Urls['/my/money.aspx'] = 'https://www.<?= $domain ?>/my/money.aspx';
Roblox.Endpoints.Urls['/navigation/userdata'] = 'https://www.<?= $domain ?>/navigation/userdata';
Roblox.Endpoints.Urls['/chat/chat'] = 'https://www.<?= $domain ?>/chat/chat';
Roblox.Endpoints.Urls['/chat/data'] = 'https://www.<?= $domain ?>/chat/data';
Roblox.Endpoints.Urls['/friends/list'] = 'https://www.<?= $domain ?>/friends/list';
Roblox.Endpoints.Urls['/navigation/getcount'] = 'https://www.<?= $domain ?>/navigation/getCount';
Roblox.Endpoints.Urls['/regex/email'] = 'https://www.<?= $domain ?>/regex/email';
Roblox.Endpoints.Urls['/catalog/browse.aspx'] = 'https://www.<?= $domain ?>/catalog/browse.aspx';
Roblox.Endpoints.Urls['/catalog/html'] = 'https://search.<?= $domain ?>/catalog/html';
Roblox.Endpoints.Urls['/catalog/json'] = 'https://search.<?= $domain ?>/catalog/json';
Roblox.Endpoints.Urls['/catalog/contents'] = 'https://search.<?= $domain ?>/catalog/contents';
Roblox.Endpoints.Urls['/catalog/lists.aspx'] = 'https://search.<?= $domain ?>/catalog/lists.aspx';
Roblox.Endpoints.Urls['/catalog/items'] = 'https://search.<?= $domain ?>/catalog/items';
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
Roblox.Endpoints.Urls['/authentication/is-logged-in'] = 'https://www.<?= $domain ?>/authentication/is-logged-in';
Roblox.Endpoints.addCrossDomainOptionsToAllRequests = true;
</script>

    <script type="text/javascript">
if (typeof(Roblox) === "undefined") { Roblox = {}; }
Roblox.Endpoints = Roblox.Endpoints || {};
Roblox.Endpoints.Urls = Roblox.Endpoints.Urls || {};
</script>


    <input name="__RequestVerificationToken" type="hidden" value="hUeII5fRjPZwp0EceWZ572eoeYJi2BCRrj2exAtuN_m4u9oIdDx0VsoJMAoUbd_o0dIXk9vM4CC4pMcxPc-DgcyJZmQ1" />
    
    <meta name="csrf-token" data-token="puGF+AOAR/47" />

</head>
<body>
    


<div class="boxed-body" data-return-url="https://www.<?= $domain ?>/ide/publish/model">
    <div id="placeForm">
        <div class="headline">
                    <h2>Basic Settings</h2>

        </div>
        <form id="basicSettingsForm" method="post" action="https://www.<?= $domain ?>/ide/publish/newmodel">
            <input data-val="true" data-val-number="The field GroupId must be a number." id="GroupId" name="GroupId" type="hidden" value="" />

            <input name="__RequestVerificationToken" type="hidden" value="uY3iVreM40B5ZdkSW7q41o--Q7C_WHw8IemvvKKj9Zh9ITOxrafac8lIg6mwC1kFTTAnN5D1g1u38KJEp9h_MeFd4gU1" />

            <label class="form-label" for="Name">Name:</label>
<input class="text-box text-box-medium" data-val="true" data-val-required="Name is required" id="Name" name="Name" type="text" value="" />            <span id="nameRow"><span class="field-validation-valid" data-valmsg-for="Name" data-valmsg-replace="true"></span></span>

            <label class="form-label" for="Description">Description:</label>
<textarea class="text-box text-area-medium" cols="80" id="Description" name="Description" rows="6">
</textarea>            <span class="field-validation-valid" data-valmsg-for="Description" data-valmsg-replace="true"></span>

            <label class="form-label" for="Genre">Genre:</label>
            <select class="form-select" id="Genre" name="Genre"><option selected="selected">All</option>
<option>Adventure</option>
<option>Building</option>
<option>Comedy</option>
<option>Fighting</option>
<option>FPS</option>
<option>Horror</option>
<option>Medieval</option>
<option>Military</option>
<option>Naval</option>
<option>RPG</option>
<option>Sci-Fi</option>
<option>Sports</option>
<option>Town and City</option>
<option>Western</option>
</select>
            <span class="field-validation-valid" data-valmsg-for="Genre" data-valmsg-replace="true"></span>
<label class="form-label" for="IsCopyingAllowed">Allow Copying</label><input data-val="true" data-val-required="The Allow Copying field is required." id="IsCopyingAllowed" name="IsCopyingAllowed" type="checkbox" value="true" /><input name="IsCopyingAllowed" type="hidden" value="false" />                    <span class="checkboxListItem">Allow copying</span>
                    <a href="http://wiki.<?= $domain ?>/index.php/Free_models" class="tooltip" target="_blank"><img class="TipsyImg" title="Click here to learn more." height="13" width="12" src="https://static.rbxcdn.com/images/Icons/question.png" alt="Click here to learn more." style="width: 12px; height: 13px; margin-left: 4px;" /></a>

            <label class="form-label" for="AllowComments">Comments:</label>
            <input checked="checked" data-val="true" data-val-required="The Comments: field is required." id="AllowComments" name="AllowComments" type="checkbox" value="true" /><input name="AllowComments" type="hidden" value="false" />
            <span class="checkboxListItem">Allow comments</span>
            <input Value="CreateModel" data-val="true" data-val-required="The Action field is required." id="Action" name="Action" type="hidden" value="CreateModel" />
        </form>
    </div>
</div>
<div class="footer-button-container divider-top">
<a  class="btn-medium btn-primary" id="finishButton">Finish</a><a  class="btn-medium btn-negative" id="cancelButton">Cancel</a>
</div>


    <script type="text/javascript">function urchinTracker() {}</script>


<?php require_once( $_SERVER['DOCUMENT_ROOT'] . "/includes/modals/legacyGenericConfirmationModal.php" ); ?>
    
</body>
</html>
