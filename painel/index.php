<?php
    require("../config.php");
    require("vendor/autoload.php");
    if(isset($_SESSION['login']))
        $controller = new classes\controllers\MainController();
    else
        $controller = new classes\controllers\LoginController();
    $controller->index();
        
?>