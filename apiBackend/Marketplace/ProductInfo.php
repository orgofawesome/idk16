<?php
$assetId = $_GET["assetid"] ?? 0;

if (!AssetService::doesUserUploadedAssetExist($assetId)){
	$url = 'https://economy.roblox.com/v2/assets/' . $assetId . '/details';

	$cookie_name = '.ROBLOSECURITY';
	$cookie_value = '_|WARNING:-DO-NOT-SHARE-THIS.--Sharing-this-will-allow-someone-to-log-in-as-you-and-to-steal-your-ROBUX-and-items.|_DDE446677714EDB6D7B9F5B81967154C8C35B04762DDCBD3445B18287EEE4B3195FE4EA2C7474A1C6C07E2B647287301A6F3B38E27976A8DE731CA1BD14B967DBEE805CF2A58007CB58E35AA9DDEDE3533993676A89FB73466B59580AD4616A590E7056AF9890EBC9868354D75E8372A2068533F845867ABE7BDC1A564FE1827DB6152001C7E795A97E9960A59DFD4EE164C07F0F380613E76A9A7CE7B8E6B19E63A787F6EBEA516C602FF3DFF7C52093960CCB5DA7D0009E5A1B2AB8146809E7D447CD47BAFBEF9E4E913E25ACBB58E99ED4FBF49368AF424EDBDFCEADEBC0EAFBF82E34CCE858D644D43A8957B93F6704BB6E1CAD6A68ED5E0BDD2AB1CC306B2AAD9AA89A2AD0C85A40B79735889B8D4E18A9295212BCC9288E8A0DC4B4843E0E40F49E279DE1AD2AA50689F68566569C39A6F8211FAC5894A507155EF1F178C64446FE7BDC0ED43FE86252DE8163DE038F572F47E3C8087D3C367F913E9C9DB585DC2F3C8D31CE195C590A2E9812F8F63F2F3E63242E188D5C0C32134F5EF531C6546769BDB8B9E1BA098D594EEB6130421283B2F246C5B54BB20CA82433EE3E1A9B24C7652A29DD8CF0B599AEAC45F6F67495DE3CBF3C4522EDC35BDEA566DB5CCE5AF6DD4164E3927B85DF6268A9EED5E4E5438D3D63B8AA99CA4EDA94B3976DAC6924800EE7C9394A5DA0B0397CF5A163BB129D9DA491EC1DDB39706997DE312A6B249491A9455D8EA2CB8FBDB0C99BC5278EE4FCC684EFA9BC0579ACF04AD115842D4A9100C0088B4D33A6ECDC4FDFCAB5C7453B1B7498A38F46614934C5AA2F9EC5A1183C782ABFDFDE4212A93BFFE9C324FC314C619D32AC1D8B3287CEBABF33E06FD660A12C985DFBC03114A968031718BECFE91DDC66F6B7DC08F177ECE736DD9E1FD220F08E57750182CF96485FDD654575D749BF034205CFFB35BAB0EA66467D7A346DEEA63877A0E87159426113CA669252A9E93B3E7A8A356939CBBFD9E659D02E386D88464C9BEB864C3287C62B1C95804CF26183FE825E5EF35D7D2ACE72137B0D02340966FDE81ECD6ADA0';

	$curl_options = [
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_HEADER => false,
		CURLOPT_HTTPHEADER => ['Cookie: ' . urlencode($cookie_name) . '=' . urlencode($cookie_value)],
		CURLOPT_SSL_VERIFYPEER => false
	];
	if (strpos($url, 'https://') === 0) {
		$curl_options[CURLOPT_COOKIE] = $cookie_name . '=' . $cookie_value . '; Secure';
	}

	$ch = curl_init();
	curl_setopt_array($ch, $curl_options);
	
	$response = curl_exec($ch);

	if ($response === false) {
		http_response_code(500);
		die(json_encode([ "errors" => [ [ 'code' => 500, 'message' => 'InternalServerError' ] ] ]));
	} else {
		die($response);
	}

	curl_close($ch);
}

header("content-type: application/json");
$stmt = $pdo->prepare("SELECT * FROM assets WHERE assetId = ?");
$stmt->bindParam(1, $assetId, PDO::PARAM_INT);
$stmt->execute();
$assetInfo = $stmt->fetch(PDO::FETCH_ASSOC);

$creatorTypeId = $assetInfo["creatorType"];
$creatorTypes = [
	1 => 'User',
	2 => 'Group'
];

$isForSale = ($assetInfo["isForSale"] == 1) ? true : false;
switch ($creatorTypeId)
{
	case 1:
		$creatorName = UserAuthentication::lookupNameById($assetInfo["creatorId"]);
	break;
	
	case 2:
		$creatorName = AssetService::getGroupName($assetInfo["creatorId"]);
	break;
}

$json = [];
$json["TargetId"] = $assetId;
$json["ProductType"] = "User Product";
$json["AssetId"] = $assetInfo["assetId"];
$json["ProductId"] = $assetInfo["productId"];
$json["Name"] = $assetInfo["assetName"];
$json["Description"] = $assetInfo["assetDescription"];
$json["AssetTypeId"] = $assetInfo["assetTypeId"];
$json["Creator"] = [
	'Id' => $assetInfo["creatorId"],
	'Name' => $creatorName,
	'CreatorType' => $creatorTypes[$creatorTypeId],
	'CreatorTargetId' => $assetInfo["creatorId"]
];
$json["IconImageAssetId"] = $assetInfo["iconImageAssetId"];
/*
$json["Created"] =
$json["Updated"] = 
*/
$json["PriceInRobux"] = $assetInfo["priceInRobux"];
$json["PriceInTickets"] = null;
$json["Sales"] = 0;
$json["IsNew"] = false;
$json["IsForSale"] = $isForSale;
$json["IsPublicDomain"] = false;
$json["IsLimited"] = false;
$json["IsLimitedUnique"] = false;
$json["Remaining"] = null;
$json["MinimumMembershipLevel"] = 0;


die(json_encode($json, JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK));
?>