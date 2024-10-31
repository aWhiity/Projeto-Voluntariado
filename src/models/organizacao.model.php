<?php 

    require_once 'C:\xampp\htdocs\Projeto-Voluntariado\src\config\database.php';
    


    class OrganizacaoModel extends Database {


        public function __construct()
        {
            parent::__construct();
            
        }

        public function testarConexao() {

            //$this->conectar();
            var_dump($this->pdo);
            if ($this->pdo) {
                echo "Acesso ao PDO na classe filha funcionando.";
            } else {
                echo "Erro ao acessar o PDO.";
            }
        }
        //, email, senha, data_criacao
         //, :email, :senha, :data_criacao
        public function adicionarDadosFormulario($objetoOrganizacao)  {

            $nome = $objetoOrganizacao->getNome();
            $nr_documento = $objetoOrganizacao->getNrIdenficacao();
            $endereco = $objetoOrganizacao->getEndereco();
            $telefone = $objetoOrganizacao->getTelefone();
            $email = $objetoOrganizacao->getEmail();
            $senha = $objetoOrganizacao->getSenha();
            $descricao = $objetoOrganizacao->getDescricao();
            $area_acao = $objetoOrganizacao->getAreaAcao();


            $query = $this->pdo->prepare("insert into organizacao (nome, cnpj, telefone, endereco, email, senha, descricao, data_criacao) values (:nome, :nr_documento, :telefone, :endereco, :email, :senha, :descricao, :area_acao)");
           
            $query->bindParam(':nome', $nome);
            $query->bindParam(':nr_documento', $nr_documento);
            $query->bindParam(':endereco', $endereco);
            $query->bindParam(':telefone', $telefone);
            $query->bindParam(':email', $email);
            $query->bindParam(':senha', $senha);
            $query->bindParam(':descricao', $descricao);
            $query->bindParam(':area_acao', $area_acao);
                    
            $query->execute();

            
        }

    }

    

?>