<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php");
require_once( $_SERVER['DOCUMENT_ROOT'] . "/apiViewMain.php");

header("content-type: application/json");

function respondWithMaintenanceError() {
    http_response_code(503);
    echo json_encode(['errors' => [['code' => 0, 'message' => "Service Undergoing Maintenance"]]]);
    die;
}

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
	$r->addRoute('GET', '/games/meepcity/raw_unixtime.php', 'textFilterV2');
	$r->addRoute('GET', '/games/meepcity/raw_unixtime.php{args:\?.*}', 'textFilterV2');
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
	print(time());
}
?>