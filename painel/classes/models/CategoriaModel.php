<?php 
    namespace classes\models;

use classes\MySql;
use classes\Painel;

class CategoriaModel{
        public static function pega_categorias($pagina=1, $por_pagina=12){
            $first_limit = ($pagina - 1) * $por_pagina;
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias` ORDER BY id DESC LIMIT $first_limit, $por_pagina");
            $sql->execute();
            return $sql->fetchAll();
        }

        public static function conta_categorias(){
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias`");
            $sql->execute();
            return count($sql->fetchAll());
        }

        public static function categoria_exists($slug){
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE slug = ?");
            $sql->execute(array($slug));
            if($sql->rowCount() == 1)
                return true;
            return false;
        }

        public static function criar_categoria($nome){
            $slug = Painel::generate_slug($nome);
            if(!self::categoria_exists($slug)){
                $sql = MySql::conectar()->prepare("INSERT INTO `tb_site.categorias` VALUES (null, ?, ?)");
                $sql->execute(array($nome, $slug));
            }
        }

        public static function deletar_categoria($id){
            $sql = MySql::conectar()->prepare("DELETE FROM `tb_site.categorias` WHERE id = ?");
            $sql->execute(array($id));
        }

        public static function editar_categoria($nome, $id){
            $slug = Painel::generate_slug($nome);
            $sql = MySql::conectar()->prepare("UPDATE `tb_site.categorias` SET categoria = ?, slug = ? WHERE id = ?");
            $sql->execute(array($nome, $slug, $id));
        }

        public static function pega_categoria($id){
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE id = ?");
            $sql->execute(array($id));
            return $sql->fetch();
        }
    }
?>