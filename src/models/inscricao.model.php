<?php
require_once '..\config\database.php';

class InscricaoModel extends Database {
    
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

    public function selecionarPorVoluntario($idVoluntario) {
        try {
            $query = $this->pdo->prepare("SELECT org.nome, op.titulo, op.descricao, op.localizacao, inscricao.data_criacao 
                                                from inscricao
                                                left join oportunidade as op on op.id = inscricao.id_oportunidade
                                                left join organizacao as org on org.id = op.id_organizacao
                                                left join voluntario as vol on vol.id = inscricao.id_voluntario
                                                WHERE
                                                inscricao.status = 'aprovado' and 
                                                vol.id = :id_voluntario;"
                                        );

            $query->bindValue(":id_voluntario", $idVoluntario);

            $query->execute();
            $listaInscricao = $query->fetchAll(PDO::FETCH_ASSOC);
            return $listaInscricao;
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function selecionarTodos() {
        try {
            $query = $this->pdo->prepare("SELECT * from inscricao");
            $query->execute();
            $listaInscricao = $query->fetchAll(PDO::FETCH_ASSOC);
            return $listaInscricao;
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    
}
?>
