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

	public function actionSection() {

		$section = new SectionDB();
		$section->loadOnId($this->request->id);

		$this->title = $section->title;
		$this->meta_desc = "Описание главной страницы.";
		$this->meta_key = "описание, описание главной страницы";

		$render_data = array();
		$render_data["section_title"] = $section->title;
		$render_data["categories"] = CategoryDB::getCategoriesOnSection($this->request->id);
		$render_data["products"] = ProductDB::getProductsOnSectionId($this->request->id);

		$content = $this->view->render("section", $render_data, true);
		$this->render($content);
	}

    public function actionProduct() {

        $section = new SectionDB();
        $category = new CategoryDB();
        $product = new ProductDB();
        $product->loadOnId($this->request->id);
        $section->loadOnId($product->section_id);
        $category->loadOnId($product->category_id);
        $this->title = $product->title;
        $this->meta_desc = "Описание главной страницы.";
        $this->meta_key = "описание, описание главной страницы";

        $render_data = array();
        $render_data["category_title"] = $category->title;
        $render_data["product_title"] = $product->title;
        $render_data["categories"] = CategoryDB::getCategoriesOnSection($section->id);
        $render_data["product_text"] = $product->text;
        $render_data["shop_properties"] = $product->getBaseProperties();
        $render_data["seller_properties"] = $product->getSellerProperties();

        $content = $this->view->render("product", $render_data, true);
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
