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
		$this->add("price");
		$this->add("wholesale");
		$this->add("properties");
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

	public function getProperties() {
		return explode(",", $this->properties);
	}

	public function getSellerProperties() {
		$category = new CategoryDB();
		$category->loadOnId($this->category_id);
		$names = $category->getProperties();
		$values = $this->getProperties();
		$properties = array();
		for ($i = 0; $i < count($names); $i++) {
			$properties[$names[$i]] = $values[$i];
		}
		return $properties;
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

	public static function getProductsOnSellerId($id) {
		$data = ObjectDB::getAllOnField(self::$table, __CLASS__, "seller_id", $id, "id");
		$data = self::initDataItems($data);
		return $data;
	}

	public static function getProductOnTitle($title) {
		$product = new ProductDB();
		$product->loadOnField("title", $title);
		$product->img_path = Config::DIR_IMAGES.$product->img;
		return $product;
	}

	public static function getTitleOnId($id) {
		$product = new ProductDB();
		$product->loadOnField("id", $id);
		return $product->title;
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

	public static function addNewOrder($product) {
		if (!session_id()) {
			session_start();
			$_SESSION["order"] = array();
		}

		if (count($_SESSION["order"]) != 0) {
			if (in_array($product, $_SESSION["order"])) return false;
			else self::addToCart($product);
		}
		else self::addToCart($product);
	}

	public static function getSumAllInCart() {
		$result = 0;
		foreach ($_SESSION["order"] as $product)  {
			$result += $product->price;
		}
		return $result;
	}

	public static function addToCart($product) {
		$_SESSION['ordered_ids'][] = $product->id;
		$_SESSION["order"][] = $product;
	}

	public static function isExistsProductInCart($id) {
		return in_array($id, $_SESSION["ordered_ids"]);
	}

	public static function deleteProductInCart($id) {
		foreach ($_SESSION["order"] as $product) {
			if ($product->id == $id) {
				unset($_SESSION["order"][array_search($product, $_SESSION["order"])]);
			}
		}
		unset($_SESSION["ordered_ids"][array_search($id, $_SESSION["ordered_ids"])]);

	}

	public static function getRecomended($cat_id, $count) {
		$products = ProductDB::getProductsOnCategoryId($cat_id);
		$result = array_rand($products, $count);
		$data = array();
		foreach ($result as $r) $data[$r] = $products[$r];
		return $data;
	}

	public function loadOnId($id) {
		$section = $this->loadOnField("id", $id);
		return $section;
	}

	public function link() {
		return "/product?id=".$this->id;

	}

	public function sef() {
		return SefDB::getAliasOnLink($this->link());
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
