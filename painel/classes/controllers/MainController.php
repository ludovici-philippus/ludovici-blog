<?php 
    namespace classes\controllers;

use classes\views\MainView;

class MainController{
        public function index(){
            MainView::render("main");
        }
    }
?>