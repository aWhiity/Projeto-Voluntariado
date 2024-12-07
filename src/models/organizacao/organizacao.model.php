<?php 

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
      
         public function cadastrar($objetoOrganizacao) {
            try {
                $query = $this->pdo->prepare("INSERT INTO organizacao (nome, cnpj, telefone, endereco, email, senha, descricao, data_criacao) VALUES (:nome, :cnpj, :telefone, :endereco, :email, :senha, :descricao, :data_criacao)");
        
                $query->bindValue(":nome", $objetoOrganizacao->getNome());
                $query->bindValue(":cnpj", $objetoOrganizacao->getCnpj());
                $query->bindValue(":telefone", $objetoOrganizacao->getTelefone());
                $query->bindValue(":endereco", $objetoOrganizacao->getEndereco());
                $query->bindValue(":email", $objetoOrganizacao->getEmail());
                $query->bindValue(":senha", $objetoOrganizacao->getSenha());
                $query->bindValue(":descricao", $objetoOrganizacao->getDescricao());
                $query->bindValue(":data_criacao", date('Y-m-d')); 
        
                $query->execute();
            } catch (PDOException $e) {
                return 'Error: ' . $e->getMessage();
            }
        }
        
        public function editar($objetoOrganizacao) {
            try {
                $query = $this->pdo->prepare("UPDATE organizacao set nome = :nome, cnpj = :cnpj, telefone = :telefone, endereco = :endereco, email = :email, senha = :senha, descricao = :descricao data_edicao = :data_edicao where id = :id");
        
                $query->bindValue(":id", $objetoOrganizacao->getId());
                $query->bindValue(":nome", $objetoOrganizacao->getNome());
                $query->bindValue(":cnpj", $objetoOrganizacao->getCnpj());
                $query->bindValue(":telefone", $objetoOrganizacao->getTelefone());
                $query->bindValue(":endereco", $objetoOrganizacao->getEndereco());
                $query->bindValue(":email", $objetoOrganizacao->getEmail());
                $query->bindValue(":senha", $objetoOrganizacao->getSenha());
                $query->bindValue(":descricao", $objetoOrganizacao->getDescricao());
                $query->bindValue(":data_ultima_modificacao", date('Y-m-d')); 
        
                $query->execute();
            } catch (PDOException $e) {
                return 'Error: ' . $e->getMessage();
            }
        }
    
        public function selecionarPorId($id) {
            try {
                $query = $this->pdo->prepare("SELECT * from organizacao where id = :id");
        
                $query->bindValue(":id", $id);
                $query->execute();
                return $query->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                return 'Error: ' . $e->getMessage();
            }
        }

        public function verificarLogin($email, $senha) {
            try {
                $query = $this->pdo->prepare("SELECT id, email, senha from organizacao where email = :email and senha = :senha");
                $query->bindValue(":email", $email);
                $query->bindValue(":senha", $senha);
                $query->execute();
                $resultado = $query->fetch(PDO::FETCH_ASSOC);

                if ($resultado) {
                    return $resultado['id'];
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                return 'Error: ' . $e->getMessage();
            }
        }
    
        public function selecionarTodos() {
            try {
                $query = $this->pdo->prepare("SELECT * from organizacao");
                $query->execute();
                $listaOrganizacao = $query->fetchAll(PDO::FETCH_ASSOC);
                return $listaOrganizacao;
            } catch (PDOException $e) {
                return 'Error: ' . $e->getMessage();
            }
        }

    }

    

?>