<?php

class HomeOrganizacaoController {

    public function index() {
        require '.\views\organizacao\inicial_organizacao.view.php';
        exit();
    }

    public function listar() {
        
        $organizacaoId = $_SESSION['user_id']; 
        
        $organizacaoModel = new OrganizacaoModel();
        $inscricao = $organizacaoModel->selecionarPorId($organizacaoId);
        return $inscricao ?: [];
    }

}

