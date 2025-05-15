<?php
require_once("../../vendor/autoload.php");
require_once("../../siteViewMain.php");
$private_key_path = $_SERVER['DOCUMENT_ROOT'] . "/rootapis/eui3io2u3.pem";
$private_key_path_sig2 = $_SERVER['DOCUMENT_ROOT'] . "/rootapis/PrivateKeySig2.pem";

$requestUri = strtolower($_SERVER["REQUEST_URI"]);

//if (!isset($_COOKIE["GuestData"])){
//	
//}

$stmt = $maintenancePDO->prepare("SELECT serviceStatus FROM apiservicestatus WHERE serviceName = 'Website'");
$stmt->execute();
$isWebsiteServiceEnabled = $stmt->fetchColumn();
$isOnMaintenancePage = strpos( $requestUri, "/login/fulfillconstraint.aspx" ) === 0;
$isOnBanPage = strpos( $requestUri, "/membership/" ) === 0;
$isUserAuthenticated = UserAuthentication::isUserAuthenticated();
$userInfo = ($isUserAuthenticated) ? UserAuthentication::getUserInfo("full") : [];

if ( !$isWebsiteServiceEnabled && !$isOnMaintenancePage ) {
    if ( $isUserAuthenticated ) {
        $stmt = $authPDO->prepare("SELECT adminStatus FROM users WHERE id = :userId");
        $stmt->bindValue(":userId", $userInfo['id'], PDO::PARAM_INT);
        $stmt->execute();

        if ( $stmt->fetchColumn() < 1 ) {
            respondWithMaintenanceError();
        }
    } else {
        respondWithMaintenanceError();
    }
}

function respondWithMaintenanceError() {
	global $domain;
	
    header( "Location: https://www." . $domain . "/Login/FulfillConstraint.aspx?ReturnUrl=" . urlencode( "https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ) );
    die;
}

function respondWithBanError() {
	global $domain;
	
    header( "Location: https://www.$domain/Membership/NotApproved.aspx" );
    die;
}

if ( $isUserAuthenticated && !$isOnBanPage ) {
    $stmt = $authPDO->prepare("SELECT moderated FROM users WHERE id = :userId");
    $stmt->bindValue(":userId", $userInfo['id'], PDO::PARAM_INT);
    $stmt->execute();

    if ( $stmt->fetchColumn() == 1 ) {
        respondWithBanError();
    }
}

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
	// TELEMETRY
	$r->addRoute('POST', '/game/report-stats', 'emptyPage');
	$r->addRoute('POST', '/game/report-stats{args:\?.*}', 'emptyPage');
	
	$r->addRoute('OPTIONS', '/game/report-event', 'ReportEventTelemetry');
	$r->addRoute('OPTIONS', '/game/report-event{args:\?.*}', 'ReportEventTelemetry');
	
	$r->addRoute('POST', '/game/report-event', 'ReportEventTelemetry');
	$r->addRoute('POST', '/game/report-event{args:\?.*}', 'ReportEventTelemetry');
		
	// AUTHENTICATION
	// Get Auth Ticket
	$r->addRoute('GET', '/game/getauthticket', 'getAuthTicket');
    $r->addRoute('GET', '/game/getauthticket{args:\?.*}', 'getAuthTicket');
	
	// Get current userId
	$r->addRoute('GET', '/game/getcurrentuser.ashx', 'getCurrentUser');
    $r->addRoute('GET', '/game/getcurrentuser.ashx{args:\?.*}', 'getCurrentUser');
	

	// Friends
	$r->addRoute('POST', '/game/createfriend{args:\?.*}', 'createFriend');
	$r->addRoute('POST', '/game/breakfriend{args:\?.*}', 'breakFriend');
	$r->addRoute('GET', '/game/arefriends{args:\?.*}', 'areFriends');

	// Valid MAC Address validation
	$r->addRoute('POST', '/game/validate-machine', 'macAddressValidate');
    $r->addRoute('POST', '/game/validate-machine{args:\?.*}', 'macAddressValidate');
	
	// GAMEJOIN
	$r->addRoute('GET', '/game/placelauncher.ashx', 'placeLauncher');
    $r->addRoute('GET', '/game/placelauncher.ashx{args:\?.*}', 'placeLauncher');

	$r->addRoute('POST', '/game/placelauncher.ashx', 'placeLauncher');
    $r->addRoute('POST', '/game/placelauncher.ashx{args:\?.*}', 'placeLauncher');

	$r->addRoute('GET', '/game/join.ashx', 'joinScript');
    $r->addRoute('GET', '/game/join.ashx{args:\?.*}', 'joinScript');
	
	// OTHER APIS
	$r->addRoute('GET', '/game/players/{userId:\d+}/', 'getPlayerChatInfo');
	$r->addRoute('GET', '/game/players/{userId:\d+}/{args:\?.*}', 'getPlayerChatInfo');
	$r->addRoute('GET', '/game/players/{userId:\d+}', 'getPlayerChatInfo');
	$r->addRoute('GET', '/game/players/{userId:\d+}{args:\?.*}', 'getPlayerChatInfo');

	$r->addRoute('GET', '/game/gamepass/gamepasshandler.ashx', 'gamepassHandler');
    $r->addRoute('GET', '/game/gamepass/gamepasshandler.ashx{args:\?.*}', 'gamepassHandler');
	
	$r->addRoute('GET', '/game/badge/hasbadge.ashx', 'badgeHandler');
    $r->addRoute('GET', '/game/badge/hasbadge.ashx{args:\?.*}', 'badgeHandler');
	
	$r->addRoute('GET', '/game/luawebservice/handlesocialrequest.ashx', 'handlesocialrequest');
    $r->addRoute('GET', '/game/luawebservice/handlesocialrequest.ashx{args:\?.*}', 'handlesocialrequest');
	
	$r->addRoute('GET', '/game/tools/insertasset.ashx', 'insertSet');
    $r->addRoute('GET', '/game/tools/insertasset.ashx{args:\?.*}', 'insertSet');
	
	$r->addRoute('GET', '/game/tools/thumbnailasset.ashx', 'ThumbsAsset');
	$r->addRoute('GET', '/game/tools/thumbnailasset.ashx{args:\?.*}', 'ThumbsAsset');

	$r->addRoute('GET', '/game/edit.ashx', 'editScript');
    $r->addRoute('GET', '/game/edit.ashx{args:\?.*}', 'editScript');
	
	$r->addRoute('GET', '//game/edit.ashx', 'editScript');
    $r->addRoute('GET', '//game/edit.ashx{args:\?.*}', 'editScript');
	
	$r->addRoute('GET', '/game/studio.ashx', 'studioScript');
    $r->addRoute('GET', '/game/studio.ashx{args:\?.*}', 'studioScript');
	
	$r->addRoute('GET', '//game/studio.ashx', 'studioScript');
    $r->addRoute('GET', '//game/studio.ashx{args:\?.*}', 'studioScript');
});

