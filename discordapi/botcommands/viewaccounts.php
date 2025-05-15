<?php
header("content-type: application/json");
$discordId = $_GET["discord"] ?? 0;

try{
    if ($discordId == 0){
        throw new Exception("This does not seem to be a valid Discord user");
    }

    $stmt = $authPDO->prepare("SELECT `name`,`id` FROM `users` WHERE `registerDiscordId` = :discordId");
    $stmt->bindParam(':discordId', $discordId, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() == 0){
        throw new Exception("This user does not have any account on IDK16, or have used a different Discord account to sign up.");
    }

    $json = [
        'success' => true,
        'accounts' => []
    ];

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $account){
        $json["accounts"][$account["name"]] = $account["id"];
    }

}catch (Exception $e){
    http_response_code(400);
    $json = [
        'success' => false,
        'message' => $e->getMessage()
    ];
}

die(json_encode($json));

?>