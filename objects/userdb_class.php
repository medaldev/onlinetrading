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
		$this->add("is_moderator");
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

	
	public static function logout() {
		if (!session_id()) session_start();
		unset($_SESSION["auth_login"]);
		unset($_SESSION["auth_password"]);
	}
	
	
	public function checkPassword($password) {
		return $this->password === self::hash($password, Config::SECRET);
	}
	
	public static function authAdmin($login=false, $password=false) {
		$admin = self::auth($login, $password);
		if ($admin && $admin->is_admin) return $admin;
		return false;
	}

    public static function authSeller($login=false, $password=false) {
        $seller = self::auth($login, $password);
        if ($seller && $seller->is_moderator) return $seller;
        return false;
    }

	public static function authUser($login=false, $password=false) {
		return self::auth($login, $password);
	}

	
	public static function auth($login = false, $password = false) {
		if (!session_id()) session_start();
        if (!$login || !$password) {
            if (!empty($_SESSION["auth_login"]) && !empty($_SESSION["auth_password"])) {
                $login = $_SESSION["auth_login"];
                $password = $_SESSION["auth_password"];
            }
            else return false;
        }
        else $password = self::hash($password, "");
        $user = new UserDB();
		$user->loadOnLogin($login);
		if ($user->password == $password) {
            $_SESSION["auth_login"] = $login;
            $_SESSION["auth_password"] = $password;
		    return $user;
        }
		else return false;
	}
	
	public function getSecretKey() {
		return self::hash($this->email.$this->password, Config::SECRET);
	}
	
	public static function postLoad() {
		return false;
	}
	
}

?>