<?php
    namespace private_space\controllers;

use private_space\models\PostModel;
use private_space\views\MainView;

class PostController{
        public function index(){
            $url = explode("/", $_GET['url'])[1];
            if(PostModel::post_existe($url)){
                MainView::render("post", "header_post.php");
            }else{
                MainView::render("404");
            }
        }
    }
?>