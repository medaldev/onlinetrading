<?php

class AdminController extends AbstractController {

	protected $title;
	protected $meta_desc;
	protected $meta_key;
	protected $admin;

	public function __construct() {
		if (!session_id()) {
			session_start();
			if (!$_SESSION['order']) $_SESSION['order'] = array();
			if (!$_SESSION['ordered_ids']) $_SESSION['ordered_ids'] = array();
		}
		else {
			$this->admin = UserDB::authAdmin();

		}
		parent::__construct(new View(Config::DIR_TMPL));
	}


	public function actionAdmin() {
		if (!$this->admin) $this->redirect("/");
		$this->title = "Кабинет администратора";
		$this->meta_desc = "Описание главной страницы.";
		$this->meta_key = "описание, описание главной страницы";
		$render_data = array();
		$render_data["title"] = $this->title;

		$content = $this->view->render("admin_index", $render_data, true);
		$this->render($content);
	}

	public function actionSellers() {
		if (!$this->admin) $this->redirect("/");

		$this->title = "Управление продавцами";
		$this->meta_desc = "Описание главной страницы.";
		$this->meta_key = "описание, описание главной страницы";
		$render_data = array();
		$render_data["title"] = $this->title;
		$render_data["sellers"] = SellerDB::getAllSellers();

		$content = $this->view->render("admin_sellers", $render_data, true);
		$this->render($content);
	}

	public function actionOrders_statistics() {
		if (!$this->admin) $this->redirect("/");

		$this->title = "Управление заказами";
		$this->meta_desc = "Описание главной страницы.";
		$this->meta_key = "описание, описание главной страницы";
		$render_data = array();
		$render_data["title"] = $this->title;
		$render_data["orders_count"] = OrderDB::getCount();
		$render_data["orders_price"] = OrderDB::getPriceOrders();

		$content = $this->view->render("admin_orders_statistics", $render_data, true);
		$this->render($content);
	}

	public function actionEditSections() {
		if (!$this->admin) $this->redirect("/");

		$this->title = "Управление разделами";
		$this->meta_desc = "Описание главной страницы.";
		$this->meta_key = "описание, описание главной страницы";
		$render_data = array();
		$render_data["title"] = $this->title;
		$render_data["sections"] = SectionDB::getAllSections();

		$content = $this->view->render("admin_editsections", $render_data, true);
		$this->render($content);
	}

	public function actionEditCategories() {
		if (!$this->admin) $this->redirect("/");

		$this->title = "Управление категориями";
		$this->meta_desc = "Описание главной страницы.";
		$this->meta_key = "описание, описание главной страницы";
		$render_data = array();
		$render_data["title"] = $this->title;
		$render_data["categories"] = CategoryDB::getAllCategories();

		$content = $this->view->render("admin_categories", $render_data, true);
		$this->render($content);
	}

	public function actionEditTopics() {
		if (!$this->admin) $this->redirect("/");

		$this->title = "Управление секциями";
		$this->meta_desc = "Описание главной страницы.";
		$this->meta_key = "описание, описание главной страницы";
		$render_data = array();
		$render_data["title"] = $this->title;
		$render_data["topics"] = TopicDB::getAllTopics();

		$content = $this->view->render("admin_edittopics", $render_data, true);
		$this->render($content);
	}



	protected function render($str) {
		$params = array();
		$params["title"] = $this->title;
		$params["meta_desc"] = $this->meta_desc;
		$params["meta_key"] = $this->meta_key;
		$params["user_login"] = $this->admin->login;
		$params["user_menu"] = AdminMenuDB::getAdminMenu();

		$params["content"] = $str;
		$this->view->render(Config::ADMIN_LAYOUT, $params);
	}

}

?>
