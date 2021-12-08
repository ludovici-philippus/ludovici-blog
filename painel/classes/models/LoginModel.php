<?php 
    namespace classes\models;

use classes\MySql;

class LoginModel{
        public static function can_login($usuario, $senha){
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE usuario = ? AND senha = ?");
            $sql->execute(array($usuario, $senha));
            if($sql->rowCount() == 1)
                return true;
            return false;
        }
    }
?>