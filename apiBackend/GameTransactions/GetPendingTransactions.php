<?php

header("content-type: application/json");

if (isset($_SERVER["HTTP_ACCESSKEY"])){
	if ($_SERVER["HTTP_ACCESSKEY"] == $server["RCCAccessKey"]){
		$playerId = $_GET["playerid"] ?? 0;
		$placeId = $_GET["placeid"] ?? 0;

		if ($playerId == 0 || $placeId == 0)
		{
			die();
		}


		$json = [];


		$stmt = $pdo->prepare("SELECT * FROM receipts WHERE playerId = :playerId AND placeId = :placeId AND processed = 0");
		$stmt->bindParam(':playerId', $playerId, PDO::PARAM_INT);
		$stmt->bindParam(':placeId', $placeId, PDO::PARAM_INT);
		$stmt->execute();

		foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $receipt){
			$json[] = [
							'playerId' => $receipt["playerId"],
							'placeId' => $receipt["placeId"],
							'receipt' => $receipt["receiptId"],
							'actionArgs' => [
												[
													'Key' => 'productId',
													'Value' => $receipt["productId"]
												],
												[
													'Key' => 'currencyTypeId',
													'Value' => 1
												],
												[	
													'Key' => 'unitPrice',
													'Value' => $receipt["unitPrice"]
												]
											]
					];
		}

		die(json_encode($json));
	}
}


?>