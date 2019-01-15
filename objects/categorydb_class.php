<?php

class CategoryDB extends ObjectDB {

	protected static $table = "categories";

	public function __construct() {
		parent::__construct(self::$table);
		$this->add("id");
		$this->add("section_id");
		$this->add("title");
		$this->add("text");
		$this->add("properties");
		$this->link = "/category?id=".$this->id;
		$this->sef = SefDB::getAliasOnLink($this->link);
	}


	public function getProperties() {
		return explode(",", $this->properties);
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

	public static function getCategoriesOnSection($section_id) {
		$data = self::getAllOnField(self::$table, __CLASS__, "section_id", $section_id);
		$data = self::initDataItems($data);
		return $data;
	}
	
	public static function getCategoryOnId($id) {
		$data = self::getAllOnField(self::$table, __CLASS__, "id", $id, "id");
		$data = self::initDataItems($data);
		return $data;

	}
	
	public function loadOnId($id) {
		$category = $this->loadOnField("id", $id);
		return $category;
	}


	public static function initDataItems($data) {
		foreach ($data as $d) {
			$d->link = "/category?id=".$d->id;
			$d->sef = SefDB::getAliasOnLink($d->link);
		}
		return $data;
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
