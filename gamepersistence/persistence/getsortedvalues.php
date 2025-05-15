<?php
header("Content-Type: application/json");

function generateRandomString($length = 15) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }

    return $randomString;
}

if(isset($_GET["key"])&&isset($_GET["placeid"])&&isset($_GET["scope"])){
	$startKey = isset($_GET["exclusivestartkey"]);
	$query = "SELECT * FROM `datastores` WHERE `type`=\"sorted\" AND `universeId`=:pid AND `key`=:key AND `scope`=:scope ORDER BY `value` + 0";
	$pageNumber = 0;

	if (!isset($_GET["exclusivestartkey"]) && isset($_GET["pagesize"])){
		$startKeyText = generateRandomString();
		$stmt = $gamePersistence->pdo->prepare("INSERT INTO datastorereq (exclusiveStartKey, pageNumber) VALUES (:startKey, :pageNumber)");
		$stmt->bindParam(':startKey', $startKeyText);
		$stmt->bindParam(':pageNumber', $_GET["pagesize"]);
		$stmt->execute();

		$startKey = true;
	}elseif(isset($_GET["exclusivestartkey"])){
		$startKeyText = $_GET["exclusivestartkey"];

		$stmt = $gamePersistence->pdo->prepare("SELECT pageNumber FROM datastorereq WHERE exclusiveStartKey = :startKey");
		$stmt->bindParam(':startKey', $startKeyText);
		$stmt->execute();

		if ($stmt->rowCount() == 0){
			$startKeyText = null;
			$startKey = false;
		}else{
			$pageNumber = $stmt->fetchColumn();
		}
	}

	if (isset($_GET["ascending"])){
		if ($_GET["ascending"] == "False"){
			$query = $query . " DESC";
		}
	}

	$key = (string)$_GET["key"];;
	$pid = (int)$_GET["placeid"];;
	$scope = (string)$_GET["scope"];
	$limit = 0;
	$limitSet = isset($_GET["pagesize"]);
	
	$stmt = $assetsPDO->prepare("SELECT universeId FROM assets WHERE assetId = :assetId");
	$stmt->bindParam(':assetId', $pid);
	$stmt->execute();
	$pid = $stmt->fetchColumn();
		
	if ($startKey && $limitSet){
		$query = $query . " LIMIT :startNumber, :limit";
		$limit = (int)$_GET["pagesize"];
	}elseif($limitSet){
		$query = $query . " LIMIT :limit";
		$limit = (int)$_GET["pagesize"];
	}
	$stmt = $gamePersistence->pdo->prepare($query);
	$stmt->bindParam(':key', $key, PDO::PARAM_STR); 
	$stmt->bindParam(':pid', $pid, PDO::PARAM_INT); 
	$stmt->bindParam(':scope', $scope, PDO::PARAM_STR); 
	if($limitSet){
		$stmt->bindParam(':limit', $limit, PDO::PARAM_INT); 
	}

	if ($startKey){
		$stmt->bindParam(':startNumber', $pageNumber, PDO::PARAM_INT);
	}

	$stmt->execute();
	$entries = [];
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as &$data){
		array_push($entries,array("Target"=>$data["target"],"Value"=>$data["value"]));
	}

	$json = [
		"data" => [ 
			"Entries" => $entries,
		]
	];

	if ($startKey){
		$json["data"]["ExclusiveStartKey"] = $startKeyText ?? $_GET["exclusivestartkey"];
	}

	exit(json_encode($json, JSON_NUMERIC_CHECK));
}
exit(json_encode(["error"=>""]));
?>