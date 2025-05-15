<?php
class UserAuthentication {
	private static $pdo;
	private static $userId;
	private static $discordId;

	public static function init($pdo) {
	    self::$pdo = $pdo;

	    try {
			$stmt = self::$pdo->prepare('SELECT userId, sessionValid FROM sessions WHERE cookie = ?');
			$stmt->bindParam(1, $_COOKIE["_ROBLOSECURITY"], PDO::PARAM_STR);
			$stmt->execute();

			// Use rowCount() method to check if any rows were returned
			if ($stmt->rowCount() > 0) {
				$result = $stmt->fetch(PDO::FETCH_ASSOC);
				if ($result['sessionValid']){
					self::$userId = $result['userId'] ?? 0;
				}
			}
	    } catch (PDOException $e) {
			$errorReport = Telemetry::reportError($e->getMessage(), 0);
			die(header("Location: https://www.$domain/request-error?code=400&id=$errorReport"));
            }
	}

	public static function getDiscordId(){
		if (!isset($_COOKIE["_ROBLODISCORD"]))
			return 0;

		if (isset(self::$discordId))
			return self::$discordId;
		
		$stmt = self::$pdo->prepare("SELECT discord_id FROM discord_sessions WHERE session_token = :discordCookie");
		$stmt->bindParam(":discordCookie", $_COOKIE["_ROBLODISCORD"], PDO::PARAM_STR);
		$stmt->execute();
		
		self::$discordId = ($stmt->rowCount() == 1) ? $stmt->fetchColumn() : 0;
		
		return self::$discordId;
	}

	public static function isUserAuthenticated(){
		if ( self::$userId > 0 )
			return true;

		return false;
	}
	
	public static function getUserInfo($detailName){
		try {
			if ( self::$userId == 0 )
				return 0;
			
			switch ($detailName)
			{
				case "full":
					$stmt = self::$pdo->prepare("SELECT * FROM users WHERE id = :userId");
					$stmt->bindParam(':userId', self::$userId);
					$stmt->execute();
					return $stmt->fetch(PDO::FETCH_ASSOC);

				case "adminStatus":
					$stmt = self::$pdo->prepare("SELECT adminStatus FROM users WHERE id = ?");
					$stmt->bindParam(1, $userId);
					$stmt->execute();
					return $stmt->fetchColumn();
					
				case "id": 
					return $userId;
					
				case "daysSinceJoin":
					$timestamp1 = self::getUserInfo('joinDate');
					$timestamp2 = time();
					return floor(($timestamp2 - $timestamp1) / 86400);
				
				case "friendRequestsCount":
					$stmt = self::$pdo->prepare("SELECT accepted FROM friendreq WHERE requested = :userId AND accepted = 0");
					$stmt->bindParam(':userId', self::$userId);
					$stmt->execute();
	
					return $stmt->rowCount();
	
				default:
					$stmt = self::$pdo->prepare("SELECT $detailName FROM users WHERE id = :userId");
					$stmt->bindParam(':userId', self::$userId);
					$stmt->execute();

					return $stmt->fetchColumn();
			}
	
		} catch (PDOException $e) {
			$errorReport = Telemetry::reportError($e->getMessage(), self::$userId);
			die(header("Location: https://www.$domain/request-error?code=400&id=$errorReport"));
        	}
	}
	
	public static function isEligibleForAccount()
    	{	
		if (!isset($_COOKIE["_ROBLODISCORD"]))
			return false;
		
		$discordId = self::getDiscordId();
		
		$stmt = self::$pdo->prepare("SELECT idk16_accounts_limit FROM discord_verif WHERE discord_id = :discord_id");
		$stmt->bindValue(":discord_id", $discordId);
		$stmt->execute();
		$accountsLimit = $stmt->fetchColumn();
		
		$stmt = self::$pdo->prepare("SELECT id FROM users WHERE registerDiscordId = :discord_id");
		$stmt->bindValue(":discord_id", $discordId);
		$stmt->execute();
		$accounts = $stmt->rowCount();
		
		if ($accountsLimit > $accounts)
			return true;
		else 
			return false;
	}
	
