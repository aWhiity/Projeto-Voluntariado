<?php 

class OportunidadeFormController {

    private $idOrganizacao;
    private $titulo;
    private $descricao;
    private $status;
    //o default é aberta
    private $data;
    private $local;


    public function construtor() {
        
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $this->idOrganizacao = $_SESSION['user_id']; 
        $this->titulo = $_POST['titulo'] ?? null;
        $this->descricao = $_POST['descricao'] ?? null;
        $this->data = $_POST['data'] ?? null;
        $this->local = $_POST['local'] ?? null;

        $erros = $this->validarResultados();
        
        if (empty($erros)) {
            $feedback = $this->adicionarResultados();
            $_SESSION['mensagem_feedback'] = $feedback;
        } else {
            $_SESSION['mensagem_feedback'] = implode('<br>', $erros);
        }

        header("Location: ./home-organizacao");
        exit();
    }
     
    public function validarResultados() {
        
        $erros = [  ];
        
        if (empty($this->titulo)){
            $erros [] = "Titulo obrigatório!";
        }
        if (empty($this->descricao)){
            $erros [] = "Descrição obrigatória!";
        }
        if (empty($this->data)){
            $erros [] = "Data obrigatória!";
        }
        if (empty($this->local)){
            $erros [] = "Localização obrigatória!";
        }
        return $erros;
    }

    public function adicionarResultados(){
        
        $model = new Oportunidade(); 
        return $model->cadastrar($this) ? 
            "Oportunidade cadastrada com sucesso!" : 
            "Erro ao cadastrar a oportunidade.";
       
    }

    public function getIdOrganizacao() {
        return $this->idOrganizacao;
    }
    public function getTitulo() {
        return $this->titulo;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getDataEvento() {
        return $this->data;
    }

    public function getLocalizacao() {
        return $this->local;
    }
}


?>
