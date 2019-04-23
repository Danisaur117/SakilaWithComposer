<?php
	namespace App;

	use FastRoute;
	use http\Client\Response;
	use App\Controllers;
	// use Kint;

	class RouterManager{
		public function dispatch(string $requestMethod, string $requestUri, FastRoute\Dispatcher $dispatcher){
			$route = $dispatcher->dispatch($requestMethod, $requestUri);

			switch($route[0]){
				case FastRoute\Dispatcher::NOT_FOUND:
				{
					header("HTTP/1.0 404 NOT FOUND");
					echo "<h1>404 NOT FOUND</h1>";
					break;
				}
				case FastRoute\Dispatcher::FOUND:
				{
					$controller = $route[1];
					$params = $route[2];
					
					$controllerRequest = $controller();
					// Kint::dump($controller);
					// Kint::dump($params);
					// Kint::dump($controllerRequest);
					// $controllerRequest->params();
					break;
				}
			}
		}
	}
?>