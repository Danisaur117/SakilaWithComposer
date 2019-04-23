<?php
	namespace App;

	use Twig;

	class ViewManager{
		protected $twig;

		public function __construct(){
			$loader = new \Twig_Loader_Filesystem(dirname(__DIR__).'/templates');
			$this->twig = new \Twig_Environment($loader);
		}

		public function render($view, $args=[]){
			if($args != null){
				extract($args, EXTR_SKIP);
			}

			$file = dirname(__DIR__).'/templates/'.$view;

			if(is_readable($file)){
				require_once($file);
			}
			else{
				throw new \InvalidArgumentException();
			}
		}

		public function renderTemplate($template, $args=[]){
			// static $twig = null;
			// if($twig == null){
			// 	$loader = new \Twig_Loader_Filesystem(dirname(__DIR__).'/templates');
			// 	$twig = new \Twig_Environment($loader);
			// }

			// echo $twig->render($template, $args);
			echo $this->twig->render($template, $args);
		}
	}
?>