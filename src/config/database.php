<?php


    class Database {

        protected $pdo; 
        protected $host = "localhost";
        protected $dbname = "voluntariado";
        protected $user = "root";
        protected $password = "";

        public function __construct()
        {
        
            try {
                $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname, $this->user, $this->password");//$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Exception $e) {
                die("Erro na conexão com o Banco de Dados: ".$e->getMessage());
            }
        }
    }
?>