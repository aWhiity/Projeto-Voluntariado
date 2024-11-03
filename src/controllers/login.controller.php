<?php

require_once(__DIR__ . '/../models/login.model.php');

class LoginController {
    private $loginModel;

    public function __construct() {
        $this->loginModel = new LoginModel();
        $this->verificar();
    }

    private function verificar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->validarLogin();
        } else {
            $this->redirecionarLogin();
        }
    }

    private function validarLogin() {
        $usuario = $_POST['usuario'] ?? '';
        $senha = $_POST['senha'] ?? '';

        if ($this->loginModel->validarUsuario($usuario, $senha)) {
            session_start();
            $_SESSION['logged_in'] = true;
            $_SESSION['usuario'] = $usuario; 
            
            $this->redirecionar('homePessoa.view.php');
        } else {
            
            $this->redirecionar('login.view.php?error=invalid_credentials');
        }
    }

    private function redirecionar($view) {
        header("Location: ../views/$view");
        exit();
    }

    private function redirecionarLogin() {
        header("Location: ../views/login.view.php");
        exit();
    }
}

new LoginController();
