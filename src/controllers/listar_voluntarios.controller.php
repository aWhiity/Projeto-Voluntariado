<?php
    require_once '..\models\voluntario.model.php';
    require_once '..\config\database.php';

    class ListarVoluntariosController {
        public function listar() {
            $voluntarioModel = new VoluntarioModel();
            $voluntarios = $voluntarioModel->selecionarTodos();
            return $voluntarios ?: [];
        }
        
    }

    $controller = new ListarVoluntariosController();
    $controller->listar();
?>


