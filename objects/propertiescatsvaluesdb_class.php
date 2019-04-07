<?php

class PropertiesCatsValuesDB extends ObjectDB {

    protected static $table = "properties_cat_values";

    public function __construct() {
        parent::__construct(self::$table);
        $this->add("id");
        $this->add("product_id");
        $this->add("attr_id");
        $this->add("value");

    }


    public static function getAllAttributes() {
        $data = self::getAll(__CLASS__, self::$table);
        return $data;
    }


    public static function getAttributesOnProduct($product_id) {
        $data = self::getAllOnField(self::$table, __CLASS__, "product_id", $product_id);
        return $data;
    }


    public function loadOnId($id) {
        $category = $this->loadOnField("id", $id);
        return $category;
    }


    public static function postLoad() {

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


}

?>
