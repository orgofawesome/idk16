<?php
header("content-type: application/json"); 
$userId = $_GET["userid"] ?? null;

try {
	if (!is_numeric($userId))
		throw new Exception("AvatarFetch: Invalid user ID input");

	if (!$userLookup->doesUserExist($userId, 1))
		throw new Exception("AvatarFetch: User does not exist or is moderated");

	$avatar = ($userLookup->getPublicUserInfo("r15", $userId)) ? "R6" : "R15";

	$json = [
		'resolvedAvatarType' => $avatar,
		'accessoryVersionIds' => [],
		'animations' => [],
		'scales' => [],
		'equippedGearVersionIds' => [],
		'backpackGearVersionIds' => []
	];

	$oldFormat = true;

	if ($oldFormat)
	{
		$json['bodyColorsUrl'] = "https://assetgame.$domain/asset/BodyColors.ashx?userId=".$_GET["userid"];
	}
	else
	{

		$bodyColors = json_decode($userLookup->getPublicUserInfo("BodyColorsJSON", (int)$_GET["userid"]));
		$json['bodyColors'] = [
			'HeadColor' => $bodyColors->headColor,
			'LeftArmColor' => $bodyColors->leftArmColor,
			'LeftLegColor' => $bodyColors->leftLegColor,
			'RightArmColor' => $bodyColors->rightArmColor,
			'RightLegColor' => $bodyColors->rightLegColor,
			'TorsoColor' => $bodyColors->torsoColor
		];
	}

	$stmt = $pdo->prepare("SELECT assetId, assetType FROM inventory WHERE userId = :userId and wearing = 1");
	$stmt->bindParam(':userId', $userId);
	$stmt->execute();

	$accessoryAllowed = [ 8, 11, 12, 18, 41 ];
	$gearAllowed = [ 19 ];
	
	foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $avatarAsset){
		$stmt2 = $pdo->prepare("SELECT assetVersionId FROM idk16assets WHERE assetId = :assetId ORDER BY assetVersionId DESC LIMIT 1");
		$stmt2->bindParam(':assetId', $avatarAsset['assetId']);
		$stmt2->execute();
		$result = $stmt2->fetchColumn();

		if (in_array($avatarAsset["assetType"], $accessoryAllowed)){
			$json['accessoryVersionIds'][] = $result;
		}elseif (in_array($avatarAsset["assetType"], $gearAllowed)){
			$json['backpackGearVersionIds'][] = $result;
		}
	}

	die(json_encode($json, JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK));
}
catch (Exception $e){
	http_response_code(400);
	$json = ['errors' => [ [ 'code' => 400, 'message' => "BadRequest" ] ] ];
	die(json_encode($json));
}
	
?>