	public static function validateUsernameForSignup($userName){
		// Todo: Connect with chat filter
		if (preg_match('/[^\w\s]/', $userName))
			return 2;
		
		if (strlen($userName) >= 3 && strlen($userName) <= 20) {
			$stmt = self::$pdo->prepare("SELECT name FROM reservednames WHERE name = ?");
			$stmt->bindParam(1, $userName, PDO::PARAM_STR);
			$stmt->execute();
			
			if ($stmt->rowCount() >= 1)
				return 1;
			else
				return 0;
		}
		
		return 2;
	}
	
	public static function lookupIdByUsername($userName){
		$stmt = self::$pdo->prepare("SELECT id FROM users WHERE name = ?");
		$stmt->bindParam(1, $userName);
		$stmt->execute();
		return $stmt->fetchColumn();
	}
	
	public static function lookupNameById($userId){
		$stmt = self::$pdo->prepare("SELECT name FROM users WHERE id = ?");
		$stmt->bindParam(1, $userId);
		$stmt->execute();
		return $stmt->fetchColumn();
	}
	
	public static function isUserTerminated($userId){
		$stmt = self::$pdo->prepare("SELECT moderated FROM users WHERE id = ?");
		$stmt->bindParam(1, $userId);
		$stmt->execute();
		$value = $stmt->fetchColumn();

		if ($value == 0){
			return false;
		}

		$stmt = self::$pdo->prepare("SELECT * FROM moderation WHERE userId = ? LIMIT 1");
		$stmt->bindParam(1, $userId);
		$stmt->execute();
		$value = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($value["banType"] !== 7){
			return false;
		}

		if ($value["resolved"] == 1){
			return false;
		}

		return True;
	}

