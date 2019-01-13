<?php

class SellerMenuDB extends ObjectDB {

    protected static $table = "sellermenu";

    public function __construct() {
        parent::__construct(self::$table);
        $this->add("title");
        $this->add("link");
    }


    public static function getSellerMenu() {
        return self::getAll(__CLASS__, self::$table);
    }


}

?>
