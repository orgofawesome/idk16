<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php");
require_once( $_SERVER['DOCUMENT_ROOT'] . "/apiViewMain.php");

header("content-type: application/json");

if (!isset($_SERVER["HTTP_ACCESSKEY"]) && $server["RCCAccessKey"] !== $_SERVER["HTTP_ACCESSKEY"]){
	die(http_response_code(404));
}

$stmt = $maintenancePDO->prepare("SELECT serviceStatus FROM apiservicestatus WHERE serviceName = 'textfilterAPI'");
$stmt->execute();
$isApiServiceEnabled = $stmt->fetchColumn();

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
	$r->addRoute('POST', '/moderation/v2/filtertext', 'textFilterV2');
    $r->addRoute('POST', '/v2/moderation/textfilter', 'textFilterV2');
	$r->addRoute('POST', '/moderation/v2/filtertext{args:\?.*}', 'textFilterV2');
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

function textFilterV2()
{
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/textfilter/moderation/v2/filtertext.php" );
}
?>