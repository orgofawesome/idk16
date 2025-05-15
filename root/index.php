<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php" );
require_once( $_SERVER['DOCUMENT_ROOT'] . "/siteViewMain.php" );

$requestUri = strtolower($_SERVER["REQUEST_URI"]);

// Complying with copyright as they say...
if (!isUserAllowedToVisit())
	die(header("Location: https://discord.gg/USeZVM4zVU"));

$stmt = $maintenancePDO->prepare("SELECT serviceStatus FROM apiservicestatus WHERE serviceName = 'Website'");
$stmt->execute();
$isWebsiteServiceEnabled = $stmt->fetchColumn();

$isOnMaintenancePage = ( strpos( $requestUri, "/login/fulfillconstraint.aspx" ) === 0 || strpos( $requestUri, "/login/negotiate.ashx" ) === 0) ? true : false;
$isOnErrorPage = strpos( $requestUri, "/request-error" ) === 0;
$isOnBanPage = strpos( $requestUri, "/membership/" ) === 0;
$isOnScreenshotPage = strpos( $requestUri, "//uploadmedia" ) === 0;
$isUserAuthenticated = UserAuthentication::isUserAuthenticated();
$userInfo = ($isUserAuthenticated) ? UserAuthentication::getUserInfo("full") : [];
$requestUrl = "https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

if ($isOnScreenshotPage){
	die("WIP PAGE");
}

if (isset($_SERVER["HTTP_ACCESSKEY"])){
	if ($_SERVER["HTTP_ACCESSKEY"] == $server["RCCAccessKey"]){
		$isOnMaintenancePage = true;
	}
}

if ( !$isWebsiteServiceEnabled && !$isOnMaintenancePage){
    if ( $isUserAuthenticated ) {
        $stmt = $authPDO->prepare("SELECT adminStatus FROM users WHERE id = :userId");
        $stmt->bindValue(":userId", $userInfo['id'], PDO::PARAM_INT);
        $stmt->execute();

        if ( $stmt->fetchColumn() < 1 ) {
            respondWithMaintenanceError();
        }
    } else {
        respondWithMaintenanceError();
    }
}

function respondWithMaintenanceError() {
	global $domain;
	global $requestUrl;
	
    header( "Location: https://www." . $domain . "/Login/FulfillConstraint.aspx?ReturnUrl=" . urlencode( $requestUrl ) );
    die;
}

function respondWithBanError() {
	global $domain;
	
    header( "Location: https://www.$domain/Membership/NotApproved.aspx" );
    die;
}

if ( $isUserAuthenticated && !$isOnBanPage ) {
    $stmt = $authPDO->prepare("SELECT moderated FROM users WHERE id = :userId");
    $stmt->bindValue(":userId", $userInfo['id'], PDO::PARAM_INT);
    $stmt->execute();

    if ( $stmt->fetchColumn() == 1 ) {
        respondWithBanError();
    }
}

// EventTracker: CreateDate=".$rbxEventTracker["CreateDate"]."&rbxid=$userId&browserid=".$rbxEventTracker["browserid"];

