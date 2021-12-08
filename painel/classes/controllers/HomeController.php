<?php 
    namespace classes\controllers;

use classes\views\MainView;

class HomeController{
        public function index(){
            MainView::render("home");
        }
    }
?>