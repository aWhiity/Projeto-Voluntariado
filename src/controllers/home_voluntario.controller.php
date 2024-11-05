<?php

require_once(__DIR__ . '/../models/inscricao.model.php');
require_once(__DIR__ . '/../models/organizacao.model.php');

class HomeController {
    private $inscricaoModel;

    public function __construct() {
        session_start();
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
            header("Location: login.view.php");
            exit();
        }

        $this->inscricaoModel = new InscricaoModel();
        $this->mostrarPaginaInicial();
    }

    private function mostrarPaginaInicial() {
        $voluntarioId = $_SESSION['voluntario_id']; 
        $inscricoes = $this->inscricaoModel->selecionarPorVoluntario($voluntarioId);

        include(__DIR__ . '/../views/homePessoa.view.php');
    }
}

new HomeController();
