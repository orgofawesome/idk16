<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php");
require_once( $_SERVER['DOCUMENT_ROOT'] . "/apiViewMain.php");

header("content-type: application/json");

function respondWithMaintenanceError() {
    http_response_code(503);
    echo json_encode(['errors' => [['code' => 0, 'message' => "Service Undergoing Maintenance"]]]);
    die;
}

function respondWithBanError() {
    http_response_code(403);
    echo json_encode(['errors' => [['code' => 0, 'message' => "User is moderated"]]]);
    die;
}

$stmt = $maintenancePDO->prepare("SELECT serviceStatus FROM apiservicestatus WHERE serviceName = 'apiGateway'");
$stmt->execute();
$isApiServiceEnabled = $stmt->fetchColumn();
$isUserAuthenticated = UserAuthentication::isUserAuthenticated();
$userInfo = ($isUserAuthenticated) ? UserAuthentication::getUserInfo("full") : [];

if (!$isApiServiceEnabled) {
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

if ( $isUserAuthenticated ) {
    $stmt = $authPDO->prepare("SELECT moderated FROM users WHERE id = :userId");
    $stmt->bindValue(":userId", $userInfo['id'], PDO::PARAM_INT);
    $stmt->execute();

    if ( $stmt->fetchColumn() == 1 ) {
        respondWithBanError();
    }
}

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
	$r->addRoute('GET', '/', 'statusPage');
	$r->addRoute('GET', '/{args:\?.*}', 'statusPage');
	
	// v1.1 directory
	$r->addRoute('GET', '/v1.1/avatar-fetch/', 'avatarFetch');
	$r->addRoute('GET', '/v1.1/avatar-fetch/{args:\?.*}', 'avatarFetch');

	$r->addRoute('GET', '/v1.1/game-start-info/', 'gameStartInfo');
	$r->addRoute('GET', '/v1.1/game-start-info/{args:\?.*}', 'gameStartInfo');
	
	// Initialize Mobile
	$r->addRoute('POST', '/device/initialize', 'initializeDevice');
	$r->addRoute('POST', '/device/initialize{args:\?.*}', 'initializeDevice');
	
	// Login API v1
	$r->addRoute('POST', '/login/v1/', 'loginV1');
	$r->addRoute('POST', '/login/v1/{args:\?.*}', 'loginV1');
	
	$r->addRoute('POST', '/login/v1', 'loginV1');
	$r->addRoute('POST', '/login/v1{args:\?.*}', 'loginV1');
	
	$r->addRoute('POST', '/v2/login', 'loginV1');
	$r->addRoute('POST', '/v2/login{args:\?.*}', 'loginV1');
	
	// Marketplace Product Info API
	$r->addRoute('GET', '/marketplace/productinfo', 'getProductInfo');
	$r->addRoute('GET', '/marketplace/productinfo{args:\?.*}', 'getProductInfo');

	$r->addRoute('POST', '/marketplace/purchase', 'purchase');
	$r->addRoute('POST', '/marketplace/purchase{args:\?.*}', 'purchase');
	
	$r->addRoute('POST', '/moderation/filtertext/', 'filtertext');
	$r->addRoute('POST', '/moderation/filtertext/{args:\?.*}', 'filtertext');
	
	$r->addRoute('POST', '/marketplace/submitpurchase', 'Devpurchase');
	$r->addRoute('POST', '/marketplace/submitpurchase{args:\?.*}', 'Devpurchase');
	
	$r->addRoute('GET', '/marketplace/productdetails', 'getProductDetails');
	$r->addRoute('GET', '/marketplace/productdetails{args:\?.*}', 'getProductDetails');
	
	// Marketplace Has Asset API
	$r->addRoute('GET', '/ownership/hasasset', 'userHasAsset');
	$r->addRoute('GET', '/ownership/hasasset{args:\?.*}', 'userHasAsset');
	
	// Currency Balance
	$r->addRoute('GET', '/currency/balance', 'currencyBalance');
	$r->addRoute('GET', '/currency/balance{args:\?.*}', 'currencyBalance');

	$r->addRoute('GET', '/currency/balance/', 'currencyBalance');
	$r->addRoute('GET', '/currency/balance/{args:\?.*}', 'currencyBalance');
	
	$r->addRoute('GET', '/my/balance', 'currencyBalance');
	$r->addRoute('GET', '/my/balance{args:\?.*}', 'currencyBalance');

	$r->addRoute('GET', '/incoming-items/count{args:\?.*}', 'notificationsMobile');
	$r->addRoute('GET', '/incoming-items/count', 'notificationsMobile');
	
	$r->addRoute('GET', '/gametransactions/getpendingtransactions/', 'pendingDevPRODUCTS');
	$r->addRoute('GET', '/gametransactions/getpendingtransactions/{args:\?.*}', 'pendingDevPRODUCTS');
	
	$r->addRoute('POST', '/gametransactions/settransactionstatuscomplete', 'successfulDevPRODUCTS');
	$r->addRoute('POST', '/gametransactions/settransactionstatuscomplete{args:\?.*}', 'successfulDevPRODUCTS');

	$r->addRoute('GET', '/social/has-user-set-password', 'hasUserSetPass');
	$r->addRoute('GET', '/social/has-user-set-password{args:\?.*}', 'hasUserSetPass');

	$r->addRoute('POST', '/reservedservers/create', 'createAccessCode');
	$r->addRoute('POST', '/reservedservers/create{args:\?.*}', 'createAccessCode');

	$r->addRoute('POST', '/reservedservers/grantaccess', 'grantAccessCode');
	$r->addRoute('POST', '/reservedservers/grantaccess{args:\?.*}', 'grantAccessCode');
	
	// Points Look Up API
	$r->addRoute('GET', '/points/get-point-balance', 'getPoints');
	$r->addRoute('GET', '/points/get-point-balance{args:\?.*}', 'getPoints');
	
	// Points Award API
	$r->addRoute('POST', '/points/award-points', 'awardPoints');
	$r->addRoute('POST', '/points/award-points{args:\?.*}', 'awardPoints');

	// Badge Award API
	$r->addRoute('POST', '/assets/award-badge', 'awardBadge');
	$r->addRoute('POST', '/assets/award-badge{args:\?.*}', 'awardBadge');
	
	// Signup API v1
	$r->addRoute('POST', '/signup/v1', 'signupV1');
	$r->addRoute('POST', '/signup/v1{args:\?.*}', 'signupV1');
	
	// Universes directory
	$r->addRoute('GET', '/universes/validate-place-join', 'validatePlaceJoin');
	$r->addRoute('GET', '/universes/validate-place-join{args:\?.*}', 'validatePlaceJoin');
	
	$r->addRoute('GET', '/universes/get-universe-containing-place', 'getUniverse');
	$r->addRoute('GET', '/universes/get-universe-containing-place{args:\?.*}', 'getUniverse');
	$r->addRoute('GET', '//universes/get-universe-containing-place{args:\?.*}', 'getUniverse');
	
	$r->addRoute('GET', '/universes/get-info', 'getUniverseInfo');
	$r->addRoute('GET', '/universes/get-info{args:\?.*}', 'getUniverseInfo');
	$r->addRoute('GET', '//universes/get-info{args:\?.*}', 'getUniverseInfo');
	
	$r->addRoute('GET', '/universes/get-universe-places', 'getUniversePlaces');
	$r->addRoute('GET', '/universes/get-universe-places{args:\?.*}', 'getUniversePlaces');
	$r->addRoute('GET', '//universes/get-universe-places{args:\?.*}', 'getUniversePlaces');
	
	$r->addRoute('GET', '/developerproducts/list', 'devProductList');
	$r->addRoute('GET', '/developerproducts/list{args:\?.*}', 'devProductList');
	$r->addRoute('GET', '//developerproducts/list{args:\?.*}', 'devProductList');
	
	$r->addRoute('POST', '/universes/new-place', 'universeNewPlace');
	$r->addRoute('POST', '/universes/new-place{args:\?.*}', 'universeNewPlace');
	
	$r->addRoute('POST', '/user/request-friendship', 'requestfriendship');
	$r->addRoute('POST', '/user/request-friendship{args:\?.*}', 'requestfriendship');
	
	$r->addRoute('POST', '/user/accept-friend-request', 'acceptfriend');
	$r->addRoute('POST', '/user/accept-friend-request{args:\?.*}', 'acceptfriend');
	
	$r->addRoute('POST', '/user/decline-friend-request', 'declinefriend');
	$r->addRoute('POST', '/user/decline-friend-request{args:\?.*}', 'declinefriend');

	$r->addRoute('POST', '/user/unfriend', 'unfriend');
	$r->addRoute('POST', '/user/unfriend{args:\?.*}', 'unfriend');

	$r->addRoute('GET', '/userblock/getblockedusers', 'blockList');
	$r->addRoute('GET', '/userblock/getblockedusers{args:\?.*}', 'blockList');

		
	// User directory
    $r->addRoute('GET', '/user/following-exists{args:\?.*}', 'doesFollowingExist');
	$r->addRoute('GET', '/user/following-exists', 'doesFollowingExist');

	$r->addRoute('POST', '/user/follow', 'followUser');
	$r->addRoute('POST', '/user/unfollow', 'unfollowUser');

	$r->addRoute('POST', '/user/multi-following-exists', 'multiFollowingRCC');

	$r->addRoute('GET', '/user/get-friendship-count{args:\?.*}', 'friendshipCount');
	$r->addRoute('GET', '/user/get-friendship-count', 'friendshipCount');

	// Experimentation
	$r->addRoute('GET', '/experimentation/joinuser{args:\?.*}', 'joinuserExperimentation');
	$r->addRoute('GET', '/experimentation/joinuser', 'joinuserExperimentation');

	// Users directory
    	$r->addRoute('GET', '/users/{id:\d+}', 'getUserById');
		$r->addRoute('GET', '/groups/{id:\d+}', 'getGroupById');
	
	$r->addRoute('GET', '/users/{id:\d+}/canmanage/{assetid:\d+}', 'canUserManageAsset');
	$r->addRoute('GET', '//users/{id:\d+}/canmanage/{assetid:\d+}', 'canUserManageAsset');
	
	$r->addRoute('GET', '/users/account-info', 'getAccountInfo');
	$r->addRoute('GET', '/users/account-info{args:\?.*}', 'getAccountInfo');
	
	$r->addRoute('GET', '/users/get-by-username', 'getUserByUsername');
	$r->addRoute('GET', '/users/get-by-username{args:\?.*}', 'getUserByUsername');

	$r->addRoute('POST', '/game/load-place-info', 'loadPlaceInfo');
	$r->addRoute('POST', '/game/load-place-info{args:\?.*}', 'loadPlaceInfo');

	$r->addRoute('GET', '/game/players/{userId:\d+}/', 'getPlayerChatInfo');
	$r->addRoute('GET', '/game/players/{userId:\d+}/{args:\?.*}', 'getPlayerChatInfo');
	$r->addRoute('GET', '/game/players/{userId:\d+}', 'getPlayerChatInfo');
	$r->addRoute('GET', '/game/players/{userId:\d+}{args:\?.*}', 'getPlayerChatInfo');
	$r->addRoute('GET', '//game/players/{userId:\d+}', 'getPlayerChatInfo');
	$r->addRoute('GET', '//game/players/{userId:\d+}{args:\?.*}', 'getPlayerChatInfo');
	$r->addRoute('GET', '//game/players/{userId:\d+}/', 'getPlayerChatInfo');
	$r->addRoute('GET', '//game/players/{userId:\d+}/{args:\?.*}', 'getPlayerChatInfo');
});

