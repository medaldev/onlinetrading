<?php

class MenuDB extends ObjectDB {

	protected static $table = "topmenu";

	public function __construct() {
		parent::__construct(self::$table);
		$this->add("title");
		$this->add("link");
	}


	public static function getAllTopMenu() {
		return self::getAll(__CLASS__, self::$table);
	}
	
	public static function getAdminTopMenu() {
		
		return self::getAll(__CLASS__, "adminmenu");
	}

}

?>