if (!isset($_COOKIE["GuestData"])){
	$userId = random_int(1, 1000);
	setrawcookie("GuestData", "UserID=$userId", 0, "/", ".$domain", 1, 0);
}

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
	// WEBSITE PAGES
	// Sign Up / Landing Page
	$r->addRoute('GET', '/', 'landingPage');
    $r->addRoute('GET', '/{args:\?.*}', 'landingPage');
	$r->addRoute('GET', '/account/signupredir', 'landingPage');
    $r->addRoute('GET', '/account/signupredir{args:\?.*}', 'landingPage');
	
	// Home Page
	$r->addRoute('GET', '/home', 'homePage');
    $r->addRoute('GET', '/home{args:\?.*}', 'homePage');
	$r->addRoute('GET', '/home/', 'homePage');
    $r->addRoute('GET', '/home/{args:\?.*}', 'homePage');
	
	$r->addRoute('POST', '/home/updatestatus', 'statusAPI');
    $r->addRoute('POST', '/home/updatestatus{args:\?.*}', 'statusAPI');
	
	// Login Page
	$r->addRoute('GET', '/newlogin/', 'loginPage');
    $r->addRoute('GET', '/newlogin/{args:\?.*}', 'loginPage');
	$r->addRoute('GET', '/newlogin', 'loginPage');
    $r->addRoute('GET', '/newlogin{args:\?.*}', 'loginPage');
	$r->addRoute('POST', '/newlogin', 'loginPage');
    $r->addRoute('POST', '/newlogin{args:\?.*}', 'loginPage');
	$r->addRoute('GET', '/login/requestauth.ashx', 'requestAuthTicket');
    $r->addRoute('GET', '/login/requestauth.ashx{args:\?.*}', 'requestAuthTicket');
	
	$r->addRoute('GET', '/login/fulfillconstraint.aspx', 'maintenancePage');
    $r->addRoute('GET', '/login/fulfillconstraint.aspx{args:\?.*}', 'maintenancePage');
	
	$r->addRoute('GET', '/login', 'loginPage');
    $r->addRoute('GET', '/login{args:\?.*}', 'loginPage');
	$r->addRoute('GET', '/.well-known/apple-developer-merchantid-domain-association.txt', 'test');
    $r->addRoute('GET', '/login/{args:\?.*}', 'loginPage');
	
	$r->addRoute('GET', '/login/iframelogin.aspx', 'emptyPage');
	$r->addRoute('GET', '/login/iframelogin.aspx{args:\?.*}', 'emptyPage');
	
	$r->addRoute('GET', '/login/negotiate.ashx', 'loginNegotiateTicket');
    $r->addRoute('GET', '/login/negotiate.ashx{args:\?.*}', 'loginNegotiateTicket');

	$r->addRoute('POST', '/login/negotiate.ashx', 'loginNegotiateTicket');
    $r->addRoute('POST', '/login/negotiate.ashx{args:\?.*}', 'loginNegotiateTicket');
	
	$r->addRoute('GET', '/leaderboards/game/json', 'pointsGameLeaderboard');
    $r->addRoute('GET', '/leaderboards/game/json{args:\?.*}', 'pointsGameLeaderboard');
	
	$r->addRoute('GET', '/leaderboards/rank/json', 'pointsClanLeaderboard');
    $r->addRoute('GET', '/leaderboards/rank/json{args:\?.*}', 'pointsClanLeaderboard');
	
	$r->addRoute('GET', '/thumbs/asset.ashx', 'ThumbsAsset');
	$r->addRoute('GET', '/thumbs/asset.ashx{args:\?.*}', 'ThumbsAsset');

	$r->addRoute('GET', '/thumbs/gameicon.ashx', 'ThumbsGameIcon');
	$r->addRoute('GET', '/thumbs/gameicon.ashx{args:\?.*}', 'ThumbsGameIcon');

	$r->addRoute('GET', '/thumbs/avatar.ashx', 'ThumbsAvatar');
	$r->addRoute('GET', '/thumbs/avatar.ashx{args:\?.*}', 'ThumbsAvatar');

	$r->addRoute('POST', '/data/upload.ashx', 'dataUpload');
	$r->addRoute('POST', '/data/upload.ashx{args:\?.*}', 'dataUpload');
	
	$r->addRoute('GET', '/games/moreresultscached', 'gameResults');
	$r->addRoute('GET', '/games/moreresultscached{args:\?.*}', 'gameResults');
	
	$r->addRoute('GET', '/games/moreresultsuncached', 'emptyPage');
	$r->addRoute('GET', '/games/moreresultsuncached{args:\?.*}', 'emptyPage');

	$r->addRoute('GET', '/games/getgameinstancesjson', 'getServerList');
	$r->addRoute('GET', '/games/getgameinstancesjson{args:\?.*}', 'getServerList');
	
	$r->addRoute('GET', '/groups/group.aspx', 'groupPage');
	$r->addRoute('GET', '/groups/group.aspx{args:\?.*}', 'groupPage');
	$r->addRoute('POST', '/groups/group.aspx', 'groupPage');
	$r->addRoute('POST', '/groups/group.aspx{args:\?.*}', 'groupPage');
	
	$r->addRoute('POST', '/api/user/unfollow', 'unfollowUser');
	$r->addRoute('POST', '/user/follow', 'followUser');
	$r->addRoute('POST', '/api/friends/declinefriendrequest', 'declineFriend');
	$r->addRoute('POST', '/api/friends/acceptfriendrequest', 'acceptFriend');
	$r->addRoute('POST', '/api/friends/sendfriendrequest', 'sendFriend');
	$r->addRoute('POST', '/api/friends/removefriend', 'removeFriend');
	$r->addRoute('POST', '/api/friends/declineallfriendrequests', 'declineAllFriends');
	
	$r->addRoute('GET', '/users/{user_id:\d+}/profile', 'profilePage');
	$r->addRoute('GET', '/users/{user_id:\d+}/profile{args:\?.*}', 'profilePage');

	$r->addRoute('GET', '/users/{user_id:\d+}/inventory', 'inventoryPage');
	$r->addRoute('GET', '/users/{user_id:\d+}/inventory/', 'inventoryPage');
	$r->addRoute('GET', '/users/{user_id:\d+}/inventory{args:\?.*}', 'inventoryPage');

	$r->addRoute('GET', '/users/{user_id:\d+}/friends', 'friendsPage');
	$r->addRoute('GET', '/users/{user_id:\d+}/friends{args:\?.*}', 'friendsPage');

	$r->addRoute('GET', '/users/friends/list-json', 'friendsAPI');
	$r->addRoute('GET', '/users/friends/list-json{args:\?.*}', 'friendsAPI');

	$r->addRoute('GET', '/users/inventory/list-json', 'inventoryAPI');
	$r->addRoute('GET', '/users/inventory/list-json{args:\?.*}', 'inventoryAPI');

	$r->addRoute('GET', '/{asset_name}-item{args:\?.*}', 'assetPage');
	
	$r->addRoute('GET', '/games/{place_id:\d+}/{game_name}', 'gamePage');
	$r->addRoute('GET', '/games/{place_id:\d+}/{game_name}{args:\?.*}', 'gamePage');
	
	$r->addRoute('GET', '/games/{place_id:\d+}/', 'gamePage');
	$r->addRoute('GET', '/games/{place_id:\d+}/{args:\?.*}', 'gamePage');

	$r->addRoute('GET', '/games/{place_id:\d+}', 'gamePage');
	$r->addRoute('GET', '/games/{place_id:\d+}{args:\?.*}', 'gamePage');

	$r->addRoute('GET', '/library/{asset_id:\d+}/{asset_name}', 'libraryPage');
	$r->addRoute('GET', '/library/{asset_id:\d+}/{asset_name}{args:\?.*}', 'libraryPage');
	
	$r->addRoute('GET', '/library/{asset_id:\d+}/', 'libraryPage');
	$r->addRoute('GET', '/library/{asset_id:\d+}/{args:\?.*}', 'libraryPage');

	$r->addRoute('GET', '/library/{asset_id:\d+}', 'libraryPage');
	$r->addRoute('GET', '/library/{asset_id:\d+}{args:\?.*}', 'libraryPage');

	$r->addRoute('GET', '/catalog/{asset_id:\d+}/{asset_name}', 'catalogPage');
	$r->addRoute('GET', '/catalog/{asset_id:\d+}/{asset_name}{args:\?.*}', 'catalogPage');
	
	$r->addRoute('GET', '/catalog/{asset_id:\d+}/', 'catalogPage');
	$r->addRoute('GET', '/catalog/{asset_id:\d+}/{args:\?.*}', 'catalogPage');

	$r->addRoute('GET', '/catalog/{asset_id:\d+}', 'catalogPage');
	$r->addRoute('GET', '/catalog/{asset_id:\d+}{args:\?.*}', 'catalogPage');
	
	$r->addRoute('GET', '/game-auth/getauthticket', 'getAuthTicket');
    $r->addRoute('GET', '/game-auth/getauthticket{args:\?.*}', 'getAuthTicket');

	$r->addRoute('GET', '/install/setup.ashx', 'setupInstall');
    $r->addRoute('GET', '/install/setup.ashx{args:\?.*}', 'setupInstall');

	
	// Telemetry
	$r->addRoute('POST', '/error/dmp.ashx', 'emptyPage');
	$r->addRoute('POST', '/error/dmp.ashx{args:\?.*}', 'emptyPage');
	
	// Telemetry
	$r->addRoute('POST', '/error/grid.ashx', 'emptyPage');
	$r->addRoute('POST', '/error/grid.ashx{args:\?.*}', 'emptyPage');
	
	// ADS
	
	$r->addRoute('GET', '/userads/1', 'userAd1');
	$r->addRoute('GET', '/userads/1{args:\?.*}', 'userAd1');
	
	$r->addRoute('GET', '/userads/2', 'userAd2');
	$r->addRoute('GET', '/userads/2{args:\?.*}', 'userAd2');
	
	$r->addRoute('GET', '/userads/3', 'userAd3');
	$r->addRoute('GET', '/userads/3{args:\?.*}', 'userAd3');
	
	$r->addRoute('GET', '/user-sponsorship/1', 'userAd1');
	$r->addRoute('GET', '/user-sponsorship/1{args:\?.*}', 'userAd1');
	
	$r->addRoute('GET', '/user-sponsorship/2', 'userAd2');
	$r->addRoute('GET', '/user-sponsorship/2{args:\?.*}', 'userAd2');
	
	$r->addRoute('GET', '/user-sponsorship/3', 'userAd3');
	$r->addRoute('GET', '/user-sponsorship/3{args:\?.*}', 'userAd3');
	
	// Asset Fetch
	$r->addRoute('GET', '/asset', 'assetFetch');
    $r->addRoute('GET', '/asset{args:\?.*}', 'assetFetch');
	$r->addRoute('GET', '/asset/', 'assetFetch');
    $r->addRoute('GET', '/asset/{args:\?.*}', 'assetFetch');

	$r->addRoute('POST', '/asset/toggle-wear', 'assetWear');
    $r->addRoute('POST', '/asset/toggle-wear{args:\?.*}', 'assetWear');

	$r->addRoute('GET', '/avatar-thumbnail-3d/json', 'threeDeeAvatarProf');
    $r->addRoute('GET', '/avatar-thumbnail-3d/json{args:\?.*}', 'threeDeeAvatarProf');

	$r->addRoute('GET', '/avatar-thumbnail/image', 'ThumbsAvatar');
    $r->addRoute('GET', '/avatar-thumbnail/image{args:\?.*}', 'ThumbsAvatar');

	$r->addRoute('GET', '/avatar-thumbnail/json', 'ThumbsAvatarJSON');
    $r->addRoute('GET', '/avatar-thumbnail/json{args:\?.*}', 'ThumbsAvatarJSON');

    $r->addRoute('GET', '/asset-thumbnail-3d/json', 'threeDeeAvatar');
    $r->addRoute('GET', '/asset-thumbnail-3d/json{args:\?.*}', 'threeDeeAvatar');

	$r->addRoute('GET', '/asset-thumbnail/json', 'thumbnails');
    $r->addRoute('GET', '/asset-thumbnail/json{args:\?.*}', 'thumbnails');

    $r->addRoute('GET', '/thumbnail/resolve-hash/{hash}', 'resolveHashThumb');
	
	// Games page
	$r->addRoute('GET', '/games', 'gamesPage');
    $r->addRoute('GET', '/games{args:\?.*}', 'gamesPage');
	$r->addRoute('GET', '/games/', 'gamesPage');
    $r->addRoute('GET', '/games/{args:\?.*}', 'gamesPage');
	
	// GenericConfirmationModals Reference
	$r->addRoute('GET', '/reference/genericconfirmationmodals', 'genericConfirmationModalsRef');
    $r->addRoute('GET', '/reference/genericconfirmationmodals{args:\?.*}', 'genericConfirmationModalsRef');
	
	// Premium Membership
	$r->addRoute('GET', '/premium/membership', 'premiumMembership');
    $r->addRoute('GET', '/premium/membership{args:\?.*}', 'premiumMembership');

	// NeedParentVerifcation NotApproved
	$r->addRoute('GET', '/membership/needparentverification.aspx', 'needParentVerification');
    $r->addRoute('GET', '/membership/needparentverification.aspx{args:\?.*}', 'needParentVerification');

	// api item.ashx
	$r->addRoute('POST', '/api/item.ashx', 'itemAPI');
    $r->addRoute('POST', '/api/item.ashx{args:\?.*}', 'itemAPI');
	
	// NotApproved
	$r->addRoute('GET', '/membership/notapproved.aspx', 'notApproved');
    $r->addRoute('GET', '/membership/notapproved.aspx{args:\?.*}', 'notApproved');

	$r->addRoute('POST', '/membership/notapproved.aspx', 'notApproved');
    $r->addRoute('POST', '/membership/notapproved.aspx{args:\?.*}', 'notApproved');
	
	// DevEx Develop
	$r->addRoute('GET', '/develop/tes32132t', 'developPage');
    $r->addRoute('GET', '/develop/tes32132t{args:\?.*}', 'developPage');
	
	// Create Page
	$r->addRoute('GET', '/places/createtest', 'createPlace');
    $r->addRoute('GET', '/places/createtest{args:\?.*}', 'createPlace');
	
	// IDE Welcome
	$r->addRoute('GET', '/ide/welcome', 'ideWelcome');
    $r->addRoute('GET', '/ide/welcome{args:\?.*}', 'ideWelcome');

	$r->addRoute('GET', '/ide/publishas', 'idePublishAs');
    $r->addRoute('GET', '/ide/publishas{args:\?.*}', 'idePublishAs');

	$r->addRoute('GET', '/ide/publish/newmodel', 'idePublishAsNewModel');
    $r->addRoute('GET', '/ide/publish/newmodel{args:\?.*}', 'idePublishAsNewModel');

	$r->addRoute('POST', '/ide/publish/newmodel', 'processNewModel');
    $r->addRoute('POST', '/ide/publish/newmodel{args:\?.*}', 'processNewModel');
	
	$r->addRoute('GET', '/ide/publish/newplace', 'idePublishAsNewModel');
    $r->addRoute('GET', '/ide/publish/newplace{args:\?.*}', 'idePublishAsNewModel');

	$r->addRoute('POST', '/ide/publish/newplace', 'processNewModel');
    $r->addRoute('POST', '/ide/publish/newplace{args:\?.*}', 'processNewModel');

	// IDE Redirects to Newer URL
	$r->addRoute('GET', '/ide/upload.aspx', 'ideRedirectPublishAs');
    $r->addRoute('GET', '/ide/upload.aspx{args:\?.*}', 'ideRedirectPublishAs');

	$r->addRoute('GET', '/ui/save.aspx', 'ideRedirectPublishAs');
    $r->addRoute('GET', '/ui/save.aspx{args:\?.*}', 'ideRedirectPublishAs');

	// Admin
	$r->addRoute('GET', '/admi/', 'adminLanding');
    $r->addRoute('GET', '/admi/{args:\?.*}', 'adminLanding');

	// Admin User Report
	$r->addRoute('GET', '/admi/moderateuser.aspx', 'adminUser');
    $r->addRoute('GET', '/admi/moderateuser.aspx{args:\?.*}', 'adminUser');

	$r->addRoute('POST', '/admi/moderateuser.aspx', 'adminUser');
    $r->addRoute('POST', '/admi/moderateuser.aspx{args:\?.*}', 'adminUser');

	// Admin User Report
	$r->addRoute('GET', '/admi/moderatereport.aspx', 'adminReportList');
    $r->addRoute('GET', '/admi/moderatereport.aspx{args:\?.*}', 'adminReportList');

	$r->addRoute('GET', '/admi/moderate/report.aspx', 'adminReport');
    $r->addRoute('GET', '/admi/moderate/report.aspx{args:\?.*}', 'adminReport');

	$r->addRoute('POST', '/admi/moderate/report.aspx', 'adminReport');
    $r->addRoute('POST', '/admi/moderate/report.aspx{args:\?.*}', 'adminReport');

	// Admin User Report
	$r->addRoute('GET', '/admi/moderateasset.aspx', 'adminAsset');
    $r->addRoute('GET', '/admi/moderateasset.aspx{args:\?.*}', 'adminAsset');

	// Admin User Report
	$r->addRoute('GET', '/admi/changesitebanner.aspx', 'adminBanner');
    $r->addRoute('GET', '/admi/changesitebanner.aspx{args:\?.*}', 'adminBanner');

	$r->addRoute('POST', '/abusereport/ingamechathandler.ashx', 'inGameReport');
    $r->addRoute('POST', '/abusereport/ingamechathandler.ashx{args:\?.*}', 'inGameReport');

	$r->addRoute('GET', '/abusereport/userprofile', 'userReport');
    $r->addRoute('GET', '/abusereport/userprofile{args:\?.*}', 'userReport');
	
	// PaymentSystemUnavailable
	$r->addRoute('GET', '/paymentsystemunavailable.aspx', 'paymentSystemUnavailable');
    $r->addRoute('GET', '/paymentsystemunavailable.aspx{args:\?.*}', 'paymentSystemUnavailable');
	
	// BadgesDetail
	$r->addRoute('GET', '/Badges.aspx', 'robloxBadgesDetailPage');
	$r->addRoute('GET', '/badges.aspx', 'robloxBadgesDetailPage');
    $r->addRoute('GET', '/badges.aspx{args:\?.*}', 'robloxBadgesDetailPage');

	// Error Page
	$r->addRoute('GET', '/request-error', 'requestErrorPage');
	$r->addRoute('GET', '/request-error{args:\?.*}', 'requestErrorPage');
	$r->addRoute('POST', '/request-error', 'requestErrorPage');
	$r->addRoute('POST', '/request-error{args:\?.*}', 'requestErrorPage');
	
	// APIS FROM NOW ON
	// Username Check
	$r->addRoute('GET', '/usercheck/checkifinvalidusernameforsignup', 'signupUsernameCheck');
    $r->addRoute('GET', '/usercheck/checkifinvalidusernameforsignup{args:\?.*}', 'signupUsernameCheck');
	
	$r->addRoute('POST', '/client-status/set', 'clientStatusSet');
    $r->addRoute('POST', '/client-status/set{args:\?.*}', 'clientStatusSet');

	$r->addRoute('GET', '/client-status', 'clientStatus');
    $r->addRoute('GET', '/client-status{args:\?.*}', 'clientStatus');

	$r->addRoute('GET', '/my/settings/json', 'mySettingsJson');
    $r->addRoute('GET', '/my/settings/json{args:\?.*}', 'mySettingsJson');

	$r->addRoute('GET', '/my/account/json', 'myAccountJson');
    $r->addRoute('GET', '/my/account/json{args:\?.*}', 'myAccountJson');

	$r->addRoute('GET', '/sponsoredpage/list-json', 'sponsoredJson');
    $r->addRoute('GET', '/sponsoredpage/list-json{args:\?.*}', 'sponsoredJson');
	
	$r->addRoute('GET', '/asset/bodycolors.ashx', 'bodyColorUrl');
    $r->addRoute('GET', '/asset/bodycolors.ashx{args:\?.*}', 'bodyColorUrl');
	
	$r->addRoute('GET', '/mobileapi/userinfo', 'mobileUserInfo');
    $r->addRoute('GET', '/mobileapi/userinfo{args:\?.*}', 'mobileUserInfo');

	$r->addRoute('POST', '/mobileapi/login', 'mobileLogin');
    $r->addRoute('POST', '/mobileapi/login{args:\?.*}', 'mobileLogin');

	$r->addRoute('GET', '/mobileapi/check-app-version', 'mobileVersionCheck');
    $r->addRoute('GET', '/mobileapi/check-app-version{args:\?.*}', 'mobileVersionCheck');
	
	// UserBlock API
	$r->addRoute('GET', '/userblock/getblockedusers', 'emptyPage');
	$r->addRoute('GET', '/userblock/getblockedusers{args:\?.*}', 'emptyPage');
	
	// DataPersistence Set API
	$r->addRoute('POST', '/persistence/setblob.ashx', 'persistenceSetBlob');
	$r->addRoute('POST', '/persistence/setblob.ashx{args:\?.*}', 'persistenceSetBlob');
	
	$r->addRoute('GET', '/persistence/getbloburl.ashx', 'persistenceGetBlob');
	$r->addRoute('GET', '/persistence/getbloburl.ashx{args:\?.*}', 'persistenceGetBlob');
	
	// GameInstance Toggle
	$r->addRoute('POST', '/game-instances/shutdown', 'shutdownServer');
	$r->addRoute('POST', '/game-instances/shutdown{args:\?.*}', 'shutdownServer');
	
	$r->addRoute('GET', '/badges/list-badges-for-place/json', 'badgeJson');
	$r->addRoute('GET', '/badges/list-badges-for-place/json{args:\?.*}', 'badgeJson');
	
	
	// Favourite Toggle
	$r->addRoute('POST', '/favorite/toggle', 'favouriteToggle');
	$r->addRoute('POST', '/favorite/toggle{args:\?.*}', 'favouriteToggle');
	
	// Vote Toggle
	$r->addRoute('POST', '/voting/vote', 'voteToggle');
	$r->addRoute('POST', '/voting/vote{args:\?.*}', 'voteToggle');
	
	$r->addRoute('GET', '/scriptresource.axd{args:\?.*}', 'scriptResource');
	$r->addRoute('GET', '/webresource.axd{args:\?.*}', 'scriptResource');
});

