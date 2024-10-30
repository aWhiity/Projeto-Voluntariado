<?php

require_once(__DIR__ . '/../models/login.model.php');

class LoginController {
    private $loginModel;

    public function __construct() {
        $this->loginModel = new LoginModel();
        $this->handleRequest();
    }

    private function handleRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->validateLogin();
        } else {
            $this->redirectToLogin();
        }
    }

    private function validateLogin() {
        $usuario = $_POST['usuario'] ?? '';
        $senha = $_POST['senha'] ?? '';

        if ($this->loginModel->validateUser($usuario, $senha)) {
            // Supondo que você queira manter a sessão do usuário logado
            session_start();
            $_SESSION['logged_in'] = true;
            $_SESSION['usuario'] = $usuario; // Você pode armazenar o nome do usuário na sessão
            $this->redirectTo('dashboard.view.php');
        } else {
            // Redireciona para a página de login com um erro
            $this->redirectTo('login.view.php?error=invalid_credentials');
        }
    }

    private function redirectTo($view) {
        header("Location: ../views/$view");
        exit();
    }

    private function redirectToLogin() {
        header("Location: ../views/login.view.php");
        exit();
    }
}

// Instanciar o controlador
new LoginController();
