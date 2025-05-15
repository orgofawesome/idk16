<?php
header("content-type: application/json");

$authorId = $_GET["author"] ?? 0;
$referredId = $_GET["referred"] ?? 0;

try{
    if ($authorId == 0 || $referredId == 0){
        throw new Exception("An unexpected error has occurred. [ERROR 01]");
    }

    $quotaDate = strtotime('-1 Month');
    $stmt = $authPDO->prepare("SELECT join_date FROM discord_verif WHERE discord_id = :authorId");
    $stmt->bindParam(':authorId', $authorId, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() == 0){
        throw new Exception("It looks like you are ineligible to refer people. [ERROR 02]");
    }

    if ($stmt->fetchColumn() > $quotaDate){
        throw new Exception("You joined IDK16 too recently, please wait a while to refer people. [ERROR 03]");
    }

    $stmt = $authPDO->prepare("SELECT join_date FROM discord_verif WHERE discord_id = :referredId");
    $stmt->bindParam(':referredId', $referredId, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() !== 0){
        throw new Exception("The person you are trying to refer is already verified to play IDK16. [ERROR 04]");
    }

    $stmt = $authPDO->prepare("SELECT discord_id FROM discord_verif WHERE referred_by = :authorId AND join_date > $quotaDate");
    $stmt->bindParam(':authorId', $authorId, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() !== 0){
        throw new Exception("You have reached this month's quota, try again next month. [ERROR 05]");
    }

    $stmt = $authPDO->prepare("INSERT INTO discord_verif (discord_id, verified_status, idk16_accounts_limit, join_date, referred_by) VALUES (:referredId, 3, 1, :timeDate, :authorId)");
    $stmt->bindParam(':referredId', $referredId, PDO::PARAM_INT);
    $stmt->bindValue(':timeDate', time());
    $stmt->bindParam(':authorId', $authorId, PDO::PARAM_INT);
    $stmt->execute();

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