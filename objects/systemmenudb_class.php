<?php

class SystemMenuDB extends ObjectDB {

    protected static $table = "systemmenu";

    public function __construct() {
        parent::__construct(self::$table);
        $this->add("title");
        $this->add("link");
    }


    public static function getMenu() {
        return ObjectDB::getAll(__CLASS__, self::$table);
    }

}

?>