$routeInfo = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], strtolower($_SERVER['REQUEST_URI']));

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        http_response_code(404);
        echo json_encode(['errors' => [ [ 'code' => 404, 'message' => "NotFound" ] ] ]);
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        http_response_code(404);
        echo json_encode(['errors' => [ [ 'code' => 404, 'message' => "NotFound" ] ] ]);
        break;
    case FastRoute\Dispatcher::FOUND:	
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        call_user_func($handler, $vars);
        break;
}

function loadPlaceInfo()
{
	header("content-type: application/json");

	echo(file_get_contents("php://input"));
}

function hasUserSetPass()
{
	global $isUserAuthenticated;

	if (!$isUserAuthenticated){
		$json = [ "errors" => [ [ "code" => 403, "message" => "Forbidden" ] ] ];
		http_response_code(403);
	}else
		$json = [ "status" => "success", "result" => true ];
	
	die(json_encode($json));
}

function avatarFetch()
{
	global $userInfo;
global $isUserAuthenticated;
	global $userLookup;
	global $domain;

	require_once( $_SERVER["DOCUMENT_ROOT"] . "/AssetMain.php" );
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/v1.1/AvatarFetch.php" );
}

function filtertext()
{
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/moderation/textfilter.php" );
}

function gameStartInfo()
{
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/AssetMain.php" );
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/v1.1/game-start-info.php" );
}

