<?php

try {
	$universeId = $_GET["universeid"] ?? throw new Exception("Missing universeId variable");
	$page = $_GET["page"] ?? 1;
	
	$stmt = $pdo->prepare("SELECT assetName,assetDescription,productId,devProdId FROM assets WHERE universeId = :universeId AND devProdId IS NOT NULL");
	$stmt->bindParam(':universeId', $universeId, PDO::PARAM_INT);
	$stmt->execute();
	
	$json = [
				'DeveloperProducts' => [],
				'FinalPage' => $stmt->rowCount() < 50,
				'PageSize' => 50
	];

	$endIndex = 50 * $page;
	$startIndex = $endIndex - 50;
	
	foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $asset){
		$json['DeveloperProducts'][] = [
								'ProductId' => $asset["productId"],
								'DeveloperProductId' => $asset["devProdId"],
								'Name' => $asset["assetName"],
								'Description' => $asset["assetDescription"],
								'IconImageAssetId' => null,
								'displayName' => $asset["assetName"],
								'displayDescription' => $asset["assetDescription"],
								'displayIcon' => null,
								'PriceInRobux' => $asset["priceInRobux"]
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