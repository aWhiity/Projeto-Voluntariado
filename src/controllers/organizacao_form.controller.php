<?php 

    require 'C:\xampp\htdocs\Projeto-Voluntariado\src\views/organizacao_form.view.php';

    class OrganizaçãoFormController {

        private $nome;
        private $nrIdenficacao;
        private $endereco;
        private $telefone;
        private $email;
        private $descricao;
        private $areaAcao;

        public function __construct($dados) {
            $this->nome = $dados['nome'] ?? null;
            $this->nrIdenficacao = $dados['nr_documento'] ?? null;
            $this->endereco = $dados['endereco'] ?? null;
            $this->telefone = $dados['telefone'] ?? null;
            $this->email = $dados['email'] ?? null;
            $this->descricao = $dados['descricao'] ?? null;
            $this->areaAcao = $dados['areaAcao'] ?? null;
        }
         
        public function validarResultados() : int {

            $erro = 0;
            var_dump($_POST);
            
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
            }
            return $erro;
        }

        public function adicionarResultados(){

        }

    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $organizacaoController = new OrganizaçãoFormController($_POST);
        if ($organizacaoController->validarResultados()==0){
           // $organizacaoController->adicionarResultados();
           require_once 'C:\xampp\htdocs\Projeto-Voluntariado\src\models\organizacao.model.php';
           require_once 'C:\xampp\htdocs\Projeto-Voluntariado\src\config\database.php';
        }
    }
    
    ?>