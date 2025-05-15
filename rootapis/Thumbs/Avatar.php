<?php

$x = (isset($_GET["x"])) ? $_GET["x"] : null;
$y = (isset($_GET["y"])) ? $_GET["y"] : null;

if (!isset($x))
{
    $x = (isset($_GET["width"])) ? $_GET["width"] : die(http_response_code(400));
}

if (!isset($y))
{
    $y = (isset($_GET["height"])) ? $_GET["height"] : die(http_response_code(400));
}

$userId = (isset($_GET["userid"])) ? $_GET["userid"] : null;

if ($userId == null){
    $userName = (isset($_GET["username"])) ? $_GET["username"] : null;
    $userId = UserAuthentication::lookupIdByUsername($userName);
    
    if ($userName == null){
        die("Not allowed");
    }
}

if (!is_numeric($x) || !is_numeric($y) || !is_numeric($userId)){
    http_response_code(400);
    die("Not allowed");
}

$userId = (int)$userId;

$allowed = [
    "30x30",
    "48x48",
    "60x60",
    "75x75",
    "100x100",
    "110x110",
    "140x140",
    "150x150",
    "200x200",
    "250x250",
    "352x352",
    "420x420",
    "720x720"
];

$chosen = $x . "x" . $y;

if (!in_array($chosen, $allowed)){
    http_response_code(400);
    die("Not allowed");
}

if (!$userLookup->doesUserExist($userId)){
    http_response_code(400);
    die("Not allowed");
}

$avatarResult = ThumbnailService::requestAvatarThumbnail( $userId, $x, $y);

if ($isJson)
{
    header("content-type: application/json");

    $json = [
        'Url' => $avatarResult,
        'Final' => true,
        'SubstitutionType' => 0
    ];

    die(json_encode($json, JSON_UNESCAPED_SLASHES));
}
else
{
    die(header("Location: $avatarResult"));
}