$routeInfo = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], strtolower($_SERVER['REQUEST_URI']));

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
		die(header("Location: https://www.$domain/request-error?code=404"));
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        header("Location: https://www.$domain/request-error?code=404");
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        call_user_func($handler, $vars);
        break;
}

function scriptResource()
{
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/AssetMain.php" );
	header("content-type: text/javascript");
	$stmt = $pdo->prepare("SELECT script FROM scripts WHERE t = :name");
	$stmt->bindParam(':name', $_GET["d"]);
	$stmt->execute();
	
	echo($stmt->fetchColumn());
}

function thumbnails()
{
	header("content-type: application/json");
	$json = [
		'Url' => "",
		'Final' => true
	];

	die(json_encode($json));
}

function clientStatusSet()
{
	global $rbxEventTracker;
	global $authPDO;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/Client-Status/Set.php" );
}

function setupInstall()
{
	global $domain; 
	
	die(header("location: https://setup.$domain/Roblox.exe"));
}

function clientStatus()
{
	global $authPDO;
	global $rbxEventTracker;

	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/Client-Status/Client-Status.php" );
}

function emptyPage()
{
}

function developPage()
{ // currently unused
	global $userInfo;
global $isUserAuthenticated;
	global $domain;
	global $webServerName;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/Develop/Default.php" );
}

