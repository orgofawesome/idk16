<?php

try {
    if (!isset($_GET["userid"]) && !$isUserAuthenticated){
        $error = [ "errors" => [ [ "code" => 403, "message" => "Forbidden" ] ] ];
        http_response_code(403);
    
        die(json_encode($error));
    }
    
    $userId = $_GET["userid"] ?? $userInfo['id'];
    
    $stmt = $authPDO->prepare("SELECT accepted FROM friendreq WHERE requester = :userId  AND accepted = 1 or requested = :userId AND accepted = 1");
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();
    
    $friendshipCount = $stmt->rowCount();
    
    $result = [
        "success" => true,
        "message" => "Success",
        "count" => $friendshipCount
    ];
    
    echo json_encode($result);
}
catch (Exception $e){
    $json = [
                'success' => false,
                'message' => "InternalServerError"
    ];

    die(json_encode($json));
}
?>