<?php

class Conexao{

    public static function criarBanco():PDO{

        $env = parse_ini_file('.env');
        $databaseType = $env["databasetype"];
        $database = $env["database"];
        $server = $env["server"];
        $pass = $env["pass"];
        $user = $env["user"];

        if($database === "mysql"){
            $database = "host=$server; dbname=$database";
        }

        return new PDO("$databaseType:$database", $user, $pass);

    }
}