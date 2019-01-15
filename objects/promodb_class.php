<?php

class PromoDB extends ObjectDB {

    protected static $table = "promo";

    public function __construct() {
        parent::__construct(self::$table);
        $this->add("id");
        $this->add("code");
        $this->add("procent");

    }



    public function loadOnCode($code) {
        $this->loadOnField("code", $code);
    }


    public static function postLoad() {
        return false;
    }

    public static function postInsert() {
        return true;
    }

    public static function preUpdate() {
        return true;
    }

    public static function preInsert() {
        return true;
    }

    public static function postUpdate() {
        return true;
    }

    public static function preDelete() {
        return true;
    }

    public static function postDelete() {
        return true;
    }

    private static function getBaseSelect() {
        $select = new Select(self::$db);
        $select->from(self::$table, "*");
        return $select;
    }

}

?>