$routeInfo = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], strtolower($_SERVER['REQUEST_URI']));

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
		header("Location: https://www.$domain/request-error?code=404");
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        header("Location: https://www.$domain/request-error?code=404");
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        call_user_func($handler, $vars);
        break;
}

function ThumbsAsset()
{
	$assetId = (int)$_GET["aid"] ?? 0;
	$assetVersionId = (int)$_GET["assetversionid"] ?? 0;
	$width = (int)$_GET["wd"];
	$height = (int)$_GET["ht"];
	$format = $_GET["fmt"] ?? "png";
	$cookie_name = '.ROBLOSECURITY';
	$cookie_value = '_|WARNING:-DO-NOT-SHARE-THIS.--Sharing-this-will-allow-someone-to-log-in-as-you-and-to-steal-your-ROBUX-and-items.|_090B52810CA8C9609C4F3749AA9B1086B465C5032955CDEB952F3B62134110FD03CD7728A6730BD82D1E6C271A80A017E131F0D8D2F0A699F4D619075C783421A97B5D608F70941E12A46E9B387A07129F7F5B0676DBA0B9FF61EAD967A88341E20FE82FCAA7947418CFC9C642E0FEFA5DBBC60895C3DFB8548D16821A87CBB03176F95F56C06434BCDCFABA20F43CEAF2B766BF5F064E6B7292A5905EE0636A45D415B5342ED4C5D3A91EF2B37D696D2968BEBBDF78D96E6A7F9726C744EC8B3DE1F3B05B95ED1D7E8A6AF090609E1259A6D6A69B1043CEA5D30F7FD302A8AE3E13DC3797434134F5439B9A6354C88B15D7A46B88AECBD8E54F5B280C57D24A59EB3FF65825E9F3C167D6BEFC15863143B85FD2C4F534908ECD1AD857C533F4B56F153B42C762D24D2192F33DDBB01E61325E884C1FE8443323B13526DA5FB28CFBD441960ABCB2A75A289CFC0C2C6C2132972936CE6FEABE2BF1992F6DCC4ECADEB563F6250D350E850B44FE788EE210B2922CD233FC15B5FD7E34EE1C7AE94757A09908DAD464B0E978F9C127133CDCF5A44B25C39E3C0028119291D055E89906E8F0815DA8C2E63936C8F34063584C2B0BA315CDFDEB6B9946ED8B7E62D830C6D90DF2B128CACAA17594143C58CD63A9751ACFEF0E90398168F2B9513134B4085329CDC2BD2084F67624D83058176C56069172D8C7F18F025910E10004EA3DCD318D9B6D46F12C6C7E8B08D4AD175A864AB0A27A087BAEAA2B011EA23483806AD20FC0BFF67EF69251839EAAA6C57F34BD4F4B79F857FA86F5AB275B118D10F4EAF0144ADE7A424EED500D11B44C2A8ECF29E91FCD73950699DFD16B0F831D907E0419C23C65A8721917A616B92DC67DEEA674F69E0EE01DD24AC4B434016650CE38E0F108B670C1E619666F41ED295B8F575B15BE9081AEDD288C1741457CB9F6D71B20B8FA8B13AB53FD5FE5CFE563C54F9B6A38E9043FB599735DDE1402275456B76E3EDB58E332A9CBD24571D51E2079106A36479956D698F2028D8ECA5EB8E3F4D4A23788FEDE666F3C977D1500824B';
	
	if ($assetId == 0 && $assetVersionId !== 0){
		$url = "https://assetdelivery.roblox.com/v2/assetVersionId/$assetVersionId";
		$curl_options = [
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HEADER => true,  // Include headers in the output
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_COOKIE => ".ROBLOSECURITY=" . urlencode($cookie_value),  // Set the cookie here
			CURLOPT_USERAGENT => 'Roblox/WinInet'  // Set the custom User-Agent
		];

		$ch = curl_init();
		curl_setopt_array($ch, $curl_options);
		
		$response = curl_exec($ch);
    
		if ($response === false) {
			http_response_code(500);
			die(json_encode([ "errors" => [ [ 'code' => 500, 'message' => 'InternalServerError' ] ] ]));
		}
		
		// Separate the headers and body
		$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
		$headers = substr($response, 0, $header_size);
		$body = substr($response, $header_size);
		
		// Close the cURL session
		curl_close($ch);

		// Extract the Roblox-Asset-Id header
		$header_lines = explode("\r\n", $headers);
		$roblox_asset_id = null;
		foreach ($header_lines as $header) {
			if (stripos($header, 'roblox-assetid:') !== false) {
				list($key, $value) = explode(':', $header, 2);
				$roblox_asset_id = trim($value);
				$assetId = $roblox_asset_id;
				break;
			}
		}
	}
	
	$url = "https://thumbnails.roproxy.com/v1/assets?assetIds=".$assetId."&size=".$width."x".$height."&format=".$format;


	$curl_options = [
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_HEADER => false,
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_COOKIE => ".ROBLOSECURITY=" . urlencode($cookie_value),  // Set the cookie here
		CURLOPT_USERAGENT => 'Roblox/WinInet'  // Set the custom User-Agent
	];
	
	$ch = curl_init();
	curl_setopt_array($ch, $curl_options);
	
	$response = (array)json_decode(curl_exec($ch));
	
	if ($response === false) {
		http_response_code(500);
		die(json_encode([ "errors" => [ [ 'code' => 500, 'message' => 'InternalServerError' ] ] ]));
	}
	curl_close($ch);
	header("Location: ".$response["data"][0]->imageUrl);
}

