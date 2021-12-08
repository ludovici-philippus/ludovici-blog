<?php 
    namespace classes\controllers;

use classes\models\CategoriaModel;
use classes\models\PostModel;
use classes\views\MainView;

class PageController{
        public function index(){
            $url = explode("/", $_GET['url'])[0];
            if(file_exists("./classes/views/pages/$url.php")){
                if(isset($_POST["adicionar_categoria"])){
                    CategoriaModel::criar_categoria($_POST['categoria']);
                }else if(isset($_POST["criar_post"])){
                    $titulo = $_POST['titulo'];
                    $descricao = $_POST['descricao'];
                    $capa = $_POST['capa'];
                    $tags = $_POST['tags'];
                    $categoria_slug = $_POST['categoria_slug'];
                    $texto = $_POST['texto'];
                    PostModel::adicionar_post($titulo, $descricao, $texto, $categoria_slug, $tags, $capa);
                }else if(isset($_POST['editar_post'])){
                    $titulo = $_POST['titulo'];
                    $descricao = $_POST['descricao'];
                    $capa = $_POST['capa'];
                    $tags = $_POST['tags'];
                    $categoria_slug = $_POST['categoria_slug'];
                    $texto = $_POST['texto'];
                    PostModel::editar_post($titulo, $descricao, $texto, $categoria_slug, $_GET['editar'],$tags, $capa);
                }else if(isset($_POST['editar_categoria'])){
                    CategoriaModel::editar_categoria($_POST['categoria'], $_GET['editar']);
                }

                if(isset($_GET['deletar-post'])){
                    PostModel::deletar_post($_GET['deletar-post']);
                }else if(isset($_GET['deletar-categoria'])){
                    CategoriaModel::deletar_categoria($_GET['deletar-categoria']);
                }
                MainView::render("$url");
            }else{
                MainView::render("home");
            }
        }
    }
?>