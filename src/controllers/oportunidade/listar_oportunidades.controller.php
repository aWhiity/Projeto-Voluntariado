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
        
    }

    $controller = new ListarOportunidadeController();
    $controller->listar();
?>