function emptyPage()
{
}

function gamepassHandler()
{
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/AssetMain.php");
	header("content-type: text/xml");
	
	if ($_GET["action"] == "HasPass"){
		$userId = intval($_GET["userid"]) ?? 0;
		$passId = intval($_GET["passid"]) ?? 0;

		if ($userId == 0 || $passId == 0){
			die('<Value Type="boolean">false</Value>');
		}

		$stmt = $pdo->prepare("SELECT * FROM inventory WHERE assetType = 34 AND assetId = :passId AND userId = :userId");
		$stmt->bindParam(':passId', $passId);
		$stmt->bindParam(':userId', $userId);
		$stmt->execute();

		if ($stmt->rowCount() == 0)
			echo '<Value Type="boolean">false</Value>';
		else
			echo '<Value Type="boolean">true</Value>';
	}
}

function badgeHandler()
{
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/AssetMain.php");
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/rootapis/Game/Badge/HasBadge.php");
}

function createFriend($vars)
{
	global $userLookup;
	global $authPDO;
	global $server;
	
	if (!isset($_SERVER["HTTP_ACCESSKEY"]) || $_SERVER["HTTP_ACCESSKEY"] !== $server["RCCAccessKey"]){
		die(http_response_code(404));
	}

	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/User/rccCreateFriend.php" );
}

function breakFriend($vars)
{
	global $userLookup;
	global $authPDO;
	global $server;
	
	if (!isset($_SERVER["HTTP_ACCESSKEY"]) || $_SERVER["HTTP_ACCESSKEY"] !== $server["RCCAccessKey"]){
		die(http_response_code(404));
	}

	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/User/rccBreakFriend.php" );
}

function areFriends($vars)
{
	global $userLookup;
	global $authPDO;
	global $server;

	if (!isset($_SERVER["HTTP_ACCESSKEY"]) || $_SERVER["HTTP_ACCESSKEY"] !== $server["RCCAccessKey"]){
		die(http_response_code(404));
	}

	require_once( $_SERVER['DOCUMENT_ROOT'] . "/rootapis/User/rccAreFriends.php" );
}

function getAuthTicket()
{
	global $isUserAuthenticated;
	global $domain;
	header("Content-Type: text/plain");
	header("Access-Control-Allow-Origin: https://www.$domain");
	header("Access-Control-Allow-Credentials: true");
	// Temporary until guests
	if (!$isUserAuthenticated){
		die(http_response_code(400));
		//$userAuth->requestGuestAuthTicket($_COOKIE["GuestData"]);
	}

	echo UserAuthentication::requestAuthenticationTicket($_COOKIE["_ROBLOSECURITY"], 0);
}

function getCurrentUser()
{
	global $userInfo;
	global $isUserAuthenticated;
	
	if (!$isUserAuthenticated){
		echo "Not authenticated";
		http_response_code(403);
	}else
		echo $userInfo['id'];
}

function macAddressValidate()
{
	header("content-type: application/json; charset=UTF-8");
	
	$json = [ "success" => true ];
	die(json_encode($json));
}

function reportEventTelemetry()
{
	global $domain;
	global $userInfo;
global $isUserAuthenticated;
	
	/*
	function createEventTrack()
	{
		global $userInfo;
global $isUserAuthenticated;
		global $domain;
		
		$time = time();
		$createDate = date("n/j/Y g:i:s A", $time);

		if ($isUserAuthenticated)
			$rbxID = $userInfo['id'];
		else
			$rbxID = 0;
		
		$discordCookie = $_COOKIE["_ROBLODISCORD"] ?? 0;
		
		try {
			$stmt = $userAuth->pdo->prepare("INSERT INTO clientstatus (userId, createDate, discordId) VALUES (:userId, :createDate, discordId)");
			$stmt->bindParam(':userId', $rbxID);
			$stmt->bindParam(':createDate', $time);
			$stmt->bindParam(':discordId', $discordCookie);
			$stmt->execute();
		
			$stmt = $userAuth->pdo->prepare("SELECT browserTrackerId FROM clientstatus WHERE userId = :userId AND createDate = :createDate");
			$stmt->bindParam(':userId', $rbxID);
			$stmt->bindParam(':createDate', $time);
			$stmt->execute();

			$browserTrackerId = $stmt->fetchColumn();

			if (!$isUserAuthenticated)
				$rbxID = "";

			$cookieName = "RBXEventTrackerV2";
			$cookieValue = "CreateDate=$createDate&rbxid=$rbxID&browserid=$browserTrackerId";
			$cookieExpiration = strtotime('+30 years');
			$cookieHeader = "{$cookieName}=" . $cookieValue . "; expires=" . gmdate('D, d M Y H:i:s', $cookieExpiration) . " GMT; path=/; Secure; Domain=.".$domain;
			header("Set-Cookie: ".$cookieHeader);
		} catch (PDOException $e){
		}
	}

	if (!isset($_COOKIE["RBXEventTrackerV2"])){
		createEventTrack();
	}

	if (isset($_COOKIE["RBXEventTrackerV2"])){
		parse_str($_COOKIE["RBXEventTrackerV2"], $rbxEventTracker);

		if (!is_numeric($rbxEventTracker["browserid"])){
			createEventTrack();
		}
		
		if ($rbxEventTracker["browserid"] !== intval($rbxEventTracker["browserid"])){
			createEventTrack();
		}elseif ($userInfo['id'] !== intval($rbxEventTracker["rbxid"])){
			try {
				$stmt = $userAuth->pdo->prepare("UPDATE clientstatus SET userId = :userId WHERE createDate = :createDate AND browserTrackerId = :browserId");
				$stmt->bindParam(':userId', $userInfo['id']);
				$stmt->bindValue(':createDate', strtotime($rbxEventTracker["CreateDate"]));
				$stmt->bindParam(':browserId', $rbxEventTracker["browserid"]);
				$stmt->execute();

				$cookieName = "RBXEventTrackerV2";
				$cookieValue = "CreateDate=".$rbxEventTracker["CreateDate"]."&rbxid=".$userInfo['id']."&browserid=".$rbxEventTracker["browserid"];
				$cookieExpiration = strtotime('+30 years');
				$cookieHeader = "{$cookieName}=" . $cookieValue . "; expires=" . gmdate('D, d M Y H:i:s', $cookieExpiration) . " GMT; path=/; Secure; Domain=.".$domain;
				header("Set-Cookie: ".$cookieHeader);
			} catch (PDOException $e){
				echo $e->getMessage();
			}
		}
	}
		*/
}

