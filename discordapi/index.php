<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php");
require_once( $_SERVER['DOCUMENT_ROOT'] . "/apiViewMain.php");
ini_set('display_error', 1);
error_reporting(E_ALL);

header("content-type: application/json");

$stmt = $maintenancePDO->prepare("SELECT serviceStatus FROM apiservicestatus WHERE serviceName = 'discordAPI'");
$stmt->execute();
$isApiServiceEnabled = $stmt->fetchColumn();
$isUserAuthenticated = UserAuthentication::isUserAuthenticated();
$userInfo = ($isUserAuthenticated) ? UserAuthentication::getUserInfo("full") : [];

if (!$isApiServiceEnabled) {
    if ($isUserAuthenticated) {
        $stmt = $authPDO->prepare("SELECT permissionLevel FROM users WHERE id = :userId");
        $stmt->bindValue(":userId", $userInfo['id'], PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->fetchColumn() < 1) {
            respondWithMaintenanceError();
        }
    } else {
        respondWithMaintenanceError();
    }
}

function respondWithMaintenanceError() {
    http_response_code(503);
    echo json_encode(['errors' => [['code' => 0, 'message' => "Service Undergoing Maintenance"]]]);
    die;
}

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    // IDKLABS material below here
    $r->addRoute('GET', '/gamejamapi/channels/versioncheck', 'versionCheck');
	$r->addRoute('GET', '/gamejamapi/channels/versioncheck{args:\?.*}', 'versionCheck');

    $r->addRoute('GET', '/gamejamapi/channels/flagcheck', 'flagCheck');
	$r->addRoute('GET', '/gamejamapi/channels/flagcheck{args:\?.*}', 'flagCheck');

    $r->addRoute('GET', '/gamejamapi/channels/addchannel', 'addChannel');
	$r->addRoute('GET', '/gamejamapi/channels/addchannel{args:\?.*}', 'addChannel');
    // IDKLABS material up here 

	$r->addRoute('GET', '/api/moderation/status', 'userStatus');
	$r->addRoute('GET', '/api/moderation/status{args:\?.*}', 'userStatus');

    $r->addRoute('GET', '/api/verificationstatus{args:\?.*}', 'verificationStatus');
    $r->addRoute('GET', '/api/referpeople{args:\?.*}', 'refer');
    $r->addRoute('GET', '/api/viewaccounts{args:\?.*}', 'viewAccounts');

	$r->addRoute('GET', '/verification/start', 'redirect');
	$r->addRoute('GET', '/verification/start{args:\?.*}', 'redirect');

	$r->addRoute('GET', '/verification/process', 'processTicket');
	$r->addRoute('GET', '/verification/process{args:\?.*}', 'processTicket');
});

$routeInfo = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], strtolower($_SERVER['REQUEST_URI']));

switch ($routeInfo[0]) 
{
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

function flagCheck()
{
    require_once( $_SERVER["DOCUMENT_ROOT"] . "/discordapi/gamejam/channelVersionCheck.php" );
}

function userStatus()
{
	global $authPDO;
	global $userInfo;
global $isUserAuthenticated;
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/discordapi/userStatus.php" );
}

function verificationStatus()
{
	global $authPDO;
	global $userInfo;
global $isUserAuthenticated;

	require_once( $_SERVER["DOCUMENT_ROOT"] . "/discordapi/botcommands/verify.php" );
}

function refer()
{
	global $authPDO;
	global $userInfo;
global $isUserAuthenticated;

	require_once( $_SERVER["DOCUMENT_ROOT"] . "/discordapi/botcommands/refer.php" );
}

function viewAccounts()
{
	global $authPDO;
	global $userInfo;
global $isUserAuthenticated;

	require_once( $_SERVER["DOCUMENT_ROOT"] . "/discordapi/botcommands/viewaccounts.php" );
}

function redirect()
{
	die(header("Location: https://discord.com/oauth2/authorize?client_id=1132130864692732014&response_type=code&redirect_uri=https%3A%2F%2Fdiscordapi.idk18.xyz%2Fverification%2Fprocess&scope=identify"));
}

function processTicket()
{
    global $domain;
    global $authPDO;
    require_once( $_SERVER["DOCUMENT_ROOT"] . "/discordapi/process.php" );
}
?>