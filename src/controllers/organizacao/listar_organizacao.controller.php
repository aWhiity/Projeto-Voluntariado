<?php
    require_once '..\models\organizacao.model.php';
    require_once '..\config\database.php';

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


