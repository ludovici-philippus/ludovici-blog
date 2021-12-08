<?php 
    namespace classes;

class Painel{
        public static function alert_js($msg){
            echo "<script>alert('$msg');</script>";
        }

        public static function no_empty($arr){
            foreach ($arr as $key => $value) {
                if($value == "")
                    return false;
            }
            return true;
        }

        public static function email_valid($email){
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                return true;
            }
            return false;
        }

        public static function redirect($url){
            echo "<script>location.href = '$url';</script>";
            die();
        }

        public static function alert($tipo, $msg){
            $icon = $tipo == "sucesso" ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>';
            echo "<div class='alert $tipo'>$icon $msg</div>";
        }
        
        public static function generate_slug($str){
			$str = mb_strtolower($str);
			$str = preg_replace('/(â|á|ã)/', 'a', $str);
			$str = preg_replace('/(ê|é)/', 'e', $str);
			$str = preg_replace('/(í|Í)/', 'i', $str);
			$str = preg_replace('/(ú)/', 'u', $str);
			$str = preg_replace('/(ó|ô|õ|Ô)/', 'o',$str);
			$str = preg_replace('/(_|\/|!|\?|#)/', '',$str);
			$str = preg_replace('/( )/', '-',$str);
			$str = preg_replace('/ç/','c',$str);
			$str = preg_replace('/(-[-]{1,})/','-',$str);
			$str = preg_replace('/(,)/','-',$str);
			$str=strtolower($str);
			return $str;
		}
    }   
?>