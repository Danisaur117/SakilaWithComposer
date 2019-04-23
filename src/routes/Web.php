<?php
	namespace App\routes;

	use FastRoute\Dispatcher;

	class Web{
		public static function getDispatcher():Dispatcher{
			return \FastRoute\simpleDispatcher(
				function(\FastRoute\RouteCollector $route){
					$route->addRoute('GET', '/', ['App\Controllers\HomeController', 'index']);
				}
			);
		}
	}