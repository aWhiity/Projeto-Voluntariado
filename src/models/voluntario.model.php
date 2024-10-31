<?php


    class voluntariado {
        private $pdo;

        public function __construct($pdo) {
            $this->pdo = $pdo;
        }
        
        public function cadastrar($nome, $email, $senha) {
            $st = $this->pdo->prepare("insert into voluntario (nome, email, senha)");
            return $st->execute([$nome, $email, $senha]);
        }

    }


?>