<?php
header("content-type: application/json");
	
if (!$isUserAuthenticated)
	die(header("Location: https://www.".$domain."/request-error?code=400"));
	
$json = [
	'UserId' => $userInfo['id'],
	'Name' => $userInfo['name'],
	'UserEmail' => "t***@gmail.com",
	'IsEmailVerified' => true,
	'AgeBracket' => 0,
	'UserAbove13' => true
];
	
die(json_encode($json));
?>