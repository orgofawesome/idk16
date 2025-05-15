<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php");

header("content-type: application/json");
$_GET = array_change_key_case($_GET, CASE_LOWER);
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/setting/quietget/androidappsettings/', 'clientSettings');
	$r->addRoute('GET', '/setting/quietget/androidappsettings/{args:\?.*}', 'clientSettings');
	$r->addRoute('GET', '/setting/get/clientsharedsettings/{args:\?.*}', 'clientSettings');
	$r->addRoute('GET', '/setting/quietget/clientsharedsettings/{args:\?.*}', 'clientSettings');
	$r->addRoute('GET', '/setting/get/androidappsettings/', 'clientSettings');
	$r->addRoute('GET', '/setting/get/androidappsettings/{args:\?.*}', 'clientSettings');
	$r->addRoute('GET', '/setting/quietget/2018ntappsettings/', 'newerSettings');
	$r->addRoute('GET', '/setting/quietget/2018ntappsettings/{args:\?.*}', 'newerSettings');
	$r->addRoute('GET', '/setting/quietget/experimentsettings/{args:\?.*}', 'earlierflags');
	$r->addRoute('GET', '/setting/quietget/experimentsethkjhj2k3o3ij909099/{args:\?.*}', 'earlierflags');
	$r->addRoute('GET', '/setting/quietget/clientappsettings/', 'clientSettings');
	$r->addRoute('GET', '/setting/quietget/clientappsettings/{args:\?.*}', 'clientSettings');
	$r->addRoute('GET', '/setting/quietget/iosappsettings/{args:\?.*}', 'clientSettings');
	$r->addRoute('GET', '/setting/quietget/rccservicehkjhj2k3o3ij909099/', 'rccSettings');
	$r->addRoute('GET', '/setting/quietget/rccservicehkjhj2k3o3ij909099/{args:\?.*}', 'rccSettings');
	$r->addRoute('GET', '/setting/quietget/2ccservicehkjhj2k3o3ij909099/', 'NewSettings');
	$r->addRoute('GET', '/setting/quietget/2ccservicehkjhj2k3o3ij909099/{args:\?.*}', 'NewSettings');
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

function clientSettings()
{
	//if ($_GET["apikey"] !== "2b4ba7fc-5843-44cf-b107-ba22d3319dcd")
	//	return http_response_code(401);
	
	require_once("clientsettings.php");
	
	//die(json_encode($json, JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK));
}

function earlierflags()
{
	require_once("2015.php");
}

function rccSettings()
{
	//if ($_GET["apikey"] !== "2b4ba7fc-5843-44cf-b107-ba22d3319dcd")
	//	return http_response_code(401);
	
	require_once("rccsettings.php");
	//die(json_encode($json, JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK));
}

function NewSettings()
{
	//if ($_GET["apikey"] !== "2b4ba7fc-5843-44cf-b107-ba22d3319dcd")
	//	return http_response_code(401);
	
	require_once("2018ettings.php");
	//die(json_encode($json, JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK));
}

function newerSettings()
{
	require_once("2018ntsettings.php");
	
	//die(json_encode($json, JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK));
}
?>