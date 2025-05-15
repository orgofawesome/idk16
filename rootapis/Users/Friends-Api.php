<?php
header("content-type: application/json"); 
error_reporting(E_ALL);
$friendsType = $_GET["friendstype"] ?? "";
$pageSize = intval($_GET["pagesize"]);
$startRow = intval($_GET["currentpage"]);
$userId = $_GET["userid"] ?? 0;
$userId = intval($userId);

$json = [
    "UserId" => $userId,
    "TotalFriends" => 0,
    "CurrentPage" => 0,
    "PageSize" => 0,
    "TotalPages" => 0,
    "FriendsType" => $friendsType,
    "Friends" => []
];

if ($pageSize == 0 || $pageSize > 20){
    die("Internal server error");
}

switch ($friendsType)
{
    case "Followers":
        $stmt2 = $authPDO->prepare("SELECT requesterid FROM followers WHERE followingid = :userId ORDER BY startdate DESC LIMIT :startNumber,:rowCount");
        $stmt2->bindParam(':userId', $userId);
        $stmt2->bindParam(':startNumber', $startRow, PDO::PARAM_INT);
        $stmt2->bindParam(':rowCount', $pageSize, PDO::PARAM_INT);
        $stmt2->execute();

        $stmt = $authPDO->prepare("SELECT requesterid FROM followers WHERE followingid = :userId");
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        foreach ($stmt2->fetchAll(PDO::FETCH_ASSOC) as $user){
            $username = UserAuthentication::lookupNameById($user['requesterid']);
            $thumbnail = ThumbnailService::requestAvatarThumbnail( $user["requesterid"], 100, 100, 1 );

            $json["Friends"][] = [
                "UserId" => $user["requesterid"],
                "AbsoluteURL" => "https://www.$domain/users/{$user['requesterid']}/profile",
                "Username" => $username,
                "AvatarUri" => $thumbnail,
                "AvatarFinal" => "true",
                "OnlineStatus" => [
                    "LocationOrLastSeen" => "",
                    "ImageUrl" => "~/images/offline.png",
                    "AlternateText" => "$username is offline (last seen at )"
                ],
                "Thumbnail" => [
                    "Final" => true,
                    "Url" => $thumbnail,
                    "RetryUrl" => ""
                ],
                "InvitationId" => 0,
                "LastLocation" => "",
                "PlaceId" => 0,
                "AbsolutePlaceURL" => "", 
                "IsOnline" => false,
                "InGame" => false,
                "InStudio" => false,
                "IsFollowed" => false,
                "FriendshipStatus" => 0,
                "IsDeleted" => false
            ];
        }
        break;

    case "AllFriends":
        $stmt2 = $authPDO->prepare("SELECT * FROM friendreq WHERE requested = :userId AND accepted = 1 OR requester = :userId and accepted = 1 ORDER BY date DESC LIMIT :startNumber,:rowCount");
        $stmt2->bindValue(':userId', $userId, PDO::PARAM_INT);
        $stmt2->bindParam(':startNumber', $startRow, PDO::PARAM_INT);
        $stmt2->bindParam(':rowCount', $pageSize, PDO::PARAM_INT);
        $stmt2->execute();

        $stmt = $authPDO->prepare("SELECT accepted FROM friendreq WHERE requested = :userId AND accepted = 1 OR requester = :userId AND accepted = 1");
        $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

        foreach ($stmt2->fetchAll(PDO::FETCH_ASSOC) as $user){
            $userReqId = ($user["requested"] == $userId) ? $user["requester"] : $user["requested"];
            $username = UserAuthentication::lookupNameById($userReqId);
            $thumbnail = ThumbnailService::requestAvatarThumbnail( $userReqId, 100, 100, 1 );

            $json["Friends"][] = [
                "UserId" => $userReqId,
                "AbsoluteURL" => "https://www.$domain/users/$userReqId/profile",
                "Username" => $username,
                "AvatarUri" => $thumbnail,
                "AvatarFinal" => "",
                "OnlineStatus" => [
                    "LocationOrLastSeen" => "",
                    "ImageUrl" => "~/images/offline.png",
                    "AlternateText" => "$username is offline (last seen at )"
                ],
                "Thumbnail" => [
                    "Final" => true,
                    "Url" => $thumbnail,
                    "RetryUrl" => ""
                ],
                "InvitationId" => 0,
                "LastLocation" => "",
                "PlaceId" => 0,
                "AbsolutePlaceURL" => "", 
                "IsOnline" => false,
                "InGame" => false,
                "InStudio" => false,
                "IsFollowed" => true,
                "FriendshipStatus" => 3,
                "IsDeleted" => false
            ];
        }
        break;

    case "Following":
        $stmt2 = $authPDO->prepare("SELECT followingid FROM followers WHERE requesterid = :userId ORDER BY startdate DESC LIMIT :startNumber,:rowCount");
        $stmt2->bindParam(':userId', $userId);
        $stmt2->bindParam(':startNumber', $startRow, PDO::PARAM_INT);
        $stmt2->bindParam(':rowCount', $pageSize, PDO::PARAM_INT);
        $stmt2->execute();

        $stmt = $authPDO->prepare("SELECT followingid FROM followers WHERE requesterid = :userId");
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        foreach ($stmt2->fetchAll(PDO::FETCH_ASSOC) as $user){
            $username = UserAuthentication::lookupNameById($user['followingid']);
            $thumbnail = ThumbnailService::requestAvatarThumbnail( $user["followingid"], 100, 100, 1 );

            $json["Friends"][] = [
                "UserId" => $user["followingid"],
                "AbsoluteURL" => "https://www.$domain/users/{$user['followingid']}/profile",
                "Username" => $username,
                "AvatarUri" => $thumbnail,
                "AvatarFinal" => "true",
                "OnlineStatus" => [
                    "LocationOrLastSeen" => "",
                    "ImageUrl" => "~/images/offline.png",
                    "AlternateText" => "$username is offline (last seen at )"
                ],
                "Thumbnail" => [
                    "Final" => true,
                    "Url" => $thumbnail,
                    "RetryUrl" => ""
                ],
                "InvitationId" => 0,
                "LastLocation" => "",
                "PlaceId" => 0,
                "AbsolutePlaceURL" => "", 
                "IsOnline" => false,
                "InGame" => false,
                "InStudio" => false,
                "IsFollowed" => true,
                "FriendshipStatus" => 0,
                "IsDeleted" => false
            ];
        }
        break;

    case "FriendRequests":
        if ($isUserAuthenticated == false){
            die(header("Location: https://www.$domain/request-error?code=400"));
        }

        $stmt2 = $authPDO->prepare("SELECT * FROM friendreq WHERE requested = :userId AND accepted = 0 ORDER BY date DESC LIMIT :startNumber,:rowCount");
        $stmt2->bindValue(':userId', $userInfo['id'], PDO::PARAM_INT);
        $stmt2->bindParam(':startNumber', $startRow, PDO::PARAM_INT);
        $stmt2->bindParam(':rowCount', $pageSize, PDO::PARAM_INT);
        $stmt2->execute();

        $stmt = $authPDO->prepare("SELECT accepted FROM friendreq WHERE requested = :userId AND accepted = 0");
        $stmt->bindValue(':userId', $userInfo['id'], PDO::PARAM_INT);
        $stmt->execute();

        foreach ($stmt2->fetchAll(PDO::FETCH_ASSOC) as $user){
            $username = UserAuthentication::lookupNameById($user['requester']);
            $thumbnail = ThumbnailService::requestAvatarThumbnail( $user["requester"], 100, 100, 1 );
            
            $json["Friends"][] = [
                "UserId" => $user["requester"],
                "AbsoluteURL" => "https://www.$domain/users/{$user['requester']}/profile",
                "Username" => $username,
                "AvatarUri" => $thumbnail,
                "AvatarFinal" => "true",
                "OnlineStatus" => [
                    "LocationOrLastSeen" => "",
                    "ImageUrl" => "~/images/offline.png",
                    "AlternateText" => "$username is offline (last seen at )"
                ],
                "Thumbnail" => [
                    "Final" => true,
                    "Url" => $thumbnail,
                    "RetryUrl" => ""
                ],
                "InvitationId" => $user["id"],
                "LastLocation" => "",
                "PlaceId" => 0,
                "AbsolutePlaceURL" => "", 
                "IsOnline" => false,
                "InGame" => false,
                "InStudio" => false,
                "IsFollowed" => true,
                "FriendshipStatus" => 0,
                "IsDeleted" => false
            ];
        }
        break;

}

$resultCount = $stmt->rowCount() ?? 0;
$pageCount = $stmt2->rowCount() ?? 0;
$json["TotalFriends"] = $resultCount;
$json["PageSize"] = $pageCount;
$json["CurrentPage"] = $startRow;

die(json_encode($json));
?>