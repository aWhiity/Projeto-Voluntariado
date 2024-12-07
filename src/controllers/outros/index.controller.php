<?php

class IndexController {
    public function __construct() {
        $this->verificar();
    }

    public function verificar() {
        
        session_start();
        
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            //$this->redirecionar('homePessoa.view.php');
            header('Location: /home');
        } else {
            //$this->redirecionar('login.view.php');
            header('Location: /login');
        }
    }       

    private function redirecionar($view) {
        header("Location: ../src/views/$view");
        exit();
    }
}

