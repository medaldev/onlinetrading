<?php

class UserMenuDB extends ObjectDB {

    protected static $table = "usermenu";

    public function __construct() {
        parent::__construct(self::$table);
        $this->add("title");
        $this->add("link");
    }


    public static function getUserMenu() {
        return self::getAll(__CLASS__, self::$table);
    }


}

?>
