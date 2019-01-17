<?php

class SellerController extends AbstractController {

    protected $title;
    protected $meta_desc;
    protected $meta_key;
    protected $seller;

    public function __construct() {
        if (!session_id()) {
            session_start();
            if (!$_SESSION['order']) $_SESSION['order'] = array();
            if (!$_SESSION['ordered_ids']) $_SESSION['ordered_ids'] = array();
        }
        else {
            $this->seller = UserDB::authSeller();

        }
        parent::__construct(new View(Config::DIR_TMPL));
    }


    public function actionSeller() {
        if (!$this->seller) $this->redirect("/");
        $this->title = "Кабинет продавца.";
        $this->meta_desc = "Описание главной страницы.";
        $this->meta_key = "описание, описание главной страницы";
        $seller_object = new SellerDB();
        $seller_object->loadOnId($this->seller->id);
        $render_data = array();
        $render_data["title"] = $this->title;
        $render_data["seller_name"] = $seller_object->title;
        $render_data["seller_text"] = $seller_object->text;
        $content = $this->view->render("seller_index", $render_data, true);
        $this->render($content);
    }

    public function actionEditProducts() {
        if (!$this->seller) $this->redirect("/");

        $this->title = "Управление товарами";
        $this->meta_desc = "Описание главной страницы.";
        $this->meta_key = "описание, описание главной страницы";
        $render_data = array();
        $render_data["title"] = $this->title;
        $render_data["products"] = ProductDB::getProductsOnSellerId($this->seller->id);

        $content = $this->view->render("seller_editproducts", $render_data, true);
        $this->render($content);
    }

    public function actionEditProduct() {
        if (!$this->seller) $this->redirect("/");
        if (!$this->request->id) $this->redirect("/");
        $product = new ProductDB();
        $product->loadOnId($this->request->id);
        if ($this->request->product_name) {
            $product->title = $this->request->product_name;
            $product->img = $this->request->product_img;
            $product->price = $this->request->product_price;
            $product->category_id = $this->request->product_category_id;
            $product->save();
            $this->redirect("/editproducts");
        }
        $this->title = "Управление товаром";
        $this->meta_desc = "Описание главной страницы.";
        $this->meta_key = "описание, описание главной страницы";
        $render_data = array();
        $render_data["title"] = $this->title;
        $render_data["product"] = $product;

        $content = $this->view->render("seller_editproduct", $render_data, true);
        $this->render($content);
    }

    public function actionEditProfits() {
        if (!$this->seller) $this->redirect("/");

        $this->title = "Управление акциями";
        $this->meta_desc = "Описание главной страницы.";
        $this->meta_key = "описание, описание главной страницы";
        $render_data = array();
        $render_data["title"] = $this->title;
        $render_data["profits"] = ProfitDB::getProfitsOnSellerId($this->seller->id);

        $content = $this->view->render("seller_editprofits", $render_data, true);
        $this->render($content);
    }

    protected function getModalEdit() {
        $fields = array("1" => 2);
        $data = $this->view->render("editproduct", ["fields" => $fields], true);
        return $data;
    }

    protected function render($str) {
        $params = array();
        $params["title"] = $this->title;
        $params["meta_desc"] = $this->meta_desc;
        $params["meta_key"] = $this->meta_key;
        $params["user_login"] = $this->seller->login;
        $params["user_menu"] = SellerMenuDB::getSellerMenu();
        $params["content"] = $str;
        $this->view->render(Config::SELLER_LAYOUT, $params);
    }

}

?>
