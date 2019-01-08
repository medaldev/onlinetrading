<?php

class Route {

	public static function start() {

        $controllers = ["Main"];
        $isset = false;
        for ($i = 0; $i < count($controllers); $i++) {
            $action_name = "index";
            $current = URL::current();
            $real_uri = SefDB::getLinkOnAlias(substr($current, 1));
            if ($real_uri) {
                $current = $real_uri;
                list($url_part, $qs_part) = array_pad(explode("?", $current), 2, "");
                parse_str($qs_part, $qs_vars);
                Request::addSEFData($qs_vars);
            }
            else {
                $sef = SefDB::getAliasOnLink($current);
                if ($sef) URL::redirect(Config::ADDRESS.$sef);
            }
            $uri = URL::deleteGET($current, "id");
            $uri = substr($uri, 1);
            if ($uri) $action_name = $uri;
			$controller_name = $controllers[$i];
		
			$controller_name = $controller_name."Controller";
			$action_name = "action".$action_name;
			$controller = new $controller_name();
			if (method_exists($controller, $action_name)) {
				$controller->$action_name();
				$isset = true;
				
			}
			
		}
		if (!$isset) $controller->action404();
	}
	
}

?>