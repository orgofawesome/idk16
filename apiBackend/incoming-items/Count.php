<?php

try {
    if (!$isUserAuthenticated){
        $error = [ "errors" => [ [ "code" => 403, "message" => "Forbidden" ] ] ];
        http_response_code(403);
    
        die(json_encode($error));
    }
    
    $userId = $userInfo['id'];
    $GETUserId = (isset($_GET["userid"])) ? $_GET["userid"] : 0;

    if ( $GETUserId !== 0 && $userId !== (int)$GETUserId ){
        $error = [ "errors" => [ [ "code" => 403, "message" => "Forbidden" ] ] ];
        http_response_code(403);
    
        die(json_encode($error));
    }
    
    $stmt = $authPDO->prepare("SELECT accepted FROM friendreq WHERE requested = :userId AND accepted = 0");
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();
    
    $friendshipCount = $stmt->rowCount();
    
    $result = [
        "unreadMessageCount" => 0,
        "friendRequestsCount" => $friendshipCount
    ];
    
    echo json_encode($result);
}
catch (Exception $e){
    $json = [
    ];

    die(json_encode($json));
}
?>