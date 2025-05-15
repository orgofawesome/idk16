<?php
header("content-type: application/json");

try {
	$clientType = $_SERVER["HTTP_CONTENT_TYPE"] ?? null;

	switch (true)
	{
		case (str_starts_with($clientType, "application/json")):
			$data = json_decode(file_get_contents("php://input"));

			if ($data == null)
				throw new Exception("Invalid POST data");

			$username = $data->username;
			$password = $data->password;
		break;

		default:
			if (!isset($_POST["username"]) || !isset($_POST["password"]))
				throw new Exception("Invalid POST data");
			$username = $_POST["username"];
			$password = $_POST["password"];
		break;
	}

	$login = UserAuthentication::loginUser($username, $password, "LoginAPI");
		
	if ($login === true){
		$json = [ 
			'userId' => UserAuthentication::lookupIdByUsername($username),
			'message' => null
		];
	}else{
		$json = [
			'message' => "Credentials"
		];
			http_response_code(400);
	}
	die(json_encode($json));
}
catch (Exception $e){
	$json = [ "errors" => [ [ "code" => 0, "message" => "BadRequest" ]]];
	http_response_code(400);

	die(json_encode($json));
}

?>
