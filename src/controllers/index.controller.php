<?php

class IndexController {
    public function __construct() {
        $this->handleRequest();
    }

    public function handleRequest() {
        
        session_start();
        
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            $this->redirectTo('dashboard.view.php');
        } else {
            $this->redirectTo('login.view.php');
        }
    }

    private function redirectTo($view) {
        header("Location: ../src/views/$view");
        exit();
    }
}

