<?php 

    require_once 'C:\xampp\htdocs\Projeto-Voluntariado\src\config\database.php';


    class OrganizacaoModel extends Database {


        public function __construct()
        {
            parent::__construct();
            
        }

        public function testarConexao() {

            $this->conectar();
            var_dump($this->pdo);
            if ($this->pdo) {
                echo "Acesso ao PDO na classe filha funcionando.";
            } else {
                echo "Erro ao acessar o PDO.";
            }
        }

        public function adicionarDadosFormulario(){
            $query = $this->pdo->prepare("inset into organizacao(nome) values (:nome)");
            
        }

    }

    $qq1 = new OrganizacaoModel();
    $qq1->testarConexao();

?>