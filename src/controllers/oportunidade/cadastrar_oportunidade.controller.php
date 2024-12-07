<?php 

require '..\views\HomeOrg.view.php';

class OportunidadeFormController {

    private $idOrganizacao;
    private $titulo;
    private $descricao;
    private $data;
    private $local;


    public function __construct($dados) {
        $this->idOrganizacao = $_SESSION['user_id']; 
        $this->titulo = $dados['titulo'] ?? null;
        $this->descricao = $dados['descricao'] ?? null;
        $this->data = isset($dados['data']) ?? null;
        $this->local = $dados['local'] ?? null;
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
        $model = new Oportunidade();
        return $model->cadastrar($this);
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

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $voluntarioController = new OportunidadeFormController($_POST);
    if ($voluntarioController->validarResultados() == 0){
        require_once '..\models\oportunidade.model.php';
        require_once '..\config\database.php';
        $feedback = $voluntarioController->adicionarResultados();
        echo $feedback;
    }
}
?>