	public static function loginUser($userName, $passWord, $loginContext){
		global $domain;
		$stmt = self::$pdo->prepare("SELECT * FROM users WHERE name = ?");
		$stmt->bindParam(1, $userName);
		$stmt->execute();
		$userInfo = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if (empty($userInfo))
			return "INVALID_USERNAME";
		
		
		
		if (password_verify($passWord . $userInfo["passSalt"], $userInfo["passHash"])){
			$stmt = self::$pdo->prepare("SELECT sessionValid, cookie FROM sessions WHERE userId = ? AND sessionValid = 1 ORDER BY sessionStart DESC");
			$stmt->bindParam(1, $userInfo["id"]);
			$stmt->execute();
			$currentSession = $stmt->fetch(PDO::FETCH_ASSOC);
			
			if (isset($currentSession["sessionValid"])){
				if ($currentSession["sessionValid"])
				{
					setrawcookie(".ROBLOSECURITY", $currentSession["cookie"], strtotime("+1 Year"), "/", ".$domain", false, true);
					return true;
				}
			}
			
			while (true) 
			{
				// Generate a random string
				$cookie = bin2hex(random_bytes(256));
				$cookie = "_|WARNING:-DO-NOT-SHARE-THIS.--Sharing-this-will-allow-someone-to-log-in-as-you-and-to-steal-your-ROBUX-and-items.|_".$cookie;

				// Check if the ticket already exists in the database
				$stmt = self::$pdo->prepare("SELECT COUNT(*) FROM sessions WHERE cookie = ?");
				$stmt->execute([$cookie]);
				$count = $stmt->fetchColumn();

				// If the ticket doesn't exist, insert it into the database and break out of the loop
				if ($count == 0) {
					$stmt = self::$pdo->prepare("INSERT INTO sessions (userId, cookie, sessionStart, sessionLastUsed, sessionCause, sessionValid, sessionIp, sessionDiscord) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
					$stmt->bindParam(1, $userInfo["id"]);
					$stmt->bindParam(2, $cookie);
					$stmt->bindValue(3, time());
					$stmt->bindValue(4, time());
					$stmt->bindParam(5, $loginContext);
					$stmt->bindValue(6, 1);
					$stmt->bindParam(7, $_SERVER["HTTP_CF_CONNECTING_IP"]);
					$stmt->bindValue(8, self::getDiscordId());
					$stmt->execute();
					break;
				}
			}
			
		setrawcookie(".ROBLOSECURITY", $cookie, strtotime("+1 Year"), "/", ".$domain", false, true);
		return true;
		}else
			return "INVALID_PASSWORD";
		
		return "UnknownError";
	}
	
	public static function registerUser($userName, $passWord, $birthDay, $gender, $signupContext){
		$possibleSignupContext = [
			"RollerCoasterSignupForm"
		];
		
		if (!in_array($signupContext, $possibleSignupContext))
			return "INVALID_CONTEXT";	
		
		$birthDay = strtotime($birthDay);
		
		if ($birthDay === false)
			return "INVALID_BIRTHDAY_01";
		
		$startDate = strtotime("1 Jan 1917");
		$endDate = strtotime("31 Dec 2016");
		
		if ($birthDay <= $startDate || $birthDay >= $endDate)
			return "INVALID_BIRTHDAY_02";
		
		if ((int)$gender !== 1 && (int)$gender !== 2)
			return "INVALID_GENDER";
		
		$salt = bin2hex(random_bytes(16));
		
		if ($this->validateUsernameForSignup($userName) !== 0)
			return "INVALID_USERNAME";
		
		if ($this->isEligibleForAccount() === false)
			return "INVITE_KEY_INVALID";
		
		try {
			$stmt = self::$pdo->prepare("SELECT MAX(id) FROM users");
			$stmt->execute();
			$lastUserId = $stmt->fetchColumn();
			
			$headArmColors = [ 1, 208, 194 ];
			$torsoColors = [ 1, 21, 23, 24, 37, 102, 141, 199, 208 ];
			$torsoColor = $torsoColors[array_rand($torsoColors)];
			$headArmColor = $headArmColors[array_rand($headArmColors)];
			if ($headArmColor === 194)
				$torsoColors = [ 23, 37, 102, 208 ];
	
			$torsoColor = $torsoColors[array_rand($torsoColors)];
			$discordId = self::getDiscordId();
			
			$bodyColors = json_encode([
				"headColor" => $headArmColor,
				"torsoColor" => $torsoColor,
				"leftArmColor" => $headArmColor,
				"leftLegColor" => 102,
				"rightArmColor" => $headArmColor,
				"rightLegColor" => 102,
			]);
			
			self::$pdo->beginTransaction();
			$stmt = self::$pdo->prepare("INSERT INTO users (name, passHash, passSalt, birthdayDate, joinDate, lastOnlineDate, registerContext, registerIp, id, gender, bodyColors, registerDiscordId) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
			$stmt->bindParam(1, $userName, PDO::PARAM_STR);
			$stmt->bindValue(2, password_hash($passWord . $salt, PASSWORD_BCRYPT));
			$stmt->bindParam(3, $salt, PDO::PARAM_STR);
			$stmt->bindParam(4, $birthDay);
			$stmt->bindValue(5, time());
			$stmt->bindValue(6, time());
			$stmt->bindParam(7, $signupContext);
			$stmt->bindParam(8, $_SERVER["HTTP_CF_CONNECTING_IP"]);
			$stmt->bindValue(9, $lastUserId + 1);
			$stmt->bindParam(10, $gender);
			$stmt->bindParam(11, $bodyColors);
			$stmt->bindParam(12, $discordId);
			$stmt->execute();
			$userId = self::$pdo->lastInsertId();
			self::$pdo->commit();
		
			$stmt = self::$pdo->prepare("INSERT INTO reservednames (name, claimer, claimdate) VALUES (?, ?, ?)");
			$stmt->bindParam(1, $userName);
			$stmt->bindParam(2, $userId);
			$stmt->bindValue(3, time());
			$stmt->execute();
		
			$this->loginUser($userName, $passWord, "SignUpSuccessful");
			
			return $userId;
		}catch (exception $e) {
			return "UNKNOWN_ERROR";
		}
	}

	public static function requestGuestAuthTicket($ratelimitBypassed = 0)
	{
		if (!$ratelimitBypassed)
		{
			return "guest is a nono";
			$stmt = self::$pdo->prepare("SELECT COUNT(*) FROM authtickets WHERE discordCookie = ? AND authStart > ? - 120");
			$stmt->execute([$_COOKIE["_ROBLODISCORD"], time()]);
			$count = $stmt->fetchColumn();
			
			if (4 < $count)
				return "RATELIMITED";
		}

		while (true) 
		{
			// Generate a random string
			$random_bytes = random_bytes(30);
			$authTicket = bin2hex($random_bytes);

			// Check if the ticket already exists in the database
			$stmt = self::$pdo->prepare("SELECT COUNT(*) FROM authtickets WHERE authTicket = ?");
			$stmt->execute([$authTicket]);
			$count = $stmt->fetchColumn();
			
			//parse_str($_COOKIE["RBXEventTrackerV2"], $rbxEventTracker);
			// If the ticket doesn't exist, insert it into the database and break out of the loop
			if ($count == 0) {
				$stmt = self::$pdo->prepare("INSERT INTO authtickets (authTicket, authStart, authExpire, discordCookie, guestCookie, isGuest, used, browserTrackerId) VALUES (:authenticationTicket, :authenticationTicketStartDate, :authenticationTicketExpiryDate, :discordCookie, :guestCookie, 1, 0, 0)");
				$stmt->bindParam(':authenticationTicket', $authTicket, PDO::PARAM_STR);
				$stmt->bindValue(':authenticationTicketStartDate', time());
				$stmt->bindValue(':authenticationTicketExpiryDate', time() + 60);
				$stmt->bindParam(':discordCookie', $_COOKIE["_ROBLODISCORD"]);
				$stmt->bindParam(':guestCookie', $_COOKIE["GuestData"]);
				//$stmt->bindParam(':browserTrackerId', $rbxEventTracker["browserid"]);
				$stmt->execute();
				break;
			}
		}
		return $authTicket;
	}
	
	public static function requestAvatarThumbnail($userId, $x, $y){
		$value = "avatar_$x" . "x$y";

		$stmt = self::$pdo->prepare("SELECT $value FROM users WHERE id = :userId");
		$stmt->bindParam(':userId', $userId);
		$stmt->execute();

		return $stmt->fetchColumn();
	}
	
	public static function requestAuthenticationTicket($auth, $ratelimitBypassed = 0)
	{
		$stmt = self::$pdo->prepare("SELECT sessionValid FROM sessions WHERE cookie = ?");
		$stmt->bindParam(1, $auth, PDO::PARAM_STR);
		$stmt->execute();
		
		if ($stmt->fetchColumn() !== 1)
			return "INVALID_USER";
		
		if (!$ratelimitBypassed)
		{
			$stmt = self::$pdo->prepare("SELECT COUNT(*) FROM authtickets WHERE cookie = ? AND authStart > ? - 120");
			$stmt->execute([$auth, time()]);
			$count = $stmt->fetchColumn();
			
			if (6 < $count)
				return "RATELIMITED";
		}
		
		while (true) 
		{
			// Generate a random string
			$random_bytes = random_bytes(30);
			$authTicket = bin2hex($random_bytes);

			// Check if the ticket already exists in the database
			$stmt = self::$pdo->prepare("SELECT COUNT(*) FROM authtickets WHERE authTicket = ?");
			$stmt->execute([$authTicket]);
			$count = $stmt->fetchColumn();
			
			//parse_str($_COOKIE["RBXEventTrackerV2"], $rbxEventTracker);
			// If the ticket doesn't exist, insert it into the database and break out of the loop
			if ($count == 0) {
				$stmt = self::$pdo->prepare("INSERT INTO authtickets (authTicket, authStart, authExpire, cookie, used, browserTrackerId) VALUES (:authenticationTicket, :authenticationTicketStartDate, :authenticationTicketExpiryDate, :authenticationCookie, 0, 0)");
				$stmt->bindParam(':authenticationTicket', $authTicket, PDO::PARAM_STR);
				$stmt->bindValue(':authenticationTicketStartDate', time());
				$stmt->bindValue(':authenticationTicketExpiryDate', time() + 140);
				$stmt->bindParam(':authenticationCookie', $auth);
				//$stmt->bindParam(':browserTrackerId', $rbxEventTracker["browserid"]);
				$stmt->execute();
				break;
			}
		}
		return $authTicket;
	}
	
	public static function redeemAuthenticationTicket($authTicket)
	{
		global $domain;
		
		$stmt = self::$pdo->prepare("SELECT * FROM authtickets WHERE authTicket = ?");
		$stmt->bindParam(1, $authTicket);
		$stmt->execute();
		$authInfo = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if (empty($authInfo) || time() > $authInfo["authExpire"] || $authInfo["used"] === 1)
			return "INVALID_AUTH";
		
		if ($authInfo["isGuest"] === 1){
			setrawcookie(".ROBLODISCORD", $authInfo["discordCookie"], strtotime("+1 Year"), "/", ".$domain", false, false);
			setrawcookie("GuestData", $authInfo["guestCookie"], strtotime("+10 Days"), "/", ".$domain", false, false);
		}else
			setrawcookie(".ROBLOSECURITY", $authInfo["cookie"], strtotime("+1 Year"), "/", ".$domain", false, false);

		$stmt = self::$pdo->prepare("UPDATE authtickets SET used = 1 WHERE authTicket = ?");
		$stmt->execute([$authTicket]);
	}
}

class User {
	public function doesUserExist($id, $failIfModerated = 0)
	{
		global $authPDO;
		$stmt = $authPDO->prepare("SELECT id FROM users WHERE id = ?");
		$stmt->bindParam(1, $id);
		$stmt->execute();
		$result = $stmt->rowCount();
		
		if ($result)
			return true;
		
		return false;
	}
	
	public function getPublicUserInfo($info, $id, $failIfModerated = 0)
	{
		global $authPDO;
		switch ($info)
		{
			case "BodyColorsJSON":
				$stmt = $authPDO->prepare("SELECT bodyColors FROM users WHERE id = ?");
				$stmt->bindParam(1, $id);
				$stmt->execute();
				return $stmt->fetchColumn();
			break;
			
			case "r15":
				$stmt = $authPDO->prepare("SELECT bodyType FROM users WHERE id = ?");
				$stmt->bindParam(1, $id);
				$stmt->execute();
				return $stmt->fetchColumn();
			break;

			case "joinDate":
				$stmt = $authPDO->prepare("SELECT joinDate FROM users WHERE id = ?");
				$stmt->bindParam(1, $id);
				$stmt->execute();
				return $stmt->fetchColumn();
				break;
				
			case "daysSinceJoin":
				$timestamp1 = (int)$this->getPublicUserInfo("joinDate", $id);
				$timestamp2 = time();
				return floor(($timestamp2 - $timestamp1) / 86400);
				break;

			case "activeMembership":
				$stmt = $authPDO->prepare("SELECT activeMembership FROM users WHERE id = ?");
				$stmt->bindParam(1, $id);
				$stmt->execute();
				return $stmt->fetchColumn();
				break;

			case "adminStatus":
				$stmt = $authPDO->prepare("SELECT adminStatus FROM users WHERE id = ?");
				$stmt->bindParam(1, $id);
				$stmt->execute();
				return $stmt->fetchColumn();
				break;
		}	
		
		return false;
	}
	
}
	
UserAuthentication::init($authPDO);
$userLookup = new User();
?>
