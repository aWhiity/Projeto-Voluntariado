<?php

    echo "111";

    class Database {

        protected $pdo; 
        protected $host = "localhost";
        protected $dbname = "voluntariado";
        protected $user = "root";
        protected $password = "";

        public function __construct()
        {
            $this->conectar();
            //$conexao = new mysqli($host, $user, $password, $dbname);
            //if(!$conexao) {
            //    die("Erro na conexão com o Banco de Dados.". mysqli_error($conexao));
            //}
        }

        public function conectar(){
            try {
                $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);

            } catch (Exception $e) {
                die("Erro na conexão com o Banco de Dados. ".$e->getMessage());
                //echo"chegou no database";
            }
        }

        
    }
?>