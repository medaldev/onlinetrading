<?php

class AdminMenuDB extends ObjectDB {

    protected static $table = "adminmenu";

    public function __construct() {
        parent::__construct(self::$table);
        $this->add("title");
        $this->add("link");
    }


    public static function getAdminMenu() {
        return self::getAll(__CLASS__, self::$table);
    }


}

?>
