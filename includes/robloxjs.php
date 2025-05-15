<?php 
/*
<div id="usernotifications-data-model"
     class="hidden"
     data-notificationsdomain="https://realtime.<?php echo $domain ?>/"
     data-notificationstestinterval="5000"
     data-notificationsmaxconnectiontime="43200000"
     data-isstatetrackingenabled="true"
     data-iseventpublishingenabled="false"
     data-isdisconnectonslowconnectiondisabled ="true"
     data-userid="<?php echo $userInfo['id'] ?>">
</div><div ng-modules="robloxApp, notificationStream"
     ng-controller="notificationStreamController"
     class="roblox-popover-content manual bottom"
     data-hidden-class-name="invisible"
     id="notification-stream"
     data-isNotificationContentOpen="{{layout.isNotificationContentOpen}}"
     ng-class="{'inApp': library.inApp,
                'isPhone': library.isPhone, 
                'invisible': !library.inApp && !layout.isNotificationContentOpen}">
    <div notification-content></div>
        
        
        
        
</div>
   <script type="text/javascript">
        var Roblox = Roblox || {};
        Roblox.ChatTemplates = {
            ChatBarTemplate: "chat-bar",
            AbuseReportTemplate: "chat-abuse-report",
            DialogTemplate: "chat-dialog",
            FriendsSelectionTemplate: "chat-friends-selection",
            GroupDialogTemplate: "chat-group-dialog",
            NewGroupTemplate: "chat-new-group",
            DialogMinimizeTemplate: "chat-dialog-minimize",
            ChatPlaceholderTemplate: "chat-placeholder"
        };
        Roblox.Chat = {
            SoundFile: "https://static.idk18.xyz/chat/sound/chatsound.mp3"
        };
        Roblox.Party = {};
        Roblox.Party.SetGoogleAnalyticsCallback = function () {
            RobloxLaunch._GoogleAnalyticsCallback = function() { var isInsideRobloxIDE = 'website'; if (Roblox && Roblox.Client && Roblox.Client.isIDE && Roblox.Client.isIDE()) { isInsideRobloxIDE = 'Studio'; };GoogleAnalyticsEvents.FireEvent(['Plugin Location', 'Launch Attempt', isInsideRobloxIDE]);GoogleAnalyticsEvents.FireEvent(['Plugin', 'Launch Attempt', 'Play']);EventTracker.fireEvent('GameLaunchAttempt_OSX', 'GameLaunchAttempt_OSX_Plugin'); if (typeof Roblox.GamePlayEvents != 'undefined') { Roblox.GamePlayEvents.SendClientStartAttempt(null, play_placeId); }  }; 
        };

    </script>


<div id="chat-container" class="chat chat-container"
     ng-modules="robloxApp, chat"
     ng-controller="chatController"
     ng-class="{'collapsed': chatLibrary.chatLayout.collapsed, 
                'inApp': chatLibrary.inApp,
                'tablet': chatLibrary.tabletInApp}"
     ng-cloak>
<div id="chat-data-model"
     class="hidden"
     chat-data
     chat-view-model="chatViewModel"
     chat-library="chatLibrary"
     data-userid="<?php echo $userInfo['id'] ?>"
     data-domain="<?php echo $domain ?>"
     data-gamespagelink="https://www.<?php echo $domain ?>/games"
     data-chatdomain="https://chat.<?php echo $domain ?>"
     data-numberofmembersforpartychrome="6"
     data-friendslistoutputcachedurationinseconds="10"
     data-avatarheadshotsmultigetlimit="100"
     data-userpresencemultigetlimit="100"
     data-intervalofchangetitleforpartychrome="500"
     data-spinner="https://images.idk18.xyz/4bed93c91f909002b1f17f05c0ce13d1.gif"
     data-notificationsdomain="https://realtime.<?php echo $domain ?>/"
     data-devicetype="Computer"
     data-inapp=false
     data-togglechatbarenabled=true
     data-localstorageenabledforchat=true
     data-cleanpartyfromconversationenabled=false
     data-parytchromedisplaytimestampinterval="300000"
     data-initialconversationtodisplay=""
     data-isclientsideurlparseenabled="true"
     data-signalrdisconnectionresponseinmilliseconds="3000"
     data-isnewexponentialbackoffforangularhttpretryenabled="true">
</div>
    <div chat-bar></div>
    <div id="dialogs"
         class="dialogs"
         ng-controller="dialogsController">
        <div dialog
             id="{{chatLayoutId}}"
             dialog-data="chatUserDict[chatLayoutId]"
             chat-library="chatLibrary"
             close-dialog="closeDialog(chatLayoutId)"
             send-invite="sendInvite(chatLayoutId)"
             ng-repeat="chatLayoutId in chatLibrary.layoutIdList"></div>

        <div dialog
             id="{{newGroup.layoutId}}"
             dialog-data="newGroup"
             chat-library="chatLibrary"
             close-dialog="closeDialog('newGroup')"
             send-invite="sendInvite(newGroup.layoutId)"
             ng-if="newGroup"></div>
        <div id="dialogs-minimize"
             class="dialogs-minimize"
             dialog-minimize
             chat-library="chatLibrary">
        </div>
        <div class="chat-placeholder"
             chat-placeholder>
        </div>
    </div>

    <script type="text/javascript">
        $(function () {
            // Because of placeLauncher.js, has to add this stupid global "play_placeId"
            $(document).on('Roblox.Chat.PartyInGame', function (event, args) {
                play_placeId = args.placeId;
            });
        });
    </script>

</div>

<script type='text/javascript' src='https://static.idk18.xyz/js/navigation/shopamazon.js'></script>
<script type='text/javascript' src='https://static.idk18.xyz/js/utilities/popover.js'></script>
<script type='text/javascript' src='https://static.idk18.xyz/js/genericconfirmation.js'></script>
<script type='text/javascript' src='https://static.idk18.xyz/js/utilities/dialog.js'></script>

<script type='text/javascript' src='https://js.rbxcdn.com/a7eafc0e9aa687140f5d41b73fc409ea.js.gzip'></script>
        <div ng-modules="baseTemplateApp">
            <script type="text/javascript" src="https://js.rbxcdn.com/c8abd6a3c35e15438d124dea24bc8f2d.js.gzip"></script>
        </div>
        <div ng-modules="pageTemplateApp">
            <script type="text/javascript" src="https://js.rbxcdn.com/9a5f95f8f19fa898e8af51612af12e6e.js.gzip"></script>
        </div>
    <script type='text/javascript' src='https://js.rbxcdn.com/76a7e8663c9f6a74733130690d3b4822.js.gzip'></script>
    <script type='text/javascript' src='https://js.rbxcdn.com/c8f30c9db7f79a36c7448d925e2da1ca.js.gzip'></script>
    <script type='text/javascript' src='https://js.rbxcdn.com/2f5346047fe86fe7125c1ed19234b8a1.js.gzip'></script>
*/
//if ($isUserAuthenticated): ?>
    <script type='text/javascript' src='https://js.idk18.xyz/f0a2acc861db87466c6ecf755ce236d0.js'></script>