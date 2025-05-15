<?php
require_once("coreMain.php");
class GamePersistence {
	public $pdo;
	public $domain;
	
	public function __construct(){
		global $domain;
		$this->pdo = connectDatabase('gamePersistence');
		$this->domain = $domain;
	}
}

$gamePersistence = new GamePersistence();
?>