<?php

class Router{



	private $routes;
	
	public function __construct() {
		$routesPath = ROOT.'/config/routes.php';
		$this->routes = include($routesPath);
	}
	/*
	 * Return request string
	 * @return string
	 */
	private function getUri() {
		// getting uri 
		if(!empty($_SERVER['REQUEST_URI'])):
			return trim($_SERVER['REQUEST_URI'], '/');		
		endif;
	

	}

	public function run() {
		$uri = $this->getUri();
		foreach ($this->routes as $uriPattern => $path):
			// defining which controller and method we're using
			if(preg_match("~$uriPattern~", $uri)):
				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);
				$segements = explode('/', $internalRoute);
				$controllerName = array_shift($segements).'Controller';
				$controllerName = ucfirst($controllerName);
				$actionName = 'action'.ucfirst(array_shift($segements));
				$parameters = $segements;
			// connecting file controller-class
				$controllerFile = ROOT.
					'/controllers/'.$controllerName.'.php';
				if(file_exists($controllerFile)):
					include_once($controllerFile);	
				endif;
			// creating object , calling appropriate method i.e. 'action'
				$controllerObject = new $controllerName;
//				$result = $controllerObject -> $actionName();
//				if(!empty($result)):
				$result = call_user_func_array(array($controllerObject, $actionName), $parameters);
				if($result != null):
					break;
				endif;
			endif;
		endforeach;	
	}
}