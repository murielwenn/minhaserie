<?php

session_start();
require "./repository/seriesRepositoryPDO.php";
require "./model/Serie.php";

class seriesController{

    public function index(){
        $seriesRepository = new seriesRepositoryPDO();
        return $seriesRepository->listarTodos();
    }

    public function save($request){

        $seriesRepository = new SeriesRepositoryPDO();
        $serie = (object) $request;

        $upload = $this->savePoster($_FILES);

        if(gettype($upload)=="string"){
            $serie->poster = $upload;
        }

        

        if ($seriesRepository->salvar($serie)) 
            $_SESSION["msg"] = "Série cadastrada com sucesso";
        else
            $_SESSION["msg"] = "Erro ao cadastrar série";

        header("Location: /");

    }

    private function savePoster($file){

        $posterDir = "img/posters/";
        $posterPath = $posterDir . basename($file["poster_file"]["name"]);
        $posterTmp = $file["poster_file"]["tmp_name"];
        if (move_uploaded_file($posterTmp, $posterPath)){
            return $posterPath;
        } else {
            return false;
        }
    }

    public function favorite(int $id){

        $seriesRepository = new SeriesRepositoryPDO();
        $result = ['success' => $seriesRepository->favoritar($id)];
        header('Content-type: application/json');
        echo json_encode($result);
    }    

    public function delete(int $id){

        $seriesRepository = new SeriesRepositoryPDO();
        $result = ['success' => $seriesRepository->delete($id)];
        header('Content-type: application/json');
        echo json_encode($result);
    }    

}



?>