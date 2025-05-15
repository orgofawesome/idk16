<?php
header("content-type: application/json");

$placeid = $_GET["placeid"];
$userid = $_GET["userid"];
$points = $_GET["amount"];

try {
	if ($_SERVER["HTTP_ACCESSKEY"] !== $server["RCCAccessKey"]){
		throw new Exception("Unauthorized");
	}

	if (!$userLookup->doesUserExist($userId)){
		throw new Exception("User does not exist");
	}
	
	$pdo = connectDatabase('assets');
	$gamePersPDO = connectDatabase('gamePersistence');

	$stmt = $pdo->prepare("SELECT universeId FROM assets WHERE assetId = :placeId");
	$stmt->bindParam(':placeId', $placeid);
	$stmt->execute();
	
	$universeid = $stmt->fetchColumn();
	
	if ($universeid == 0)
		throw new Exception("Place does not exist");
	
	
}
catch (Exception $e)
{
	http_response_code(400);
    die(json_encode(['success' => false, 'message' => $e->getMessage()]));
}

$stmt = $gamePersPDO->prepare("INSERT INTO pointshistory (universeId, userId, points, time) VALUES (?, ?, ?, ?)"); 
$stmt->execute([$universeid, $userid, $points, time()]);
	
$stmt = $gamePersPDO->prepare("SELECT * FROM points WHERE userId = ? AND universeId = ?");
$stmt->execute([$userid, $universeid]);
$pointsinfo = $stmt->fetch(PDO::FETCH_ASSOC);

if ($pointsinfo == null){
	$stmt = $gamePersPDO->prepare("INSERT INTO points (universeId, userId, allTimePoints) VALUES (?, ?, ?)"); 
	$stmt->execute([$universeid, $userid, $points]);
}else{
	$stmt = $gamePersPDO->prepare("UPDATE points SET allTimePoints = allTimePoints + ? WHERE userId = ? AND universeId = ?");		
	$stmt->execute([$points, $userid, $universeid]);
}
		
$stmt = $gamePersPDO->prepare("SELECT allTimePoints FROM points WHERE userId = ? AND universeId = ?");
$stmt->execute([$userid, $universeid]);
$points = $stmt->fetchColumn();

$success = [
			'success' => true,
			'userGameBalance' => $points,
			'userBalance' => 0,
			'pointsAwarded' => (int)$_GET["amount"]
];
			
die(json_encode($success));
?>
