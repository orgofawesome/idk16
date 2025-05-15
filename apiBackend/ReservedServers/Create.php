<?php
$gameServPDO = connectDatabase('gameservers');
if ($server["RCCAccessKey"] !== $_SERVER["HTTP_ACCESSKEY"]){
	die();
}

function generateRandomString($length = 20) {
    // Define the characters you want to include in the random string
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    
    // Loop through the length of the desired random string
    for ($i = 0; $i < $length; $i++) {
        // Append a random character from the character set
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    
    return $randomString;
}

$time = time();
$placeId = $_GET["placeid"];
$random = random_int(1, 100);
$sig = generateRandomString();

$stmt = $gameServPDO->prepare("INSERT INTO reservedservers (placeId, code, createTime) VALUES (:placeId, :code, :createTime)");
$stmt->bindParam(':placeId', $placeId);
$stmt->bindParam(':code', $sig);
$stmt->bindParam(':createTime', $time);

if ($stmt->execute()){
	$json = [
		'ReservedServerAccessCode' => $sig
		];
	die(json_encode($json, JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK));
}
?>