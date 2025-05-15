<?php

try{
	$stmt = $pdo->prepare("SELECT * FROM groups WHERE id = :groupId");
	$stmt->bindParam(':groupId', $vars["id"], PDO::PARAM_INT);
	$stmt->execute();

	if ($stmt->rowCount() == 0)
		throw new Exception("No such group was found");
	
	$groupInfo = $stmt->fetch(PDO::FETCH_ASSOC);
	
	$json = [
				'Name' => $groupInfo["name"],
				'Id' => $groupInfo["id"],
				'Owner' => [
								'Name' => UserAuthentication::lookupNameById($groupInfo["creatorId"]),
								'Id' => $groupInfo["creatorId"]
						],
				'EmblemUrl' => "https://www.$domain/asset/?id={$groupInfo["iconImageAssetId"]}",
				'Description' => $groupInfo["description"],
				'Roles' => []
	];
	
	$stmt = $pdo->prepare("SELECT * FROM grouproles WHERE groupId = :groupId ORDER BY groupRankId");
	$stmt->bindParam(':groupId', $vars["id"], PDO::PARAM_INT);
	$stmt->execute();
	
	foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $roleInfo){
		$json['Roles'][] = [
								'Name' => $roleInfo['rankName'],
								'Rank' => $roleInfo['groupRankId']
		];
	}
	
	die(json_encode($json, JSON_UNESCAPED_SLASHES));
}
catch(Exception $e){
	$json = [
				'errors' =>  [
								[ 'code' => 400, 'message' => "BadRequest" ]
							]
			];
			
	http_response_code(400);
	die(json_encode($json));
}
