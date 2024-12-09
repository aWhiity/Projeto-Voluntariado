<?php 

class EditarInscricaoController {
    private $status;
    private $idInscricao;

    public function index() {
        require './views/organizacao/inicial_organizacao.view.php';
        exit();
    }

    public function editarStatus() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start(); 
        }
        $this->status = filter_var($_POST['status'], FILTER_VALIDATE_BOOLEAN);
        $this->idInscricao = $_POST['idInscricao'] ?? null;
        
        
        $model = new InscricaoModel();
        $model->atualizarStatus($this->idInscricao, $this->status);
        $this->index();
    }
}
?>