<?php 
    namespace private_space\views;
    class MainView{
        public static function render($file, $header="header.php", $footer="footer.php"){
            include("private_space/views/pages/includes/$header");
            include("private_space/views/pages/$file.php");
            include("private_space/views/pages/includes/$footer");
        }
    }
?>