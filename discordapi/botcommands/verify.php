<?php
header("content-type: application/json");
$discordId = $_GET["discord"] ?? 0;

try{
    if ($discordId == 0){
        throw new Exception("Sorry, an unexpected error occurred. Please try again. [ERROR: 01]");
    }

    $stmt = $authPDO->prepare("SELECT * FROM discord_verif WHERE discord_id = :discordId");
    $stmt->bindParam(':discordId', $discordId, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() == 0){
        throw new Exception("You are not a verified person and cannot use this command to claim your role. [ERROR: 02]");
    }

    $userInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($userInfo["is_banned"] == 1){
        throw new Exception("Sorry, your records seem to show that you are banned from accessing IDK16. [ERROR: 03]");
    }
    
    $json = [
        'success' => true
    ];
}
catch (Exception $e){
    $json = [
        'success' => false,
        'message' => $e->getMessage()
    ];
    http_response_code(400);
}

die(json_encode($json));