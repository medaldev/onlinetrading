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

	public function actionEditSeller() {
		if (!$this->admin) $this->redirect("/");
		$seller = new SellerDB();
		if ($this->request->id) $seller->loadOnId($this->request->id);
		if ($this->request->title) {
			$seller->title = $this->request->title;
			$seller->text = $this->request->text;
			$seller->save();
			$this->redirect("/sellers");
		}
		$this->title = "Управление торговой организацией";
		$this->meta_desc = "Описание главной страницы.";
		$this->meta_key = "описание, описание главной страницы";
		$render_data = array();
		$render_data["title"] = $this->title;
		$render_data["seller"] = $seller;

		$content = $this->view->render("admin_editseller", $render_data, true);
		$this->render($content);
	}

	public function actionEditSection() {
		if (!$this->admin) $this->redirect("/");
		$section = new SectionDB();
		if ($this->request->id) $section->loadOnId($this->request->id);
		if ($this->request->title) {
			$section->title = $this->request->title;
			$section->img = $this->request->img;
			$section->topic_id = $this->request->topic_id;
			$section->text = $this->request->text;
			$section->save();
			$this->redirect("/editsections");
		}
		$this->title = "Управление разделом";
		$this->meta_desc = "Описание главной страницы.";
		$this->meta_key = "описание, описание главной страницы";
		$render_data = array();
		$render_data["title"] = $this->title;
		$render_data["section"] = $section;

		$content = $this->view->render("admin_editsection", $render_data, true);
		$this->render($content);
	}

	public function actionEditCategory() {
		if (!$this->admin) $this->redirect("/");
		$category = new CategoryDB();
		if ($this->request->id) $category->loadOnId($this->request->id);
		if ($this->request->title) {
			$category->title = $this->request->title;
			$category->section_id = $this->request->section_id;
			$category->save();
			$this->redirect("/editcategories");
		}
		$this->title = "Управление категорией";
		$this->meta_desc = "Описание главной страницы.";
		$this->meta_key = "описание, описание главной страницы";
		$render_data = array();
		$render_data["title"] = $this->title;
		$render_data["category"] = $category;

		$content = $this->view->render("admin_editcategory", $render_data, true);
		$this->render($content);
	}

	public function actionEditTopic() {
		if (!$this->admin) $this->redirect("/");
		$topic = new TopicDB();
		if ($this->request->id) $topic->loadOnId($this->request->id);
		if ($this->request->title) {
			$topic->title = $this->request->title;
			$topic->save();
			$this->redirect("/edittopics");
		}
		$this->title = "Управление разделом";
		$this->meta_desc = "Описание главной страницы.";
		$this->meta_key = "описание, описание главной страницы";
		$render_data = array();
		$render_data["title"] = $this->title;
		$render_data["topic"] = $topic;

		$content = $this->view->render("admin_edittopic", $render_data, true);
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
