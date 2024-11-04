<?php
require_once 'D:\xampp\htdocs\Projeto-Voluntariado\src\config\database.php';

class Voluntario extends Database {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function cadastrar($objetoVoluntario) {
        try {
            $query = $this->pdo->prepare("INSERT INTO voluntario (nome, cpf, telefone, email, senha, data_criacao) VALUES (:nome, :cpf, :telefone, :email, :senha, :data_criacao)");
    
            $query->bindValue(":nome", $objetoVoluntario->getNome());
            $query->bindValue(":cpf", $objetoVoluntario->getCpf());
            $query->bindValue(":telefone", $objetoVoluntario->getTelefone());
            $query->bindValue(":email", $objetoVoluntario->getEmail());
            $query->bindValue(":senha", $objetoVoluntario->getSenha());
            $query->bindValue(":data_criacao", date('Y-m-d')); 
    
            $query->execute();
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
    
    public function editar($objetoVoluntario) {
        try {
            $query = $this->pdo->prepare("UPDATE voluntario set nome = :nome, cpf = :cpf, telefone = :telefone, email = :email, senha = :senha, data_edicao = :data_edicao where id = :id");
    
            $query->bindValue(":nome", $objetoVoluntario->getNome());
            $query->bindValue(":cpf", $objetoVoluntario->getCpf());
            $query->bindValue(":telefone", $objetoVoluntario->getTelefone());
            $query->bindValue(":email", $objetoVoluntario->getEmail());
            $query->bindValue(":senha", $objetoVoluntario->getSenha());
            $query->bindValue(":id", $objetoVoluntario->getId());
            $query->bindValue(":data_edicao", date('Y-m-d')); 
    
            $query->execute();
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function selecionarTodos() {
        try {
            $query = $this->pdo->prepare("SELECT * from voluntario");
            $query->execute();
            $listaVoluntarios = $query->fetchAll(PDO::FETCH_ASSOC);
            return $listaVoluntarios;
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
    
}
?>
