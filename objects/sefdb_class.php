<?php

class SefDB extends ObjectDB {
	
	protected static $table = "sef";
	
	public function __construct() {
		parent::__construct(self::$table);
		$this->add("link", "ValidateURI");
		$this->add("alias", "ValidateTitle");
	}
	
	public function loadOnLink($link) {
		return $this->loadOnField("link", $link);
	}
	
	public function loadOnAlias($alias) {
		return $this->loadOnField("alias", $alias);
	}
	
	public static function getAliasOnLink($link) {
		$data = self::getAllOnField(self::$table, __CLASS__, "link", $link);

        foreach ($data as $d) return $d->alias;
	}
	
	public static function getLinkOnAlias($alias) {
		$data = self::getAllOnField(self::$table, __CLASS__, "alias", $alias);
		foreach ($data as $d) return $d->link;
	}

}

?>