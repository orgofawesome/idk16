<?php

try {
	$universeId = $_GET["universeid"] ?? throw new Exception("Missing universeId variable");
	$page = $_GET["page"] ?? 1;
	
	$stmt = $pdo->prepare("SELECT assetName,assetId FROM assets WHERE universeId = :universeId AND isRootPlace = 1");
	$stmt->bindParam(':universeId', $universeId, PDO::PARAM_INT);
	$stmt->execute();
	$rootPlace = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if ($stmt->rowCount() == 0)
		throw new Exception("Asset does not exist or not a place");
	
	$json = [
				'FinalPage' => $stmt->rowCount() < 50,
				'RootPlace' => $rootPlace["assetId"],
				'Places' => [],
				'PageSize' => 50
	];

	$endIndex = 50 * $page;
	$startIndex = $endIndex - 50;
	
	if ($page == 1){
		$startIndex = $startIndex + 1;
		$json['Places'][] = [
								'PlaceId' => $rootPlace["assetId"],
								'Name' => $rootPlace["assetName"]
		];
	}
	
	$stmt = $pdo->prepare("SELECT assetName,assetId FROM assets WHERE universeId = :universeId AND isRootPlace = 0 LIMIT $startIndex,50");
	$stmt->bindParam(':universeId', $universeId, PDO::PARAM_INT);
	$stmt->execute();
	
	foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $asset){
		$json['Places'][] = [
								'PlaceId' => $asset["assetId"],
								'Name' => $asset["assetName"]
		];
	}
	
	die(json_encode($json));
}
catch (Exception $e){
	$error = [
				'errors' => [
								[
									'code' => 400,
									'message' => "BadRequest"
								]
							]
			];
			
	die(json_encode($error));
}
?>