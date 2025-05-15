<?php
header("Content-Type: application/json");

$authTicket = $_GET["suggest"] ?? "";

if (!isset($authTicket))
	die();

if (UserAuthentication::redeemAuthenticationTicket($authTicket) == "INVALID_AUTH"){
	http_response_code(400);
	echo "Invalid";
}
?>