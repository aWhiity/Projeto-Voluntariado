<?php 

require '..\views\cadastrar_voluntario.view.php';

class VoluntarioFormController {

    private $nome;
    private $cpf;
    private $telefone;
    private $email;
    private $senha;


    public function __construct($dados) {
        $this->nome = $dados['nome'] ?? null;
        $this->cpf = $dados['cpf'] ?? null;
        $this->telefone = $dados['telefone'] ?? null;
        $this->email = $dados['email'] ?? null;
        $this->senha = $dados['senha'] ?? null;
    }
     
    public function validarResultados() {
        $erro = 0;
        
        if (empty($this->nome)){
            echo "Nome obrigatório!<br>";
            $erro++;
        }
        if (empty($this->cpf)){
            echo "Número de Identificação obrigatório!<br>";
            $erro++;
        }
        if (empty($this->telefone)){
            echo "Telefone obrigatório!<br>";
            $erro++;
        }
        if (empty($this->email)){
            echo "Email obrigatório!<br>";
            $erro++;
        }
        if (empty($this->senha)){
            echo "Senha obrigatória!<br>";
            $erro++;
        }
        return $erro;
    }

    public function adicionarResultados(){
        $model = new VoluntarioModel();
        return $model->cadastrar($this);
    }

    public function getNome() {
        return $this->nome;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $voluntarioController = new VoluntarioFormController($_POST);
    if ($voluntarioController->validarResultados() == 0){
        require_once '..\models\voluntario.model.php';
        require_once '..\src\config\database.php';
        $feedback = $voluntarioController->adicionarResultados();
        echo $feedback;
    }
}
?>
