<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php");
$_GET = array_change_key_case($_GET, CASE_LOWER);
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/games/meepcity/raw_unixtime.php', 'unix');
    $r->addRoute('GET', '/games/meepcity/raw_unixtime.php{args:\?.*}', 'unix');

    $r->addRoute('GET', '/games/meepcity/get_asset_sales.php', 'assetSales');
    $r->addRoute('GET', '/games/meepcity/get_asset_sales.php{args:\?.*}', 'assetSales');

    $r->addRoute('GET', '/games/meepcity/get_parties.php', 'parties');
    $r->addRoute('GET', '/games/meepcity/get_parties.php{args:\?.*}', 'parties');
	
	$r->addRoute('GET', '/games/meepcity/get_party_data.php', 'partyData');
    $r->addRoute('GET', '/games/meepcity/get_party_data.php{args:\?.*}', 'partyData');

    $r->addRoute('GET', '/games/meepcity/create_party.php', 'createParty');
    $r->addRoute('GET', '/games/meepcity/create_party.php{args:\?.*}', 'createParty');
	
	$r->addRoute('GET', '/games/meepcity/update_party.php', 'updateParty');
    $r->addRoute('GET', '/games/meepcity/update_party.php{args:\?.*}', 'updateParty');
	
	$r->addRoute('GET', '/games/meepcity/kill_party.php', 'killParty');
    $r->addRoute('GET', '/games/meepcity/kill_party.php{args:\?.*}', 'killParty');

    $r->addRoute('GET', '/games/meepcity/twitter_code_use.php', 'assetSales');
    $r->addRoute('GET', '/games/meepcity/twitter_code_use.php{args:\?.*}', 'assetSales');

    $r->addRoute('GET', '/games/meepcity/record_apt.php', 'assetSales');
    $r->addRoute('GET', '/games/meepcity/record_apt.php{args:\?.*}', 'assetSales');
	
	$r->addRoute('GET', '/games/meepcity/assetpurchased.php', 'assetSales');
    $r->addRoute('GET', '/games/meepcity/assetpurchased.php{args:\?.*}', 'assetSales');
	
    $r->addRoute('GET', '/games/meepcity/record_error.php', 'assetSales');
    $r->addRoute('GET', '/games/meepcity/record_error.php{args:\?.*}', 'assetSales');
});

$routeInfo = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], strtolower($_SERVER['REQUEST_URI']));

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        http_response_code(404);
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        http_response_code(404);
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        call_user_func($handler, $vars);
        break;
}

function unix()
{
	echo time();
}

function assetSales()
{
header("content-type: application/json");
print("{}");

}

function parties()
{

header("content-type: application/json");
$pdo = new PDO("mysql:host=10.144.90.143;port=3305;dbname=meepcity", "root", "TiTVKKO(0de@fzr7");
$json = [];

$stmt = $pdo->prepare("SELECT * FROM parties WHERE placeId = :placeId AND islisted = 1");
$stmt->bindParam(':placeId', $_GET["placeid"], PDO::PARAM_INT);
$stmt->execute();

foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $party){
	$json[] = [
					'PartyId' => $party["id"],
					'PartyReserveId' => $party["reserveName"],
					'PartyPlayersOnline' => $party["players"],
					'PartyMaxPlayers' => $party["maxPlayers"],
					'PartyOwnerId' => $party["userId"],
					'PartyOwnerUsername' => $party["userName"],
					'PartyTitle' => $party["partyName"],
					'PartyTier' => $party["estateTier"]
			];
}

echo json_encode($json);		

}

