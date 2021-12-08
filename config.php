<?php 
    session_start();
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    date_default_timezone_set("America/Sao_Paulo");
    
    define("INCLUDE_PATH_STATIC", "http://localhost/ludovici/private_space/views/pages/");
    define("INCLUDE_PATH_PAINEL", "http://localhost/ludovici/painel/");
    define("INCLUDE_PATH", "http://localhost/ludovici/");

    define("HOST", 'localhost');
    define("DBNAME", 'ludovici');
    define("USER", 'root');
    define("PASSWORD", '');

    define("IN_PRODUCTION", false);

    define("BASE_DIR", __DIR__."/painel");

    define("NOME_EMPRESA", 'Code Spirit');
?>