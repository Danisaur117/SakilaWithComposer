<?php
	namespace App;
	// use Kint;

	class BDManager{
		public static function make($config){
			try{
				// Kint::dump($config);
				return new \PDO($config['connection'] . ';dbname=' . $config['name'],
								$config['username'],
								$config['password']);
			}
			catch(PDOException $e){
				die($e->getMessage());
			}
		}
	}
?>