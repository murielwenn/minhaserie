<?php

require "Conexao.php";

class seriesRepositoryPDO{

    private $conexao;

    public function __construct(){
        $this->conexao = Conexao::criarBanco();
    }

    public function listarTodos():array{

        $listaSeries = array();
        $sql = "SELECT * FROM series";
        $rs = $this->conexao->query($sql);
        while ($serie = $rs->fetchObject()){
            array_push($listaSeries, $serie);
        }
        return $listaSeries;

    }

    public function salvar($serie):bool{
        
        $sql = "INSERT INTO series (titulo, poster, sinopse) VALUES (:titulo, :poster, :sinopse)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':titulo', $serie->titulo, PDO::PARAM_STR);
        $stmt->bindValue(':poster', $serie->poster, PDO::PARAM_STR);
        $stmt->bindValue(':sinopse', $serie->sinopse, PDO::PARAM_STR);
        return $stmt->execute();
        
    }

    public function favoritar(int $id){
        $sql = "UPDATE series SET favorito = NOT favorito WHERE id=:id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        
        if($stmt->execute()){
            return "ok";
        }else{
            return "erro";
        }
    }
}