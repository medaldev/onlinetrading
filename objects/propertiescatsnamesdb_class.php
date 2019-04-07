<?php

class PropertiesCatsNamesDB extends ObjectDB {

    protected static $table = "properties_cat_names";

    public function __construct() {
        parent::__construct(self::$table);
        $this->add("id");
        $this->add("cat_id");
        $this->add("attr");

    }


    public static function getAllAttributes() {
        $data = self::getAll(__CLASS__, self::$table);
        return $data;
    }


    public static function getAttributesOnCat($cat_id) {
        $data = self::getAllOnField(self::$table, __CLASS__, "cat_id", $cat_id);
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
