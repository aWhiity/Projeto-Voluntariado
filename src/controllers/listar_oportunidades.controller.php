<?php
    require_once 'C:\xampp\htdocs\Projeto-Voluntariado\src\models\oportunidade.php';
    require_once 'C:\xampp\htdocs\Projeto-Voluntariado\src\config\database.php';

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


