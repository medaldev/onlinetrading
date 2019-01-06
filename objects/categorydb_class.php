<?php

class CategoryDB extends ObjectDB {

	protected static $table = "categories";

	public function __construct() {
		parent::__construct(self::$table);
		$this->add("id");
		$this->add("title");
		$this->add("text");
	}


	public static function getAllCategories() {
		$data = self::getAll(__CLASS__, self::$table);
		return $data;
	}
	
	public static function getAllCategoriesWithProducts() {
		$data = self::addProducts(self::getAll(__CLASS__, self::$table));
		return $data;
	}
	
	public static function addProducts($data) {
		for ($i = 1; $i < count($data) + 1; $i++) {
			$data[$i]->products = ProductDB::getProductsOnCategoryId($i);
		}
		return $data;
	}
	
	public static function getCategoryOnId($id) {
		return ObjectDB::getAllOnField(self::$table, __CLASS__, "id", $id, "id");
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
