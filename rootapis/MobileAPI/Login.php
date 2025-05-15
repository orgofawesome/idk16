<?php
header("content-type: application/json");

$login = UserAuthentication::loginUser($_POST["username"], $_POST["password"], "MobileAPI Login");
	
if ($login === true){
	$json = [ 
		'Status' => "OK"
	];
}else{
	$json = [
		'Status' => "InvalidPassword"
	];
	http_response_code(400);
}
die(json_encode($json));

?>
