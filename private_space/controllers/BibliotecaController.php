<?php 
namespace private_space\controllers;
use private_space\views\MainView;
	class BibliotecaController{
		public function index(){
			MainView::render("biblioteca");
		}
	}
?>
