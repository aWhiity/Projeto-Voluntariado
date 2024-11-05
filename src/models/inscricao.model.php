<?php
require_once 'D:\xampp\htdocs\Projeto-Voluntariado\src\config\database.php';

class Inscricao extends Database {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function cadastrar($objetoInscricao) {
        try {
            $query = $this->pdo->prepare("INSERT INTO inscricao (id_oportunidade, id_voluntario, status, data_cricao) values (:id_oportunidade, :id_voluntario, :status, :data_cricao)");
    
            $query->bindValue(":id_oportunidade", $objetoInscricao->getIdOportunidade());
            $query->bindValue(":id_voluntario", $objetoInscricao->getIdVoluntario());
            $query->bindValue(":status", $objetoInscricao->getStatus());
            $query->bindValue(":data_criacao", date('Y-m-d')); 
    
            $query->execute();
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
    
    public function editar($objetoInscricao) {
        try {
            $query = $this->pdo->prepare("UPDATE inscricao set id_oportunidade = :id_oportunidade, id_voluntario = :id_voluntario, status = :status, data_ultima_modificacao = :data_ultima_modificacao where id = :id");
    
            $query->bindValue(":id", $objetoInscricao->getId());
            $query->bindValue(":id_oportunidade", $objetoInscricao->getIdOportunidade());
            $query->bindValue(":id_voluntario", $objetoInscricao->getIdVoluntario());
            $query->bindValue(":status", $objetoInscricao->getStatus());
            $query->bindValue(":data_ultima_modificacao", date('Y-m-d')); 
    
            $query->execute();
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function selecionarTodos() {
        try {
            $query = $this->pdo->prepare("SELECT * from inscricao");
            $query->execute();
            $listaVoluntarios = $query->fetchAll(PDO::FETCH_ASSOC);
            return $listaVoluntarios;
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    
}
?>
