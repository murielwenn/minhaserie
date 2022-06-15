<?php

$db = new SQLite3("db/series.db");

$sql = "DROP TABLE IF EXISTS series";

if ($db->exec($sql)) 
    echo "\nTabela apagada\n";

$sql = "CREATE TABLE series (id INTEGER PRIMARY KEY AUTOINCREMENT,
    titulo VARCHAR(200) NOT NULL,
    poster VARCHAR(200),
    sinopse TEXT
    )";

if ($db->exec($sql)) 
    echo "\nTabela series criada\n";
else
    echo "\nTabela series não pode ser criada\n";

$sql = "INSERT INTO series (titulo, poster, sinopse) VALUES (
    'Nome da série 1',
    'http://materializecss.com/images/sample-1.jpg',
    'Sinopsee')";

if ($db->exec($sql)) 
    echo "\nSéries inseridas com sucesso.\n";
else
    echo "\nSéries nao foram inseridas.\n";

?>