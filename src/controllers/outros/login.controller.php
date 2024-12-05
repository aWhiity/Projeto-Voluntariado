<?php

require_once(__DIR__ . '/../models/voluntario.model.php');
require_once(__DIR__ . '/../models/organizacao.model.php');

class LoginController {
    private $loginModel;

    public function __construct() {
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
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';
        $isVoluntario = isset($_POST['voluntario']);

        if($isVoluntario) {
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
                $this->redirecionar('homePessoa.view.php');
            } else {
                $_SESSION['user_type'] = 'organizacao';
                $this->redirecionar('homeOrg.view.php');
            }
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
