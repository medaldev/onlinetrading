<?php

class ProductDB extends ObjectDB {

	protected static $table = "products";

	public function __construct() {
		parent::__construct(self::$table);
		$this->add("id");
		$this->add("title");
		$this->add("img");
		$this->add("category_id");
		$this->add("section_id");
		$this->add("text");
		$this->add("seller_id");
	}


	public static function getAllProducts() {
		$data = self::getAll(__CLASS__, self::$table);
		foreach ($data as $d) {
			$temp = CategoryDB::getCategoryOnId($d->category_id);
			if (!$temp) $temp = "Не определена!";
			else {
				foreach ($temp as $t) {
					$d->category = $t->title;
				}
			}
		}
		return $data;
	}

	public function getBaseProperties() {
		$properties = array();
		$seller = new SellerDB();
		$seller->loadOnProductId($this->seller_id);
		$properties["seller"] = $seller->title;
		return $properties;
	}

	public function getSellerProperties() {
		$property_object = new PropertiesProductDB();
		$property_object->getPropertiesOnProductId($this->id);
		$property_object->ProperiesArray();
		return $property_object->properties_list;
	}
	
	public static function getProductsOnCategoryId($id) {
		return ObjectDB::getAllOnField(self::$table, __CLASS__, "category_id", $id, "id");
	}

	public static function getProductsOnSectionId($id) {
		return ObjectDB::getAllOnField(self::$table, __CLASS__, "section_id", $id, "id");
	}

	public static function getProductOnTitle($title) {
		$product = new ProductDB();
		$product->loadOnField("title", $title);
		$product->img_path = Config::DIR_IMAGES.$product->img;
		return $product;
	}
	
	public function loadOnId($id) {
		return $this->loadOnField("id", $id);
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
	
}

?>
