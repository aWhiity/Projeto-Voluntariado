<?php
    
    require_once 'D:\xampp\htdocs\Projeto-Voluntariado\src\config\database.php';

    class Voluntario extends Database {
        

        public function __construct() {

        }
        
        public function cadastrar($objetoVoluntario) {
            $query = $this->pdo->prepare("insert into voluntario (default, :nome, :cpf, :telefone, :email, :senha, :dataCriacao");
            $query->bindParam(":nome", $objetoVoluntario->getNome());
            $query->bindParam(":cpf", $objetoVoluntario->getCpf());
            $query->bindParam(":telefone", $objetoVoluntario->getTelefone());
            $query->bindParam(":email", $objetoVoluntario->getEmail());
            $query->bindParam(":senha", $objetoVoluntario->getSenha());
            $query->bindParam(":dataCriacao", date('Y-m-d'));

            $query->execute();
        }


    }

?>