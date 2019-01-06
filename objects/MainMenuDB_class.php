<?php

class MainMenuDB extends ObjectDB {

	protected static $table = "topmenu";

	public function __construct() {
		parent::__construct(self::$table);
		$this->add("title");
		$this->add("link");
	}


	public static function getTopMenu() {
		return ObjectDB::getAll(__CLASS__);
	}

}

?>