function purchase()
{
	global $userInfo;
global $isUserAuthenticated;
	global $authPDO;
	
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/AssetMain.php" );
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/Marketplace/Purchase.php" );
}

function Devpurchase()
{
	global $userInfo;
global $isUserAuthenticated;
	global $authPDO;
	
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/AssetMain.php" );
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/Marketplace/SubmitPurchase.php" );
}

function getProductInfo()
{
	global $userInfo;
global $isUserAuthenticated;
	
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/AssetMain.php" );
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/Marketplace/ProductInfo.php" );
}

function getProductDetails()
{
	global $userInfo;
global $isUserAuthenticated;
	
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/AssetMain.php" );
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/Marketplace/ProductDetails.php" );
}

function pendingDevPRODUCTS()
{
	global $userInfo;
global $isUserAuthenticated;
	global $server;
	
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/AssetMain.php" );
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/GameTransactions/GetPendingTransactions.php" );
}

function successfulDevPRODUCTS()
{
	global $userInfo;
global $isUserAuthenticated;
	global $server;
	
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/AssetMain.php" );
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/GameTransactions/SetTransactionStatusComplete.php" );
}

function initializeDevice()
{
	global $userInfo;
global $isUserAuthenticated;
	global $domain; 
	
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/Device/Initialize.php");
}

