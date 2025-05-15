<?php
error_reporting(0);
$http_origin = $_SERVER['HTTP_ORIGIN'];
header("content-type: image/png");

if ($http_origin == "https://www.$domain")
{  
    header("Access-Control-Allow-Origin: $http_origin");
    header("Access-Control-Allow-Credentials: true");
}

$response = file_get_contents("https://idk16.blob.core.windows.net/thumbnails-production{$_SERVER["REQUEST_URI"]}");

if (!$response){
	http_response_code(400);
}else{
	echo($response);
}
?>
