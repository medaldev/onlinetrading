<?php

class PropertiesProductDB extends ObjectDB {

    protected static $table = "properties_product";

    public function __construct() {
        parent::__construct(self::$table);
        $this->add("id");
        $this->add("product_id");
        $this->add("properties");
    }


    public function ProperiesArray() {
        $res = array();
        $this->properties_list = array();
        $data = explode(";", $this->properties);
        foreach ($data as $d) {
            $res = explode(",", $d);
            if (count($res) == 2) {
                list($key, $value) = $res;
                $this->properties_list[$key] = $value;

            }
        }
        return $this->properties_list;
    }


    public function getPropertiesOnProductId($id) {
        return $this->loadOnField("product_id", $id);
    }

    public function loadOnId($id) {
        return $this->loadOnField("id", $id);
    }

    public function loadOnTitle($title) {
        return $this->loadOnField("title", $title);
    }


    public static function postLoad() {
        return true;
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
