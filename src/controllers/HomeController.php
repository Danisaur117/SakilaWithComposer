<?php
	namespace App\Controllers;

	use App\ViewManager;
	use App\dao\ActorDAO;
	// use Kint;

	class HomeController{
		public function index(){
			$actors = new ActorDAO();
			$result = $actors->getActors();
			// Kint::dump(ActorDAO::getActors());
			// Kint::dump($result);

			// $datos = [
				// "name" => "DANI"
			// ];

			$viewManager = new ViewManager();
			$viewManager->renderTemplate("index.twig", ['result' => $result]);
		}
	}
?>