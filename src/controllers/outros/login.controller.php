<?php

use Pecee\SimpleRouter\SimpleRouter;

class LoginController {
    private $loginModel;

    public function __construct() {
      
    }

    public function verificar() {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->validarLogin();
        } else {
            $this->redirecionarLogin();
        }
    }

    public function validarLogin() {
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';
        $isVoluntario = isset($_POST['voluntario']);
    
        if ($isVoluntario) {
            $this->loginModel = new VoluntarioModel();
        } else {
            $this->loginModel = new OrganizacaoModel();
        }
    
        $userId = $this->loginModel->verificarLogin($email, $senha);
    
        if ($userId) {
            session_start();
            $_SESSION['logged_in'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['user_id'] = $userId;
    
            if ($isVoluntario) {
                $_SESSION['user_type'] = 'voluntario';
                SimpleRouter::response()->redirect('/Projeto-Voluntariado/src/home-pessoa');
            } else {
                $_SESSION['user_type'] = 'organizacao';
                SimpleRouter::response()->redirect('/Projeto-Voluntariado/src/home-organizacao');
            }
        } else {
            SimpleRouter::response()->redirect('/Projeto-Voluntariado/src/?error=true');
        }
    }
    

    public function redirecionar($view) {
        header("Location: ../views/$view");
        exit();
    }

    public function redirecionarLogin() {
        //require './views/outros/login.view.php';
        echo 'chegou';
        exit();
    }
}
