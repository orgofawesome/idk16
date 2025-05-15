<?php
header("content-type: text/plain");

$assetId = intval($_GET["assetid"]) ?? 0;
$userId = intval($_GET["userid"]) ?? 0;

if ($userId == 0 || $assetId == 0){
	$error = [ "errors" => [ [ "code" => 400, "message" => "BadRequest" ] ] ];
	echo(json_encode($error));
	die(http_response_code(400));
}

if (AssetService::doesUserOwnAsset($assetId, $userId))
	echo 'true';
else
	echo 'false';
?>