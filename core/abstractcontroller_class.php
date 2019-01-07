<?php

abstract class AbstractController {
	
	protected $view;
	protected $uri;
	protected $request;
	
	public function __construct($view) {
		$this->view = $view;
		$this->uri = "/".substr($_SERVER["REQUEST_URI"], 1);
		$this->request = new Request();
	}
	
	abstract protected function render($str);
	
	public function action404() {
		header("HTTP/1.1 404 Not Found");
		header("Status: 404 Not Found");
	}
	
	final protected function redirect($url) {
		header("Location: $url");
		exit;
	}
	
	final protected function redirectBack() {
		$url = $_SERVER["HTTP_REFERER"];
		header("Location: $url");
		exit;
	}
	
}

?>