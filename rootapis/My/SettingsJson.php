<?php
header("content-type: application/json");
	
if (!$isUserAuthenticated)
	die(header("Location: https://www.".$domain."/request-error?code=400"));
	
$json = [
	'UserId' => $userInfo['id'],
	'Name' => $userInfo['name'],
	'UserAbove13' => true,
	'UseSuperSafeChat' => false,
	'AccountAgeInDays' => UserAuthentication::getUserInfo("daysSinceJoin"),
	'IsAnyBC' => false,
	'IsOBC' => false,
	'IsTBC' => false
];
	
die(json_encode($json));
?>