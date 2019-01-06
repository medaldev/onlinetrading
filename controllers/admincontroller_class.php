<?php

class AdminController extends AbstractController {

	protected $title;
	protected $meta_desc;
	protected $meta_key;
	private $user;

	public function __construct() {
		parent::__construct(new View(Config::DIR_TMPL));
		if (!session_id()) session_start();
	}

	public function actionAdmin() {
		//print_r(UserDB::auth($this->request->login, $this->request->password));
		if (UserDB::auth($this->request->login, $this->request->password) || UserDB::authAdmin($_SESSION["auth_login"], $_SESSION["auth_password"])) $this->redirect("/editproducts");
		$this->title = "";
		$this->meta_desc = "";
		$this->meta_key = "";
		$content = $this->view->render("admin_auth", [], true);
		$this->render($content);
	}

	public function actionEditproducts() {
		if (!UserDB::authAdmin($_SESSION["auth_login"], $_SESSION["auth_password"])) $this->redirect("/admin");
		$this->title = "Управление товарами";
		$this->meta_desc = "";
		$this->meta_key = "";
		$items = ProductDB::getAllProducts();
		$content = $this->view->render("admin_products", ["items" => $items, "modal_edit_product" => $this->getModalEditProduct()], true);
		$this->render($content);
				

	}
	
	public function actionEditcategories() {
		if (!UserDB::authAdmin($_SESSION["auth_login"], $_SESSION["auth_password"])) $this->redirect("/admin");
		$this->title = "Управление категориями";
		$this->meta_desc = "";
		$this->meta_key = "";
		$items = CategoryDB::getAllCategories();
		$content = $this->view->render("admin_categories", ["items" => $items, "modal_edit_category" => $this->getModalEditCategory()], true);		
		$this->render($content);
	}
	
	public function actionGetdatacategory() {
		if (!$this->request->id) $this->redirect("/");
		$cat = new CategoryDB();
		$cat->loadOnId($this->request->id);
		echo json_encode(array("title" => $cat->title, 
								"text" => $cat->text, 
								"id" => $cat->id));
	}
	
	public function actionsaveproduct() {
		if (!UserDB::authAdmin($_SESSION["auth_login"], $_SESSION["auth_password"])) $this->redirect("/admin");
		$id = $this->request->id;
		$title = $this->request->title;
		$img = $this->request->img;
		$text = $this->request->text;
		$category = $this->request->category;
		
		$product = new ProductDB();
		if ($this->request->id) $product->loadOnId($this->request->id);
		$cat = new CategoryDB();
		$cat->loadOnTitle($this->request->category);
		$product->loadOnId($id);
		$product->title = $this->request->title;
		$product->img = $this->request->img;
		$product->category_id = $cat->id;
		$product->text = $this->request->text;
		$product->save();
		echo $product->id;
		
	}
	
	public function actionsavecategory() {
		if (!UserDB::authAdmin($_SESSION["auth_login"], $_SESSION["auth_password"])) $this->redirect("/admin");
		$id = $this->request->id;
		$title = $this->request->title;
		$text = $this->request->text;
		
		
		$cat = new CategoryDB();
		if ($this->request->id) $cat->loadOnId($this->request->id);
		$cat->title = $this->request->title;
		$cat->text = $this->request->text;
		$cat->save();
		echo $cat->id;
		
	}
	
	public function actiondeleteproduct() {
		if (!UserDB::authAdmin($_SESSION["auth_login"], $_SESSION["auth_password"])) $this->redirect("/admin");
		$id = $this->request->id;
		if (!$id) $this->redirect("/admin");
		$product = new ProductDB();
		$product->loadOnId($id);
		$product->delete();
		echo true;
	}
	
	public function actiondeletecategory() {
		if (!UserDB::authAdmin($_SESSION["auth_login"], $_SESSION["auth_password"])) $this->redirect("/admin");
		$id = $this->request->id;
		if (!$id) $this->redirect("/admin");
		$cat = new CategoryDB();
		$cat->loadOnId($id);
		$cat->delete();
		echo true;
	}
	
	protected function getModalEditProduct() {
		return $this->view->render("admin_modal_editproduct", ["categories" => CategoryDB::getAllCategories()], true);
	}
	
	protected function getModalEditCategory() {
		return $this->view->render("admin_modal_editcategory", [], true);
	}
	
	protected function getTopMenu() {
		$items = MenuDB::getAdminTopMenu();
		$data = $this->view->render("topmenu", ["items" => $items, "uri" => $this->uri], true);
		return $data;
	}


	protected function render($str) {
		$params = array();
		$params["title"] = $this->title;
		$params["meta_desc"] = $this->meta_desc;
		$params["meta_key"] = $this->meta_key;
		$params["topmenu"] = $this->getTopMenu();
		$params["content"] = $str;
		$this->view->render(Config::ADMIN_LAYOUT, $params);
	}

}


?>
