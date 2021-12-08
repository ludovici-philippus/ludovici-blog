<?php 
    namespace classes\views;
    class MainView{
        public static function render($page, $header="header.php", $footer="footer.php"){
            include("./classes/views/pages/includes/$header");
            include("./classes/views/pages/$page.php");
            include("./classes/views/pages/includes/$footer");
        }
    }
?>