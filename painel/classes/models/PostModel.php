<?php 
    namespace classes\models;

use classes\MySql;
use classes\Painel;

class PostModel{
    public static function adicionar_post($titulo, $descricao, $texto, $categoria_slug,$tags=null, $capa=null){
		$slug = Painel::generate_slug($titulo);
		if(!self::post_exists($slug, $categoria_slug)){
			$sql = MySql::conectar()->prepare("INSERT INTO `tb_site.post` VALUES (null, ?, ?, ?, ?, ?, ?, ?)");
        	$sql->execute(array($categoria_slug, $titulo, $descricao, $texto, $tags, $capa, $slug));
		}
	}

    public static function editar_post($titulo, $descricao, $texto, $categoria_slug, $id, $tags=null, $capa=null){
        $slug = Painel::generate_slug($titulo);
        $sql = MySql::conectar()->prepare("UPDATE`tb_site.post` SET titulo = ?, descricao = ?, tags = ?, texto = ?, categoria_slug = ?, capa = ? WHERE id = ?");
        $sql->execute(array($titulo, $descricao, $tags, $texto, $categoria_slug, $capa, $id));
	}

    public static function pega_posts($pagina = 1, $por_pagina = 12){
        $first_limit = ($pagina - 1) * $por_pagina;
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.post` ORDER BY id DESC LIMIT $first_limit, $por_pagina");
        $sql->execute();
        return $sql->fetchAll();
	}

    public static function conta_posts(){
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.post`");
        $sql->execute();
        return count($sql->fetchAll());
	}

    public static function deletar_post($id){
        $sql = MySql::conectar()->prepare("DELETE FROM `tb_site.post` WHERE id = ?");
        $sql->execute(array($id));
	}

    public static function pega_post($id){
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.post` WHERE id = ?");
        $sql->execute(array($id));
        return $sql->fetch();
	}

	public static function post_exists($slug, $categoria){
		$sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.post` WHERE slug = ?");
		$sql->execute(array($slug));
		if($sql->rowCount() == 1){
			$info = $sql->fetch();
			if($info['categoria_slug'] == $categoria)
				return true;
			return false;
		}
		return false;
	}
}
