<?php

abstract class Config {
	
	const ADDRESS = "http://onlinetrading/";
	const DB_HOST = "localhost";
	const DB_USER = "root";
	const DB_PASSWORD = "";
	const DB_NAME = "mdlshop2";
	const DB_SYM_QUERY = "?";
	const DB_PREFIX = "ms_";
	const FORMAT_DATE = "%d.%m.%Y %H:%M:%S";
	const DIR_IMAGES = "/images/";
	const DIR_AVATARS = self::DIR_IMAGES."marks/";
	const DIR_TMPL = "tmpl/";
	const MAIN_LAYOUT = "main";
	const USER_LAYOUT = "user";
	const SELLER_LAYOUT = "seller";
	const ADMIN_LAYOUT = "admin";

	const SHOP_LINK = "/shop";
	
	const MIN_SEARCH_LEN = 2;
	
	
}

?>