function signupV1()
{
	global $userLookup;
	global $gameServPDO;
	global $domain;
	
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/api/signup/v1.php");
}

function getPlayerChatInfo()
{
	header("Content-Type: application/json");
	echo'{"ChatFilter":"whitelist"}';
}

function loginV1()
{
	global $domain;
	
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/api/login/v1.php");
}

function createAccessCode()
{
	global $server;
	
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/ReservedServers/Create.php" );
}

function grantAccessCode()
{
	global $gameServPDO;
	global $server;
	
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/ReservedServers/GrantAccess.php" );
}

function getPoints()
{
	global $userLookup;
	
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/Points/Get-Point-Balance.php" );
}

function awardPoints()
{
	global $server;
	global $userLookup;
	
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/Points/Award-Points.php" );
}

function awardBadge()
{
	global $server;
	global $userLookup;
	global $userInfo;
global $isUserAuthenticated;

	require_once( $_SERVER["DOCUMENT_ROOT"] . "/AssetMain.php" );
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/Assets/Award-Badge.php" );
}

function userHasAsset()
{
	global $server;
	
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/AssetMain.php" );
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/Ownership/HasAsset.php" );
}

function validatePlaceJoin()
{
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/AssetMain.php" );
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/Universes/validatePlaceJoin.php" );
}

