<?php

class Oportunidade extends Database {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function cadastrar($objetoOportunidade) {
        try {
            $query = $this->pdo->prepare("INSERT INTO oportunidade (id_organizacao, titulo, descricao, data_evento, localizacao, data_cricao) values (:id_organizacao, :titulo, :descricao, :data_evento, :localizacao, :data_cricao)");
    
            $query->bindValue(":id_organizacao", $objetoOportunidade->getIdOrganizacao());
            $query->bindValue(":titulo", $objetoOportunidade->getTitulo());
            $query->bindValue(":descricao", $objetoOportunidade->getDescricao());
            $query->bindValue(":data_evento", $objetoOportunidade->getDataEvento());
            $query->bindValue(":localizacao", $objetoOportunidade->getLocalizacao());
            $query->bindValue(":data_criacao", date('Y-m-d')); 
    
            $query->execute();
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
    
    public function editar($objetoOportunidade) {
        try {
            $query = $this->pdo->prepare("UPDATE oportunidade set id_organizacao = :id_organizacao, titulo = :titulo, descricao = :descricao, data_evento = :data_evento, localizacao = :localizacao, data_ultima_modificacao = :data_ultima_modificacao where id = :id");
    
            $query->bindValue(":id", $objetoOportunidade->getId());
            $query->bindValue(":id_organizacao", $objetoOportunidade->getIdOrganizacao());
            $query->bindValue(":titulo", $objetoOportunidade->getTitulo());
            $query->bindValue(":descricao", $objetoOportunidade->getDescricao());
            $query->bindValue(":data_evento", $objetoOportunidade->getDataEvento());
            $query->bindValue(":localizacao", $objetoOportunidade->getLocalizacao());
            $query->bindValue(":data_ultima_modificacao", date('Y-m-d')); 
    
            $query->execute();
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function selecionarTodos() {
        try {
            $query = $this->pdo->prepare("SELECT * from oportunidade");
            $query->execute();
            $listaOportunidades = $query->fetchAll(PDO::FETCH_ASSOC);
            return $listaOportunidades;
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    
}
?>
