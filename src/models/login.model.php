<?php 

class LoginModel {
    public function validateUser($usuario, $senha) {
        
        if ($usuario === 'admin' && $senha === '1234') {
            return true; 
        }
        return false; 
    }
}

?>