function getUniverse()
{
	global $assetsPDO;
	
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/AssetMain.php" );
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/Universes/get-universe-containing-place.php" );
}

function getUniverseInfo()
{
	global $assetsPDO;
	global $userInfo;
global $isUserAuthenticated;
	
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/AssetMain.php" );
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/Universes/get-info.php" );
}

function getUniversePlaces()
{
	global $assetsPDO;
	global $userInfo;
global $isUserAuthenticated;
	
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/AssetMain.php" );
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/Universes/get-universe-places.php" );
}

function devProductList()
{
	global $assetsPDO;
	global $userInfo;
global $isUserAuthenticated;
	
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/AssetMain.php" );
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/DeveloperProducts/list.php" );
}

function universeNewPlace()
{
	global $server;
	global $assetsPDO;
	
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/AssetMain.php" );
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/Universes/new-place.php" );
}

function currencyBalance()
{
	global $userInfo;
	global $isUserAuthenticated;
	
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/Currency/Balance.php" );
}

function notificationsMobile()
{
	global $isUserAuthenticated;
	global $authPDO;
	
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/incoming-items/Count.php" );
}

function statusPage()
{
	http_response_code(403);
    echo json_encode(['errors' => [ [ 'code' => 403, 'message' => "Forbidden" ] ] ]);
    return;
}

function doesFollowingExist()
{
	global $userInfo;
global $isUserAuthenticated;
	global $userLookup;
	global $authPDO;

	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/User/following-exists.php" );
}

function requestfriendship()
{
	global $userInfo;
global $isUserAuthenticated;
	global $userLookup;
	global $authPDO;
	
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/User/request-friendship.php" );
}

function acceptfriend()
{
	global $userInfo;
global $isUserAuthenticated;
	global $userLookup;
	global $authPDO;
	
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/User/accept-friendship.php" );
}

function declinefriend()
{
	global $userInfo;
global $isUserAuthenticated;
	global $userLookup;
	global $authPDO;
	
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/User/decline-friendship.php" );
}

function unfriend()
{
	global $userInfo;
global $isUserAuthenticated;
	global $userLookup;
	global $authPDO;
	
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/User/unfriend.php" );
}

function blockList()
{
	$json = [
		'success' => true,
		'userList' => [],
		'total' => 0
	];

	die(json_encode($json));
}

function followUser()
{
	global $userInfo;
global $isUserAuthenticated;
	global $userLookup;
	global $authPDO;
	
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/User/follow.php" );
}

function unfollowUser()
{
	global $userInfo;
global $isUserAuthenticated;
	global $userLookup;
	global $authPDO;
	
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/User/unfollow.php" );
}

function multiFollowingRCC()
{
	global $authPDO;
	
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/User/multi-following-exists.php" );
}

function friendshipCount()
{
	global $authPDO;
	global $userInfo;
global $isUserAuthenticated;
	
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/User/get-friendship-count.php" );
}

function joinuserExperimentation()
{
	global $userInfo;
global $isUserAuthenticated;

	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/Experimentation/JoinUser.php" );
}

function canUserManageAsset($vars)
{
	global $assetsPDO;
	global $userLookup;
	
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/AssetMain.php" );
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/Users/canUserManageAsset.php" );
}
	
function getAccountInfo()
{
	global $userInfo;
global $isUserAuthenticated;
	
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/Users/getAccountInfo.php" );
}
	
function getUserById($vars) 
{
	global $authPDO;
	
    require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/Users/getUserById.php" );
}

function getUserByUsername() {
	global $authPDO;
	
    require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/Users/getUserByUsername.php" );
}

function getGroupById($vars)
{
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/AssetMain.php" );
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/apiBackend/Groups/getGroupById.php" );
}
?>
