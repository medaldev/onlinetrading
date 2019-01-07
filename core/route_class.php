<?php

class Route {

	public static function start() {

        $controllers = ["Main"];
        $isset = false;
        for ($i = 0; $i < count($controllers); $i++) {
            $action_name = "index";

            $uri = URL::deleteGET(URL::current(), "id");
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