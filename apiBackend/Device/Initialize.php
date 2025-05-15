<?php
header("content-type: application/json");

$browserTrackerId = 0;
$result = [
	'browserTrackerId' => $browserTrackerId,
	'appDeviceIdentifier' => null
];

die(json_encode($result));
?>