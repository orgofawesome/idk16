<?php
$pageName = "";
$time = time();

if (!$isUserAuthenticated){
    die(header("Location: https://www.$domain/login"));
}

if (!$userInfo["moderated"]){
    die(header("Location: https://www.$domain/home"));
}

$stmt = $authPDO->prepare("SELECT * FROM moderation WHERE userId = :userId ORDER BY moderationCase DESC LIMIT 1");
$stmt->bindValue(':userId', $userInfo["id"]);
$stmt->execute();

$resultData = $stmt->fetch(PDO::FETCH_ASSOC);

if ($stmt->rowCount() == 0){
    // This user does not have any moderation case for some weird reason, let's remove their moderated status
    resolveCase($userInfo["id"], false);

    die(header("Location: https://www.$domain/home"));
}

if (isset($_POST["ctl00_cphroblox_buttonagree"])){
    if ($resultData["resolved"] || $resultData["banType"] <= 2 || $resultData["dateEnd"] < $time){
        resolveCase($userInfo["id"], true);
        die(header("Location: https://www.$domain/home"));
    }
}



function resolveCase($userId, $doesUserHaveCase = true){
    global $authPDO;

    $stmt = $authPDO->prepare("UPDATE users SET moderated = 0 WHERE id = :userId");
    $stmt->bindValue(':userId', $userId);
    $stmt->execute();

    $stmt = $authPDO->prepare("SELECT resolved FROM moderation WHERE userId = :userId ORDER BY moderationCase DESC LIMIT 1");
    $stmt->bindValue(':userId', $userId);
    $stmt->execute();
    $resolvedCase = $stmt->fetchColumn();

    if ($doesUserHaveCase && !$resolvedCase){
        $stmt = $authPDO->prepare("UPDATE moderation SET resolved = 1 WHERE userId = :userId ORDER BY moderationCase DESC LIMIT 1");
        $stmt->bindValue(':userId', $userId);
        $stmt->execute();
    }

    return true;
}