function insertSet()
{
	header("Location: https://sets.pizzaboxer.xyz/Game/Tools/InsertAsset.ashx?".$_SERVER['QUERY_STRING']);
}

function handlesocialrequest()
{
	global $authPDO;
	global $domain;
	
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/AssetMain.php");
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/rootapis/Game/handlesocialrequest.ashx.php");
}

function getPlayerChatInfo()
{
	header("Content-Type: application/json");
	echo'{"ChatFilter":"whitelist"}';
}

function placeLauncher()
{
	global $userInfo;
	global $domain;
	global $private_key_path;
	global $isUserAuthenticated;
	header("content-type: application/json");
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/AssetMain.php");
	
	$gameserversPdo = connectDatabase('gameservers');
	
	if (!isset($_GET["request"]))
	{
		$json = [ "Error" => "Invalid Request Type" ];
		die(json_encode($json));
	}
	
	try
	{
		$request = $_GET["request"];
		$errorCode = 4;
		switch ($request)	
		{	
			case "RequestGame":		
				if (!$isUserAuthenticated){
					die;
				}
				$placeId = (int)$_GET["placeid"] ?? die(json_encode($invalidRequestJson));

				if ( $placeId == 0 || !AssetService::doesUserUploadedAssetExist($placeId) )
					throw new Exception("Cannot join game without placeId.");

				$assetInfo = AssetService::getAssetInfo($placeId);
				$universeId = $assetInfo["universeid"];
				$creatorId = $assetInfo["creatorId"];
				$creatorType = $assetInfo["creatorType"];
				$maxPlayers = $assetInfo["maxPlayers"];

				if ( $universeId == 0 ){
					throw new Exception("Cannot join place without universe");
				}

				$stmt = $gameserversPdo->prepare("SELECT * FROM serverinstances WHERE serverPlaceId = :requestedPlaceId AND serverType = 1 AND lastKnownExpiration > :currentTime AND serverPlayerCount < serverMaxPlayers AND serverAccessCode = '0' ORDER BY serverPlayerCount DESC LIMIT 1");
				$stmt->bindParam(':requestedPlaceId', $placeId, PDO::PARAM_INT);
				$stmt->bindValue(':currentTime', time());
				$stmt->execute();

				if ($stmt->rowCount() === 0){
					$stmt = $gameserversPdo->prepare("SELECT timeRequested FROM awaitingjobs WHERE placeId = :placeId AND actionRequested = 1 AND gamePlaceVersion = 1");
					$stmt->bindParam(':placeId', $placeId);
					$stmt->execute();
					
					if ($stmt->rowCount() !== 0){
						$errorCode = 0;
						throw new Exception("");
					}

					function guid()	{
						return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
					}			

					$jobId = guid();

					$stmt = $gameserversPdo->prepare("INSERT INTO awaitingjobs (timeRequested, actionRequested, jobExpiration, gameId, placeId, creatorId, creatorType, universeId, gameMaxPlayers, gamePlaceVersion) VALUES (:time, 1, 15, :jobId, :placeId, :creatorId, :creatorType, :universeId, :maxPlayers, 1)");
					$stmt->bindParam(':jobId', $jobId);
					$stmt->bindParam(':placeId', $placeId);
					$stmt->bindParam(':creatorId', $creatorId);
					$stmt->bindParam(':creatorType', $creatorType);
					$stmt->bindParam(':maxPlayers', $maxPlayers);
					$stmt->bindParam(':universeId', $universeId);
					$stmt->bindValue(':time', time());
					$stmt->execute();

					$errorCode = 0;
					throw new Exception("");
				}else{
					$serverStats = $stmt->fetch();
					
					if ($serverStats["serverHasStarted"] == 0){
						$errorCode = 0;
						throw new Exception("");
					}
				}
				
				if ($isUserAuthenticated){
					$user["Name"] = $userInfo['name'];
					$user["Id"] = $userInfo['id'];
				}else{
					//die;
					parse_str($_COOKIE["GuestData"], $guestData);
					
					if ($guestData["UserID"] < 1 || 50000 < $guestData["UserID"]){
						$guestData["UserID"] = mt_rand(1, 50000);
					}

					$user["Name"] = "Guest " . $guestData["UserID"];
					$user["Id"] = -(int)$guestData["UserID"];
				}
				
				$game = [];
				$server = [];

				$game["assetId"] = $placeId;
				$server["placeId"] = $serverStats["serverPlaceId"] ?? $placeId;
				$server["universeId"] = $serverStats["serverUniverseId"] ?? $universeId;
				$server["jobId"] = $serverStats["serverGameId"] ?? $jobId;
				$server["serverId"] = $serverStats["serverId"] ?? 1;
				$server["serverPort"] = $serverStats["serverPort"] ?? $preferredPort;
				
				$ticketInfo = [
					'UserId' => $user["Id"],
					'UserName' => $user["Name"],
					'CharacterFetchUrl' => "https://api.$domain/v1.1/avatar-fetch/?userId=".$user["Id"]."&placeId=".$server["serverId"],
					'GameId' => $server["jobId"],
					'PlaceId' => $server["placeId"],
					'UniverseId' => $server["universeId"],
					'ServerId' => $server["serverId"],
					'ServerPort' => $server["serverPort"],
					'IsTeleport' => false,
					'FollowUserId' => null,
					'TimeStamp' => date("n/j/Y+g:i:s+A"),
					'CharacterAppearanceId' => $user["Id"]
				];
				
				$ticketInfoJSON = json_encode($ticketInfo, JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
				
				$sig;
				$ticketInfoSig = openssl_sign($ticketInfoJSON, $sig, file_get_contents($private_key_path));
				$signature = base64_encode($sig);
				$browserTrackerId = $_GET["browsertrackerid"] ?? 0;

				if ($browserTrackerId == false){
					$browserTrackerId = 0;
				}
				$json = (object)[
					"jobId" => $server["jobId"],
					"status" => 2,
					"joinScriptUrl" => "https://assetgame.$domain/Game/Join.ashx?ticket=".urlencode($ticketInfoJSON)."&signature=".urlencode($signature)."&browserTrackerId=$browserTrackerId",
					"authenticationUrl" => "https://www.$domain/Login/Negotiate.ashx",
					"authenticationTicket" => "",
					"message" => null
				];
			
				try {
					$sessionId = "placeholder";
					$stmt = $gameserversPdo->prepare("INSERT INTO usersessions (userInfo, signature, sessionCreate, sessionUpdated, sessionId, browserTrackerid) VALUES (?, ?, ?, ?, ?, ?)");
					$stmt->bindParam(1, $ticketInfoJSON);
					$stmt->bindParam(2, $signature);
					$stmt->bindValue(3, time());
					$stmt->bindValue(4, time());
					$stmt->bindParam(5, $sessionId);
					$stmt->bindParam(6, $browserTrackerId, PDO::PARAM_INT);
					$stmt->execute();
				}
				
				catch (Exception $e){
					die(header("Location: https://www.$domain/request-error?code=400"));
				}
					
				die(json_encode($json, JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK));
			break;

			case "RequestGameJob":
				$placeId = (int)$_GET["placeid"] ?? die(json_encode($invalidRequestJson));
				$gameId = $_GET["gameid"] ?? die(json_encode($invalidRequestJson));
				$gameId = strtoupper($gameId);

				if ( !AssetService::doesUserUploadedAssetExist($placeId) )
					throw new Exception("Cannot join place without universe");

				$assetInfo = AssetService::getAssetInfo($placeId);
				$universeId = $assetInfo["universeid"];
				$creatorId = $assetInfo["creatorId"];
				$creatorType = $assetInfo["creatorType"];
				$maxPlayers = $assetInfo["maxPlayers"];
				$browserTrackerId = $_GET["browsertrackerid"] ?? 0;

				if ( $universeId == 0 ){
					throw new Exception("Cannot join place without universe");
				}

				$stmt = $gameserversPdo->prepare("SELECT * FROM serverinstances WHERE serverPlaceId = :requestedPlaceId AND serverType = 1 AND serverGameId = :jobId");
				$stmt->bindParam(':requestedPlaceId', $placeId, PDO::PARAM_INT);
				$stmt->bindParam(':jobId', $gameId);
				$stmt->execute();
				$serverStats = $stmt->fetch(PDO::FETCH_ASSOC);

				if ($stmt->rowCount() === 0){
					$errorCode = 5;
					throw new Exception("");
				}

				if ($serverStats["serverPlayerCount"] >= $serverStats["serverMaxPlayers"]){
					$errorCode = 6;
					throw new Exception("");
				}

				if ($isUserAuthenticated){
					$user["Name"] = $userInfo['name'];
					$user["Id"] = $userInfo['id'];
				}else{
					//die;
					parse_str($_COOKIE["GuestData"], $guestData);
					
					if ($guestData["UserID"] < 1 || 50000 < $guestData["UserID"]){
						$guestData["UserID"] = mt_rand(1, 50000);
					}

					$user["Name"] = "Guest " . $guestData["UserID"];
					$user["Id"] = -(int)$guestData["UserID"];
				}
				
				$game = [];
				$server = [];
				
				if (AssetService::getAssetInfo($_GET["placeid"])["typeid"] !== 9)
					die(header("Location: https://www.$domain/request-error?code=400"));

				$game["assetId"] = $placeId;
				$server["placeId"] = $serverStats["serverPlaceId"] ?? $placeId;
				$server["universeId"] = $serverStats["serverUniverseId"] ?? $universeId;
				$server["jobId"] = $serverStats["serverGameId"] ?? $jobId;
				$server["serverId"] = $serverStats["serverId"] ?? 1;
				$server["serverPort"] = $serverStats["serverPort"] ?? $preferredPort;
				
				$ticketInfo = [
					'UserId' => $user["Id"],
					'UserName' => $user["Name"],
					'CharacterFetchUrl' => "https://api.".$domain."/v1.1/avatar-fetch/?userId=".$user["Id"]."&placeId=".$server["serverId"],
					'GameId' => $server["jobId"],
					'PlaceId' => $server["placeId"],
					'UniverseId' => $server["universeId"],
					'ServerId' => $server["serverId"],
					'ServerPort' => $server["serverPort"],
					'IsTeleport' => false,
					'FollowUserId' => null,
					'TimeStamp' => date("n/j/Y+g:i:s+A"),
					'CharacterAppearanceId' => $user["Id"]
				];
				
				$ticketInfoJSON = json_encode($ticketInfo, JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
				
				$sig;
				$ticketInfoSig = openssl_sign($ticketInfoJSON, $sig, file_get_contents($private_key_path));
				$signature = base64_encode($sig);
				$browserTrackerId = $_GET["browsertrackerid"] ?? 0;

				if ($browserTrackerId == "false"){
					$browserTrackerId = 0;
				}
				
				$json = (object)[
					"jobId" => $server["jobId"],
					"status" => 2,
					"joinScriptUrl" => "https://assetgame.$domain/Game/Join.ashx?ticket=".urlencode($ticketInfoJSON)."&signature=".urlencode($signature)."&browserTrackerId=$browserTrackerId",
					"authenticationUrl" => "https://www.$domain/Login/Negotiate.ashx",
					"authenticationTicket" => "",
					"message" => null
				];
			
				try{
					$sessionId = "placeholder";
					$stmt = $gameserversPdo->prepare("INSERT INTO usersessions (userInfo, signature, sessionCreate, sessionUpdated, sessionId, browserTrackerid) VALUES (?, ?, ?, ?, ?, ?)");
					$stmt->bindParam(1, $ticketInfoJSON);
					$stmt->bindParam(2, $signature);
					$stmt->bindValue(3, time());
					$stmt->bindValue(4, time());
					$stmt->bindParam(5, $sessionId);
					$stmt->bindParam(6, $browserTrackerId);
					$stmt->execute();
				}
				
				catch (Exception $e){
					die(header("Location: https://www.$domain/request-error?code=400"));
				}
					
				die(json_encode($json, JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK));
			break;

			case "RequestPrivateGame":		
				$placeId = (int)$_GET["placeid"] ?? die(json_encode($invalidRequestJson));
				$accessCode = $_GET["accesscode"] ?? die(json_encode($invalidRequestJson));

				if ( !AssetService::doesUserUploadedAssetExist($placeId) )
					throw new Exception('Cannot join place without universe');

				$assetInfo = AssetService::getAssetInfo($placeId);
				$universeId = $assetInfo["universeid"];
				$creatorId = $assetInfo["creatorId"];
				$creatorType = $assetInfo["creatorType"];
				$maxPlayers = $assetInfo["maxPlayers"];

				if ( $universeId == 0 ){
					throw new Exception('Cannot join place without universe');
				}

				$stmt = $gameserversPdo->prepare("SELECT * FROM reservedservers WHERE code = :accessCode");
				$stmt->bindParam(':accessCode', $accessCode);
				$stmt->execute();

				if ($stmt->rowCount() == 0){
					$errorCode = 5;
					throw new Exception("");
				}
					
				$stmt = $gameserversPdo->prepare("SELECT * FROM serverinstances WHERE serverPlaceId = :requestedPlaceId AND serverType = 2 AND serverAccessCode = :accessCode AND lastKnownExpiration > :currentTime LIMIT 1");
				$stmt->bindParam(':requestedPlaceId', $placeId, PDO::PARAM_INT);
				$stmt->bindParam(':accessCode', $accessCode);
				$stmt->bindValue(':currentTime', time());
				$stmt->execute();

				if ($stmt->rowCount() === 0){
					$stmt = $gameserversPdo->prepare("SELECT timeRequested FROM awaitingjobs WHERE placeId = :placeId AND actionRequested = 7");
					$stmt->bindParam(':placeId', $placeId);
					$stmt->execute();
					
					if ($stmt->rowCount() !== 0){
						$errorCode = 0;
						throw new Exception('');
					}

					function guid()	{
						return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
					}			

					$jobId = guid();

					$stmt = $gameserversPdo->prepare("INSERT INTO awaitingjobs (timeRequested, actionRequested, jobExpiration, gameId, placeId, creatorId, accessCode, universeId, gameMaxPlayers, gamePlaceVersion) VALUES (:time, 7, 15, :jobId, :placeId, :creatorId, :accessCode, :universeId, :maxPlayers, 1)");
					$stmt->bindParam(':jobId', $jobId);
					$stmt->bindParam(':placeId', $placeId);
					$stmt->bindParam(':creatorId', $creatorId);
					$stmt->bindParam(':accessCode', $accessCode);
					$stmt->bindParam(':maxPlayers', $maxPlayers);
					$stmt->bindParam(':universeId', $universeId);
					$stmt->bindValue(':time', time());
					$stmt->execute();

					$errorCode = 0;
					throw new Exception('');
				}else{
					$serverStats = $stmt->fetch();
					
					if ($serverStats["serverHasStarted"] == 0){
						$errorCode = 0;
						throw new Exception('');
					}
				}
				
				if ($isUserAuthenticated){
					$user["Name"] = $userInfo['name'];
					$user["Id"] = $userInfo['id'];
				}else{
					//die;
					parse_str($_COOKIE["GuestData"], $guestData);
					
					if ($guestData["UserID"] < 1 || 50000 < $guestData["UserID"]){
						$guestData["UserID"] = mt_rand(1, 50000);
					}

					$user["Name"] = "Guest " . $guestData["UserID"];
					$user["Id"] = -(int)$guestData["UserID"];
				}
				
				$game = [];
				$server = [];

				$game["assetId"] = $placeId;
				$server["placeId"] = $serverStats["serverPlaceId"] ?? $placeId;
				$server["universeId"] = $serverStats["serverUniverseId"] ?? $universeId;
				$server["jobId"] = $serverStats["serverGameId"] ?? $jobId;
				$server["serverId"] = $serverStats["serverId"] ?? 1;
				$server["serverPort"] = $serverStats["serverPort"] ?? $preferredPort;
				
				$ticketInfo = [
					'UserId' => $user["Id"],
					'UserName' => $user["Name"],
					'CharacterFetchUrl' => "https://api.".$domain."/v1.1/avatar-fetch/?userId=".$user["Id"]."&placeId=".$server["serverId"],
					'GameId' => $server["jobId"],
					'PlaceId' => $server["placeId"],
					'UniverseId' => $server["universeId"],
					'ServerId' => $server["serverId"],
					'ServerPort' => $server["serverPort"],
					'IsTeleport' => false,
					'FollowUserId' => null,
					'TimeStamp' => date("n/j/Y+g:i:s+A"),
					'CharacterAppearanceId' => $user["Id"]
				];
				
				$ticketInfoJSON = json_encode($ticketInfo, JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
				
				$sig;
				$ticketInfoSig = openssl_sign($ticketInfoJSON, $sig, file_get_contents($private_key_path));
				$signature = base64_encode($sig);
				$browserTrackerId = $_GET["browsertrackerid"] ?? 0;
				$json = (object)[
					"jobId" => $server["jobId"],
					"status" => 2,
					"joinScriptUrl" => "https://assetgame.$domain/Game/Join.ashx?ticket=".urlencode($ticketInfoJSON)."&signature=".urlencode($signature)."&browserTrackerId=$browserTrackerId",
					"authenticationUrl" => "https://www.$domain/Login/Negotiate.ashx",
					"authenticationTicket" => "",
					"message" => null
				];
			
				try {
					
					$sessionId = "placeholder";
					$stmt = $gameserversPdo->prepare("INSERT INTO usersessions (userInfo, signature, sessionCreate, sessionUpdated, sessionId) VALUES (?, ?, ?, ?, ?)");
					$stmt->bindParam(1, $ticketInfoJSON);
					$stmt->bindParam(2, $signature);
					$stmt->bindValue(3, time());
					$stmt->bindValue(4, time());
					$stmt->bindParam(5, $sessionId);
					$stmt->execute();
				}
				
				catch (Exception $e){
					die(header("Location: https://www.$domain/request-error?code=400"));
				}
					
				die(json_encode($json, JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK));
			break;
		}

		
	}
	catch (Exception $e)
		{
			$response = [
				"jobId" => null,
				"status" => $errorCode,
				"joinScriptUrl" => null,
				"authenticationTicket" => null,
				"authenticationUrl" => null,
				"message" => $e->getMessage()
			];

			die(json_encode($response));
		}
	
}

function joinScript()
{
	global $private_key_path;
	global $private_key_path_sig2;
	global $userInfo;
	global $isUserAuthenticated;
	global $domain;
	global $userLookup;
	require_once( $_SERVER["DOCUMENT_ROOT"] . "/AssetMain.php");
	$user = [];
	$server = [];

	//$public_key_path = "PublicKeyBlob.pem";
	$chatTypes = [
		1 => "ClassicAndBubble",
		2 => "Bubble",
		3 => "Classic", 
		4 => "None"
	];
	
	$creatorTypes = [
		1 => "User",
		2 => "Group"
	];
	
	$userId = $_GET["userid"] ?? 0;
	$serverPort = $_GET["serverport"] ?? 53640;
	$browserTrackerId = $_GET["browsertrackerid"] ?? 0;

	if ($browserTrackerId == false){
		$browserTrackerId = 0;
	}
	
	$user["Name"] = "Player";
	$user["Id"] = (int)$userId;
	$user["Joined"] = 0;
	$user["CharacterAppearanceId"] = 0;
	$user["IsUnknownOrUnder13"] = true;
	$user["SuperSafeChat"] = true;
	$server["MachineAddress"] = "localhost";
	$server["ServerPort"] = (int)$serverPort;
	$server["JobId"] = "00000000-0000-0000-0000-000000000000";
	$server["PlaceId"] = 0;
	$server["UniverseId"] = 0;
	$server["IsRobloxPlace"] = false;
	$pingInterval = 0;
	$pingUrl = "";
	
	if (isset($_GET["ticket"]) && isset($_GET["signature"])){
		$userInfo = urldecode($_GET["ticket"]);
		$userInfo = json_decode($userInfo);
		
		try {
				$pdo = connectDatabase('gameservers');
				$sessionId = "placeholder";
				$stmt = $pdo->prepare("SELECT * FROM usersessions WHERE signature = ?");
				$stmt->bindParam(1, $_GET["signature"]);
				$stmt->execute();
				$resultCount = $stmt->rowCount();
				
				if ($resultCount === 0)
					throw new Exception("Signature provided is unable to validate the authentication information.");
				
				$result = $stmt->fetch(PDO::FETCH_ASSOC);
				$resultUserInfo = json_decode($result["userInfo"]);
				
				$resultUserInfo->TimeStamp = $userInfo->TimeStamp;
				
				if (json_encode($resultUserInfo) !== json_encode($userInfo))
					throw new Exception("Failed to validate the authenticity of authentication details.");
		}
			
		catch (Exception $e){
			die(header("Location: https://www.$domain/request-error?code=400"));
		}

		$timestarted = time();
		while (true){
			$stmt = $pdo->prepare("SELECT serverHasStarted,serverPort,serverAccessCode,serverIp FROM serverinstances WHERE serverGameId = :jobId");
			$stmt->bindParam(":jobId", $userInfo->GameId);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);

			if ($result["serverHasStarted"] == 1){
				$server["ServerPort"] = $result["serverPort"];
				sleep(2);
				break;
			}

			sleep(1);

			if (time() - $timestarted > 5){
				die(header("Location: https://www.$domain/request-error?code=400"));
			}
		}
		
		$user["Name"] = $userInfo->UserName;
		$user["Id"] = $userInfo->UserId;
		$user["CharacterAppearanceId"] = $userInfo->CharacterAppearanceId;
		$user["Joined"] = $userLookup->getPublicUserInfo("daysSinceJoin", $user["Id"]);
		$user["IsUnknownOrUnder13"] = false;
		$user["SuperSafeChat"] = false;
		$server["MachineAddress"] = $result["serverIp"];
		$server["PlaceId"] = $userInfo->PlaceId;
		$server["UniverseId"] = $userInfo->UniverseId;
		$server["JobId"] = $userInfo->GameId;
		$server["IsRobloxPlace"] = true;
		
		$pingInterval = 120;
		$pingUrl = "https://assetgame.$domain/Game/ClientPresence.ashx?version=old&PlaceID=".$server["PlaceId"]."&GameID=".$server["JobId"]."&UserID=".$user["Id"];

        $stmt = $pdo->prepare("UPDATE serverinstances SET serverFirstPersonHasJoined = 1, serverFirstPersonJoinTime = :time WHERE serverGameId = :jobId AND serverPlaceId = :placeId");
        $stmt->bindParam(':placeId', $server["PlaceId"]);
        $stmt->bindValue(':time', time());
        $stmt->bindParam(':jobId', $server["JobId"]);
        $stmt->execute();
        $gameInfo = AssetService::getAssetInfo($server["PlaceId"]);
        //require_once("LegacyJoin.php");
	}
	
	//if (strpos($_SERVER["HTTP_USER_AGENT"], "Mobile/9B176 ") != false)
	//	die(require_once("LegacyJoin.php"));
	
	$timeStamp = date("n/j/Y g:i:s A");

	$sig;
	$preAuthentication = $user["Id"]."\n".$server["JobId"]."\n".$timeStamp;
	$preAuthentication = openssl_sign($preAuthentication, $sig, file_get_contents($private_key_path));
	$preAuthentication = base64_encode($sig);
	$authentication = $user["Id"]."\n".$user["Name"]."\nhttps://api.$domain/v1.1/avatar-fetch/?userId={$user['Id']}&placeId={$server['PlaceId']}\n".$server["JobId"]."\n$timeStamp";
	$authentication = openssl_sign($authentication, $sig, file_get_contents($private_key_path));
	$authentication = base64_encode($sig);
	
	header("Content-Type: application/json");

    if ($gameInfo["creatorId"] == null){
        $gameInfo["creatorId"] = 0;
        $gameInfo["chattype"] = 3;
    }

    if ($isUserAuthenticated){
        if (isset($_GET["placeid"]) || isset($_GET["ticket"])){
            $activeMembership = $userLookup->getPublicUserInfo("activeMembership", $user["Id"]);

            switch ($activeMembership){
                case 0:
                    $server["MembershipType"] = "None";
                break;

                case 1: 
                    $server["MembershipType"] = "BuildersClub";
                break;

                case 2:
                    $server["MembershipType"] = "TurboBuildersClub";
                break;

                case 3:
                    $server["MembershipType"] = "OutrageousBuildersClub";
                break;
            }
        }else
            $server["MembershipType"] = "None";
    }else{
        $server["MembershipType"] = "None";
    }
	

	$json = (object)[
		"ClientPort" => 0,
		"MachineAddress" => $server["MachineAddress"], // "93.107.3.217"
		"ServerPort" => $server["ServerPort"],
		"PingUrl" => $pingUrl,
		"PingInterval" => $pingInterval,
		"UserName" => $user["Name"],
		"SeleniumTestMode" => false,
		"UserId" => $user["Id"],
		"SuperSafeChat" => $user["SuperSafeChat"],
		"CharacterAppearance" => "https://api.$domain/v1.1/avatar-fetch/?userId={$user['Id']}&placeId={$server['PlaceId']}",
	//	"ClientTicket" => $timeStamp.";".$authentication.";".$preAuthentication,
	//	"NewClientTicket" => $timeStamp.";".$authentication.";".$preAuthentication,
		"ClientTicket" => "$timeStamp;$authentication;$preAuthentication",
		"GameId" => $server["JobId"],
		"PlaceId" => $server["PlaceId"],
		"MeasurementUrl" => "",
		"WaitingForCharacterGuid" => "934d7cbc-a213-4182-800c-19b2559da75d",
		"BaseUrl" => "https://www.$domain/",
		"ChatStyle" => $chatTypes[$gameInfo["chattype"]],
		"VendorId" => 0,
		"ScreenShotInfo" => "",
		"VideoInfo" => "<?xml version=\"1.0\"?><entry xmlns=\"http://www.w3.org/2005/Atom\" xmlns:media=\"http://search.yahoo.com/mrss/\" xmlns:yt=\"http://gdata.youtube.com/schemas/2007\"><media:group><media:title type=\"plain\"><![CDATA[ROBLOX Place]]></media:title><media:description type=\"plain\"><![CDATA[ For more games visit http://www.roblox.com]]></media:description><media:category scheme=\"http://gdata.youtube.com/schemas/2007/categories.cat\">Games</media:category><media:keywords>ROBLOX, video, free game, online virtual world</media:keywords></media:group></entry>",
		"CreatorId" => $gameInfo["creatorId"],
		"CreatorTypeEnum" => $creatorTypes[$gameInfo['creatorType']],
		"MembershipType" => $server["MembershipType"],
		"AccountAge" => $user["Joined"],
		"GameChatType" => "AllUsers",
		"CookieStoreFirstTimePlayKey" => "rbx_evt_ftp",
		"CookieStoreFirstMinutePlayKey" => "rbx_evt_fmp",
		"CookieStoreEnabled" => false,
		"IsRobloxPlace" => $server["IsRobloxPlace"],
		"GenerateTeleportJoin" => false,
		"IsUnknownOrUnder13" => $user["IsUnknownOrUnder13"],
		"SessionId" => "",
		"DataCenterId" => 0,
		"UniverseId" => $server["UniverseId"],
		"BrowserTrackerId" => $browserTrackerId,
		"UsePortraitMode" => false,
		"FollowUserId" => 0,
		"CharacterAppearanceId" => $user["CharacterAppearanceId"]
	];	

	if ($result["serverAccessCode"] !== null){
		$json->VIPServerOwnerId = 0;
		$json->VIPServerId = $result["serverAccessCode"];
	}

	if (isset($_GET["placeid"])){
		if (!$isUserAuthenticated) {
			return header("Location: https://www.$domain/request-error?code=403");
		}

		
	}
	
	
	

	$script = json_encode($json, JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);

	$signature = openssl_sign("\r\n".$script, $sig, file_get_contents($private_key_path)); 
	$script = "--rbxsig%".base64_encode($sig)."%"."\r\n".$script;
	
	die($script);
}

function StudioScript()
{
	global $private_key_path;
	header("content-type: text/plain");

	$script = file_get_contents("Studio.lua");
	
	$signature = openssl_sign("\r\n".$script, $sig, file_get_contents($private_key_path)); 
	if (strpos($_SERVER["HTTP_USER_AGENT"], "Mobile/9B176 ") != false)
		$script = "%".base64_encode($sig)."%"."\r\n".$script;
	else
		$script = "--rbxsig%".base64_encode($sig)."%"."\r\n".$script;

	die($script);
}

function editScript()
{
	global $private_key_path;
	global $domain;
	
	header("content-type: text/plain");
	$placeId = $_GET["placeid"] ?? 0;
	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/AssetMain.php");
	
	if (!AssetService::doesUserUploadedAssetExist($placeId) || $placeId == 0 || $placeId == "")
		die(header("Location: https://www.$domain/request-error?code=400"));
	
	$assetInfo = AssetService::getAssetInfo($placeId);
	
	if ($assetInfo["typeid"] !== 9)
		die(header("Location: https://www.$domain/request-error?code=400"));
	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/rootapis/Game/Edit.php");
}
?>	