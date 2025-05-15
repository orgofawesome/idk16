<?php
$universeId = $_GET["universeid"];
try {
    $result = [
        "gameAvatarType" => "", // "PlayerChoice", "MorphToR6", "MorphToR15"
        "message" => "",
        "moderationStatus" => ""
    ];

    $stmt = $pdo->prepare("SELECT avatarSetting FROM assets WHERE universeId = :universeId AND isRootPlace = 1");
    $stmt->bindParam(":universeId", $universeId, PDO::PARAM_INT);
    $stmt->execute();
    
    if ($stmt->rowCount() === 0)
        throw new Exception("An error has occured. Please try again after some time.");

    $avatarType = $stmt->fetchColumn() ?? 0;

    $avatarTypes = [
        0 => "PlayerChoice",
        1 => "MorphToR6",
        2 => "MorphToR15"
    ];

    $result["gameAvatarType"] = $avatarTypes[$avatarType];
}
catch (Exception $e){
    $result = [
        "errors" => [
            [
                "code" => 0,
                "messsage" => $e->getMessage(),
                "userFacingMessage" => "Something went wrong"
            ]
        ]
            ];

    http_response_code(400);

    die(json_encode($result));
}

echo(json_encode($result));