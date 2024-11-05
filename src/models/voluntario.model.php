<?php
require_once '..\config\database.php';

class VoluntarioModel extends Database {
    
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
            $query = $this->pdo->prepare("UPDATE voluntario set nome = :nome, cpf = :cpf, telefone = :telefone, email = :email, data_ultima_modificacao = :data_ultima_modificacao where id = :id");
    
            $query->bindValue(':id', $objetoVoluntario->getId());
            $query->bindValue(":nome", $objetoVoluntario->getNome());
            $query->bindValue(":cpf", $objetoVoluntario->getCpf());
            $query->bindValue(":telefone", $objetoVoluntario->getTelefone());
            $query->bindValue(":email", $objetoVoluntario->getEmail());
            $query->bindValue(":data_ultima_modificacao", date('Y-m-d')); 
    
            $query->execute();
            return true;
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function selecionarPorId($id) {
        try {
            $query = $this->pdo->prepare("SELECT * from voluntario where id = :id");
    
            $query->bindValue(":id", $id);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function verificarLogin($email, $senha) {
        try {
            $query = $this->pdo->prepare("SELECT id, email, senha from voluntario where email = :email and senha = :senha");
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
