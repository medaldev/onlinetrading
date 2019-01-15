<?php

class MainController extends AbstractController {

	protected $title;
	protected $meta_desc;
	protected $meta_key;

	public function __construct() {
		if (!session_id()) {
		    session_start();
            if (!$_SESSION['order']) $_SESSION['order'] = array();
            if (!$_SESSION['ordered_ids']) $_SESSION['ordered_ids'] = array();
        }
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
        //unset($_SESSION["order"]);
        //unset($_SESSION["ordered_ids"]);

        $section = new SectionDB();
		$section->loadOnId($this->request->id);

		$this->title = $section->title;
		$this->meta_desc = "Описание главной страницы.";
		$this->meta_key = "описание, описание главной страницы";

		$render_data = array();
		$render_data["section_title"] = $section->title;
		$render_data["categories"] = CategoryDB::getCategoriesOnSection($this->request->id);
        $render_data["products"] = $this->getProducts(ProductDB::getProductsOnSectionId($this->request->id));


		$content = $this->view->render("section", $render_data, true);
		$this->render($content);
	}

    public function actionReg() {
        //unset($_SESSION["order"]);
        //unset($_SESSION["ordered_ids"]);



        $this->title = "Регистрация";
        $this->meta_desc = "Описание главной страницы.";
        $this->meta_key = "описание, описание главной страницы";

        $render_data = array();
        $render_data["categories"] = SectionDB::getAllSections();


        $content = $this->view->render("reg", $render_data, true);
        $this->render($content);
    }

    public function actionRegister() {
        if ($this->request->login) {
            echo UserDB::reg($this->request->login, $this->request->password, $this->request->password);

        }
    }

    public function actionCategory() {

        $category = new CategoryDB();
        $category->loadOnId($this->request->id);

        $this->title = $category->title;
        $this->meta_desc = "Описание главной страницы.";
        $this->meta_key = "описание, описание главной страницы";

        $render_data = array();
        $render_data["category_title"] = $category->title;
        $render_data["categories"] = CategoryDB::getCategoriesOnSection($category->section_id);
        $render_data["products"] = $this->getProducts(ProductDB::getProductsOnCategoryId($category->id));


        $content = $this->view->render("category", $render_data, true);
        $this->render($content);
    }

    public function actionSearch() {

        $category = new CategoryDB();
        $category->loadOnId($this->request->id);

        $this->title = "Поиск";
        $this->meta_desc = "Описание главной страницы.";
        $this->meta_key = "описание, описание главной страницы";

        $render_data = array();
        $render_data["query"] = $this->request->query;
        $render_data["sections"] = SectionDB::getAllSections();
        $render_data["products"] = $this->getProducts(ProductDB::search($this->request->query));

        $content = $this->view->render("search", $render_data, true);
        $this->render($content);
    }

    public function actionCart() {


        $this->title = "Корзина";
        $this->meta_desc = "Описание главной страницы.";
        $this->meta_key = "описание, описание главной страницы";

        $render_data = array();
        $render_data["sections"] = SectionDB::getAllSections();
        $render_data["products"] = $_SESSION["order"];
        $render_data["count_products"] = count($_SESSION["ordered_ids"]);
        $render_data["sum_products"] = ProductDB::getSumAllInCart();

        $content = $this->view->render("cart", $render_data, true);
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
        $render_data["product_link"] = $product->sef();
        $render_data["product_id"] = $product->id;
        $render_data["shop_properties"] = $product->getBaseProperties();
        $render_data["seller_properties"] = $product->getSellerProperties();
        $render_data["products"] = $this->getProducts(ProductDB::getRecomended($category->id, 3));

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

	public function actionOrder() {
        if (!session_id()) session_start();
        if (!$this->request->id) $this->redirect("/");
        $product = new ProductDB();
        $product->loadOnId($this->request->id);
        if (!$product) $this->redirect(URL::get("cart"));
        else {
            ProductDB::addNewOrder($product);
        }
    }

    public function actioncountcartdata() {
	    echo count($_SESSION["ordered_ids"]);
    }

    public function actionsumcartdata() {
	    $promo = new PromoDB();
	    $promo->loadOnCode($this->request->promo);
	    $procent =  $promo->procent;
	    if (!$procent) $procent = 1;
        echo ProductDB::getSumAllInCart() * $procent;
    }

    public function actionCancelorder() {


        if ($this->request->id == null) $this->redirect(URL::get("cart"));
        else {
            $product = ProductDB::isExistsProductInCart($this->request->id);
            if ($product) ProductDB::deleteProductInCart($this->request->id);
        }
        $this->redirect("/");
    }

    public function actionAuth() {
	    switch ($this->request->type) {
            case "Пользователь":
                $user = UserDB::authUser($this->request->login, $this->request->password);
                if ($user) echo "user";
                break;
            case "Модератор":
                $user = UserDB::authSeller($this->request->login, $this->request->password);
                if ($user) echo "seller";
                break;
            case "Администратор":
                $user = UserDB::authAdmin($this->request->login, $this->request->password);
                if ($user) echo "admin";
                break;
            default:
                echo "";
        }
    }

    public function actionLogout() {
	    UserDB::logout();
	    $this->redirect("/");
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

    protected function getProducts($items) {
        $data = $this->view->render("products", ["products" => $items], true);
        return $data;
    }


	protected function getSystemMenu() {
		$items = SystemMenuDB::getMenu();
		$data = $this->view->render("system_menu", ["items" => $items, "uri" => $this->uri], true);
		return $data;
	}

    protected function getModal($type) {
        $data = $this->view->render($type, [], true);
        return $data;
    }

	protected function render($str) {
		$params = array();
		$params["title"] = $this->title;
        $params["meta_desc"] = $this->meta_desc;
        $params["meta_key"] = $this->meta_key;
        $params["system_menu"] = $this->getSystemMenu();
        $params["login_modal"] = $this->getModal("login_modal");
        $params["content"] = $str;
        $this->view->render(Config::MAIN_LAYOUT, $params);
	}

}

?>
