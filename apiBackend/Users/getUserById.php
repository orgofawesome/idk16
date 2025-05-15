<?php

$stmt = $authPDO->prepare("SELECT id,name FROM users WHERE id = ?");
$stmt->bindParam(1, $vars['id'], PDO::PARAM_INT);
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