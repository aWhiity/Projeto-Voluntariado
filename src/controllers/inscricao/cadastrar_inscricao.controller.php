<?php 

class CadastrarInscricaoController {

    private $idOportunidade;
    private $idUsuario;

    public function index() {
        require './views/voluntario/inicial_voluntario.view.php';
        exit();
    }

    public function construtor() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start(); 
        }
        $this->idOportunidade = $_POST['idOportunidade'] ?? null;
        $this->idUsuario = $_SESSION['user_id'];
        
        if ($this->validarSeVazio()==0){
       
            $feedback = $this->adicionarResultados(); 
            echo $feedback;                   
        }    
    }
     
    public function validarSeVazio() : int {

        $erro = 0;
        
        if (empty($this->idOportunidade)){
            echo "<div id='erro'>Id Oportunidade não encontrado<br>";
            $erro++;
        } if (empty($this->idUsuario)){
            echo "<div id='erro'>Id Usuario não encontrado<br>";
            $erro++;
        } 
        return $erro;
    }


    public function adicionarResultados(){
        
        $model = new InscricaoModel();
        $model->cadastrar($this);
        $this->index();
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getIdOportunidade() {
        return $this->idOportunidade;
    }

}

?>
