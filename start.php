<?php
	mb_internal_encoding("UTF-8");
	
	ini_set("display_errors", 1);
    error_reporting(E_ALL);
	set_include_path(get_include_path().PATH_SEPARATOR."core".PATH_SEPARATOR."lib".PATH_SEPARATOR."objects".PATH_SEPARATOR."controllers");
	spl_autoload_extensions("_class.php");
	spl_autoload_register();
	
	define("DIR_TMPL", "tmpl/");
	define("MAIN_LAYOUT", "main");
	
	ObjectDB::setDB(DataBase::getDBO());
	
?>