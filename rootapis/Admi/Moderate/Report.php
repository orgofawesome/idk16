<?php
$pageName = "";
$time = time();

if (!$isUserAuthenticated)
    die(header("Location: https://www.$domain/request-error?code=403")); // Temporary until we get login returnurl

$adminStatus = $userInfo['adminStatus'];

if ($adminStatus == 0 || $adminStatus == null)
    die(header("Location: https://www.$domain/request-error?code=403"));

$reportType = [ 
    1 => "User (In-Game)"
];

$banTypes = [
    1 => "Remind",
    2 => "Warn",
    3 => "Ban 1 Day",
    4 => "Ban 3 Days",
    5 => "Ban 7 Days",
    6 => "Ban 14 Days",
    7 => "Account Deleted"
];

$ruleBreakTypes = [
    1 => "Profanity",
    2 => "Harassment", 
    3 => "Spam",
    4 => "Advertising",
    5 => "Scamming",
    6 => "Adult Content",
    7 => "Inappropriate",
    8 => "Privacy"
];

$stmt = $authPDO->prepare("SELECT * FROM reports WHERE id = :caseId");
$stmt->bindParam(':caseId', $_GET["id"]);
$stmt->execute();

if ($stmt->rowCount() == 0){
    die(header("Location: https://www.$domain/request-error?code=404"));
}

$report = $stmt->fetch(PDO::FETCH_ASSOC);

if (isset($_GET["action"])){
    switch ($_GET["action"]){
        case "close":
            $stmt = $authPDO->prepare("UPDATE reports SET resolved = 1 WHERE id = :caseId");
            $stmt->bindParam(':caseId', $_GET["id"]);
            $stmt->execute();

            die(header("Location: https://www.$domain/Admi/ModerateReport.aspx"));
            break;
    }
}

$reportMessages = json_decode($report["reportEvidence"]); 

$messageGuids = [];

foreach ($reportMessages as $message){
    $messageGuids[$message->id] = htmlspecialchars($message->message);
}

if ($report["resolved"]){
    die(header("Location: https://www.$domain/request-error?code=404"));
}

$stmt = $authPDO->prepare("SELECT moderated FROM users WHERE id = :userId");
$stmt->bindParam(':userId', $report["reportedId"]);
$stmt->execute();

if ($stmt->fetchColumn()){
    $importantNote = "The user reported currently is moderated, please view the moderation log at the bottom of the page for more information. Any action you may do here will override the currently active moderation.";
}

