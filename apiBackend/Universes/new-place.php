<?php
header("content-type: application/json");

if (isset($_SERVER["HTTP_ACCESSKEY"])){
	if ($_SERVER["HTTP_ACCESSKEY"] == $server["RCCAccessKey"]){
		$originatingPlaceId = intval($_GET["currentplaceid"]) ?? 0;
		$templatePlaceId = intval($_GET["templateplaceid"]) ?? 0;
		$placeName = $_GET["placename"] ?? "";
		
		if ($originatingPlaceId == 0 || $templatePlaceId == 0 || $placeName == ""){
			die(http_response_code(400));
		}
		
		$stmt = $pdo->prepare("SELECT universeId FROM assets WHERE assetId = :placeId AND assetTypeId = 9");
		$stmt->bindParam(':placeId', $originatingPlaceId, PDO::PARAM_INT);
		$stmt->execute();
		
		if ($stmt->rowCount() == 0){
			die(http_response_code(400));
		}
		
		$universeId = $stmt->fetchColumn();
		
		$stmt = $pdo->prepare("SELECT * FROM assets WHERE assetId = :templateId and universeId = :universeId AND assetTypeId = 9");
		$stmt->bindParam(':templateId', $templatePlaceId, PDO::PARAM_INT);
		$stmt->bindParam(':universeId', $universeId);
		$stmt->execute();
		
		if ($stmt->rowCount() == 0){
			die(http_response_code(400));
		}
		
		$assetInfo = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$stmt = $pdo->prepare("SELECT * FROM idk16assets WHERE assetId = :placeId ORDER BY assetVersionId DESC LIMIT 1");
		$stmt->bindParam(':placeId', $templatePlaceId, PDO::PARAM_INT);
		$stmt->execute();
		$assetDownloadable = $stmt->fetch(PDO::FETCH_ASSOC);
		$time = time();
		
		try {
			$pdo->beginTransaction();
			$stmt = $pdo->prepare("INSERT INTO assets (universeId, assetTypeId, iconImageAssetId, genreType, created, updated, creatorId, assetName, maxPlayers, maxSales, creatorType, allowedCreators, thumbnails, avatarSetting, isRootPlace, chatType) VALUES (:universeId, 9, :iconImage, :genre, :creation, :update, :creatorId, :placeName, :players, 0, 1, :creatorPerm, :thumbnail, :avatar, 0, :chat)");
			$stmt->bindParam(':universeId', $universeId);
			$stmt->bindParam(':iconImage', $assetInfo["iconImageAssetId"]);
			$stmt->bindParam(':genre', $assetInfo["genreType"]);
			$stmt->bindParam(':creation', $time);
			$stmt->bindParam(':update', $time);
			$stmt->bindParam(':creatorId', $assetInfo["creatorId"]);
			$stmt->bindParam(':placeName', $placeName);
			$stmt->bindParam(':players', $assetInfo["maxPlayers"]);
			$stmt->bindParam(':creatorPerm', $assetInfo["allowedCreators"]);
			$stmt->bindParam(':thumbnail', $assetInfo["thumbnails"]);
			$stmt->bindParam(':avatar', $assetInfo["avatarSetting"]);
			$stmt->bindParam(':chat', $assetInfo["chatType"]);
			$stmt->execute();
			
			$stmt = $pdo->prepare("SELECT assetId FROM assets WHERE universeId = :universeId AND assetName = :placeName ORDER BY assetId DESC LIMIT 1");
			$stmt->bindParam(':universeId', $universeId);
			$stmt->bindParam(':placeName', $placeName);
			$stmt->execute();
			$assetId = $stmt->fetchColumn();
			
			$stmt = $pdo->prepare("INSERT INTO idk16assets (assetId, assetVersion, assetHash, assetTypeId) VALUES (:placeId, 1, :place, 9)");
			$stmt->bindParam(':placeId', $assetId);
			$stmt->bindParam(':place', $assetDownloadable["assetHash"]);
			$stmt->execute();
			$pdo->commit();
			echo $assetId;
		}catch(Exception $e){
			$pdo->rollBack();
			die(http_response_code(400));
		}
	}
}