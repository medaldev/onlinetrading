<?php

class UserController extends AbstractController {

    protected $title;
    protected $meta_desc;
    protected $meta_key;
    protected $user;

    public function __construct() {
        if (!session_id()) {
            session_start();
            if (!$_SESSION['order']) $_SESSION['order'] = array();
            if (!$_SESSION['ordered_ids']) $_SESSION['ordered_ids'] = array();
        }
        else {
            $this->user = UserDB::authUser();

        }
        parent::__construct(new View(Config::DIR_TMPL));
    }


    public function actionUser() {
        if (!$this->user) $this->redirect("/");

        $this->title = "Кабинет пользователя";
        $this->meta_desc = "Описание главной страницы.";
        $this->meta_key = "описание, описание главной страницы";
        $render_data = array();
        $render_data["title"] = $this->title;

        $content = $this->view->render("user_index", $render_data, true);
        $this->render($content);
    }

    public function actionMyorders() {
        if (!$this->user) $this->redirect("/");

        $this->title = "Мои заказы";
        $this->meta_desc = "Описание главной страницы.";
        $this->meta_key = "описание, описание главной страницы";
        $render_data = array();
        $render_data["title"] = $this->title;
        $render_data["orders"] = OrderDB::getAllOrdersOnUserId($this->user->id);

        $content = $this->view->render("user_orders", $render_data, true);
        $this->render($content);
    }

    public function actionWishlist() {
        if (!$this->user) $this->redirect("/");

        $this->title = "Предварительные заказы";
        $this->meta_desc = "Описание главной страницы.";
        $this->meta_key = "описание, описание главной страницы";
        $render_data = array();
        $render_data["title"] = $this->title;
        $render_data["orders"] = WishlistDB::getAllWishesOnUserId($this->user->id);

        $content = $this->view->render("user_wish", $render_data, true);
        $this->render($content);
    }

    protected function getSystemMenu() {
        $items = SystemMenuDB::getMenu();
        $data = $this->view->render("system_menu", ["items" => $items, "uri" => $this->uri], true);
        return $data;
    }

    protected function render($str) {
        $params = array();
        $params["title"] = $this->title;
        $params["meta_desc"] = $this->meta_desc;
        $params["meta_key"] = $this->meta_key;
        $params["user_login"] = $this->user->login;
        $params["user_name"] = $this->user->name;
        $params["system_menu"] = $this->getSystemMenu();
        $params["user_menu"] = UserMenuDB::getUserMenu();

        $params["content"] = $str;
        $this->view->render(Config::USER_LAYOUT, $params);
    }

}

?>
