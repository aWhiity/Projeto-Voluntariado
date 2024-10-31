<?php
require_once 'D:\xampp\htdocs\Projeto-Voluntariado\src\config\database.php';

class Voluntario extends Database {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function cadastrar($objetoVoluntario) {
        try {
            $query = $this->pdo->prepare("INSERT INTO voluntario (nome, cpf, telefone, email, senha, data_criacao) VALUES (:nome, :cpf, :telefone, :email, :senha, :dataCriacao)");
    
            $query->bindValue(":nome", $objetoVoluntario->getNome());
            $query->bindValue(":cpf", $objetoVoluntario->getNrIdenficacao());
            $query->bindValue(":telefone", $objetoVoluntario->getTelefone());
            $query->bindValue(":email", $objetoVoluntario->getEmail());
            $query->bindValue(":senha", $objetoVoluntario->getSenha());
            $query->bindValue(":dataCriacao", date('Y-m-d')); 
    
            $query->execute();
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }   
    
}
?>
