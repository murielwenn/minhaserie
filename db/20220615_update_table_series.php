<?php

$db = new SQLite3("series.db");

$sql = "ALTER TABLE series ADD COLUMN favorito INT DEFAULT 0";

if ($db->exec($sql)) 
    echo "\nTabela séries alterada com sucesso\n";
else
    echo "\nErro ao alterar a tabela séries\n";


?>