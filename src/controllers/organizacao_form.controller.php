<?php 

    require 'C:\xampp\htdocs\Projeto-Voluntariado\src\views/organizacao_form.view.php';
    //require_once 'C:\xampp\htdocs\Projeto-Voluntariado\src\controllers\organizacao_form.controller.php';

    class OrganizaçãoFormController {

        private $nome;
        private $nrIdenficacao;
        private $endereco;
        private $telefone;
        private $email;
        private $senha;
        private $descricao;
        private $areaAcao;

        public function __construct($dados) {
            $this->nome = $dados['nome'] ?? null;
            $this->senha = $dados['senha'] ?? null;
            $this->nrIdenficacao = $dados['nr_documento'] ?? null;
            $this->endereco = $dados['endereco'] ?? null;
            $this->telefone = $dados['telefone'] ?? null;
            $this->email = $dados['email'] ?? null;
            $this->descricao = $dados['descricao'] ?? null;
            $this->areaAcao = $dados['areaAcao'] ?? null;
        }
         
        public function validarResultados() : int {

            $erro = 0;
            
            if (empty($this->nome)){
                echo "Nome obrigatório!<br>";
                $erro++;
            } if (empty($this->nrIdenficacao)){
                echo "Número de Identificação obrigatório!<br>";
                $erro++;
            } if (empty($this->endereco)){
                echo "Endereço obrigatório!<br>";
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
            
            $model = new OrganizacaoModel();
            $model->adicionarDadosFormulario($this);
        
        }

        public function getNome() {
            return $this->nome;
        }

        public function getNrIdenficacao() {
            return $this->nrIdenficacao;
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

        public function getAreaAcao() {
            return $this->areaAcao;
        }

    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $organizacaoController = new OrganizaçãoFormController($_POST);
        if ($organizacaoController->validarResultados()==0){
           
           require_once 'C:\xampp\htdocs\Projeto-Voluntariado\src\models\organizacao.model.php';
           require_once 'C:\xampp\htdocs\Projeto-Voluntariado\src\config\database.php';
           $feedback = $organizacaoController->adicionarResultados();
           
        }
    }
    
    ?>