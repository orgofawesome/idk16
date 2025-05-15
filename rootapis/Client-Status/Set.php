<?php
header("content-type: text/plain");

$allowedStatus = [ "Unknown", "AppStarted", "AcquiringGame", "JoiningGame", "InGame" ];
$clientStatus = $_GET["status"];

if (!in_array($clientStatus, $allowedStatus)){
    http_response_code(400);
    echo("false");
    die;
}

try {
    if ( !isset($_COOKIE["RBXEventTrackerV2"]) && !isset($_GET["browsertrackerid"]) ){
        throw new Exception("No tracking enabled");
    }

    //$browserTrackerId = $rbxEventTracker["browserid"] ?? $_GET["browsertrackerid"];
    $browserTrackerId = 0;
    $stmt = $authPDO->prepare("UPDATE clientstatus SET clientStatus = :currentStatus WHERE browserTrackerId = :browserId");
    $stmt->bindParam(':browserId', $browserTrackerId, PDO::PARAM_INT);
    $stmt->bindParam(':currentStatus', $clientStatus);
    if (!$stmt->execute()){
        throw new Exception("DB Error");
    };

    die("true");
}
catch (Exception $e){
    die("false");
}

?>