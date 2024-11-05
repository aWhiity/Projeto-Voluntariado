<?php

class IndexController {
    public function __construct() {
        $this->verificar();
    }

    public function verificar() {
        
        session_start();
        
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            $this->redirecionar('homePessoa.view.php');
        } else {
            $this->redirecionar('login.view.php');
        }
    }

    private function redirecionar($view) {
        header("Location: ../src/views/$view");
        exit();
    }
}

