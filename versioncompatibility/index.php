<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php");
require_once( $_SERVER['DOCUMENT_ROOT'] . "/apiViewMain.php");

header("content-type: application/json");

$_GET = array_change_key_case($_GET, CASE_LOWER);
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/getallowedmd5hashes/{args:\?.*}', 'getAllowedMD5');
	$r->addRoute('GET', '/getallowedmd5hashes/?{args:\?.*}', 'getAllowedMD5');
	$r->addRoute('GET', '/2018llowedmd5hashes/{args:\?.*}', 'getNewerMD5');
	$r->addRoute('GET', '/2018llowedmd5hashes/?{args:\?.*}', 'getNewerMD5');
	$r->addRoute('GET', '/getexpmd5/{args:\?.*}', 'xepmd5');
	$r->addRoute('GET', '/getexpmd5/?{args:\?.*}', 'xepmd5');
	$r->addRoute('GET', '/getexpver/{args:\?.*}', 'xepver');
	$r->addRoute('GET', '/getexpver/?{args:\?.*}', 'xepver');
	$r->addRoute('GET', '/getallowedsecurityversions/{args:\?.*}', 'getAllowedSecurityVersions');
	$r->addRoute('GET', '/getallowedsecurityversions/?{args:\?.*}', 'getAllowedSecurityVersions');
	$r->addRoute('GET', '/getcurrentclientversionupload/{args:\?.*}', 'getCurrentClientVersionUpload');
	$r->addRoute('GET', '/getcurrentclientversionupload/?{args:\?.*}', 'getCurrentClientVersionUpload');
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

function getAllowedMD5()
{
	if ($_GET["apikey"] !== "2b4ba7fc-5843-44cf-b107-ba22d3319dcd")
		return http_response_code(401);
	# 009aad4e27384ba8de7a87bee92ffb02
	$json = [ 'data' => [ "009aad4e27384ba8de7a87bee92ffb02", "a6a521279b6abb5d7b56d4263e65b961" ] ];
	
	die(json_encode($json, JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK));
}

function getNewerMD5()
{
	if ($_GET["apikey"] !== "2b4ba7fc-5843-44cf-b107-ba22d3319dcd")
		return http_response_code(401);
	
	$json = [ 'data' => [ "197d3a16e37a91715d24128f9eb8360d" ] ];
	
	die(json_encode($json, JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK));
}

function xepmd5()
{
	if ($_GET["apikey"] !== "2b4ba7fc-5843-44cf-b107-ba22d3319dcd")
		return http_response_code(401);
	
	$json = [ 'data' => [ "a6a521279b6abb5d7b56d4263e65b961" ] ];
	
	die(json_encode($json, JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK));
}

function xepver()
{
	if ($_GET["apikey"] !== "2b4ba7fc-5843-44cf-b107-ba22d3319dcd")
		return http_response_code(401);
	
	$json = [ 'data' => [ "INTERNALiosapp", "0.235.0pcplayer" ] ];
	die(json_encode($json, JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK));
}

function getAllowedSecurityVersions()
{
	if ($_GET["apikey"] !== "2b4ba7fc-5843-44cf-b107-ba22d3319dcd")
		return http_response_code(401);
	
	$json = [ 'data' => [ "INTERNALiosapp", "0.271.1pcplayer", "0.235.0pcplayer" ] ];
	die(json_encode($json, JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK));
}

function getCurrentClientVersionUpload()
{
	if ($_GET["apikey"] !== "76e5a40c-3ae1-4028-9f10-7c62520bd94f")
		return http_response_code(401);
	
	switch ($_GET["binarytype"])
	{
		case "WindowsPlayer":
			echo '"version-3player"';
		break;
		
		default:
			http_response_code(409);
			return;
		break;
	}
}
?>