<?php
header("content-type: application/json");
header("Access-Control-Allow-Origin: https://www.".$domain);
header("Access-Control-Allow-Credentials: true");

if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["birthday"]) && isset($_POST["gender"]) && isset($_POST["context"])){
	$result = UserAuthentication::registerUser($_POST["username"], $_POST["password"], $_POST["birthday"], $_POST["gender"], $_POST["context"]);
	$json = [];
	
	switch ($result)
	{
		case "INVALID_CONTEXT":
			http_response_code(403);
			$json["reasons"][] = "StatusServerError";
		break;
		
		case "INVALID_BIRTHDAY_01":
			http_response_code(403);
			$json["reasons"][] = "BirthdayInvalid";
		break;
		
		case "INVALID_BIRTHDAY_02":
			http_response_code(403);
			$json["reasons"][] = "BirthdayInvalid";
		break;
		
		case "INVALID_GENDER":
			http_response_code(403);
			$json["reasons"][] = "GenderInvalid";
		break;
		
		case "INVALID_USERNAME":
			http_response_code(403);
			$json["reasons"][] = "UsernameInvalid";
		break;
		
		case "UNKNOWN_ERROR":
			http_response_code(500);
			$json["reasons"][] = "StatusServerError";
		break;
	
		case "INVITE_KEY_INVALID":
			http_response_code(403);
			$json["reasons"][] = "StatusServerError";
		break;
		
		default:
			$userId = UserAuthentication::lookupIdByUsername($_POST["username"]);
			$json["userId"] = -1;
			
			function generateRandomString($length = 15) {
				$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$charactersLength = strlen($characters);
				$randomString = '';

				for ($i = 0; $i < $length; $i++) {
					$randomString .= $characters[random_int(0, $charactersLength - 1)];
				}

				return $randomString;
			}
			$gameServPDO = connectDatabase("gameservers");
			$stmt = $gameServPDO->prepare("INSERT INTO awaitingjobs (timeRequested, actionRequested, placeId, universeId, creatorId, gameMaxPlayers, gameId) VALUES (:datee, 11, :placeId, 1, 1, 1, :gameId)");
			$stmt->bindValue(':datee', time());
			$stmt->bindParam(':placeId', $userId, PDO::PARAM_INT);
			$stmt->bindValue(':gameId', generateRandomString());
			$stmt->execute();
		break;
	}
	
	die(json_encode($json));
}
?>
