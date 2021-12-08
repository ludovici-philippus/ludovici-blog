<?php 
namespace private_space\models;
use private_space\classes\MySql;
class PostModel{
    public static function post_existe($slug){
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.post` WHERE slug = ?");
        $sql->execute(array($slug));
        if($sql->rowCount() == 1)
            return true;
        return false;
    }

    public static function pega_post($slug){
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.post` WHERE slug = ?");
        $sql->execute(array($slug));
        return $sql->fetch();
    }
}
?>