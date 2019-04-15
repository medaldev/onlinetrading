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

		$content = $this->view->render("404", array(), true);

		$this->render($content);
	}

	public function actionIndex() {
		$this->title = "Главная страница";
		$this->meta_desc = "Описание главной страницы.";
		$this->meta_key = "описание, описание главной страницы";

		$content = $this->view->render("index", array("topics" => TopicDB::getAllTopics()), true);
		$this->render($content);
	}

	public function actionSection() {
        //unset($_SESSION["order"]);
        //unset($_SESSION["ordered_ids"]);
        if (!is_numeric($this->request->id)) return $this->redirect("/");
        $section = new SectionDB();
		$section->loadOnId($this->request->id);
        if (!$section->id) return $this->redirect("/");
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
            $result = false;
            $login = $this->request->login;
            $password = $this->request->password;
            $captcha = $this->request->captcha;
            //echo "<script>alert();</script>";
            if ($captcha == $_SESSION['captcha_reg']) {
                $result = UserDB::reg($login, $password, $password);
            }
            if ($result) $_SESSION["reg_message"] = "<p style='color: #008f10'>Регистрация успешно завершена!</p>";
            else $_SESSION["reg_message"] = "<p style='color: #f00'>Ошибка при регистрации!</p>";


        }
        $this->redirect("/reg");
    }

    public function actionCategory() {
        if (!is_numeric($this->request->id)) return $this->redirect("/");
        $category = new CategoryDB();
        $category->loadOnId($this->request->id);
        if (!$category->id) return $this->redirect("/");

        $this->title = $category->title;
        $this->meta_desc = "Описание главной страницы.";
        $this->meta_key = "описание, описание главной страницы";
        $sort = $this->request->sort;
        if (!$sort) $sort = "id";
        $filters = array();
        if (isset($_POST["filter"])) {
            foreach ($_POST as $param => $val) {
                if (strpos($param, "filter_") !== false) {
                    $pr = new PropertiesCatsNamesDB();
                    $pr->loadOnId(substr($param, 7));
                    $filters[$pr->attr] = $val;
                }
            }
        }
        $render_data = array();
        $render_data["category_title"] = $category->title;
        $render_data["categories"] = CategoryDB::getCategoriesOnSection($category->section_id);
        $render_data["products"] = $this->getProducts(ProductDB::getProductsOnCategoryId($category->id, $sort, $filters));
        $filters_titles = PropertiesCatsNamesDB::getAttributesOnCat($category->id);
        $render_data["filter_modal"] = $this->view->render("filter_modal", array("fields" => $filters_titles), true);


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
        if (!is_numeric($this->request->id)) return $this->redirect("/");
        $section = new SectionDB();
        $category = new CategoryDB();
        $product = new ProductDB();
        $product->loadOnId($this->request->id);
        $section->loadOnId($product->section_id);
        $category->loadOnId($product->category_id);
        $this->title = $product->title;
        $this->meta_desc = "Описание главной страницы.";
        $this->meta_key = "описание, описание главной страницы";

        $propetries = array();
        $values = array();

        $attribites_objects = PropertiesCatsNamesDB::getAttributesOnCat($product->category_id);
        $values_objects = PropertiesCatsValuesDB::getAttributesOnProduct($product->id);


        foreach ($values_objects as $value) {
            $values[] = $value->value;
            $propetries[$attribites_objects[$value->attr_id]->attr] = $value->value;
        }


        $render_data = array();
        $render_data["category_title"] = $category->title;
        $render_data["product_title"] = $product->title;
        $render_data["categories"] = CategoryDB::getCategoriesOnSection($section->id);
        $render_data["product_text"] = $product->text;
        $render_data["product_link"] = $product->sef();
        $render_data["product_id"] = $product->id;
        $render_data["shop_properties"] = $product->getBaseProperties();
        $render_data["seller_properties"] = $propetries;
        $render_data["products"] = $this->getProducts(ProductDB::getRecomended($category->id, 3));

        $content = $this->view->render("product", $render_data, true);
        $this->render($content);
    }


	public function actionGetdataproduct() {
		if (!$this->request->id) return $this->redirect("/");
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

    public function actioncaptcha() {
        if (!session_id()) session_start(); // Начинаем сессию
        header("Content-type: image/png"); // Отправляем заголовок с типом содержимого

        $string = "";
        for ($i = 0; $i < 5; $i++)
            $string .= chr(rand(97, 122)); // Генерация случайной строки
        $_SESSION['captcha_reg'] = $string; // Записываем код в сессию
        $dir = "fonts/"; // Путь к папке со шрифтом
        $image = imagecreatetruecolor(170, 60); // Создаём изображение
        $color = imagecolorallocate($image, 200, 100, 90); // Создаём цвет текста
        $white = imagecolorallocate($image, 255, 255, 255); // Создаём цвет фона
        imagefilledrectangle($image, 0, 0, 170, 60, $white); // Закрашиваем изображение
        imagettftext ($image, 30, 0, 10, 40, $color, $dir."verdana.ttf", $_SESSION['captcha_reg']); // Рисуем текст на капче
        imagepng($image); // Выводим картинку
    }

	protected function getFullCategories() {
		$items = CategoryDB::getAllCategoriesWithProducts();
		$data = $this->view->render("categories_with_products", array("cats" => $items, "uri" => $this->uri), true);
		return $data;
	}

	protected function getTopMenu() {
		$items = MenuDB::getAllTopMenu();
		$data = $this->view->render("topmenu", array("items" => $items, "uri" => $this->uri), true);
		return $data;
	}

	protected function getReviews() {
		$items = ReviewDB::getAllReviews();
		$data = $this->view->render("reviews", array("items" => $items, "uri" => $this->uri), true);
		return $data;
	}

    protected function getProducts($items) {
        $data = $this->view->render("products", array("products" => $items), true);
        return $data;
    }


	protected function getSystemMenu() {
		$items = SystemMenuDB::getMenu();
		$data = $this->view->render("system_menu", array("items" => $items, "uri" => $this->uri), true);
		return $data;
	}

    protected function getModal($type) {
        $data = $this->view->render($type, array(), true);
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
