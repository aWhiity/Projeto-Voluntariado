<?php
require_once 'D:\xampp\htdocs\Projeto-Voluntariado\src\models\voluntario.model.php';
require_once 'D:\xampp\htdocs\Projeto-Voluntariado\src\config\database.php';

class EditarVoluntarioController {
    private $nome;
    private $cpf;
    private $telefone;
    private $email;
    private $id;

    public function __construct($dados) {
        $this->nome = $dados['nome'] ?? null;
        $this->cpf = $dados['cpf'] ?? null;
        $this->telefone = $dados['telefone'] ?? null;
        $this->email = $dados['email'] ?? null;
        $this->id = $dados['id'];
    }

    public function validarResultados() {
        $erro = 0;

        if (empty($this->nome)) {
            echo "Nome é obrigatório!<br>";
            $erro++;
        }
        if (empty($this->cpf)) {
            echo "CPF é obrigatório!<br>";
            $erro++;
        }
        if (empty($this->telefone)) {
            echo "Telefone é obrigatório!<br>";
            $erro++;
        }
        if (empty($this->email)) {
            echo "Email é obrigatório!<br>";
            $erro++;
        }
        return $erro;
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

    public function getId() {
        return $this->id;
    }

    public function editarVoluntario() {
        $voluntarioModel = new Voluntario();

        if ($this->validarResultados() == 0) {
            $resultado = $voluntarioModel->editar($this);
            if($resultado) {
                header('Location: ../views/listar_voluntarios.view.php');
                exit;
            }
        } else {
            return "Erro na validação dos dados.";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new EditarVoluntarioController($_POST);
    $resultado = $controller->editarVoluntario();
    echo $resultado;
}
?>
