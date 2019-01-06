<?php

class UserDB extends ObjectDB {
	
	protected static $table = "users";
	private $new_password = null;
	
	public function __construct() {
		parent::__construct(self::$table);
		$this->add("id");
		$this->add("login");
		$this->add("password");
		$this->add("is_admin");
	}
	
	public static function reg($login, $password, $password_repeat) {
		if (!$login || !$password || $password != $password_repeat) return false;
		$db = self::$db;
		$db->insert(self::$table, ["login" => $login, "password" => md5($password)]);
		return true;
	}
	
	
	public function setPassword($password) {
		$this->new_password = $password;
	}
	
	public function getPassword() {
		return $this->new_password;
	}
	
	public function loadOnLogin($login) {
		return $this->loadOnField("login", $login);
	}
	
	
	protected function preValidate() {
		if ($this->avatar == Config::DIR_AVATAR.Config::DEFAULT_AVATAR) $this->avatar = null;
		if (!is_null($this->avatar)) $this->avatar = basename($this->avatar);
		if (!is_null($this->new_password)) $this->password = $this->new_password;
		return true;
	}
	
	protected function postValidate() {
		if (!is_null($this->new_password)) $this->password = self::hash($this->new_password, Config::SECRET);
		return true;
	}
	
	public function login() {
		if (!session_id()) session_start();
		$_SESSION["auth_login"] = $this->login;
		$_SESSION["auth_password"] = $this->password;
	}
	
	public static function logout() {
		if (!session_id()) session_start();
		unset($_SESSION["auth_login"]);
		unset($_SESSION["auth_password"]);
	}
	
	
	public function checkPassword($password) {
		return $this->password === self::hash($password, Config::SECRET);
	}
	
	public static function authAdmin($login, $password) {
		$admin = self::auth($login, $password, false);
		if ($admin && $admin->is_admin) return true;
		return false;
	}

	public static function authUser($login=false, $password=false) {
		$user = self::auth($login, $password, false);
		if (!$user) return false;
		if (!$user->is_admin) return true;
	}

	
	public static function auth($login = false, $password = false, $shifrate=true) {
		if ($login) $auth = true;
		else {
			if (!session_id()) session_start();
			if (!empty($_SESSION["auth_login"]) && !empty($_SESSION["auth_password"])) {
				$login = $_SESSION["auth_login"];
				$password = $_SESSION["auth_password"];
			}
			else return;
			$auth = false;
		}
		$user = new UserDB();
		if ($auth && $shifrate) $password = self::hash($password, "");
		$select = new Select();
		$select->from(self::$table, array("COUNT(id)"))
			->where("`login` = ".self::$db->getSQ(), array($login))
			->where("`password` = ".self::$db->getSQ(), array($password));
		$count = self::$db->selectCell($select);
		if ($count) {
			$user->loadOnLogin($login);
			if ($auth) $user->login();
			return $user;
		}
		return false;
		//if ($auth) throw new Exception("ERROR_AUTH_USER");
	}
	
	public function getSecretKey() {
		return self::hash($this->email.$this->password, Config::SECRET);
	}
	
	public static function postLoad() {
		return false;
	}
	
}

?>