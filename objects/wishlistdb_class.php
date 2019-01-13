<?php

class WishlistDB extends ObjectDB {

    protected static $table = "userwishlist";

    public function __construct() {
        parent::__construct(self::$table);
        $this->add("id");
        $this->add("id_product");
        $this->add("user_id");
    }


    public static function getAllWishesOnUserId($id) {
        $data = self::getAllOnField(self::$table, __CLASS__, "user_id", $id, "id");
        $data = self::initWishesTitles($data);
        return $data;
    }

    private static function initWishesTitles($data) {
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