function loginPage()
{
	// Site page (NewLogin)
	global $isUserAuthenticated;
	global $requestUrl;
	global $userInfo;
	global $domain;
	global $webServerName;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/NewLogin.php" );
}

function getAuthTicket()
{
    global $isUserAuthenticated;
	header("Content-Type: text/plain");

	if ( !$isUserAuthenticated ){
		echo UserAuthentication::requestGuestAuthTicket($_COOKIE["GuestData"]);
	}else
		echo UserAuthentication::requestAuthenticationTicket($_COOKIE["_ROBLOSECURITY"], 0);
}

function loginNegotiateTicket()
{
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/rootapis/Login/Negotiate.php");
}

function maintenancePage()
{
	global $webServerName;
	global $domain;
	global $requestUrl;

	require_once( $_SERVER["DOCUMENT_ROOT"] . "/rootapis/Login/FulfillConstraint.php" );
}

function requestAuthTicket()
{
	global $domain;
    global $isUserAuthenticated;

	// Temporary until guests
	if ( !$isUserAuthenticated ){
		echo'User is not authorised.';
		die(http_response_code(400));
	}

	echo "https://www.".$domain."/Login/Negotiate.ashx?suggest=".UserAuthentication::requestAuthenticationTicket($_COOKIE["_ROBLOSECURITY"], 0);
}

