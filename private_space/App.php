<?php 
    namespace private_space;
    class App{
        private $controller;
        private function prepare_app(){
            $url = isset($_GET['url']) ? $_GET['url'] : "";
            $load_name = "private_space\controllers\\";
			$has_post = count(explode("/", $url)) == 2;
			$url = explode("/", $url)[0];
			$biblioteca = $url == "biblioteca" ? true : false;

            if($url == "")
				$load_name .= "Home";
			else if($biblioteca && $url != ""){
				$load_name .= "Biblioteca";
			}
            else if($has_post && $url != "")
                $load_name .= "Post";
            else if(!$has_post && $url != "")
                $load_name .= "Categoria";
            $load_name .= "Controller";
            if(file_exists(str_replace("\\", "/", "$load_name.php")))
                $this->controller = new $load_name;
            else
                die(include("private/views/pages/404.php"));
        }
        public function start_app(){
            $this->prepare_app();
            $this->controller->index();
        }
    }
?>
