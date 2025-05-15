<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php");

header("content-type: application/json");
$_GET = array_change_key_case($_GET, CASE_LOWER);
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/notifications/get-rollout-settings', 'rolloutSetting');
	$r->addRoute('GET', '/notifications/get-rollout-settings{args:\?.*}', 'rolloutSetting');
});

$routeInfo = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], strtolower($_SERVER['REQUEST_URI']));

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        http_response_code(404);
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        http_response_code(404);
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        call_user_func($handler, $vars);
        break;
}

function rolloutSetting()
{
	header("content-type: application/json");
    
    $result = [
        "RollOutFeatureEnabledList" => []
    ];

    die(json_encode($result));
}

?>