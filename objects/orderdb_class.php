<?php

class OrderDB extends ObjectDB {

    protected static $table = "userorders";

    public function __construct() {
        parent::__construct(self::$table);
        $this->add("id");
        $this->add("id_product");
        $this->add("user_id");
        $this->add("count");
        $this->add("date");
        $this->add("status");
    }


    public static function getAllOrdersOnUserId($id) {
        $data = self::getAllOnField(self::$table, __CLASS__, "user_id", $id, "id");
        $data = self::initOrdersTitles($data);
        return $data;
    }

    public static function getAllOrders() {
        return self::getAll(__CLASS__, self::$table);
    }

    public static function getCountOrders() {
        return self::getCount();
    }

    public static function getPriceOrders() {
        $result = 0;
        $data = self::getAllOrders();
        foreach ($data as $item) {
            $result += $item->price;

        }
        return $result;
    }

    private static function initOrdersTitles($data) {
        foreach ($data as $element) {
            $product = new ProductDB();
            $product->loadOnId($element->id);
            $element->title = $product->title;
            $element->link = $product->sef();
        }
        return $data;
    }


}

?>
