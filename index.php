<?php

$rota = $_SERVER["REQUEST_URI"];
$metodo = $_SERVER["REQUEST_METHOD"];

require "./controller/seriesController.php";

if ($rota === "/"){
    require "view/galeria.php";
    exit();
}

if ($rota === "/novo"){
    if($metodo == "GET") require "view/cadastro.php";
    if($metodo == "POST") {
        $controller = new SeriesController();
        $controller->save($_REQUEST);
    };
    exit();
}

if (substr($rota, 0, strlen("/favoritar")) === "/favoritar"){
    $controller = new SeriesController();
    $controller->favorite(basename($rota));
    exit();
}

if (substr($rota, 0, strlen("/series")) === "/series"){
    if($metodo == "GET") require "view/galeria.php";
    if($metodo == "DELETE"){
        $controller = new SeriesController();
        $controller->delete(basename($rota));
    }
    exit();
}

require "view/404.php";

?>