<?php

class HomeVoluntarioController {

    public function index() {
        require '.\views\voluntario\inicial_voluntario.view.php';
        exit();
    }
    
    

    public function listar() {
        $voluntarioId = $_SESSION['user_id']; 
        
        $inscricaoModel = new InscricaoModel();
        $inscricao = $inscricaoModel->selecionarPorVoluntario($voluntarioId);
        return $inscricao ?: [];
    }

}

