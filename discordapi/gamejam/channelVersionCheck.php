<?php
/*
function newChannelFound( $channel )
{
    global $time;
    $webHookUrl = 'https://discord.com/api/webhooks/1355372760238657678/yq1T5im5pqsVXj4GrQOL_1q3j_D4oY80jXnDkMPrYUaV70rCHHTNLDTJuMyI1Fm5T8gl';

    $json = [
        'title' => "New Channel Added",
        'fields' => [
            [
                'name' => "Channel Name",
                'value' => $channel
            ]
        ],
        'color' => 1819396
    ];

    $upload_json = [
        'username' => 'Channel Tracker',
        'embeds' => [ $json ]
    ];

    $upload_json = json_encode($upload_json, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    // cURL setup
    $ch = curl_init($webHookUrl);
    print($upload_json);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $upload_json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute request
    $response = curl_exec($ch);
    curl_close($ch);
}

function sendDiscord( $action, $name, $value = 0, $channel, $olderValue = 0 )
{
    global $time;
    $webHookUrl = 'https://discord.com/api/webhooks/1355359209864167594/Qh-5nvZ4YGEY7OnMLt0_pmmgMuakzEOc4qvD3UPxiRf0wJYeHnWF_kCghBk54TDtOdiQ';

    $json = [
        'title' => "",
        'description' => "Channel Name: $channel",
        'fields' => [
        ],
        'color' => ""
    ];

    switch ( $action )
    {
        case 1:
            $json['title'] = "New Channel Flag Found!";
            $json['color'] = 1819396;

            $json['fields'][] = [
                'name' => "Flag Name: $name",
                'value' => "Flag Value: $value"
            ];

            break;

        case 2:
            $json['title'] = "Channel Flag was Modified";
            $json['color'] = 16042240;

            $json['fields'][] = [
                'name' => "Flag Name: $name",
                'value' => "Flag Value: $value"
            ];

            $json['fields'][] = [
                'name' => "Previous Value:",
                'value' => $olderValue
            ];

            break;

        case 3:
            $json['title'] = "Channel Flag was Removed";
            $json['color'] = 16056320;

            $json['fields'][] = [
                'name' => "Flag Name:",
                'value' => $name
            ];

            $json['fields'][] = [
                'name' => "Previous Value:",
                'value' => $olderValue
            ];

            break;
    }

    $upload_json = [
        'username' => 'Flag Tracker [Channels]',
        'embeds' => [ $json ]
    ];

    $upload_json = json_encode($upload_json, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    // cURL setup
    $ch = curl_init($webHookUrl);
    print($upload_json);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $upload_json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute request
    $response = curl_exec($ch);
    curl_close($ch);
}
*/

function gameJamConnectDatabase($dsn, $username, $password, $options) 
{
    try {
        $pdo = new PDO($dsn, $username, $password, $options);
        return $pdo;
    } catch (Exception $e) {
        // Log connection error or perform some action
        return false;
    }
}

$dsn = 'mysql:host=10.144.90.143;port=3305;dbname=robloxtrack';
$username = 'root';
$password = 'TiTVKKO(0de@fzr7';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

$pdo = gameJamConnectDatabase($dsn, $username, $password, $options);
$time = time();

header("Content-Type: application/json");
$jsonResponse = [
    'success' => false
];

try {
    $url = "https://clientsettings.roblox.com/v2/settings/application/CommerceFrontend/bucket/{$channel['channelName']}";
    $channelName = $_GET["channel"];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $json = json_decode($response, true);

    $stmt = $pdo->prepare("SELECT * FROM flags WHERE channelName = :channelName AND isDeleted = 0 ORDER BY timeFound DESC");
    $stmt->execute([ ':channelName' => $channelName ]);
    $flags = [];
    $isFirstTime = ( $stmt->rowCount() == 0 ) ? true : false;

    foreach ( $stmt->fetchAll(PDO::FETCH_ASSOC) as $flagSet )
    {
        $flagName = $flagSet['flagName'];
        $flagValue = $flagSet['flagValue'];

        if ( !isset( $flags[$flagName] ) )
        {
            $flags[$flagName] = $flagValue;
        }
    }

    if ( isset( $json['applicationSettings'] ) ) {
        $flagsProcessed = [];

        foreach( $json['applicationSettings'] as $flagName => $flagValue )
        {
            $dealtWith = false;
            
            $flagsProcessed[] = $flagName;

            if ( !isset( $flags[$flagName] ) )
            {
                // New Channel
                $dealtWith = true;
                
                if ( !$isFirstTime )
                    $jsonResponse['informNew'][] = [ 
                        'FlagName' => $flagName,
                        'FlagValue' => $flagValue,
                        'PreviousValue' => null
                    ];

                $stmt = $pdo->prepare( "INSERT INTO flags (flagName, flagValue, timeFound, channelName) VALUES (:flagName, :flagValue, :timeFound, :channelName)");
                $stmt->execute([ ':flagName' => $flagName, ':flagValue' => $flagValue, ':timeFound' => $time, ':channelName' => $channel['channelName'] ]);
            }

            if ( $dealtWith == false && $flags[$flagName] !== $flagValue )
            {
                // Modified flag
                $dealtWith = true;

                if ( !$isFirstTime )
                    $jsonResponse['informMod'][] = [ 
                        'FlagName' => $flagName,
                        'FlagValue' => $flagValue,
                        'PreviousValue' => $flags[$flagsName]
                    ];

                $stmt = $pdo->prepare( "INSERT INTO flags (flagName, flagValue, timeFound, channelName) VALUES (:flagName, :flagValue, :timeFound, :channelName)");
                $stmt->execute([ ':flagName' => $flagName, ':flagValue' => $flagValue, ':timeFound' => $time, ':channelName' => $channel['channelName'] ]);
            }
        }

        foreach( $flags as $flagName => $flagValue )
        {
            if ( !in_array( $flagName, $flagsProcessed ) )
            {
                if ( !$isFirstTime )
                    $jsonResponse['informGone'][] = [ 
                        'FlagName' => $flagName,
                        'FlagValue' => null,
                        'PreviousValue' => $flagValue
                    ];

                $stmt = $pdo->prepare( "UPDATE flags SET isDeleted = 1 WHERE channelName = :channelName AND flagName = :flagName");
                $stmt->execute([ ':flagName' => $flagName, ':channelName' => $channel['channelName'] ]);
            }
        }
    }

    $jsonResponse['success'] = true;
} 
catch (Exception $e)
{
    $jsonResponse['message'] = $e->getMessage();
}

die(json_encode($jsonResponse));
?>