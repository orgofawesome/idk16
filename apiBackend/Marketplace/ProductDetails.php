<?php
$assetId = $_GET["productid"] ?? 0;
$stmt = $pdo->prepare("SELECT * FROM assets WHERE productId = ?");
$stmt->bindParam(1, $assetId, PDO::PARAM_INT);
$stmt->execute();

if ($stmt->rowCount() == 0){
	$url = 'https://economy.roblox.com/v2/developer-products/' . $assetId . '/details';

	$cookie_name = '.ROBLOSECURITY';
	$cookie_value = '_|WARNING:-DO-NOT-SHARE-THIS.--Sharing-this-will-allow-someone-to-log-in-as-you-and-to-steal-your-ROBUX-and-items.|_4B7EBDDF0EF704960F14DE83B13C157319C5A857921D0C9013332D9E7EF8224C40C2B52D24F4F9B8C080C493CF8D413025F911460F47971C5297A99CE3B14143CBA2FBEA92817BAE34825854F4CA46219F68AAB2CEA0DABD90C22B70F680323389C48FB9B4E009ED68DC3C6E37BA4E70C8B5D19F368215A90404B1F496E1D0C854C35CD5A00671AF92CF190EACCA59E70918A9C47C52ACF7C530749E0E8085683B38682DDF5E53A8EDB9332551E3F0AC3EE5C7FD5C54F3149DF7DB718B80E0A935362772641E1B3FB1535A5A4266E3908525A25406E0DBD577C1C141B6D8A9C8588866DDA8C2352ACD2F3D8573ED7F87B17E00AC4068E37AF2F359B595405C0D0D39B6E7C8D07BB843445E83E1446A49D2E6D51099624D14BC65C44430B4D98A18CC40121DA6F71C247A0C9BB54329247CD1905A646B3B6681C3BEADC88A3905922B49C99F98133A3B13AC5141CE465EEF9F8F5EB423F383A39C1273598B5000A7DB612D05A42BA885A1490D38831524D0E3BA741DEA14D59C1716F18E9EF6056F6FB3B488A5024DF91F330B6855609D6787E22900E63FA9E66E311BDF9FD1ABC86D99043410D7A05F4C40CEB6CA148372990A9ACDD9AA073CA5F6241D0A56E5ABF0F513313803270C5CAF86722CBB293928D998817984E5C8BDC6E7F6D6D73F3C80F2EE1282C47DB4DAE6FFCDA5E9C7FFA973698409CACD2E2BC2B4DA53E8D97A79F36CE1C09DE5F5B58EDFF1F624D17AC064708F33D6A83566B62B6104600122844C968933D53555EF812EC22F83A34D8CFF8CEE960AC92962785A977207C29C0F1004953DAD8B0C27A0ACFF0F2F6F278A6600C69D64D88716EB21D6F93E81DEED0AC4BE3068940A50190D9B64CEE136A8549E6B5AF7AA74C0AF462A1E74DF6466BA03E1FF017715DA83E4D25184A9C42C39D86643B863B54919309C4C845F4626A190997B14BF890F19DEE56D296E6023238211B7657ADEF8369E266B34DEE404ADA1BB2F677B88C0FE117262579D96E9425BF38413CF26BC9B21CBBE73F5CE174695307CDDE294497E435B6E6FAB41AC22CA';

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