<?php

class MainController extends AbstractController {

	protected $title;
	protected $meta_desc;
	protected $meta_key;

	public function __construct() {
		if (!session_id()) session_start();
		parent::__construct(new View(Config::DIR_TMPL));
	}

	public function action404() {
		parent::action404();
		$this->title = "Страница не найдена - 404";
		$this->meta_desc = "Запрошенная страница не существует.";
		$this->meta_key = "страница не найдена, страница не существует, 404";

		$content = $this->view->render("404", [], true);

		$this->render($content);
	}

	public function actionIndex() {
		$this->title = "Главная страница";
		$this->meta_desc = "Описание главной страницы.";
		$this->meta_key = "описание, описание главной страницы";

		$content = $this->view->render("index", ["topics" => TopicDB::getAllTopics()], true);
		$this->render($content);
	}
	
	

	
	public function actionGetdataproduct() {
		if (!$this->request->id) $this->redirect("/");
		$product = new ProductDB();
		$product->loadOnId($this->request->id);
		$cat = new CategoryDB();
		$cat->loadOnId($product->category_id);
		echo json_encode(array("title" => $product->title, 
								"text" => $product->text, 
								"img" => $product->img,
								"img_path" => Config::DIR_IMAGES.$product->img,
								"category" => $cat->title,
								"id" => $product->id));
	}

	protected function getFullCategories() {
		$items = CategoryDB::getAllCategoriesWithProducts();
		$data = $this->view->render("categories_with_products", ["cats" => $items, "uri" => $this->uri], true);
		return $data;
	}

	protected function getTopMenu() {
		$items = MenuDB::getAllTopMenu();
		$data = $this->view->render("topmenu", ["items" => $items, "uri" => $this->uri], true);
		return $data;
	}
	
	protected function getReviews() {
		$items = ReviewDB::getAllReviews();
		$data = $this->view->render("reviews", ["items" => $items, "uri" => $this->uri], true);
		return $data;
	}


	protected function getFooterMenu() {
		$items = MenuDB::getAllTopMenu();
		$data = $this->view->render("footermenu", ["items" => $items, "uri" => $this->uri], true);
		return $data;
	}

	protected function render($str) {
		$params = array();
		$params["title"] = $this->title;
		$params["meta_desc"] = $this->meta_desc;
		$params["meta_key"] = $this->meta_key;
		$params["content"] = $str;
		$this->view->render(Config::MAIN_LAYOUT, $params);
	}

}

?>
