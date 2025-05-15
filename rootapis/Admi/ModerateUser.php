<?php
$pageName = "";

if (!$isUserAuthenticated)
    die(header("Location: https://www.$domain/request-error?code=403")); // Temporary until we get login returnurl

$adminStatus = $userInfo["adminStatus"];
$gameServPDO = connectDatabase('gameservers');
$moderationResolveTypes = [
    1 => "Ban Expiration",
    2 => "Customer Service Appeal",
    3 => "Moderator Revoke",
    4 => "Ban Override"
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

if ($adminStatus == 0 || $adminStatus == null)
    die(header("Location: https://www.$domain/request-error?code=403"));

if (isset($_POST["action"])){
    $time = time();
    $goodOutcome = false;

    switch ($_POST["action"]){
        case "moderateUser":
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

                $stmt = $authPDO->prepare("INSERT INTO moderation (dateStart, dateEnd, banType, banReason, moderatorId, userId) VALUES (:dateStart, :dateEnd, :banType, :banReason, :moderatorId, :userId)");
                $stmt->bindParam(':dateStart', $time);
                $stmt->bindParam(':dateEnd', $dates[$banType] );
                $stmt->bindParam(':banType', $banType, PDO::PARAM_INT);
                $stmt->bindParam(':banReason', $modNote);
                $stmt->bindParam(':moderatorId', $modId);
                $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
                $stmt->execute();
                $stmt = $authPDO->prepare("UPDATE users SET moderated = 1 WHERE id = :userId"); 
                $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
                $stmt->execute();
				
                $stmt = $gameServPDO->prepare("SELECT serverPlayerList, serverPlaceId, serverGameId FROM serverinstances WHERE serverPlayerList != '[]'");
				$stmt->execute();
				
				if ($stmt->rowCount() !== 0){
					foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $srv){
						if (in_array($userId, json_decode($srv["serverPlayerList"], true))){
							$stmt = $gameServPDO->prepare("INSERT INTO awaitingjobs (timeRequested, actionRequested, placeId, creatorId, gameId, accessCode) VALUES (:time, 12, :placeId, :userId, :gameId, :username)");
							$stmt->bindParam(':time', $time);
							$stmt->bindParam(':placeId', $srv["serverPlaceId"]);
							$stmt->bindParam(':gameId', $srv["serverGameId"]);
							$stmt->bindParam(':userId', $userId);
							$stmt->bindValue(':username', UserAuthentication::lookupNameById($userId));
							$stmt->execute();
						}
					}
				}
							
                $outcomeResult = "You have successfully moderated the user.";
                $goodOutcome = true;
                $authPDO->commit();
            }catch(Exception $e){
                $authPDO->rollBack();
                $outcomeResult = "Failed to moderate user: An internal error has occurred. All actions done were prevented to avoid conflicts. {$e->getMessage()}";
            }

            break;

        case "revertUser":
            $userId = $_POST["id"] ?? 0;
            $modId = $userInfo['id'];

            if (!$userLookup->doesUserExist($userId)){
                $outcomeResult = "Failed to revoke action: The user specified does not exist on IDK16.";
                break;
            }

            $stmt = $authPDO->prepare("SELECT resolved FROM moderation WHERE userId = :userId ORDER BY moderationCase DESC LIMIT 1");
            $stmt->bindParam(':userId', $userId);
            $stmt->execute();

            if ( $stmt->rowCount() == 0 ){
                $outcomeResult = "Failed to revoke action: The user specified was never moderated";
                break;
            }

            if ( $stmt->fetchColumn() == 1 ){
                $outcomeResult = "Failed to revoke action: The user specified is not disabled";
                break;
            }

            $stmt = $authPDO->prepare("UPDATE moderation SET resolved = 1, resolveType = 3, resolveBy = :modId WHERE userId = :userId ORDER BY moderationCase DESC LIMIT 1");
            $stmt->bindParam(':userId', $userId);
            $stmt->bindParam(':modId', $modId);
            $stmt->execute();

            $outcomeResult = "You have successfully revoked the action for this user.";
            $goodOutcome = true;
            break;

        default:
            $outcomeResult = "This is currently not implemented yet, apologies!";
            break;

    }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <!-- MachineID: <?= $webServerName ?> -->
    <title>User Moderation - <?= $domain ?></title>
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
            <h1>User Moderation</h1>
            <?php if (isset($_POST["action"]) && $goodOutcome): ?>
            <p>
                <span class="status-confirm"><?= $outcomeResult ?></span>
            </p>
            <?php elseif (isset($_POST["action"])): ?>
            <p>
                <span class="status-error"><?= $outcomeResult ?></span>
            </p>
            <?php endif; ?>
            <div class="text" style="margin:12px">
            <p>Where users have violated the IDK16 Terms of Service, you can moderate them manually here. Note that you cannot moderate users who are the same rank as you or of a higher rank (e.g. Moderators cannot moderate Administrators). We currently don't support user moderation history.</p>
            </div>
            <div class="dark-box" style="margin:15px">
            <h3>Apply Moderation</h3>
            <br>
            Below you are able to input a User ID and apply a moderation action of your choice.
            <form action="" method="post"> 
            <input id="action" name="action" type="hidden" value="moderateUser" />
            <div style="min-height: 30px;">
            <span class="form-label" style="float:left;padding-top:5px;margin-right:5px;">User ID</span>
            <div style="float: left; width: 183px; text-align:left;">
                <input type="text" class="text-box text-box-large" value="" id="id" name="id" style="width:183px;" />
            </div>

            <span class="form-label" style="float:left;padding-top:2px;margin-right:5px;">Moderation</span>
            <div style="float: left; width: 183px; text-align:left;">
                <select class="form-select" id="modval" name="modval">
                <option value="1">Reminder</option>
                <option value="2">Warn</option>
                <option value="3">Ban 1 Day</option>
                <option value="4">Ban 3 Days</option>
                <option value="5">Ban 7 Days</option>
                <option value="6">Ban 14 Days</option>
                <option value="7">Delete</option>
                <!--option value="8">Poison</option-->
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

            <div class="dark-box" style="margin:15px">
                <h3>Revoke Moderation</h3>
                <br>
                Remove the active moderation action applied for a user ID. Should only be used in extreme cases (e.g. user moderated in error).
                <p>
                <form action="" method="post"> <!-- I don't rlly know how html forms work - id assume this submits to an api with these parameters which then applies the action and refreshes the page with an infobox or smth saying action successful-->
                <input id="action" name="action" type="hidden" value="revertUser" />
                <div style="min-height: 30px;">
                <span class="form-label" style="float:left;padding-top:5px;margin-right:5px;">User ID</span>
                <div style="float: left; width: 183px; text-align:left;">
                    <input type="text" class="text-box text-box-large" value="" id="id" name="id" style="width:183px;" />
                </div>
                <br>
                <br>
                <hr>
                <input type="submit" value="Submit" class="btn-small btn-primary">
                </div>
                </form>
                </p>
            </div>

            <div class="dark-box" style="margin:15px">
                <h3>Most Recent Moderated</h3>
                <table class="table" cellpadding="0" cellspacing="0" border="0" style="font-size:14px;width:100%;">
                <tbody>
                <tr class="table-header">
                <th class="first">Case ID</th>
                <th>User</th>
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
                $stmt = $authPDO->prepare("SELECT * FROM moderation ORDER BY moderationCase DESC LIMIT 20");
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
                    <td><a href='https://www.$domain/users/{$modCase['userId']}/profile'>{$moderatedName} ({$modCase['userId']})</a></td>
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
