<?php

    class ListarOportunidadeController {
        public function listar() {
            $oportunidadeModel = new Oportunidade();
            $oportunidades = $oportunidadeModel->selecionarTodos();
            return $oportunidades ?: [];
        }

        public function listarAbertas() {
            $oportunidadeModel = new Oportunidade();
            $oportunidades = $oportunidadeModel->selecionarAbertasDisponiveis();
            return $oportunidades ?: [];
        }

        public function listarPorId() {
            $organizacaoId = $_SESSION['user_id']; 
            $oportunidadeModel = new Oportunidade();
            $inscricao = $oportunidadeModel->selecionarPorIdOrganizacao($organizacaoId);
            return $inscricao ?: [];
        }
        
    }

    $controller = new ListarOportunidadeController();
    $controller->listar();
?>


