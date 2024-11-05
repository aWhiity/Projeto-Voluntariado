<?php

class IndexController {
    public function __construct() {
        $this->verificar();
    }

    public function verificar() {
        
        session_start();
        
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            $this->redirecionar('listar_voluntarios.view.php');
        } else {
            $this->redirecionar('listar_voluntarios.view.php');
        }
    }

    private function redirecionar($view) {
        header("Location: ../src/views/$view");
        exit();
    }
}

