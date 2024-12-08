<?php

use Pecee\SimpleRouter\SimpleRouter;

class LogoutController {

    public function sair(){
        session_start();
        session_unset();
        session_destroy();

        SimpleRouter::response()->redirect('./');

        exit();
    }
}

?>