<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php");
$_GET = array_change_key_case($_GET, CASE_LOWER);
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/games/meepcity/raw_unixtime.php', 'unix');
    $r->addRoute('GET', '/games/meepcity/raw_unixtime.php{args:\?.*}', 'unix');

    $r->addRoute('GET', '/games/meepcity/get_asset_sales.php', 'assetSales');
    $r->addRoute('GET', '/games/meepcity/get_asset_sales.php{args:\?.*}', 'assetSales');

    $r->addRoute('GET', '/games/meepcity/get_parties.php', 'parties');
    $r->addRoute('GET', '/games/meepcity/get_parties.php{args:\?.*}', 'parties');

    $r->addRoute('GET', '/games/meepcity/twitter_code_use.php', 'assetSales');
    $r->addRoute('GET', '/games/meepcity/twitter_code_use.php{args:\?.*}', 'assetSales');

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

function unix()
{
	echo time();
}

function assetSales()
{
header("content-type: application/json");
print("{}");

}

function parties()
{

header("content-type: application/json");
print("[]");

}
?>