function ThumbsAsset()
{
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/AssetMain.php" );
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/Thumbs/Asset.php" );
}

function ThumbsGameIcon()
{
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/AssetMain.php" );
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/Thumbs/GameIcon.php" );
}

function ThumbsAvatar()
{
	global $authPDO;
	global $userLookup;
	
	$isJson = false;
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/AssetMain.php" );
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/Thumbs/Avatar.php" );
}

function ThumbsAvatarJSON()
{
	global $authPDO;
	global $userLookup;
	
	$isJson = true;
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/AssetMain.php" );
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/Thumbs/Avatar.php" );
}

function dataUpload()
{
	global $userInfo;
	global $isUserAuthenticated;
	global $domain;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/AssetMain.php" );
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/Data/Upload.php" );
}

function mySettingsJson()
{
	global $userInfo;
	global $isUserAuthenticated;
	global $domain;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/My/SettingsJson.php" );
}

function myAccountJson()
{
	global $domain;
	global $isUserAuthenticated;
	global $userInfo;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/My/AccountJson.php" );
}

function sponsoredJson()
{
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/SponsoredPage/List-Json.php" );
}

function bodyColorUrl()
{
	global $userLookup;
	global $domain;
	
	header("content-type: text/xml");
	
	if (!isset($_GET["userid"])){
		die(header("Location: https://www.$domain/request-error?code=400"));
	}
	
	if (!$userLookup->doesUserExist((int)$_GET["userid"], 1)){
		die(header("Location: https://www.$domain/request-error?code=400"));
	}	
	
	$bodyColors = json_decode($userLookup->getPublicUserInfo("BodyColorsJSON", (int)$_GET["userid"]));
	
	echo'<?xml version="1.0" encoding="utf-8" ?>
<roblox xmlns:xmime="http://www.w3.org/2005/05/xmlmime" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="http://www.roblox.com/roblox.xsd" version="4">
	<External>null</External>
	<External>nil</External>
	<Item class="BodyColors">
		<Properties>
			<int name="HeadColor">', $bodyColors->headColor ,'</int>
			<int name="LeftArmColor">', $bodyColors->leftArmColor ,'</int>
			<int name="LeftLegColor">', $bodyColors->leftLegColor ,'</int>
			<string name="Name">Body Colors</string>
			<int name="TorsoColor">', $bodyColors->torsoColor ,'</int>
			<int name="RightArmColor">', $bodyColors->rightArmColor ,'</int>
			<int name="RightLegColor">', $bodyColors->rightLegColor ,'</int>
			<bool name="archivable">true</bool>
		</Properties>
	</Item>
</roblox>';
}

function itemAPI()
{
	global $isUserAuthenticated;
	global $authPDO;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/AssetMain.php" );
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/API/Item.php" );
}

function gameResults()
{
	global $assetsPDO;
	global $domain;

	require_once( $_SERVER['DOCUMENT_ROOT'] . "/AssetMain.php" );
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/Games/ResultsCached.php" );
}

function getServerList()
{
	global $domain;
	global $userInfo;
	global $isUserAuthenticated;

	require_once( $_SERVER['DOCUMENT_ROOT'] . "/AssetMain.php" );
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/Games/GetGameInstancesJson.php" );
}

function createPlace()
{ // unused page
	global $userInfo;
global $isUserAuthenticated;
	global $domain;
	global $webServerName;
	
	require_once("../rootapis/places/create.php");
}

function ideWelcome()
{
	global $userInfo;
	global $isUserAuthenticated;
	global $domain;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/AssetMain.php" );
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/IDE/Welcome.php" );
}

function idePublishAs()
{
	global $userInfo;
	global $isUserAuthenticated;
	global $domain;
	global $webServerName;
	global $assetsPDO;

	require_once( $_SERVER['DOCUMENT_ROOT'] . "/AssetMain.php" );
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/IDE/PublishAs.php" );
}

function processNewModel()
{
	global $userInfo;
	global $domain;
	global $webServerName;

	require_once( $_SERVER['DOCUMENT_ROOT'] . "/AssetMain.php" );
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/IDE/ModelUpload.php" );
}

function idePublishAsNewModel()
{
	global $userInfo;
	global $domain;
	global $webServerName;

	require_once( $_SERVER['DOCUMENT_ROOT'] . "/AssetMain.php" );
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/IDE/PublishAsNewModel.php" );
}

