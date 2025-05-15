<?php
header("content-type: application/json");

$json = [
    'success' => false
];

try {
    $username = $_GET["username"] ?? throw new Exception("A username was not supplied.");

    $userId = UserAuthentication::lookupIdByUsername($username);
    if ($userId == null){
        throw New Exception("There is nobody on IDK16 that goes by the name $username.");
    }

    $stmt = $authPDO->prepare("SELECT moderated FROM users WHERE id = :userId");
    $stmt->bindParam(':userId', $userId);
    
    if (!$stmt->execute())
        throw new Exception("A internal server error has occurred.");

    $result = $stmt->fetchColumn();

    $result = ($result) ? "Moderated" : "OK";

    $json["success"] = true;
    $json["message"] = $result;
}
catch (Exception $e){
    $json["message"] = $e->getMessage();
}

die(json_encode($json));
?>