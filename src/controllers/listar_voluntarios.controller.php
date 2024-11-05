<?php
    require_once 'D:\xampp\htdocs\Projeto-Voluntariado\src\models\voluntario.model.php';
    require_once 'D:\xampp\htdocs\Projeto-Voluntariado\src\config\database.php';

    class ListarVoluntariosController {
        public function listar() {
            $voluntarioModel = new Voluntario();
            $voluntarios = $voluntarioModel->selecionarTodos();
            return $voluntarios ?: [];
        }
        
    }

    $controller = new ListarVoluntariosController();
    $controller->listar();
?>


