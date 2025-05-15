<?php
$result = [
    "FollowingDetails" => []
];

$postResult = file_get_contents("php://input");
$postResult = json_decode($postResult);

$userId = $postResult->userId;
$otherUserIds = $postResult->otherUserIds;

foreach ($otherUserIds as $userId2){
    if ($userId2 !== $userId){

        $stmt = $authPDO->prepare("SELECT * FROM followers WHERE requesterid = :userId AND followingid = :userId2");
	    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
	    $stmt->bindParam(':userId2', $userId2, PDO::PARAM_INT);
	    $stmt->execute();  
	    $user1FollowsUser2 = $stmt->rowCount();

        $stmt = $authPDO->prepare("SELECT * FROM followers WHERE requesterid = :userId AND followingid = :userId2");
	    $stmt->bindParam(':userId2', $userId, PDO::PARAM_INT);
	    $stmt->bindParam(':userId', $userId2, PDO::PARAM_INT);
	    $stmt->execute();  
        $user2FollowsUser1 = $stmt->rowCount();

        $result["FollowingDetails"][] = [
            "UserId1" => $userId,
            "UserId2" => $userId2,
            "User1FollowsUser2" => (boolean)$user1FollowsUser2 ?? false,
            "User2FollowsUser1" => (boolean)$user2FollowsUser1 ?? false
        ];
    }
}

echo json_encode($result);
?>