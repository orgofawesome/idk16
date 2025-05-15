<?php
header("content-type: application/json");
$redeemableCode = $_GET["code"] ?? null;

if ($redeemableCode == null){
    die(header("Location: https://www.$domain/"));
}


$url = "https://discord.com/api/oauth2/token";
/*
*/
$data = [
    "grant_type" => "authorization_code",
    "code" => $_GET["code"],
    "redirect_uri" => "https://discordapi.idk18.xyz/verification/process",
    "client_id" => 1132130864692732014,
    "client_secret" => "4XimNGzLL-uKqUpE8MVW1rB0xjSbA6ft"
];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/x-www-form-urlencoded'
));
$response = curl_exec($ch);
$response = json_decode($response);
curl_close($ch);

if (!isset($response->access_token)){
    die(header("Location: https://www.$domain/"));
}

$url = "https://discord.com/api/oauth2/@me";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer {$response->access_token}",
));

$response = curl_exec($ch);
$response = json_decode($response);
curl_close($ch);

if (!isset($response->user->id)){
    die(header("Location: https://www.$domain/"));
}

function checkEligibility($discord_id)
{
	global $authPDO;
	
	try
	{
		$stmt = $authPDO->prepare("SELECT verified_status, is_banned FROM discord_verif WHERE discord_id = :discord_id");
		$stmt->bindParam(":discord_id", $discord_id);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if ($result["is_banned"] == 1){
				die("You are banned from accessing IDK16. For more information, contact customer services.");
		}
			
		if ($result["verified_status"] === 3)
			return true;
		else
			die("Guests are currently fully disabled.");
	}
	catch (Exception $e)
	{
		http_response_code(500);
		$json = [ 'errors' => [ [ 'code' => 500, 'message' => "InternalServerError" ] ] ];
		die(json_encode($json));
	}
}

function generateToken($discord_id, $redeemableCode)
{	
	global $authPDO;

	$private_key_path = "eui3io2u3.pem";
	$sig;
    $tokenTime = time();
    $token = [ "discord_id" => $discord_id, "redeemCode" => $redeemableCode, "time" => $tokenTime ];
	$token = json_encode($token);

    $token = openssl_sign($token, $sig, file_get_contents($private_key_path));
    $token = base64_encode($sig);

	try 
	{
		$checkedTime = time() - 120;
		$stmt = $authPDO->prepare("INSERT INTO discord_sessions (discord_id, session_token, session_start, session_ip) values (:discord_id, :session_token, :session_start, :ip)");
		$stmt->bindParam(":discord_id", $discord_id, PDO::PARAM_INT);
		$stmt->bindValue(":session_token", $token);
		$stmt->bindParam(":session_start", $tokenTime);
		$stmt->bindParam(":ip", $_SERVER["HTTP_CF_CONNECTING_IP"]);
		$stmt->execute();
	}
	catch (Exception $e)
	{
		http_response_code(500);
		$json = [ 'errors' => [ [ 'code' => 500, 'message' => "InternalServerError" ] ] ];
		die(json_encode($json));
	}

    return $token;
}

function addGuestUser($discord_id){
	global $authPDO;

	$discordEpoch = 1420070400000;
	$id = intval($discord_id);
	$timestamp = ($id >> 22) + $discordEpoch;
	$timestamp = $timestamp / 1000;

	$oneMonthAgoTimestamp = strtotime("-1 month", time());

	if ($timestamp > $oneMonthAgoTimestamp){
		die("You are not eligible to be verified for IDK16 due to missing a criteria.");
	}

	try {
		$stmt = $authPDO->prepare("INSERT INTO discord_verif (discord_id, verified_status, idk16_accounts_limit, join_status) VALUES (:discordId, 3, 0, 2)");
		$stmt->bindParam(':discordId', $discord_id);
		$stmt->execute();
	}
	catch (Exception $e){
		echo'-';
	}
}

$result = checkEligibility($response->user->id);

if ($result == 2){
	addGuestUser($response->user->id);
}

if ($result !== false){
    $accessToken = generateToken($response->user->id, $redeemableCode);
    setrawcookie(".ROBLODISCORD", $accessToken, strtotime("+1 Year"), "/", ".$domain", true, false);
}

header("Location: https://www.$domain/");
?>