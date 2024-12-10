<?php

use Pecee\SimpleRouter\SimpleRouter;


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
            $inscricao = $oportunidadeModel->selecionarOportunidadeFechada($organizacaoId);
            return $inscricao ?: [];
        }
        public function deletarDaLista(){
            if (session_status() == PHP_SESSION_NONE) {
                session_start(); 
            }
            $idOportunidade = $_POST['idOportunidade'] ?? null;
            $model = new Oportunidade();
            $model->atualizarStatus($idOportunidade);
            SimpleRouter::response()->redirect('/Projeto-Voluntariado/src/home-organizacao');
    
        }
    }

    
?>


