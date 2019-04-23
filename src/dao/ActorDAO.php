<?php
	namespace App\dao;

	use App\Kernel;
	use App\BDManager;

	class ActorDAO{
		public $BDManager;

		public function __construct(){
			$config = require("../config/bdconfig.php");
			$this->BDManager = BDManager::make($config['database']);
		}

		public function getActors(){
			try{
				// $connection = Kernel::BDManager;
				$statement = $this->BDManager->prepare('SELECT * FROM actor;');
				$statement->execute();
				return $statement->fetchAll(\PDO::FETCH_OBJ);
			}
			catch(PDOException $ex){
				die($e->getMessage());
			}
		}
	}
?>