function createParty()
{
header("content-type: application/json");

$userId = $_GET["uid"];
$userName = $_GET["username"];
$partyName = $_GET["title"];
$reserve = $_GET["reserve"];
$placeId = $_GET["placeid"];
$maxPlayers = $_GET["maxplayers"];
$estateTier = $_GET["estatetier"];
$platform = $_GET["platform"];

$pdo = new PDO("mysql:host=10.144.90.143;port=3305;dbname=meepcity", "root", "TiTVKKO(0de@fzr7");
$stmt = $pdo->prepare("INSERT INTO parties (userId, userName, partyName, reserveName, placeId, maxPlayers, estateTier, platform) VALUES (:userId, :userName, :partyName, :reserveName, :placeId, :maxPlayers, :estateTier, :platform)");
$stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
$stmt->bindParam(':userName', $userName);
$stmt->bindParam(':partyName', $partyName);
$stmt->bindParam(':maxPlayers', $maxPlayers, PDO::PARAM_INT);
$stmt->bindParam(':reserveName', $reserve);
$stmt->bindParam(':placeId', $placeId, PDO::PARAM_INT);
$stmt->bindParam(':estateTier', $estateTier, PDO::PARAM_INT);
$stmt->bindParam(':platform', $platform, PDO::PARAM_INT);
$stmt->execute();

$stmt = $pdo->prepare("SELECT id FROM parties WHERE reserveName = :reserve");
$stmt->bindParam(':reserve', $reserve);
$stmt->execute();

$json = [
	"Response" => "SUCCESS",
	'PartyOwnerId' => (int)$userId,
	'PartyOwnerUsername' => $userName,
	'PartyTitle' => $partyName,
	'PartyId' => $stmt->fetchColumn(),
	'PartyMaxPlayers' => $maxPlayers,
	'PartyPlayersOnline' => 0,
	'PartyTier' => $estateTier
];

die(json_encode($json));
}

function partyData()
{
header("content-type: application/json");
$pdo = new PDO("mysql:host=10.144.90.143;port=3305;dbname=meepcity", "root", "TiTVKKO(0de@fzr7");

$stmt = $pdo->prepare("SELECT * FROM parties WHERE id = :partyId");
$stmt->bindParam(':partyId', $_GET["pid"], PDO::PARAM_INT);
$stmt->execute();
$party = $stmt->fetch(PDO::FETCH_ASSOC);
$json = [
					'Response' => 'SUCCESS',
					'PartyId' => $party["id"],
					'PartyReserveId' => $party["reserveName"],
					'PartyPlayersOnline' => $party["players"],
					'PartyMaxPlayers' => $party["maxPlayers"],
					'PartyOwner' => $party["userId"],
					'PartyTitle' => $party["partyName"],
					'PartyEstate' => $party["estateTier"]
			];

die(json_encode($json));
}

function updateParty()
{
	header("content-type: application/json");
	$pdo = new PDO("mysql:host=10.144.90.143;port=3305;dbname=meepcity", "root", "TiTVKKO(0de@fzr7");

	$stmt = $pdo->prepare("SELECT * FROM parties WHERE id = :partyId");
	$stmt->bindParam(':partyId', $_GET["pid"], PDO::PARAM_INT);
	$stmt->execute();
	$party = $stmt->fetch(PDO::FETCH_ASSOC);
	
	$json = [
		'PartyIsModerated' => $party["ban"]
	];
	
	if ($party["islisted"] == 0){
		$stmt = $pdo->prepare("UPDATE parties SET islisted = 1 WHERE id = :partyId");
		$stmt->bindParam(':partyId', $_GET["pid"], PDO::PARAM_INT);
		$stmt->execute();
	}
	
	$stmt = $pdo->prepare("UPDATE parties SET players = :players WHERE id = :partyId");
	$stmt->bindParam(':partyId', $_GET["pid"], PDO::PARAM_INT);
	$stmt->bindParam(':players', $_GET["players"], PDO::PARAM_INT);
	$stmt->execute();
	
	
	die(json_encode($json));
}

function killParty()
{
	header("content-type: application/json");
	$pdo = new PDO("mysql:host=10.144.90.143;port=3305;dbname=meepcity", "root", "TiTVKKO(0de@fzr7");

	$stmt = $pdo->prepare("DELETE FROM parties WHERE id = :partyId");
	$stmt->bindParam(':partyId', $_GET["pid"], PDO::PARAM_INT);
	$stmt->execute();
	
	$json = ["Response" => "SUCCESS"];
	die(json_encode($json));
}
?>