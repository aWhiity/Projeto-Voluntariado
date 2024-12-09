<?php

    class ListarInscricoesController {
        public function index() {
            require '.\views\voluntario\inicial_organizacao.view.php';
            exit();
        }
    
        public function listar() {
            $organizacaoId = $_SESSION['user_id']; 
            
            $inscricaoModel = new InscricaoModel();
            $inscricao = $inscricaoModel->selecionarPorOrganizacao($organizacaoId);
            return $inscricao ?: [];
        }

    }
?>


