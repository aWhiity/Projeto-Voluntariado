<?php 

class VoluntarioFormController {

    private $nome;
    private $cpf;
    private $telefone;
    private $email;
    private $senha;


    public function index() {
        require './views/voluntario/cadastrar_voluntario.view.php';
        exit();
    }

    public function construtor() {
        $this->nome = $_POST['nome'] ?? null;
        $this->cpf = $_POST['cpf'] ?? null;
        $this->telefone = $_POST['telefone'] ?? null;
        $this->email = $_POST['email'] ?? null;
        $this->senha = $_POST['senha'] ?? null;

        if ($this->validarResultados() === 0) {
            $feedback = $this->adicionarResultados();
            echo $feedback;
        }
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
        
?>
