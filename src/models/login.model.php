<?php 

class LoginModel {
    public function validarUsuario($usuario, $senha) {
        
        if ($usuario === '12345' && $senha === '1234') {
            return true; 
        }
        return false; 
    }
}

?>