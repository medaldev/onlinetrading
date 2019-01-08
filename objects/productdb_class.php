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
		$this->link = "/product?id=".$this->id;
		$this->sef = SefDB::getAliasOnLink($this->link);
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
		$data = ObjectDB::getAllOnField(self::$table, __CLASS__, "category_id", $id, "id");
		$data = self::initDataItems($data);
		return $data;
	}

	public static function getProductsOnSectionId($id) {
		$data = ObjectDB::getAllOnField(self::$table, __CLASS__, "section_id", $id, "id");
		$data = self::initDataItems($data);
		return $data;
	}

	public static function getProductOnTitle($title) {
		$product = new ProductDB();
		$product->loadOnField("title", $title);
		$product->img_path = Config::DIR_IMAGES.$product->img;
		return $product;
	}

	public static function initDataItems($data) {
		foreach ($data as $d) {
			$d->link = "/product?id=".$d->id;
			$d->sef = SefDB::getAliasOnLink($d->link);
		}
		return $data;
	}

	public static function search($words) {
		$select = self::getBaseSelect();
		$products = self::searchObjects($select, __CLASS__, array("title"), $words, Config::MIN_SEARCH_LEN);
		$products = self::initDataItems($products);

		return $products;
	}
	
	public function loadOnId($id) {
		$product = $this->loadOnField("id", $id);
		return $product;
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
