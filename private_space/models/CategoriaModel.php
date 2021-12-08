<?php 
    namespace private_space\models;

use private_space\classes\MySql;

class CategoriaModel{
        public static function categoria_existe($slug){
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE slug = ?");
            $sql->execute(array($slug));
            if($sql->rowCount() == 1)
                return true;
            return false;
        }

        public static function pega_categorias(){
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias`");
            $sql->execute();
            return $sql->fetchAll();
        }

        public static function pega_posts_categoria($slug,$pagina = 1, $por_pagina = 9){
            $first_limit = ($pagina - 1) * $por_pagina;
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.post` WHERE categoria_slug = ? LIMIT $first_limit, $por_pagina");
            $sql->execute(array($slug));
            return $sql->fetchAll();
        }

        public static function conta_posts_categoria($slug){
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.post` WHERE categoria_slug = ?");
            $sql->execute(array($slug));
            return count($sql->fetchAll());
        }
    }
?>