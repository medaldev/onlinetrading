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
        $render_data = array();
        $render_data["title"] = $this->title;

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
