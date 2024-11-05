<?php
    require_once '..\models\oportunidade.php';
    require_once '..\config\database.php';

    class ListarOportunidadeController {
        public function listar() {
            $oportunidadeModel = new Oportunidade();
            $oportunidades = $oportunidadeModel->selecionarTodos();
            return $oportunidades ?: [];
        }
        
    }

    $controller = new ListarOportunidadeController();
    $controller->listar();
?>