$banTypes = [
    1 => "Reminder",
    2 => "Warning",
    3 => "Banned for 1 Day",
    4 => "Banned for 3 Days",
    5 => "Banned for 7 Days",
    6 => "Banned for 14 Days",
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


$banDetailed = [
    1 => 'Please abide by the <a href="">ROBLOX Community Guidelines</a> so that ROBLOX can be fun for users of all ages.',
    2 => 'Please abide by the <a href="">ROBLOX Community Guidelines</a> so that ROBLOX can be fun for users of all ages.',
    3 => "Your account has been disabled for 1 day. You may re-activate it after " . date( "n/j/Y g:i:s A", $resultData["dateEnd"] ) . ".",
    4 => "Your account has been disabled for 3 days. You may re-activate it after " . date( "n/j/Y g:i:s A", $resultData["dateEnd"] ) . ".",
    5 => "Your account has been disabled for 7 days. You may re-activate it after " . date( "n/j/Y g:i:s A", $resultData["dateEnd"] ) . ".",
    6 => 'Your account has been disabled for 14 days. You may re-activate it after ' . date( "n/j/Y g:i:s A", $resultData["dateEnd"] ) . ".",
    7 => 'Your account has been terminated.'
];

$banAppeal = [
    1 => 'You may re-activate your account by agreeing to our <a href="">Terms of Service</a>.',
    2 => 'You may re-activate your account by agreeing to our <a href="">Terms of Service</a>.',
    3 => 'If you wish to appeal, please send an email to <a href="mailto:idk@idk18.xyz">idk@idk18.xyz</a>.',
    4 => 'If you wish to appeal, please send an email to <a href="mailto:idk@idk18.xyz">idk@idk18.xyz</a>.',
    5 => 'If you wish to appeal, please send an email to <a href="mailto:idk@idk18.xyz">idk@idk18.xyz</a>.',
    6 => 'If you wish to appeal, please send an email to <a href="mailto:idk@idk18.xyz">idk@idk18.xyz</a>.',
    7 => 'If you wish to appeal, please send an email to <a href="mailto:idk@idk18.xyz">idk@idk18.xyz</a>.',
];
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <!-- MachineID: <?= $webServerName ?> -->
    <title>ROBLOX | Disabled Account</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,requiresActiveX=true" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="ROBLOX Corporation" />
<meta name="description" content="ROBLOX is powered by a growing community of over 300,000 creators who produce an infinite variety of highly immersive experiences. These experiences range from 3D multiplayer games and competitions, to interactive adventures where friends can take on new personas imagining what it would be like to be a dinosaur, a miner in a quarry or an astronaut on a space exploration." />
<meta name="keywords" content="free games, online games, building games, virtual worlds, free mmo, gaming cloud, physics engine" />

    
    

    <link rel="canonical" href="<?= $requestUrl ?>" />

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
            
        <form action="" method="post">
    <div style="border: solid 1px #000; margin: 0 auto; padding: 30px; max-width: 500px;">
        <h2 style="text-align: center;"><?= $banTypes[$resultData["banType"]] ?></h2>
        <p>Our content monitors have determined that your behavior at ROBLOX has been in violation of our Terms of Service. <?php if ($resultData["banType"] !== 7 || $resultData["resolved"] === 1) echo "We will terminate your account if you do not abide by the rules."; ?>
        </p>
        
        <p>Reviewed: <span style="font-weight: bold"><?php echo date("n/j/Y g:i:s A", $resultData["dateStart"]) ?></span></p>
        <div id="ctl00_cphRoblox_ModeratorNotePanel">
	
        <?php if ($resultData["banReason"] !== ""): ?>
            <p>Moderator Note: <span style="font-weight: bold"><span id="ctl00_cphRoblox_Label4" mode="Encode"><?= $resultData["banReason"] ?></span></span></p>
        <?php endif; ?>

        <?php
        $banEvidence = json_decode($resultData["banEvidence"]);

        foreach($banEvidence as $specificProof){
            switch ($specificProof->type){
                case "message":
                    echo'<div style="background-color: #fff; border: solid 1px #000; margin-bottom: 5px; padding: 10px; width: 478px">
                    <div style="margin-bottom: 5px;"><strong>Reason:</strong> ', $ruleBreakTypes[$specificProof->category], '</div>
                    <div>
                        <strong>Offensive Item:</strong>
                        <blockquote>
                            ', $specificProof->content, '
                        </blockquote>
                    </div>
                    </div>';
                    break;
            }
        }
        ?>     
                  
</div>
        
        
        <p><?php if ($resultData["resolved"] || $resultData["dateEnd"] < $time) echo $banDetailed[1]; else echo $banDetailed[$resultData["banType"]]; ?></p>
        
            <p><?php if ($resultData["resolved"] || $resultData["dateEnd"] < $time) echo $banAppeal[1]; else echo $banAppeal[$resultData["banType"]]; ?></p>
        
        <?php if ($resultData["resolved"] || $resultData["banType"] <= 2 || $resultData["dateEnd"] < $time): ?>
        <p style="text-align: center;">
            <input type="checkbox" id="AgreeCheckBox" onclick="EnableButton()"> I Agree
        </p>

        <p style="text-align: center;">
            <input type="submit" name="ctl00_cphRoblox_ButtonAgree" value="Reactivate My Account" id="ctl00_cphRoblox_ButtonAgree" class="translate" disabled>
        </p>
        <?php endif; ?>

        <p style="text-align: center;">
            <input type="submit" name="ctl00$cphRoblox$LogoutButton" value="Logout" id="ctl00_cphRoblox_LogoutButton" class="translate">
        </p>

        <script type="text/javascript">
            function EnableButton() {
                if (document.getElementById('AgreeCheckBox').checked) {
                    document.getElementById('ctl00_cphRoblox_ButtonAgree').disabled = false;
                }
                else {
                    document.getElementById('ctl00_cphRoblox_ButtonAgree').disabled = true;
                }
            }
        </script>
        </form>
    </div>
        



        </div>
        <?php require_once("../includes/footer.php"); ?>
    </div>
        </div></div>




<?php require_once("../includes/placelauncher.php"); ?>

<?php require_once("../includes/modals/legacygenericconfirmationmodal.php"); ?>



<?php require_once("../includes/cookieupgrader.php"); ?>
</body>
</html>
