<?php
header("Content-Type: application/json");

if(isset($_GET["value"])&&isset($_GET["key"])&&isset($_GET["placeid"])&&isset($_GET["scope"])&&isset($_GET["type"])&&isset($_GET["target"])){
		$values=[];
		$key = (string)$_GET["key"];
		$pid = (int)$_GET["placeid"];
		$scope = (string)$_GET["scope"];
		$type = (string)$_GET["type"];
		$target = (string)$_GET["target"];
		
		$stmt = $assetsPDO->prepare("SELECT universeId FROM assets WHERE assetId = :assetId");
		$stmt->bindParam(':assetId', $pid);
		$stmt->execute();
		$pid = $stmt->fetchColumn();
		
		$query = "INSERT INTO `datastores`(`id`, `key`, `universeId`, `type`, `scope`, `target`, `value`) VALUES (NULL,:key,:pid,:type,:scope,:target,:val)";
		$queryChanged=false;
		
		$where = "WHERE `universeId`=:pid AND `scope`=:scope AND `type`=:type AND `key`=:key AND `target`=:target";
		
		$stmt = $gamePersistence->pdo->prepare("SELECT * FROM `datastores` $where");
		$stmt->bindParam(':key', $key, PDO::PARAM_STR); 
		$stmt->bindParam(':pid', $pid, PDO::PARAM_INT); 
		$stmt->bindParam(':scope', $scope, PDO::PARAM_STR); 
		$stmt->bindParam(':type', $type, PDO::PARAM_STR); 
		$stmt->bindParam(':target', $target, PDO::PARAM_STR);
		$stmt->execute();
		if($stmt->rowCount()>0){
			$query = "UPDATE `datastores` SET `value`= value + :val $where";
		}
		
		$stmt = $gamePersistence->pdo->prepare($query);
		$stmt->bindParam(':key', $key, PDO::PARAM_STR); 
		$stmt->bindParam(':pid', $pid, PDO::PARAM_INT); 
		$stmt->bindParam(':scope', $scope, PDO::PARAM_STR); 
		$stmt->bindParam(':type', $type, PDO::PARAM_STR); 
		$stmt->bindParam(':target', $target, PDO::PARAM_STR);
		$stmt->bindParam(':val', $_GET["value"], PDO::PARAM_INT);	
		$stmt->execute();
		
		$stmt = $gamePersistence->pdo->prepare("SELECT value FROM `datastores` $where");
		$stmt->bindParam(':key', $key, PDO::PARAM_STR); 
		$stmt->bindParam(':pid', $pid, PDO::PARAM_INT); 
		$stmt->bindParam(':scope', $scope, PDO::PARAM_STR); 
		$stmt->bindParam(':type', $type, PDO::PARAM_STR); 
		$stmt->bindParam(':target', $target, PDO::PARAM_STR);
		$stmt->execute();
		$value = $stmt->fetchColumn();
		
		$values = [array("Value"=>$value,"Scope"=>$scope,"Key"=>$key,"Target"=>$target)];
		
		exit(json_encode(["data"=>$values], JSON_NUMERIC_CHECK));
}

exit(json_encode(["error"=>""]));
?>