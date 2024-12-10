<?php 

use Pecee\SimpleRouter\SimpleRouter;


    class OrganizacaoFormController {

        private $nome;
        private $cnpj;
        private $endereco;
        private $telefone;
        private $email;
        private $senha;
        private $descricao;

        public function index() {
            require './views/organizacao/cadastrar_organizacao.view.php';
            exit();
        }

        public function construtor() {
            $this->nome = $_POST['nome'] ?? null;
            $this->senha = $_POST['senha'] ?? null;
            $this->cnpj = $_POST['cnpj'] ?? null;
            $this->endereco = $_POST['endereco'] ?? null;
            $this->telefone = $_POST['telefone'] ?? null;
            $this->email = $_POST['email'] ?? null;
            $this->descricao = $_POST['descricao'] ?? null;

            
            if ($this->validarSeVazio()==0 && $this->validarValidade()==0 ){
           
                $feedback = $this->adicionarResultados(); 
                echo $feedback;   
                SimpleRouter::response()->redirect('./');
            }    
        }
         
        public function validarSeVazio() : int {

            $erro = 0;
            
            if (empty($this->nome)){
                echo "<div id='erro'>Nome obrigatório!<br>";
                $erro++;
            } if (empty($this->cnpj)){
                echo "Cnpj obrigatório!<br>";
                $erro++;
            } if (empty($this->endereco)){
                echo "<div id='erro'>Endereço obrigatório!</div>";
                $erro++;
            } if (empty($this->telefone)){
                echo "<div id='erro'>Telefone obrigatório!<br>";
                $erro++;
            } if (empty($this->email)){
                echo "<div id='erro'>Email obrigatório!<br>";
                $erro++;
            } if (empty($this->senha)){
                echo "<div id='erro'>Senha obrigatória!";
                $erro++;
            }
            return $erro;
        }

        public function validarValidade(){

            $erro = 0; 

            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
                echo"<div id='erro'>Por favor, insira um email válido!";
                $erro++;
            }

        }



        public function adicionarResultados(){
            
            $model = new OrganizacaoModel();
            return $model->cadastrar($this);
        
        }

        public function getNome() {
            return $this->nome;
        }

        public function getCnpj() {
            return $this->cnpj;
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

        public function getDescricao() {
            return $this->descricao;
        }

    }

   
    
    ?>