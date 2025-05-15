<?php
require_once("coreMain.php");

function isUserDiscordVerified()
{
	global $authPDO;
	if (!isset($_COOKIE["_ROBLODISCORD"]))
		return false;
	
	$stmt = $authPDO->prepare("SELECT session_allowed FROM discord_sessions WHERE session_token = :discordCookie");
	$stmt->bindParam(":discordCookie", $_COOKIE["_ROBLODISCORD"], PDO::PARAM_STR);
	$stmt->execute();
	$result = $stmt->fetchColumn();
	
	if ($result === 1)
		return true;

	return false;
}

function isUserAllowedToVisit()
{
	global $userInfo;
	global $isUserAuthenticated;
	global $allowedMachines;
	global $server;

	if ( UserAuthentication::isUserAuthenticated() )
		return true;

	if ( !isset($_SERVER["HTTP_CF_CONNECTING_IP"]) && in_array($_SERVER["REMOTE_ADDR"], $allowedMachines) )
		return true;
	
	if ( isset($_SERVER["HTTP_ACCESSKEY"]) && $_SERVER["HTTP_ACCESSKEY"] === $server["RCCAccessKey"] )
		return true;
	
	if ( isUserDiscordVerified() )
		return true;
	
	$requestURI = strtolower( $_SERVER["REQUEST_URI"] );
	
	if ( strpos( $requestURI, '/login/negotiate.ashx' ) === 0 )
		return true;

	if ( strpos( $requestURI, '/mobileapi/' ) === 0 )
		return true;

	if ( strpos( $requestURI, '/ide/' ) === 0 )
		return true;
	
	if ( strpos( $requestURI, '/asset/' ) === 0 )
		return true;

	if ( strpos( $requestURI, '/thumbs/' ) === 0 )
		return true;

	if ( strpos( $requestURI, '/my/settings/json' ) === 0 )
		return true;
	return false;
}
?>