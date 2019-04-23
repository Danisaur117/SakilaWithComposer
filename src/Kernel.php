<?php
	namespace App;

	use Monolog\Logger;
	use Monolog\Handler\StreamHandler;
	// use Kint;
	// use App\ViewManager;
	use App\routes\Web;
	use App\RouterManager;
	use App\BDManager;

	class Kernel{
		public $logger;
		public static $BDManager;

		public function __construct(){
			$this->logger = new Logger('Kernel');
			$this->logger->pushHandler(new StreamHandler(dirname(__DIR__).'/var/logs/app.log'), Logger::DEBUG);
			$this->logger->info("Kernel up");

			// Kint::dump($this->logger);
			// $viewManager = new ViewManager();
			// $args = [
			// 	'name' => 'Dani'
			// ];
			// $viewManager->renderTemplate("index.twig", $args);

			// $httpMethod = $_SERVER['REQUEST_METHOD'];
			// $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
			// $route = new RouterManager();
			// $route->dispatch($httpMethod, $uri, Web::getDispatcher());
		}

		public function init(){
			// $config = require("../config/bdconfig.php");
			// $BDManager = BDManager::make($config['database']);

			$httpMethod = $_SERVER['REQUEST_METHOD'];
			$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
			$route = new RouterManager();
			$route->dispatch($httpMethod, $uri, Web::getDispatcher());
		}
	}
?>