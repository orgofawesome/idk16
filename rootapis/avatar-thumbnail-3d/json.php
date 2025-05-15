<?php
header("content-type: application/json");
header("Access-Control-Allow-Origin: https://www.$domain");
header("Access-Control-Allow-Credentials: true");

if ($userLookup->doesUserExist($_GET["userid"])){
    $stmt = $authPDO->prepare("SELECT avatar_obj FROM users WHERE id = :id");
    $stmt->bindParam(':id', $_GET["userid"], PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchColumn();

    if ($result == null){
        die(header("Location: https://www.$domain/request-error"));
    }

    $url = "https://t1.$domain/$result";

    $json = [
        "Url" => $url,
        "Final" => true
    ];

    die(json_encode($json, JSON_UNESCAPED_SLASHES));
}
?>
