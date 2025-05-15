<?php
$username = $_GET["username"]; // We need to check for malicious values on here just incase

$stmt = $authPDO->prepare("SELECT id,name FROM users WHERE name = ?");
$stmt->bindParam(1, $username, PDO::PARAM_STR);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
	
if (!$user) {
    http_response_code(400);
    echo json_encode([ 'success' => false, 'errorMessage' => "User not found" ]);
    return;
}
	
$user = [ 'Id' => $user["id"], 'Username' => $user["name"] ];
echo json_encode($user);
return;
?>