<?php


    class voluntariado {
        private $pdo;
        

        public function __construct($pdo) {
            $this->pdo = $pdo;

        }
        
        public function cadastrar($objetoVoluntario) {
            $query = $this->pdo->prepare("insert into voluntario (:nome, :cpf, :telefone, :email, :senha, :dataCriacao");
            $query->bindParam(":nome", $objetoVoluntario->getNome());
            $query->bindParam(":cpf", $objetoVoluntario->getCpf());
            $query->bindParam(":telefone", $objetoVoluntario->getTelefone());
            $query->bindParam("email", $objetoVoluntario->getEmail());
            $query->bindParam("senha", $objetoVoluntario->getSenha());
            $query->bindParam("dataCriacao", date('d/m/Y'));

            $query->execute();
        }

        
    }

?>