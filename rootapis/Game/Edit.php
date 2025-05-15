<?php
ob_start();

$creatorTypes = [
	1 => 'User',
	2 => 'Group'
];

$userId = ($isUserAuthenticated) ? $userInfo['id'] : 0;
?>
-- Prepended to Edit.lua and Visit.lua and Studio.lua--

function ifSeleniumThenSetCookie(key, value)
	if false then
		game:GetService("CookiesService"):SetCookieValue(key, value)
	end
end

ifSeleniumThenSetCookie("SeleniumTest1", "Inside the visit lua script")

pcall(function() game:SetPlaceID(<?= $assetInfo["id"] ?>) end)

visit = game:GetService("Visit")

local message = Instance.new("Message")
message.Parent = workspace
message.archivable = false

game:GetService("ContentProvider"):SetAssetUrl("http://www.<?= $domain ?>/Asset/")
game:GetService("ContentProvider"):SetThreadPool(16)
pcall(function() game:GetService("InsertService"):SetFreeModelUrl("http://www.<?= $domain ?>/Game/Tools/InsertAsset.ashx?type=fm&q=%s&pg=%d&rs=%d") end) -- Used for free model search (insert tool)
pcall(function() game:GetService("InsertService"):SetFreeDecalUrl("http://www.<?= $domain ?>/Game/Tools/InsertAsset.ashx?type=fd&q=%s&pg=%d&rs=%d") end) -- Used for free decal search (insert tool)

ifSeleniumThenSetCookie("SeleniumTest2", "Set URL service")

settings().Diagnostics:LegacyScriptMode()

game:GetService("InsertService"):SetBaseSetsUrl("http://www.<?= $domain ?>/Game/Tools/InsertAsset.ashx?nsets=10&type=base")
game:GetService("InsertService"):SetUserSetsUrl("http://www.<?= $domain ?>/Game/Tools/InsertAsset.ashx?nsets=20&type=user&userid=%d")
game:GetService("InsertService"):SetCollectionUrl("http://www.<?= $domain ?>/Game/Tools/InsertAsset.ashx?sid=%d")
game:GetService("InsertService"):SetAssetUrl("http://www.<?= $domain ?>/Asset/?id=%d")
game:GetService("InsertService"):SetAssetVersionUrl("http://www.<?= $domain ?>/Asset/?assetversionid=%d")

-- TODO: move this to a text file to be included with other scripts
pcall(function() game:GetService("SocialService"):SetFriendUrl("http://www.<?= $domain ?>/Game/LuaWebService/HandleSocialRequest.ashx?method=IsFriendsWith&playerid=%d&userid=%d") end)
pcall(function() game:GetService("SocialService"):SetBestFriendUrl("http://www.<?= $domain ?>/Game/LuaWebService/HandleSocialRequest.ashx?method=IsBestFriendsWith&playerid=%d&userid=%d") end)
pcall(function() game:GetService("SocialService"):SetGroupUrl("http://www.<?= $domain ?>/Game/LuaWebService/HandleSocialRequest.ashx?method=IsInGroup&playerid=%d&groupid=%d") end)
pcall(function() game:GetService("SocialService"):SetGroupRankUrl("http://www.<?= $domain ?>/Game/LuaWebService/HandleSocialRequest.ashx?method=GetGroupRank&playerid=%d&groupid=%d") end)
pcall(function() game:GetService("SocialService"):SetGroupRoleUrl("http://www.<?= $domain ?>/Game/LuaWebService/HandleSocialRequest.ashx?method=GetGroupRole&playerid=%d&groupid=%d") end)
pcall(function() game:GetService("GamePassService"):SetPlayerHasPassUrl("https://api.<?= $domain ?>/Game/GamePass/GamePassHandler.ashx?Action=HasPass&UserID=%d&PassID=%d") end)
pcall(function() game:GetService("MarketplaceService"):SetProductInfoUrl("https://api.<?= $domain ?>/marketplace/productinfo?assetId=%d") end)
--pcall(function() game:GetService("MarketplaceService"):SetDevProductInfoUrl("https://api.<?= $domain ?>/marketplace/productDetails?productId=%d") end)
pcall(function() game:GetService("MarketplaceService"):SetPlayerOwnsAssetUrl("https://api.<?= $domain ?>/ownership/hasasset?userId=%d&assetId=%d") end)
pcall(function() game:SetCreatorID(<?= $assetInfo["creatorId"] ?>, Enum.CreatorType.<?= $creatorTypes[$assetInfo['creatorType']] ?>) end)

ifSeleniumThenSetCookie("SeleniumTest3", "Set creator ID")

pcall(function() game:SetScreenshotInfo("") end)
pcall(function() game:SetVideoInfo("") end)

function registerPlay(key)
	if true and game:GetService("CookiesService"):GetCookieValue(key) == "" then
		game:GetService("CookiesService"):SetCookieValue(key, "{ \"userId\" : <?= $userId ?>, \"placeId\" : <?= $assetInfo["id"] ?>, \"os\" : \"" .. settings().Diagnostics.OsPlatform .. "\" }")
	end
end

pcall(function()
	registerPlay("rbx_evt_ftp")
	delay(60*5, function() registerPlay("rbx_evt_fmp") end)
end)

ifSeleniumThenSetCookie("SeleniumTest4", "Exiting SingleplayerSharedScript")-- SingleplayerSharedScript.lua inserted here --

message.Text = "Loading Place. Please wait..." 
coroutine.yield() 
game:Load("http://www.idk18.xyz/Asset/?id=<?= $assetInfo["id"] ?>") 

if #"" > 0 then
	visit:SetUploadUrl("")
end

message.Parent = nil

game:GetService("ChangeHistoryService"):SetEnabled(true)

visit:SetPing("http://www.<?= $domain ?>/Game/ClientPresence.ashx?version=old&PlaceID=<?= $assetInfo["id"] ?>&LocationType=Studio", 120)
game:HttpGet("http://www.<?= $domain ?>/Game/Statistics.ashx?UserID=<?= $userId ?>&AssociatedCreatorID=<?= $assetInfo["creatorId"] ?>&AssociatedCreatorType=<?= $creatorTypes[$assetInfo['creatorType']] ?>&AssociatedPlaceID=<?= $assetInfo["id"] ?>")
<?php
$script = ob_get_clean();
$signature = openssl_sign("\r\n".$script, $sig, file_get_contents($private_key_path)); 
$script = "--rbxsig%".base64_encode($sig)."%"."\r\n".$script;
die($script);
?>