function ideRedirectPublishAs()
{
	global $domain;

	header("Location: https://www.$domain/ide/publishas?".$_SERVER['QUERY_STRING']);
}
function insertSet()
{
	header("Location: https://sets.pizzaboxer.xyz/Game/Tools/InsertAsset.ashx?".$_SERVER['QUERY_STRING']);
}

function needParentVerification()
{
	global $userInfo;
	global $requestUrl;
	global $isUserAuthenticated;
	global $domain;
	global $webServerName;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/Membership/NeedParentVerification.php");
}

function premiumMembership()
{
	global $userInfo;
	global $requestUrl;
	global $isUserAuthenticated;
	global $domain;
	global $webServerName;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/Premium/Membership.php");
}

function notApproved()
{
	global $userInfo;
	global $requestUrl;
	global $isUserAuthenticated;
	global $authPDO;
	global $domain;
	global $webServerName;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/Membership/NotApproved.php");
}

function mobileUserInfo()
{
	header("content-type: application/json");
	global $userInfo;
    global $isUserAuthenticated;
	global $domain;

	if ( !$isUserAuthenticated )
		die(header("Location: https://www.$domain/request-error?code=403"));

	$username = $userInfo['name'];
	$userId = $userInfo['id'];
	
	$json = [
		'UserId' => $userId,
		'UserName' => $username,
		'DisplayName' => $username,
		'HasPasswordSet' => true,
		'Email' => null,
		'AgeBracket' => 0,
		'Roles' => [],
		'MembershipType' => 'None',
		'RobuxBalance' => 0,
		'TicketsBalance' => 0,
		'NotificationCount' => 0,
		'EmailNotificationEnabled' => false,
		'PasswordNotificationEnabled' => false
	];
	
	die(json_encode($json));
}

function mobileLogin()
{
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/MobileAPI/Login.php" );
}

function mobileVersionCheck()
{
	header("content-type: application/json");
	$json = [ "data" => [] ];
	if ($_GET["appversion"] !== "AppAndroidV1.0.2" && $_GET["appversion"] !== "AppiOSV1.0.2")
		$json["data"]["UpgradeAction"] = "Required";
	else
		$json["data"]["UpgradeAction"] = "None";

	die(json_encode($json));
}

function userAd1()
{	
	require_once("userAd1.php"); 
}

function userAd2()
{	
	require_once("userAd2.php"); 
}

function userAd3()
{	
	require_once("userAd3.php"); 
}

function getPlayerChatInfo()
{
	header("Content-Type: application/json");
	echo'{"ChatFilter":"whitelist"}';
}

function shutdownServer()
{
	global $assetInfo;
	global $isUserAuthenticated;
	global $userInfo;
	
	$gameServPDO = connectDatabase("gameservers");
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/AssetMain.php" );
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/Game-Instances/Shutdown.php" );
}

function voteToggle()
{
	global $userInfo;
	global $isUserAuthenticated;
	global $domain;
	global $authPDO;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/AssetMain.php" );
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/Voting/Vote.php" );
}

function badgeJson()
{
	global $userInfo;
global $isUserAuthenticated;
	global $domain;
	global $authPDO;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/AssetMain.php" );
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/Badges/List.php" );
}

function favouriteToggle()
{
	header("content-type: application/json");
	global $userInfo;
	global $isUserAuthenticated;
	global $authPDO;
	global $domain;

	require_once( $_SERVER['DOCUMENT_ROOT'] . "/AssetMain.php" );

	$json = (object)[];

	try{
		if (!$isUserAuthenticated)
			throw new Exception("guestUserLogin");

		$assetId = (int)$_POST["assetid"];
		$userId = $userInfo['id'];
		
		$stmt = $authPDO->prepare("SELECT * FROM apiuse WHERE apiUsed = 'favoriteToggle' AND userId = :userId AND :timeTested < timeUsed");
		$stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
		$stmt->bindValue(':timeTested', time() - 120, PDO::PARAM_INT);
		$stmt->execute();
		$userTimes = $stmt->rowCount();
		
		
		$stmt = $authPDO->prepare("SELECT * FROM apiuse WHERE apiUsed = 'favoriteToggle' AND userIp = :userIp AND :timeTested < timeUsed");
		$stmt->bindParam(':userIp', $_SERVER["HTTP_CF_CONNECTING_IP"], PDO::PARAM_STR);
		$stmt->bindValue(':timeTested', time() - 120, PDO::PARAM_INT);
		$stmt->execute();
		$ipTimes = $stmt->rowCount();
		
		if ($ipTimes === 10 || $userTimes === 10){
			die(header("Location: https://www.$domain/request-error?code=400"));
		}
		
		Telemetry::reportUsage("favoriteToggle", $userId);
		
		if (!AssetService::doesUserUploadedAssetExist($assetId)){
			throw new Exception("invalidRequest");
		}

		$assetTypeId = AssetService::getAssetInfo($assetId)["typeid"];
		
		$stmt = $pdo->prepare("SELECT assetId FROM favorites WHERE assetId = :assetId AND userId = :userId");
		$stmt->bindParam(':assetId', $assetId, PDO::PARAM_INT);
		$stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
		$stmt->execute();
		
		
		if ($stmt->rowCount() === 0){
			$stmt = $pdo->prepare("INSERT INTO favorites (assetId, typeId, userId, lastModified) VALUES (:assetId, :typeId, :userId, :lastModified)");
			$stmt->bindParam(':assetId', $assetId, PDO::PARAM_INT);
			$stmt->bindParam(':typeId', $assetTypeId, PDO::PARAM_INT);
			$stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
			$stmt->bindValue(':lastModified', time(), PDO::PARAM_INT);
			$stmt->execute();
			
			$json->success = true;
		}else{
			$stmt = $pdo->prepare("DELETE FROM favorites WHERE assetId = :assetId and userId = :userId");
			$stmt->bindParam(':assetId', $assetId, PDO::PARAM_INT);
			$stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
			$stmt->execute();
			
			$json->success = true;
		}
	}
	
	catch (Exception $e){
		if (!$e->getMessage() === "guestUserLogin"){
			$json->success = false;
			$json->message = $e->getMessage();
		}
	}
	
	die(json_encode($json));
}

function gamesPage()
{
	global $requestUrl;
	global $userInfo;
	global $isUserAuthenticated;
	global $domain;
	global $webServerName;

	//die('<a href="/games/start?placeid=1">test</a>');
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/Games/GamesPage.php"); 
}

function assetPage($vars)
{
	global $domain;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/AssetPage.php" ); 
}

function LibraryPage($vars)
{
	global $requestUrl;
	global $userInfo;
	global $isUserAuthenticated;
	global $domain;
	global $webServerName;

	require_once( $_SERVER['DOCUMENT_ROOT'] . "/AssetMain.php" );
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/LibraryPage.php" ); 
}

