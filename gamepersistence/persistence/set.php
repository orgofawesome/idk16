<?php
header("Content-Type: application/json");
function startsWith ($string, $startString) 
{ 
    $len = strlen($startString); 
    return (substr($string, 0, $len) === $startString); 
} 

function endsWith($string, $endString) 
{ 
    $len = strlen($endString); 
    if ($len == 0) { 
        return true; 
    } 
    return (substr($string, -$len) === $endString); 
} 

function stripQuotes($text) {
    return preg_replace('/^(\'[^\']*\'|"[^"]*")$/', '$2$3', $text);
  } 

if(isset($_POST["value"])&&isset($_GET["key"])&&isset($_GET["placeid"])&&isset($_GET["scope"])&&isset($_GET["type"])&&isset($_GET["target"])){
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
		
        if (startsWith($_POST["value"], "[{") && endsWith($_POST["value"], "}]")){
            $postData = json_decode($_POST["value"]);

            if (count($postData) == 1){
                if (isset($postData['0']->Scope) && isset($postData['0']->Key) && isset($postData['0']->Value)){
                    $_POST["value"] = $postData['0']->Value;
                }
            }
        }

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
			$query = "UPDATE `datastores` SET `value`=:val $where";
		}
		
		$stmt = $gamePersistence->pdo->prepare($query);
		$stmt->bindParam(':key', $key, PDO::PARAM_STR); 
		$stmt->bindParam(':pid', $pid, PDO::PARAM_INT); 
		$stmt->bindParam(':scope', $scope, PDO::PARAM_STR); 
		$stmt->bindParam(':type', $type, PDO::PARAM_STR); 
		$stmt->bindParam(':target', $target, PDO::PARAM_STR);
		$stmt->bindParam(':val', $_POST["value"]);	
		$stmt->execute();
		
		$values = [array("Value"=>$_POST["value"],"Scope"=>$scope,"Key"=>$key,"Target"=>$target)];
		
		exit(json_encode(["data"=>$_POST["value"]], JSON_NUMERIC_CHECK));
}

exit(json_encode(["error"=>""]));
?>