<?php
$_GET = array_change_key_case($_GET, CASE_LOWER);
$_POST = array_change_key_case($_POST, CASE_LOWER);

function connectDatabase($type)
{
	$username = 'root';
	$password = 'TiTVKKO(0de@fzr7';
	$database_ip = "10.144.90.143";
	$port = 3305;

	# TODO: Seperate the passwords
	switch ($type)
	{
		case 1:
		case "maintenance": 
			$db = 'roblox_status';
		break;

		case 2:
		case "gamePersistence":
			$db = 'roblox_persistence';		
		break;

		case 3:
		case "assets":
			$db = 'roblox_assets';
		break;

		case 4:
		case "users":
			$db = 'roblox_accs';
		break;

		case 5:
		case "gameservers":
			$db = 'roblox_gameservers';
		break;

		default:
			return false;
	}

	$count = 0;
    while ($count < 2) {
        try {
            $pdo = new PDO("mysql:host=$database_ip;port=$port;dbname=$db", $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
            return $pdo;
        } catch (PDOException $e) {
            $count++;
            sleep(1);
        }
    }

	return $pdo;
}

// Improper usage of a function but who cares
$allowedMachines = [ 
	"51.38.114.94" # IP of the WEB1 machine
];
$authPDO = connectDatabase("users"); # Using this as authentication is needed across all the website
$maintenancePDO = connectDatabase("maintenance");

(array)$server = [
	'RCCAccessKey' => "hkjhj2k3o3ij909099" // Major key for RCC 
];

$webServerName = "WEB1"; # The name of the webserver providing the content - might be better off when set in database as value
$domain = "idk18.xyz"; # The domain URL which is used to link to profiles and such in the website
$time = time();

function formatNumber($number) {
    if ($number >= 1000000) {
        return intval($number / 1000000) . 'M+'; // Millions
    } elseif ($number >= 1000) {
        return intval($number / 1000) . 'K+'; // Thousands
    }
    return $number; // Less than 1000
}

// https://stackoverflow.com/questions/4127788/change-a-global-variable-from-inside-a-function
function generateGuid()
{
    if (function_exists('com_create_guid') === true)
    {
        return trim(com_create_guid(), '{}');
    }

    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}

class Telemetry {
	private static $pdo;
	
	public static function init($pdo) {
	    self::$pdo = $pdo;
	}

	public static function reportUsage($apiUsed, $userId){
		global $time;
		
		$stmt = self::$pdo->prepare("INSERT INTO apiuse (apiUsed, timeUsed, userId, userIp) VALUES (:apiUse, :timestamp, :userId, :userIp)");
		$stmt->bindParam(':apiUse', $apiUsed);
		$stmt->bindValue(':timestamp', $time);
		$stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
		$stmt->bindParam(':userIp', $_SERVER["HTTP_CF_CONNECTING_IP"], PDO::PARAM_STR);
		$stmt->execute();
		return true;
	}

	public static function reportError( $errorMessage, $userId = 0 ){
		global $time;
		$hostName = $_SERVER["HTTP_HOST"];
		$hostDirectory = $_SERVER["REQUEST_URI"];
		$errorGuid = generateGuid();
		
		$url = "https://$hostName$hostDirectory";
		$stmt = self::$pdo->prepare("INSERT INTO errorLog (url, error, time, userId, errorGuid) VALUES (:url, :trace, :time, :userId, :errorGuid)");
		$stmt->bindParam(':url', $url);
		$stmt->bindParam(':trace', $errorMessage);
		$stmt->bindParam(':time', $time);
		$stmt->bindParam(':userId', $userId);
		$stmt->bindParam(':errorGuid', $errorGuid);
		
		if ($stmt->execute())
			return $errorGuid;
		else
			return false;
	}
}

Telemetry::init($authPDO);
require_once("includes/authenticationMain.php");
?>
