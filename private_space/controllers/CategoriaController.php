<?php
    namespace private_space\controllers;

use private_space\models\CategoriaModel;
use private_space\views\MainView;

class CategoriaController{
        public function index(){
            $url = explode("/", $_GET['url'])[0];
            if(CategoriaModel::categoria_existe($url)){
                MainView::render("categoria");
            }else{
                MainView::render("404");
            }
        }
    }
?>