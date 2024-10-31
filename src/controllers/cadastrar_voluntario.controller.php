<?php 

    require 'D:\xampp\htdocs\Projeto-Voluntariado\src\views\cadastrar_voluntario.view.php';
    //require_once 'C:\xampp\htdocs\Projeto-Voluntariado\src\controllers\organizacao_form.controller.php';

    class VoluntarioFormController {

        private $nome;
        private $cpf;
        private $endereco;
        private $telefone;
        private $email;
        private $senha;

        private $voluntarioModel;

        public function __construct($dados) {
            $this->nome = $dados['nome'] ?? null;
            $this->senha = $dados['senha'] ?? null;
            $this->cpf = $dados['cpf'] ?? null;
            $this->endereco = $dados['endereco'] ?? null;
            $this->telefone = $dados['telefone'] ?? null;
            $this->email = $dados['email'] ?? null;
            $this->descricao = $dados['descricao'] ?? null;
            $this->areaAcao = $dados['areaAcao'] ?? null;
        
        }
         
        public function validarResultados() {

            $erro = 0;
            
            if (empty($this->nome)){
                echo "Nome obrigatório!<br>";
                $erro++;
            } if (empty($this->cpf)){
                echo "Número de Identificação obrigatório!<br>";
                $erro++;
            } if (empty($this->telefone)){
                echo "Telefone obrigatório!<br>";
                $erro++;
            } if (empty($this->email)){
                echo "Email obrigatório!<br>";
                $erro++;
            } if (empty($this->senha)){
                echo "Senha obrigatória!";
                $erro++;
            }
            return $erro;
        }

        public function adicionarResultados(){
            
            $model = new Voluntario();
            $model->cadastrar($this);
        
        }

        public function getNome() {
            return $this->nome;
        }

        public function getNrIdenficacao() {
            return $this->cpf;
        }

        public function getEndereco() {
            return $this->endereco;
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
        if ($voluntarioController->validarResultados()==0){
           
           require_once 'D:\xampp\htdocs\Projeto-Voluntariado\src\models\voluntario.model.php';
           require_once 'D:\xampp\htdocs\Projeto-Voluntariado\src\config\database.php';
           $feedback = $voluntarioController->adicionarResultados();
           
        }
    }
    
    ?>