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
        $this->titulo = $_POST['tituloOp'] ?? null;
        $this->descricao = $_POST['descricao'] ?? null;
        $this->local = $_POST['local'] ?? null;

        $date = DateTime::createFromFormat('d/m/Y', $_POST['data'] );
        $this->data = $date->format('Y-m-d');

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

    public function redirecionar() {
        header("Location: ../src/home-organizacao");
        exit();
    }

    public function adicionarResultados(){
        $erro = $this->validarResultados();
        if ($erro == 0){
            $model = new Oportunidade(); 
            $model->cadastrar($this);
            $this->redirecionar();
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