function catalogPage($vars)
{
	global $requestUrl;
	global $userInfo;
	global $isUserAuthenticated;
	global $domain;
	global $webServerName;

	require_once( $_SERVER['DOCUMENT_ROOT'] . "/AssetMain.php" );
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/CatalogPage.php" ); 
}

function threeDeeAvatar()
{
	global $domain;
	global $webServerName;

	require_once( $_SERVER['DOCUMENT_ROOT'] . "/AssetMain.php" );
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/asset-thumbnail-3d/json.php" ); 
}

function threeDeeAvatarProf()
{
    global $userInfo;
global $isUserAuthenticated;
	global $userLookup;
	global $domain;
	global $webServerName;
	global $authPDO;

	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/avatar-thumbnail-3d/json.php" ); 
}

function resolveHashThumb($vars)
{
    header("content-type: application/json");

    $json = [
        "Url" => "https://t1.idk18.xyz/{$vars['hash']}"
    ];
    die(json_encode($json));
}

function gamePage($vars)
{
	global $requestUrl;
	global $userInfo;
	global $isUserAuthenticated;
	global $domain;
	global $webServerName;

	require_once( $_SERVER['DOCUMENT_ROOT'] . "/AssetMain.php" );
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/Games/GameDetails.php"); 
}

function friendsPage($vars)
{
	global $requestUrl;
	global $userInfo;
	global $isUserAuthenticated;
	global $userLookup;
	global $domain;
	global $webServerName;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/Users/Friends.php" );
}

function inventoryPage($vars)
{
	global $requestUrl;
	global $userInfo;
	global $isUserAuthenticated;
	global $userLookup;
	global $domain;
	global $webServerName;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/Users/Inventory.php" );
}

function groupPage($vars)
{
	global $requestUrl;
	global $userInfo;
	global $isUserAuthenticated;
	global $userLookup;
	global $domain;
	global $authPDO;
	global $webServerName;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/AssetMain.php" );
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/Groups/Group.php" );
}

function declineAllFriends($vars)
{
	global $userInfo;
	global $isUserAuthenticated;
	global $userLookup;
	global $authPDO;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/User/declineAllFriends.php" );
}

function removeFriend($vars)
{
	global $userInfo;
	global $isUserAuthenticated;
	global $userLookup;
	global $authPDO;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/User/removeFriend.php" );
}

function sendFriend($vars)
{
	global $userInfo;
	global $isUserAuthenticated;
	global $userLookup;
	global $authPDO;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/User/sendFriend.php" );
}

function declineFriend($vars)
{
	global $userInfo;
	global $isUserAuthenticated;
	global $userLookup;
	global $authPDO;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/User/declineFriend.php" );
}

function acceptFriend($vars)
{
	global $userInfo;
	global $isUserAuthenticated;
	global $userLookup;
	global $authPDO;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/User/acceptFriend.php" );
}

function followUser($vars)
{
	global $userInfo;
	global $isUserAuthenticated;
	global $userLookup;
	global $authPDO;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/User/Follow.php" );
}

function unfollowUser($vars)
{
	global $userInfo;
	global $isUserAuthenticated;
	global $userLookup;
	global $authPDO;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/User/Unfollow.php" );
}

function profilePage($vars)
{
	global $requestUrl;
	global $userInfo;
	global $isUserAuthenticated;
	global $userLookup;
	global $domain;
	global $authPDO;
	global $webServerName;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/AssetMain.php" );
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/Users/Profile.php" );
}

function statusAPI()
{
	global $userInfo;
	global $isUserAuthenticated;
	global $domain;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/AssetMain.php" );
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/Home/UpdateStatus.php" );
}

function friendsAPI($vars)
{
	global $userInfo;
	global $userLookup;
	global $domain;
	global $webServerName;
	global $authPDO;
	global $isUserAuthenticated;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/AssetMain.php" );
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/Users/Friends-Api.php" );
}

function inventoryAPI($vars)
{
	global $userInfo;
global $isUserAuthenticated;
	global $userLookup;
	global $domain;
	global $webServerName;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/Users/Inventory-Api.php" );
}

function landingPage()
{
	global $requestUrl;
	global $userInfo;
	global $domain;
	global $webServerName;
	global $isUserAuthenticated;
	
	if ($isUserAuthenticated){
		die(header("Location: https://www.".$domain."/home"));
	}
	
	/*	Variants:
			- RC (RollerCoaster)
			- BC (BlueCity)
	*/
	
	$signupForm = $_GET["v"] ?? "rc";
	
	switch ($signupForm)
	{
		case "bc":
			require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/BlueCitySignupForm.php");
			break;
			
		case "rc":
			require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/RollerCoasterSignupForm.php");
			break;
			
		default:
			require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/RollerCoasterSignupForm.php");
			break;
	}
}
 
function homePage()
{
	global $requestUrl;
	global $userInfo;
	global $domain;
	global $webServerName;
	global $isUserAuthenticated;
	global $authPDO;
	
	if (!$isUserAuthenticated){
		die(header("Location: https://www.".$domain."/"));
	}
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/AssetMain.php" );
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/HomePage.php" );
}
 
function signupUsernameCheck()
{
	header("content-type: application/json");
	
	if (!isset($_GET["username"]))
		die(header("Location: https://www.$domain/request-error?code=400"));
	
	$result = UserAuthentication::validateUsernameForSignup($_GET["username"]);
	
	$json = (object)[ 
		"data" => $result
	];
	
	die(json_encode($json));
}



function assetFetch()
{
	global $userInfo;
	global $server;
	global $isUserAuthenticated;

	require_once("../AssetMain.php");

	$assetId = (isset($_GET["id"])) ? (int)$_GET["id"] : 0;
    $assetVersion = (isset($_GET["version"])) ? (int)$_GET["version"] : 0;

    if ($assetId == 0 && $assetVersion == 0){
        $assetVersionId = (isset($_GET["assetversionid"])) ? (int)$_GET["assetversionid"] : 0;

        if ($assetVersionId !== 0){
            $assetInfo = AssetService::getAssetInfo($assetVersionId, 2);
            $assetId = $assetInfo["id"];
            
            if (AssetService::doesUserUploadedAssetExist($assetId)){
                $apiKey = $_GET["gameid"] ?? null;
                if (AssetService::doesUserHavePermissionToGetAsset($assetId, $isUserAuthenticated, $userInfo['id'], $apiKey))
                    die(header("Location: ".AssetService::getAssetVersionId($assetVersionId)));
                else
                    die;
            }

			die(http_response_code(404));
        }
    }

	if (AssetService::doesUserUploadedAssetExist($assetId)){
		$apiKey = $_GET["gameid"] ?? null;
		if (AssetService::doesUserHavePermissionToGetAsset($assetId, $isUserAuthenticated, $userInfo['id'], $apiKey))
			die(header("Location: ".AssetService::getAsset($assetId, $assetVersion)));
		else
			die;
	}

	if ($assetId > 0) {
		header("Location: ".AssetService::getRobloxAsset($assetId, $assetVersion));
	}else
		header("Location: https://assetdelivery.roblox.com/v1/asset/?".$_SERVER['QUERY_STRING']);
}

