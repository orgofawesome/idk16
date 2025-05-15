<?php
header("Content-Type: text/plain");

# We don't need to do checks here because it is a trusted RCC instance
$userId = intval($_GET["userid"]);
$users = ",";

$userIds = explode("&otherUserIds=", $_SERVER["REQUEST_URI"]);
$count = 0;
foreach ($userIds as $x){
    $count++;

    if ($count !== 1){ 
        $x = intval($x);
        $array = [ $userId, $x ];
        sort($array);

        $statement = "{$array[0]}-{$array[1]}";
        $stmt = $authPDO->prepare("SELECT accepted FROM friendreq WHERE stmt = :statement");
        $stmt->bindParam(':statement', $statement);
        $stmt->execute();

        if ($stmt->rowCount() !== 0 && $stmt->fetchColumn() === 1){
            $users = "{$users}{$x},";
        }
    }
}

echo $users;

?>