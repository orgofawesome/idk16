<?php
// Get the raw POST data
$reportData = file_get_contents("php://input");

try {
    $xml = new SimpleXMLElement($reportData);
} catch (Exception $e) {
    die(http_response_code(400));
}

// Retrieve the value of the <comment> element
$comment = (string)$xml->comment;

// Find the positions of the first two semicolons
$firstSemicolonPos = strpos($comment, ';');
$secondSemicolonPos = strpos($comment, ';', $firstSemicolonPos + 1);

// Ensure both semicolons are found
if ($firstSemicolonPos !== false && $secondSemicolonPos !== false) {
    // Extract parts based on the semicolon positions
    $abuserIdPart = substr($comment, 0, $firstSemicolonPos);
    $reportCategory = substr($comment, $firstSemicolonPos + 1, $secondSemicolonPos - $firstSemicolonPos - 1);
    $reportReason = substr($comment, $secondSemicolonPos + 1);

    // Trim whitespace from each part
    $abuserIdPart = trim($abuserIdPart);
    $reportCategory = trim($reportCategory);
    $reportReason = trim($reportReason);

    // Remove 'AbuserID:' prefix to get the actual AbuserID
    $abuserId = str_replace('AbuserID:', '', $abuserIdPart);
} else {
    die(http_response_code(400));
}

if ($abuserId == "0"){
    die(http_response_code(400));
}

$messages = [];

foreach ($xml->messages->message as $message) {
    $userID = (string)$message['userID'];
    $messageID = (string)$message['guid'];
    $messageText = (string)$message;
    
    $messages[] = [ "userId" => $userID, "message" => $messageText, "id" => $messageID ];
}

$messages = array_reverse($messages);
$messages = json_encode($messages);

$stmt = $authPDO->prepare("INSERT INTO reports (reportType, reportedId, reportedType, reportCategory, reportReason, reportEvidence, reporter, placeId, jobId, reportTime) VALUES (1, :userId, 1, :reportCategory, :reportReason, :messages, :reporter, :placeId, :jobId, :reportTime)");
$stmt->bindParam(':userId', $abuserId);
$stmt->bindParam(':reportCategory', $reportCategory);
$stmt->bindParam(':reportReason', $reportReason);
$stmt->bindParam(':messages', $messages); 
$stmt->bindParam(':reporter', $xml["userID"]);
$stmt->bindParam(':placeId', $xml["placeID"]);
$stmt->bindParam(':jobId', $xml["gameJobID"]);
$stmt->bindValue(':reportTime', time());
$stmt->execute();
?>
