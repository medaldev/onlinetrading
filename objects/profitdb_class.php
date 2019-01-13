<?php

class ProfitDB extends ObjectDB {

    protected static $table = "profits";

    public function __construct() {
        parent::__construct(self::$table);
        $this->add("id");
        $this->add("seller_id");
        $this->add("product_id");
        $this->add("procent");

    }



    public static function getProfitsOnSellerId($id) {
        $data = ObjectDB::getAllOnField(self::$table, __CLASS__, "seller_id", $id, "id");
        return $data;
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
