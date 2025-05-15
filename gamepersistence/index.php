<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php");
require_once( $_SERVER['DOCUMENT_ROOT'] . "/apiViewMain.php");
require_once( $_SERVER['DOCUMENT_ROOT'] . "/gamePersistanceMain.php");

if (!isset($_SERVER["HTTP_ACCESSKEY"]) && $server["RCCAccessKey"] !== $_SERVER["HTTP_ACCESSKEY"]){
	die(http_response_code(404));
}

header("content-type: application/json");

$stmt = $maintenancePDO->prepare("SELECT serviceStatus FROM apiservicestatus WHERE serviceName = 'datastoresAPI'");
$stmt->execute();
$isApiServiceEnabled = $stmt->fetchColumn();
$assetsPDO = connectDatabase('assets');

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
	$r->addRoute('POST', '/persistence/getsortedvalues', 'getSortedValues');
	$r->addRoute('POST', '/persistence/getsortedvalues{args:\?.*}', 'getSortedValues');
	
	$r->addRoute('POST', '/persistence/getv2', 'getV2');
	$r->addRoute('POST', '/persistence/getv2{args:\?.*}', 'getV2');
	
	$r->addRoute('POST', '/persistence/increment', 'increment');
	$r->addRoute('POST', '/persistence/increment{args:\?.*}', 'increment');
	
	$r->addRoute('POST', '/persistence/set', 'set');
	$r->addRoute('POST', '/persistence/set{args:\?.*}', 'set');
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

function getSortedValues()
{
	global $gamePersistence;
	global $assetsPDO; 
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/gamepersistence/persistence/getsortedvalues.php" );
}

function getV2()
{
	global $gamePersistence;
	global $assetsPDO;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/gamepersistence/persistence/getv2.php" );
}

function increment()
{
	global $gamePersistence;
	global $assetsPDO;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/gamepersistence/persistence/increment.php" );
}

function set()
{
	global $gamePersistence;
	global $assetsPDO;
	
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/gamepersistence/persistence/set.php" );
}
?>