if (isset($_POST["id"])){
    switch ($case)
    {
        default:
            $userId = $_POST["id"] ?? 0;
            $modNote = $_POST["reason"] ?? "";
            $modId = $userInfo['id'];
            $banType = $_POST["modval"] ?? 0;
        
            $dates = [
                1 => $time,
                2 => $time,
                3 => $time + 86400,
                4 => $time + 259200,
                5 => $time + 604800,
                6 => $time + 1209600,
                7 => 2147483647
            ];
        
            if ($userId == 0 || $banType  == 0){
                $outcomeResult = "Failed to moderate user: You did not fill in all the required blanks.";
                break;
            }
        
            if (!$userLookup->doesUserExist($userId)){
                $outcomeResult = "Failed to moderate user: The user specified does not exist on IDK16.";
                break;
            }
        
            if ($userLookup->getPublicUserInfo("adminStatus", $userId) >= $adminStatus){
                $outcomeResult = "Failed to moderate user: The user specified is the same rank as you or higher.";
                break;
            }
        
            try {
                $authPDO->beginTransaction();
                $stmt = $authPDO->prepare("SELECT resolved FROM moderation WHERE userId = :userId ORDER BY moderationCase DESC LIMIT 1");
                $stmt->bindParam(':userId', $userId);
                $stmt->execute();
        
                if ( $stmt->rowCount() >= 1 ){
                    if ( $stmt->fetchColumn() == 0 ){
                        $stmt = $authPDO->prepare("UPDATE moderation SET resolved = 1, resolveType = 4, resolveBy = :modId WHERE userId = :userId ORDER BY moderationCase DESC LIMIT 1");
                        $stmt->bindParam(':userId', $userId);
                        $stmt->bindParam(':modId', $modId);
                        $stmt->execute();
                    }
                }

                $banEvidence = [];

                foreach ($_POST as $key => $value) {
                    if (is_string($key) && strpos($key, '{') === 0 && strrpos($key, '}') === strlen($key) - 1) {
                        $keyUpper = strtoupper($key);

                        $banEvidence[] = [
                            "type" => "message",
                            "id" => $keyUpper,
                            "content" => $messageGuids[$keyUpper],
                            "category" => intval($_POST[$key . "-type"])
                        ];
                    }
                }

                $banEvidence = json_encode($banEvidence);
                $stmt = $authPDO->prepare("INSERT INTO moderation (dateStart, dateEnd, banType, banEvidence, banReason, moderatorId, userId, linkedReport) VALUES (:dateStart, :dateEnd, :banType, :banEvidence, :banReason, :moderatorId, :userId, :reportId)");
                $stmt->bindParam(':dateStart', $time);
                $stmt->bindParam(':dateEnd', $dates[$banType] );
                $stmt->bindParam(':banType', $banType, PDO::PARAM_INT);
                $stmt->bindParam(':banEvidence', $banEvidence);
                $stmt->bindParam(':banReason', $modNote);
                $stmt->bindParam(':moderatorId', $modId);
                $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
                $stmt->bindParam(':reportId', $_GET["id"], PDO::PARAM_INT);
                $stmt->execute();
                $stmt = $authPDO->prepare("UPDATE users SET moderated = 1 WHERE id = :userId"); 
                $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
                $stmt->execute();
                        
                $outcomeResult = "You have successfully moderated the user. If there's no other action you want to do on this report, you may close on the bottom of the page.";
                $goodOutcome = true;
                $authPDO->commit();
                }catch(Exception $e){
                    $authPDO->rollBack();
                    $outcomeResult = "Failed to moderate user: An internal error has occurred. All actions done were prevented to avoid conflicts. {$e->getMessage()}";
                }
                break;
    }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <!-- MachineID: <?= $webServerName ?> -->
    <title>Report Moderation - <?= $domain ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,requiresActiveX=true" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="ROBLOX Corporation" />
<meta name="description" content="ROBLOX is powered by a growing community of over 300,000 creators who produce an infinite variety of highly immersive experiences. These experiences range from 3D multiplayer games and competitions, to interactive adventures where friends can take on new personas imagining what it would be like to be a dinosaur, a miner in a quarry or an astronaut on a space exploration." />
<meta name="keywords" content="free games, online games, building games, virtual worlds, free mmo, gaming cloud, physics engine" />

    
    

    <link rel="canonical" href="<?php echo "https". "://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"] ?>" />

            <link href="https://images.idk18.xyz/7aee41db80c1071f60377c3575a0ed87.ico" rel="icon" />
    


<link rel='stylesheet' href='https://static.idk18.xyz/css/MainCSS___58dd044044005dc0e887c80110c9a567_m.css/fetch' />
<link rel='stylesheet' href='https://static.idk18.xyz/css/page___d0a32d7530b30a6f5d85fd297f8b6898_m.css/fetch' />
    

        <script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js'></script>
<script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-1.11.1.js'><\/script>")</script>
<script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/jquery.migrate/jquery-migrate-1.2.1.min.js'></script>
<script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-migrate-1.2.1.js'><\/script>")</script>
<script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/4.0/1/MicrosoftAjax.js'></script>
<script type='text/javascript'>window.Sys || document.write("<script type='text/javascript' src='/js/Microsoft/MicrosoftAjax.js'><\/script>")</script>


<?php require_once("../includes/googleanalytics.php"); ?>


    <script type='text/javascript' src='https://js.idk18.xyz/54b73269bcd426ec956755cb8cac7033.js'></script>

<?php require_once("../includes/eventstreaminit.php"); ?>



<script type="text/javascript">
    if (Roblox && Roblox.PageHeartbeatEvent) {
        Roblox.PageHeartbeatEvent.Init([2,8,20,60]);
    }
</script>    
<script type='text/javascript' src='https://js.idk18.xyz/42ffb266402d8366444aa39d4fc517b9.js'></script>

   <?php require_once("../includes/configPaths.php"); ?>
   
   <script type='text/javascript' src='https://js.idk18.xyz/custom_ReferenceGenericConf.js'></script>
   

    
<?php require_once("../includes/jsErrorTrackerInit.php"); ?>


<?php require_once("../includes/modals/upsellAdModal.php"); ?>
<?php require_once("../getXrsfToken.php"); ?>
    <script type="text/javascript">
        Roblox.FixedUI.gutterAdsEnabled = false;
    </script>
    

    <script type="text/javascript">
        var Roblox = Roblox || {};
        Roblox.jsConsoleEnabled = false;
    </script>

<?php require_once("../includes/devConsoleWarning.php"); ?>

    <script type="text/javascript">
if (typeof(Roblox) === "undefined") { Roblox = {}; }
Roblox.Endpoints = Roblox.Endpoints || {};
Roblox.Endpoints.Urls = Roblox.Endpoints.Urls || {};
Roblox.Endpoints.Urls['/api/item.ashx'] = 'https://www.<?= $domain ?>/api/item.ashx';
Roblox.Endpoints.Urls['/asset/'] = 'https://assetgame.<?= $domain ?>/asset/';
Roblox.Endpoints.Urls['/client-status/set'] = 'https://www.<?= $domain ?>/client-status/set';
Roblox.Endpoints.Urls['/client-status'] = 'https://www.<?= $domain ?>/client-status';
Roblox.Endpoints.Urls['/game/'] = 'https://assetgame.<?= $domain ?>/game/';
Roblox.Endpoints.Urls['/game-auth/getauthticket'] = 'https://www.<?= $domain ?>/game-auth/getauthticket';
Roblox.Endpoints.Urls['/game/edit.ashx'] = 'https://assetgame.<?= $domain ?>/game/edit.ashx';
Roblox.Endpoints.Urls['/game/getauthticket'] = 'https://assetgame.<?= $domain ?>/game/getauthticket';
Roblox.Endpoints.Urls['/game/placelauncher.ashx'] = 'https://assetgame.<?= $domain ?>/game/placelauncher.ashx';
Roblox.Endpoints.Urls['/game/preloader'] = 'https://assetgame.<?= $domain ?>/game/preloader';
Roblox.Endpoints.Urls['/game/report-stats'] = 'https://assetgame.<?= $domain ?>/game/report-stats';
Roblox.Endpoints.Urls['/game/report-event'] = 'https://assetgame.<?= $domain ?>/game/report-event';
Roblox.Endpoints.Urls['/game/updateprerollcount'] = 'https://assetgame.<?= $domain ?>/game/updateprerollcount';
Roblox.Endpoints.Urls['/login/default.aspx'] = 'https://www.<?= $domain ?>/login/default.aspx';
Roblox.Endpoints.Urls['/my/character.aspx'] = 'https://www.<?= $domain ?>/my/character.aspx';
Roblox.Endpoints.Urls['/my/money.aspx'] = 'https://www.<?= $domain ?>/my/money.aspx';
Roblox.Endpoints.Urls['/chat/chat'] = 'https://www.<?= $domain ?>/chat/chat';
Roblox.Endpoints.Urls['/presence/users'] = 'https://www.<?= $domain ?>/presence/users';
Roblox.Endpoints.Urls['/presence/user'] = 'https://www.<?= $domain ?>/presence/user';
Roblox.Endpoints.Urls['/friends/list'] = 'https://www.<?= $domain ?>/friends/list';
Roblox.Endpoints.Urls['/navigation/getCount'] = 'https://www.<?= $domain ?>/navigation/getCount';
Roblox.Endpoints.Urls['/catalog/browse.aspx'] = 'https://www.<?= $domain ?>/catalog/browse.aspx';
Roblox.Endpoints.Urls['/catalog/html'] = 'https://search.<?= $domain ?>/catalog/html';
Roblox.Endpoints.Urls['/catalog/json'] = 'https://search.<?= $domain ?>/catalog/json';
Roblox.Endpoints.Urls['/catalog/contents'] = 'https://search.<?= $domain ?>/catalog/contents';
Roblox.Endpoints.Urls['/catalog/lists.aspx'] = 'https://search.<?= $domain ?>/catalog/lists.aspx';
Roblox.Endpoints.Urls['/asset-hash-thumbnail/image'] = 'https://assetgame.<?= $domain ?>/asset-hash-thumbnail/image';
Roblox.Endpoints.Urls['/asset-hash-thumbnail/json'] = 'https://assetgame.<?= $domain ?>/asset-hash-thumbnail/json';
Roblox.Endpoints.Urls['/asset-thumbnail-3d/json'] = 'https://assetgame.<?= $domain ?>/asset-thumbnail-3d/json';
Roblox.Endpoints.Urls['/asset-thumbnail/image'] = 'https://assetgame.<?= $domain ?>/asset-thumbnail/image';
Roblox.Endpoints.Urls['/asset-thumbnail/json'] = 'https://assetgame.<?= $domain ?>/asset-thumbnail/json';
Roblox.Endpoints.Urls['/asset-thumbnail/url'] = 'https://assetgame.<?= $domain ?>/asset-thumbnail/url';
Roblox.Endpoints.Urls['/asset/request-thumbnail-fix'] = 'https://assetgame.<?= $domain ?>/asset/request-thumbnail-fix';
Roblox.Endpoints.Urls['/avatar-thumbnail-3d/json'] = 'https://www.<?= $domain ?>/avatar-thumbnail-3d/json';
Roblox.Endpoints.Urls['/avatar-thumbnail/image'] = 'https://www.<?= $domain ?>/avatar-thumbnail/image';
Roblox.Endpoints.Urls['/avatar-thumbnail/json'] = 'https://www.<?= $domain ?>/avatar-thumbnail/json';
Roblox.Endpoints.Urls['/avatar-thumbnails'] = 'https://www.<?= $domain ?>/avatar-thumbnails';
Roblox.Endpoints.Urls['/avatar/request-thumbnail-fix'] = 'https://www.<?= $domain ?>/avatar/request-thumbnail-fix';
Roblox.Endpoints.Urls['/bust-thumbnail/json'] = 'https://www.<?= $domain ?>/bust-thumbnail/json';
Roblox.Endpoints.Urls['/group-thumbnails'] = 'https://www.<?= $domain ?>/group-thumbnails';
Roblox.Endpoints.Urls['/groups/getprimarygroupinfo.ashx'] = 'https://www.<?= $domain ?>/groups/getprimarygroupinfo.ashx';
Roblox.Endpoints.Urls['/headshot-thumbnail/json'] = 'https://www.<?= $domain ?>/headshot-thumbnail/json';
Roblox.Endpoints.Urls['/item-thumbnails'] = 'https://www.<?= $domain ?>/item-thumbnails';
Roblox.Endpoints.Urls['/outfit-thumbnail/json'] = 'https://www.<?= $domain ?>/outfit-thumbnail/json';
Roblox.Endpoints.Urls['/place-thumbnails'] = 'https://www.<?= $domain ?>/place-thumbnails';
Roblox.Endpoints.Urls['/thumbnail/asset/'] = 'https://www.<?= $domain ?>/thumbnail/asset/';
Roblox.Endpoints.Urls['/thumbnail/avatar-headshot'] = 'https://www.<?= $domain ?>/thumbnail/avatar-headshot';
Roblox.Endpoints.Urls['/thumbnail/avatar-headshots'] = 'https://www.<?= $domain ?>/thumbnail/avatar-headshots';
Roblox.Endpoints.Urls['/thumbnail/user-avatar'] = 'https://www.<?= $domain ?>/thumbnail/user-avatar';
Roblox.Endpoints.Urls['/thumbnail/resolve-hash'] = 'https://www.<?= $domain ?>/thumbnail/resolve-hash';
Roblox.Endpoints.Urls['/thumbnail/place'] = 'https://www.<?= $domain ?>/thumbnail/place';
Roblox.Endpoints.Urls['/thumbnail/get-asset-media'] = 'https://www.<?= $domain ?>/thumbnail/get-asset-media';
Roblox.Endpoints.Urls['/thumbnail/remove-asset-media'] = 'https://www.<?= $domain ?>/thumbnail/remove-asset-media';
Roblox.Endpoints.Urls['/thumbnail/set-asset-media-sort-order'] = 'https://www.<?= $domain ?>/thumbnail/set-asset-media-sort-order';
Roblox.Endpoints.Urls['/thumbnail/place-thumbnails'] = 'https://www.<?= $domain ?>/thumbnail/place-thumbnails';
Roblox.Endpoints.Urls['/thumbnail/place-thumbnails-partial'] = 'https://www.<?= $domain ?>/thumbnail/place-thumbnails-partial';
Roblox.Endpoints.Urls['/thumbnail_holder/g'] = 'https://www.<?= $domain ?>/thumbnail_holder/g';
Roblox.Endpoints.Urls['/users/{id}/profile'] = 'https://www.<?= $domain ?>/users/{id}/profile';
Roblox.Endpoints.Urls['/service-workers/push-notifications'] = 'https://www.<?= $domain ?>/service-workers/push-notifications';
Roblox.Endpoints.Urls['/notification-stream/notification-stream-data'] = 'https://www.<?= $domain ?>/notification-stream/notification-stream-data';
Roblox.Endpoints.Urls['/api/friends/acceptfriendrequest'] = 'https://www.<?= $domain ?>/api/friends/acceptfriendrequest';
Roblox.Endpoints.Urls['/api/friends/declinefriendrequest'] = 'https://www.<?= $domain ?>/api/friends/declinefriendrequest';
Roblox.Endpoints.addCrossDomainOptionsToAllRequests = true;
</script>

    <script type="text/javascript">
if (typeof(Roblox) === "undefined") { Roblox = {}; }
Roblox.Endpoints = Roblox.Endpoints || {};
Roblox.Endpoints.Urls = Roblox.Endpoints.Urls || {};
</script>


</head>
<body id="rbx-body"
      class=""
      data-performance-relative-value="0.005"
      data-internal-page-name=""
      data-send-event-percentage="0.01">
<?php require_once("../includes/robloxlinkify.php"); ?>
<div id="image-retry-data"
     data-image-retry-max-times="10"
     data-image-retry-timer="1500">
</div>
<div id="http-retry-data"
     data-http-retry-max-timeout="0"
     data-http-retry-base-timeout="0">
</div>
    




<div id="fb-root"></div>

<div class="nav-container no-gutter-ads">




<?php require_once("../includes/header.php"); ?>

<script type="text/javascript">
    var Roblox = Roblox || {};
    (function() {
        if (Roblox && Roblox.Performance) {
            Roblox.Performance.setPerformanceMark("navigation_end");
        }
    })();
</script>

    <div id="navContent" class="nav-content">
        <div class="nav-content-inner">

    <div id="Container">
        <div style="clear: both"></div>
        
        <div id="Body" class="simple-body">
        <h1>Moderate Report</h1>
        <?php if (!isset($_POST["id"]) && isset($importantNote)): ?>
            <p>
                <span class="status-error"><?= $importantNote ?></span>
            </p>
        <?php endif; ?>
        <?php if (isset($_POST["id"]) && $goodOutcome): ?>
            <p>
                <span class="status-confirm"><?= $outcomeResult ?></span>
            </p>
            <?php elseif (isset($_POST["id"])): ?>
            <p>
                <span class="status-error"><?= $outcomeResult ?></span>
            </p>
        <?php endif; ?>
            <div class="text" style="margin:12px">
            <p>If you're here, you're presumably trying to moderate a specific user report. Well done for doing your job!</p>
            </div> <!-- IMPORTANT TO REMEMBER - EVEN IF MOD ACTIONS ARE TAKEN, REPORT TICKETS SHOULD NOT CLOSE UNTIL CLOSE TICKET IS PRESSED AT THE BOTTOM!!!!!! -->
            <div class="dark-box" style="margin:15px">
            <h3>Report Details</h3>
            <br>
            All available details of your selected report <!-- keyed in from the ID parameter... do some PHP wizardry diego... --> are available below, as is the ability to moderate the user and/or game.
            <table class="table" cellpadding="0" cellspacing="0" border="0" style="font-size:14px;width:100%;">
            <tbody>
                <tr class="table-header">
                <th class="first">Report ID</th>
                <th>Reported Material</th>
                <th>Report Type</th>
                <th>Reported By</th>
                <th>Category</th>
                <th>Message</th>
                <?php if ($report["reportType"] <= 2): ?>
                <th>Place</th>
                <th>Server Id</th>
                <?php endif; ?>
                </tr>
                <tr>
                <?php
                $reportDescription = htmlspecialchars($report["reportReason"]);
                $reportCategory = htmlspecialchars($report["reportCategory"]);
                $reporter = "<a href='https://www.idk18.xyz/users/{$report['reporter']}/profile'>" . UserAuthentication::lookupNameById($report["reporter"]) . " ({$report['reporter']})</a>";
                $reported = "<a href='https://www.idk18.xyz/users/{$report['reportedId']}/profile'>" . UserAuthentication::lookupNameById($report["reportedId"]) . " ({$report['reportedId']})</a>";
                ?>
                <td><?= $report["id"] ?></td>
                <td><?= $reported ?></td>
                <td><?= $reportType[$report["reportType"]] ?></td>
                <td><?= $reporter ?></td>
                <td><?= $reportCategory ?></td>
                <td><?= $reportDescription ?></td>
                <?php if ($report["reportType"] <= 2): ?>
                <td><?= $report["placeId"] ?></td>
                <td><?= $report["jobId"] ?></td>
                <?php endif; ?>
                </tr>
            </tbody>
            </table>
            </div>

            <div class="dark-box" style="margin:15px">
            <h3>Actions Taken</h3>
            <br>
            All the actions taken regarding this report are shown here.
            <table class="table" cellpadding="0" cellspacing="0" border="0" style="font-size:14px;width:100%;">
            <tbody>
                <tr class="table-header">
                <th class="first">Abuser</th>
                <th>Mod Action</th>
                <th>Mod Note</th>
                <th>Other</th>
                </tr>

                <?php

                $stmt = $authPDO->prepare("SELECT * FROM moderation WHERE linkedReport = :reportId");
                $stmt->bindParam(':reportId', $_GET["id"], PDO::PARAM_INT);
                $stmt->execute();

                foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $moderation){
                    $reported = "<a href='https://www.idk18.xyz/users/{$moderation['userId']}/profile'>" . UserAuthentication::lookupNameById($moderation["userId"]) . " ({$moderation['userId']})</a>";
                    $modAction = $banTypes[$moderation["banType"]];
                    $modNote = htmlspecialchars($moderation["banReason"]);
                    echo "<tr>
                            <td>{$reported}</td>
                            <td>{$modAction}</td>
                            <td>{$modNote}</td>
                            <td></td>";
                }
                ?>

            </tbody>
            </table>
            </div>

            <form action="" method="post">
            <div class="dark-box" style="margin:15px"> <!-- As we discussed this should only be visible to begin with if the report has been made from In-Game. -->
            <h3>In-Game Chat Logs</h3>
            <br>
            <?php
            if (count($reportMessages) == 0): ?>
            Nobody said anything in the chat, at least prior to this report.
            <?php else: ?>
            Since this report was submitted from within a game, the 30 most recent messages have been collated below. This may enable you to make wider-reaching moderation decisions, particularly if several users are involved. Please note that this chat is in correct order (Beginning to End)
            <table class="table" cellpadding="0" cellspacing="0" border="0" style="font-size:14px;width:100%;">
            <tbody>
                <tr class="table-header">
                <th class="first">User</th>
                <th style="width:80%">Message</th>
                <th>Use</th>
                <th>Rule Broken</th>
                </tr>
                <?php 
                    foreach ($reportMessages as $messageLog){
                        $message = htmlspecialchars($messageLog->message);
                        $userId = "<a href='https://www.idk18.xyz/users/{$messageLog->userId}/profile'>" . UserAuthentication::lookupNameById($messageLog->userId) . " ({$messageLog->userId})</a>";

                        if ($messageLog->userId == $report['reportedId']){
                            $additional = "<td><input type='checkbox' id='{$messageLog->id}' name='{$messageLog->id}' value='1'></td>
                                           <td><select class='form-select' id='{$messageLog->id}-Type' name='{$messageLog->id}-Type' disabled>
                                           <option value=1>Profanity</option>
                                           <option value=2>Harassment</option>
                                           <option value=3>Spam</option>
                                           <option value=4>Advertisement</option>
                                           <option value=5>Scamming</option>
                                           <option value=6>Adult Content</option>
                                           <option value=7>Inappropriate</option>
                                           <option value=8>Privacy</option>
                                           </select></td>
                                           
                                            <script>
                                            document.getElementById('{$messageLog->id}').addEventListener('change', function() {
                                                document.getElementById('{$messageLog->id}-Type').disabled = !this.checked;
                                            });
                                            </script>
";
                        }else
                            $additional = "";

                        echo"<tr>
                        <td>{$userId}</td>
                        <td>{$message}</td>
                        $additional
                        </tr>
                        ";
                    }
                ?>
            </tbody>
            </table>
            <?php endif; ?>
            </div>

            <div class="dark-box" style="margin:15px"> <!-- Only show if a user has been reported. -->
            <h3>User Moderation</h3>
            <br>
            Since the report concerns a specific user, you can choose to moderate them below:
            <div style="min-height: 30px;">
            <span class="form-label" style="float:left;padding-top:5px;margin-right:5px;">User:</span>
            <div style="float: left; width: 80px; text-align:left;">
                <input type="hidden" id="id" name="id" value="<?= $report["reportedId"] ?>" />
                <span class="form-label" style="float:left;padding-top:5px;margin-right:5px;"><?php echo "<a href='https://www.idk18.xyz/users/{$report["reportedId"]}/profile'>" . UserAuthentication::lookupNameById($report["reportedId"]) . " ({$report["reportedId"]})</a>" ?></span>
            </div>
            <span class="form-label" style="float:left;padding-top:2px;margin-right:5px;">Moderation Action</span>
            <div style="float: left; width: 183px; text-align:left;">
                <select class="form-select" id="modval" name="modval">
                <option value=1>Reminder</option>
                <option value=2>Warn</option>
                <option value=3>Ban 1 Day</option>
                <option value=4>Ban 3 Days</option>
                <option value=5>Ban 7 Days</option>
                <option value=6>Ban 14 Days</option>
                <option value=7>Delete</option>
                <!--option value="Poison">Poison</option-->
                </select>
            </div>
            <span class="form-label" style="float:left;padding-top:5px;margin-right:5px;">Moderation Reason</span>
            <div style="float: left; width: 183px; text-align:left;">
                <input type="text" class="text-box text-box-large" id="reason" name="reason" value="" style="width:183px;" />
            </div>
            <br>
            <br>
            <hr>
            <input type="submit" value="Submit" class="btn-small btn-primary">
            </div>
            </form>
            </div>

            <?php /*
            <div class="dark-box" style="margin:15px"> <!-- Only show if an asset/game has been reported. -->
            <h3>Asset Moderation</h3>
            <br>
            Since an asset has been reported, you can choose to action it if the report is valid.
            <br>
            <table class="table" cellpadding="0" cellspacing="0" border="0" style="font-size:14px;width:100%;">
            <tbody>
                <tr class="table-header">
                <th class="first">AssetId</th>
                <th>Asset Name</th>
                <th>Asset Description</th>
                <th>Type of Asset</th>
                </tr>
                <tr>
                <td>1</td>
                <td>Baseplate</td>
                <td>This will become a studio template for idk16 Studio. </td>
                <td>Place</td>
                </tr>
            </tbody>
            </table>
            <br>
            <span class="form-label" style="float:left;margin-right:5px;">Actions:</span><br>
            <a href=""><span class="btn-control btn-control-large" style="margin:5px">Reset name and description</span></a><br>
            <a href=""><span class="btn-control btn-control-large" style="margin:5px">Place under review</span></a> (places only)<br>
            <a href=""><span class="btn-control btn-control-large" style="margin:5px">Reset entire asset</span></a> (remains open but changed to deleted image - for places, this is Starter place, for models it's the red truss, anything else is deleted)
            </div>
            */ ?>

                <div class="dark-box" style="margin:15px">
                <h3>Moderation Log for the Reported User</h3>
                <table class="table" cellpadding="0" cellspacing="0" border="0" style="font-size:14px;width:100%;">
                <tbody>
                <tr class="table-header">
                <th class="first">Case ID</th>
                <th>Moderator Note</th>
                <th>Moderator</th>
                <th>Type</th>
                <th>Start</th>
                <th>End</th>
                <th>Active</th>
                <th>Revocation Cause</th>
                <th>Revoked By</th>
                
                </tr>
                <?php
                $stmt = $authPDO->prepare("SELECT * FROM moderation WHERE userId = :userId ORDER BY moderationCase DESC LIMIT 20");
                $stmt->bindParam(':userId', $report["reportedId"]);
                $stmt->execute();

                foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $modCase){
                    $banStart = date( "n/j/Y", $modCase["dateStart"] );
                    $banEnd = ($modCase["banType"] <= 2 || $modCase["banType"] == 7) ? "N/A" : date( "n/j/Y", $modCase["dateEnd"] );
                    $activeCase = ($modCase["resolved"] == 0) ? "Yes" : "No";
                    $modNote = htmlspecialchars($modCase["banReason"]);
                    $moderatedName = htmlspecialchars(UserAuthentication::lookupNameById($modCase['userId']));
                    $moderatorName = htmlspecialchars(UserAuthentication::lookupNameById($modCase['moderatorId']));
                    $revokedBy = ($modCase["resolveBy"] == NULL) ? "N/A" : "<a href='https://www.$domain/users/{$modCase['resolveBy']}/profile'>" . htmlspecialchars(UserAuthentication::lookupNameById($modCase['resolveBy'])) . " ({$modCase['resolveBy']})</a>";
                    
                    if ($modCase["resolved"] && $modCase["resolveType"] == null)
                        $revokeReason = "Ban Expire";
                    else
                        $revokeReason = ($modCase["resolveType"] == NULL) ? "N/A" : $moderationResolveTypes[$modCase["resolveType"]];


                    echo "<tr>
                    <td>{$modCase['moderationCase']}</td>
                    <td>{$modNote}</td>
                    <td><a href='https://www.$domain/users/{$modCase['moderatorId']}/profile'>{$moderatorName} ({$modCase['moderatorId']})</td>
                    <td>{$banTypes[$modCase['banType']]}</td>
                    <td>{$banStart}</td>
                    <td>{$banEnd}</td>
                    <td>{$activeCase}</td>
                    <td>{$revokeReason}</td>
                    <td>{$revokedBy}</td>
                    </tr>";
                }
                ?>
                </tbody>
                </table>
            </div>

            <div class="dark-box" style="margin:15px">
                <h3>Moderation Log for the Reporter</h3>
                <table class="table" cellpadding="0" cellspacing="0" border="0" style="font-size:14px;width:100%;">
                <tbody>
                <tr class="table-header">
                <th class="first">Case ID</th>
                <th>Moderator Note</th>
                <th>Moderator</th>
                <th>Type</th>
                <th>Start</th>
                <th>End</th>
                <th>Active</th>
                <th>Revocation Cause</th>
                <th>Revoked By</th>
                
                </tr>
                <?php
                $stmt = $authPDO->prepare("SELECT * FROM moderation WHERE userId = :userId ORDER BY moderationCase DESC LIMIT 20");
                $stmt->bindParam(':userId', $report["reporter"]);
                $stmt->execute();

                foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $modCase){
                    $banStart = date( "n/j/Y", $modCase["dateStart"] );
                    $banEnd = ($modCase["banType"] <= 2 || $modCase["banType"] == 7) ? "N/A" : date( "n/j/Y", $modCase["dateEnd"] );
                    $activeCase = ($modCase["resolved"] == 0) ? "Yes" : "No";
                    $modNote = htmlspecialchars($modCase["banReason"]);
                    $moderatedName = htmlspecialchars(UserAuthentication::lookupNameById($modCase['userId']));
                    $moderatorName = htmlspecialchars(UserAuthentication::lookupNameById($modCase['moderatorId']));
                    $revokedBy = ($modCase["resolveBy"] == NULL) ? "N/A" : "<a href='https://www.$domain/users/{$modCase['resolveBy']}/profile'>" . htmlspecialchars(UserAuthentication::lookupNameById($modCase['resolveBy'])) . " ({$modCase['resolveBy']})</a>";
                    
                    if ($modCase["resolved"] && $modCase["resolveType"] == null)
                        $revokeReason = "Ban Expire";
                    else
                        $revokeReason = ($modCase["resolveType"] == NULL) ? "N/A" : $moderationResolveTypes[$modCase["resolveType"]];


                    echo "<tr>
                    <td>{$modCase['moderationCase']}</td>
                    <td>{$modNote}</td>
                    <td><a href='https://www.$domain/users/{$modCase['moderatorId']}/profile'>{$moderatorName} ({$modCase['moderatorId']})</td>
                    <td>{$banTypes[$modCase['banType']]}</td>
                    <td>{$banStart}</td>
                    <td>{$banEnd}</td>
                    <td>{$activeCase}</td>
                    <td>{$revokeReason}</td>
                    <td>{$revokedBy}</td>
                    </tr>";
                }
                ?>
                </tbody>
                </table>
            </div>
            <div class="dark-box" style="margin:15px">
                <h3>Other reports made by the Reporter</h3>
                <table class="table" cellpadding="0" cellspacing="0" border="0" style="font-size:14px;width:100%;">
                <tbody>
                <tr class="table-header">
                <th class="first">Report ID</th>
                <th>Reported Material</th>
                <th>Type of Report</th>
                <th>Reported By</th>
                <th>Report Category</th>
                <th>Report Message</th>
                <th>Resolved</th>
                <th>Actions</th>
                </tr>
                <?php 

                $stmt = $authPDO->prepare("SELECT * FROM reports WHERE reporter = :userId AND id != :caseId ORDER BY id LIMIT 30");
                $stmt->bindParam(':userId', $report["reporter"]);
                $stmt->bindParam(':caseId', $report["id"]);
                $stmt->execute();

                foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $report2){
                    $reportDescription = htmlspecialchars($report2["reportReason"]);
                    $reportCategory = htmlspecialchars($report2["reportCategory"]);
                    $reporter = "<a href='https://www.idk18.xyz/users/{$report2['reporter']}/profile'>" . UserAuthentication::lookupNameById($report2["reporter"]) . " ({$report2['reporter']})</a>";
                    $reported = "<a href='https://www.idk18.xyz/users/{$report2['reportedId']}/profile'>" . UserAuthentication::lookupNameById($report2["reportedId"]) . " ({$report2['reportedId']})</a>";
                    $resolved = ($report2["resolved"]) ? "Yes" : "No";
                    echo"<tr>
                    <td>{$report2["id"]}</td>
                    <td>{$reported}</td>
                    <td>{$reportType[$report['reportType']]}</td>
                    <td>{$reporter}</td>
                    <td>{$reportCategory}</td>
                    <td>{$reportDescription}</td>
                    <td>{$resolved}</td>
                    <td><a href='/Admi/Moderate/Report.aspx?ID={$report2["id"]}'>Moderate</a></td>
                    </tr>";
                }
                ?>
                </tbody>
                </table>
            </div>
            <div class="dark-box" style="margin:15px">
                <h3>Reports made by the Reported User</h3>
                <table class="table" cellpadding="0" cellspacing="0" border="0" style="font-size:14px;width:100%;">
                <tbody>
                <tr class="table-header">
                <th class="first">Report ID</th>
                <th>Reported Material</th>
                <th>Type of Report</th>
                <th>Reported By</th>
                <th>Report Category</th>
                <th>Report Message</th>
                <th>Resolved</th>
                <th>Actions</th>
                </tr>
                <?php 

                $stmt = $authPDO->prepare("SELECT * FROM reports WHERE reporter = :userId ORDER BY id LIMIT 30");
                $stmt->bindParam(':userId', $report["reportedId"]);
                $stmt->execute();

                foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $report2){
                    $reportDescription = htmlspecialchars($report2["reportReason"]);
                    $reportCategory = htmlspecialchars($report2["reportCategory"]);
                    $reporter = "<a href='https://www.idk18.xyz/users/{$report2['reporter']}/profile'>" . UserAuthentication::lookupNameById($report2["reporter"]) . " ({$report2['reporter']})</a>";
                    $reported = "<a href='https://www.idk18.xyz/users/{$report2['reportedId']}/profile'>" . UserAuthentication::lookupNameById($report2["reportedId"]) . " ({$report2['reportedId']})</a>";
                    $resolved = ($report2["resolved"]) ? "Yes" : "No";
                    echo"<tr>
                    <td>{$report2["id"]}</td>
                    <td>{$reported}</td>
                    <td>{$reportType[$report2['reportType']]}</td>
                    <td>{$reporter}</td>
                    <td>{$reportCategory}</td>
                    <td>{$reportDescription}</td>
                    <td>{$resolved}</td>
                    <td><a href='/Admi/Moderate/Report.aspx?ID={$report2["id"]}'>Moderate</a></td>
                    </tr>";
                }
                ?>
                </tbody>
                </table>
            </div>
            <div class="dark-box" style="margin:15px">
            <h3><a href="/Admi/Moderate/Report.aspx?ID=<?= $report["id"] ?>&action=close" style="color:-webkit-link">Close Ticket</a></h3> <!-- after closing, should redirect back to /Admi -->
            </div>
        </div>
            <?php require_once("../includes/footer.php"); ?>



    </div>
        </div></div>
</div> 




<?php require_once("../includes/placelauncher.php"); ?>

<?php require_once("../includes/modals/legacygenericconfirmationmodal.php"); ?>



<?php require_once("../includes/cookieupgrader.php"); ?>
</body>
</html>
