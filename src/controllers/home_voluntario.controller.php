<?php

require_once(__DIR__ . '/../models/inscricao.model.php');
require_once(__DIR__ . '/../models/organizacao.model.php');
require_once '..\config\database.php';

class HomeVoluntarioController {

    public function listar() {
        $voluntarioId = $_SESSION['user_id']; 
        
        $inscricaoModel = new InscricaoModel();
        $inscricao = $inscricaoModel->selecionarPorVoluntario($voluntarioId);
        return $inscricao ?: [];
    }

}

$controller = new HomeVoluntarioController();
$controller->listar();