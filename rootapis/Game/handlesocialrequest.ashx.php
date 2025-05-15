<?php
header("content-type: text/xml");
$playerId = (isset($_GET["playerid"])) ? (int)$_GET["playerid"] : die(header("Location: https://www.$domain/request-error?code=400"));
$userId = (isset($_GET["userid"])) ? (int)$_GET["userid"] : 0;
$groupId = (isset($_GET["groupid"])) ? intval($_GET["groupid"]) : 0;
$admin = false;

if (!isset($_GET["method"])){
	die(header("Location: https://www.$domain/request-error?code=400"));
}

switch ($_GET["method"]){
	case "GetGroupRank":
		if ($groupId == 0)
			die(header("Location: https://www.$domain/request-error?code=400"));

        if ( $playerId == 1 || $playerId == 15 )
   			$admin = true;

		if ($admin and $groupId == 1200769)
			die('<Value Type="integer">100</Value>');
	
		$stmt = $pdo->prepare("SELECT rankId FROM groupmembers WHERE groupId = :groupId AND userId = :userId");
		$stmt->bindParam(':groupId', $groupId);
		$stmt->bindParam(':userId', $playerId);
		$stmt->execute();

		if ($stmt->rowCount() == 0)
		    die('<Value Type="integer">0</Value>');
		$roleId = $stmt->fetchColumn();

		$stmt = $pdo->prepare("SELECT groupRankId FROM grouproles WHERE roleId = :roleId");
		$stmt->bindParam(':roleId', $roleId);
		$stmt->execute();

		die('<Value Type="integer">' . $stmt->fetchColumn() . '</Value>');
	break;

	case "GetGroupRole":
		header("content-type: text/plain");
		if ($groupId == 0)
			die(header("Location: https://www.$domain/request-error?code=400"));

        if ( $playerId == 1 || $playerId == 15 )
   			$admin = true;

		if ($admin and $groupId == 1200769)
			die('Member');
	
		$stmt = $pdo->prepare("SELECT rankId FROM groupmembers WHERE groupId = :groupId AND userId = :userId");
		$stmt->bindParam(':groupId', $groupId);
		$stmt->bindParam(':userId', $playerId);
		$stmt->execute();

		if ($stmt->rowCount() == 0)
		    die('Guest');
		$roleId = $stmt->fetchColumn();

		$stmt = $pdo->prepare("SELECT rankName FROM grouproles WHERE roleId = :roleId");
		$stmt->bindParam(':roleId', $roleId);
		$stmt->execute();

		die($stmt->fetchColumn());
	break;

	case "IsInGroup":
		if ($groupId == 0)
			die(header("Location: https://www.idk18.xyz/request-error?code=400"));

		if ( $playerId == 1 || $playerId == 15 )
   			$admin = true;

		if ($admin and $groupId == 1200769)
			die('<Value Type="boolean">true</Value>');

		$stmt = $pdo->prepare("SELECT rankId FROM groupmembers WHERE groupId = :groupId AND userId = :userId");
		$stmt->bindParam(':groupId', $groupId);
		$stmt->bindParam(':userId', $playerId);
		$stmt->execute();

		if ($stmt->rowCount() == 0)
			die('<Value Type="boolean">false</Value>');
		else 
			die('<Value Type="boolean">true</Value>');
	break;

	case "IsFriendsWith":
		$success = '<Value Type="boolean">true</Value>';
		$failure = '<Value Type="boolean">false</Value>';

		if ($playerId == $userId)
			die($success);
		else{
			$array = [ $playerId, $userId ];
        	sort($array);
			$statement = "{$array[0]}-{$array[1]}";

			$stmt = $authPDO->prepare("SELECT accepted FROM friendreq WHERE stmt = :statement");
			$stmt->bindParam(':statement', $statement);
			$stmt->execute();

			if ($stmt->rowCount() !== 0 && $stmt->fetchColumn() === 1){
				die($success);
			}

			die($failure);
		}

	break;
}
?>