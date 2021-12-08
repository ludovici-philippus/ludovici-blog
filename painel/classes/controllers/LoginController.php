<?php 
    namespace classes\controllers;

use classes\models\LoginModel;
use classes\Painel;
use classes\views\MainView;

class LoginController{
        public function index(){
            if(isset($_POST['acao'])){
                $usuario = $_POST['login'];
                $senha = sha1($_POST['senha']);
                if(LoginModel::can_login($usuario, $senha))
                    $_SESSION['login'] = true;
                else
                    Painel::alert_js("Login incorreto!");
                Painel::redirect(INCLUDE_PATH_PAINEL);
            }
            MainView::render("login");
        }
    }
?>