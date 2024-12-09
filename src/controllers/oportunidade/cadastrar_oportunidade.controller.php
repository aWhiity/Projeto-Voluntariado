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

        $feedback = $this->adicionarResultados();
        $_SESSION['feedback'] = $feedback;

        if ($this->validarResultados() == 0){
            $feedback = $this->adicionarResultados();
            echo $feedback;
        }
    }
     
    public function validarResultados() {
        
        $erro = 0;
        
        if (empty($this->titulo)){
            echo "Titulo obrigatório!<br>";
            $erro++;
        }
        if (empty($this->descricao)){
            echo "Descrição obrigatória!<br>";
            $erro++;
        }
        if (empty($this->data)){
            echo "Data obrigatória!<br>";
            $erro++;
        }
        if (empty($this->local)){
            echo "Localização obrigatória!<br>";
            $erro++;
        }
        return $erro;
    }

    public function adicionarResultados(){
        $erro = $this->validarResultados();
        if ($erro == 0){
            $model = new Oportunidade(); 
            return $model->cadastrar($this) ? "Oportunidade cadastrada com sucesso!" : "Erro ao cadastrar a oportunidade.";
        } else{
            return "Erro ao cadastrar oportunidade. Verifique os campos e tente novamente.";
        }
        
       
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
