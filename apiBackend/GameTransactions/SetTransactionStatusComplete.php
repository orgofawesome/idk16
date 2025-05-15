<?php

if (isset($_SERVER["HTTP_ACCESSKEY"])){
	if ($_SERVER["HTTP_ACCESSKEY"] == $server["RCCAccessKey"]){
		$receipt = $_POST["receipt"] ?? 0;
		$json = [
					'success' => false,
					'message' => 'InternalServerError'
				];
				
				
		if ($receipt == 0){
			die(json_encode($json));
		}

		$stmt = $pdo->prepare("SELECT * FROM receipts WHERE receiptId = :receiptId and processed = 0");
		$stmt->bindParam(':receiptId', $receipt);
		$stmt->execute();

		if ($stmt->rowCount() == 0){
			die(json_encode($json));
		}

		$stmt = $pdo->prepare("UPDATE receipts SET processed = 1 WHERE receiptId = :receiptId");
		$stmt->bindParam(':receiptId', $receipt);
		$stmt->execute();
	}
}

?>