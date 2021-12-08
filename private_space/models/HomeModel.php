<?php
namespace private_space\models;
use private_space\classes\MySql;

class HomeModel{
        public static function pega_posts($busca = false, $pagina = 1, $por_pagina = 9){
            $first_limit = ($pagina - 1) * $por_pagina;

            if($busca == false)
                $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.post` ORDER BY id DESC LIMIT $first_limit, $por_pagina");
            else
                $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.post` WHERE titulo LIKE '%$busca%' OR descricao LIKE '%$busca%' OR texto LIKE '%$busca%' OR tags LIKE '%$busca%' ORDER BY id DESC LIMIT $first_limit, $por_pagina");
            $sql->execute();
            return $sql->fetchAll();
        }
        public static function conta_posts($busca = false){
            if($busca == false)
                $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.post`");
            else
                $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.post` WHERE titulo LIKE '%$busca%' OR descricao LIKE '%$busca%' OR texto LIKE '%$busca%' OR tags LIKE '%$busca%'");
            $sql->execute();
            return count($sql->fetchAll());
        }
    }
?>