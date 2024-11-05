<?php
    require_once 'C:\xampp\htdocs\Projeto-Voluntariado\src\models\organizacao.model.php';
    require_once 'C:\xampp\htdocs\Projeto-Voluntariado\src\config\database.php';

    class ListarOrganizacaoController {
        public function listar() {
            $organizacaoModel = new OrganizacaoModel();
            $organizacoes = $organizacaoModel->selecionarTodos();
            return $organizacoes ?: [];
        }
        
    }

    $controller = new ListarOrganizacaoController();
    $controller->listar();
?>


