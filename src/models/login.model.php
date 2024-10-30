<?php 

class LoginModel {
    public function validateUser($usuario, $senha) {
        
        if ($usuario === 'barbara' && $senha === '1234') {
            return true; 
        }
        return false; 
    }
}

?>