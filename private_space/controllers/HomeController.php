<?php
    namespace private_space\controllers;

use private_space\views\MainView;

class HomeController{
        public function index(){
            MainView::render("home");
        }
    }
?>