function assetWear()
{
	global $userInfo;
	global $isUserAuthenticated;

	require_once("../AssetMain.php");
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/Asset/Wear.php" );
}

function genericConfirmationModalsRef()
{
	global $userInfo;
	global $isUserAuthenticated;
	global $requestUrl;
	global $domain;
	global $webServerName;
	
	require_once("../rootapis/reference/genericconfirmationmodals.php");
}

function adminLanding()
{
	global $userInfo;
	global $isUserAuthenticated;
	global $requestUrl;
	global $domain;
	global $webServerName;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/Admi/Landing.php" );
}

function adminUser()
{
	global $userInfo;
	global $isUserAuthenticated;
	global $requestUrl;
	global $userLookup;
	global $authPDO;
	global $domain;
	global $webServerName;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/Admi/ModerateUser.php" );
}

function adminReportList()
{
	global $userInfo;
	global $isUserAuthenticated;
	global $requestUrl;
	global $domain;
	global $webServerName;
	global $authPDO;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/AssetMain.php" );
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/Admi/ModerateReport.php" );
}

function adminReport()
{
	global $userInfo;
	global $isUserAuthenticated;
	global $requestUrl;
	global $domain;
	global $webServerName;
	global $userLookup;
	global $authPDO;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/Admi/Moderate/Report.php" );
}

function adminAsset()
{
	global $userInfo;
global $isUserAuthenticated;
	global $domain;
	global $webServerName;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/Admi/ModerateAsset.php" );
}

function adminBanner()
{
	global $userInfo;
global $isUserAuthenticated;
	global $domain;
	global $webServerName;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/Admi/ChangeSiteBanner.php" );
}

function inGameReport()
{
	global $domain;
	global $webServerName;
	global $authPDO;
	global $server;

	if (!isset($_SERVER["HTTP_ACCESSKEY"]) && $server["RCCAccessKey"] !== $_SERVER["HTTP_ACCESSKEY"]){
		die(http_response_code(404));
	}
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/AbuseReport/InGameChatHandler.php" );
}

function userReport()
{
	global $userInfo;
global $isUserAuthenticated;
	global $domain;
	global $webServerName;
	global $authPDO;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/AbuseReport/UserProfile.php" );
}


function paymentSystemUnavailable()
{
	global $userInfo;
	global $isUserAuthenticated;
	global $requestUrl;
	global $domain;
	global $webServerName;
	
	require_once("../rootapis/paymentsystemunavailable.php");
}

function robloxBadgesDetailPage()
{
	global $userInfo;
	global $isUserAuthenticated;
	global $requestUrl;
	global $domain;
	global $webServerName;
	
	require_once("../rootapis/badges.php");
}

function requestErrorPage()
{
	global $userInfo;
	global $isUserAuthenticated;
	global $requestUrl;
	global $domain;
	global $webServerName;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/request-error.php"); 
}

function persistenceSetBlob()
{
	global $server;

	require_once("../gamePersistanceMain.php");
	$modelFile = base64_encode(file_get_contents("php://input"));

	if (!isset($_SERVER["HTTP_ACCESSKEY"]) && $server["RCCAccessKey"] !== $_SERVER["HTTP_ACCESSKEY"]){
		die(http_response_code(404));
	}

	header("Content-Type: text/xml");
	
	$stmt = $gamePersistence->pdo->prepare("SELECT * FROM datapersistence WHERE userId = ? AND placeId = ?");
	$stmt->bindParam(1, $_GET["userid"], PDO::PARAM_INT);
	$stmt->bindParam(2, $_GET["placeid"], PDO::PARAM_INT);
	$stmt->execute();
	
	try 
	{
		$result = $stmt->rowCount();
	
		if ($result === 0){
			$stmt = $gamePersistence->pdo->prepare("INSERT INTO datapersistence (placeId, userId, value) VALUES (?, ?, ?)");
			$stmt->bindParam(1, $_GET["placeid"], PDO::PARAM_INT);
			$stmt->bindParam(2, $_GET["userid"], PDO::PARAM_INT);
			$stmt->bindParam(3, $modelFile);
		}else{
			$stmt = $gamePersistence->pdo->prepare("UPDATE datapersistence SET value = ? WHERE userId = ? AND placeId = ?");
			$stmt->bindParam(1, $modelFile);
			$stmt->bindParam(2, $_GET["userid"], PDO::PARAM_INT);
			$stmt->bindParam(3, $_GET["placeid"], PDO::PARAM_INT);
		}
		
		$stmt->execute();
	}
	
	catch (Exception $e) {
		return header("Location: https://www.idk18.xyz/request-error?code=400");
	}
}

function persistenceGetBlob()
{
	global $server;
	require_once("../gamePersistanceMain.php");

	if (!isset($_SERVER["HTTP_ACCESSKEY"]) && $server["RCCAccessKey"] !== $_SERVER["HTTP_ACCESSKEY"]){
		die(http_response_code(404));
	}

	header("Content-Type: text/xml");

	try 
	{
		$stmt = $gamePersistence->pdo->prepare("SELECT value FROM datapersistence WHERE userId = ? AND placeId = ?");
		$stmt->bindParam(1, $_GET["userid"], PDO::PARAM_INT);
		$stmt->bindParam(2, $_GET["placeid"], PDO::PARAM_INT);
		$stmt->execute();
		$isReady = $stmt->rowCount();
		
		if (!$isReady){
			echo '<Table></Table>';
		}else{
			$modelFile = $stmt->fetchColumn();
			$modelFile = base64_decode($modelFile);
			$modelFile = gzdecode($modelFile);
		
			echo $modelFile;
		}
	}
	
	catch (Exception $e) {
		return header("Location: https://www.idk18.xyz/request-error?code=400");
	}
}

function pointsClanLeaderboard()
{
	header("content-type: application/json");
	$json = [];
	
	die(json_encode($json));
}

function pointsGameLeaderboard()
{
	global $userInfo;
	global $domain;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/AssetMain.php" );
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/Leaderboards/Game.php" );
}

?>
