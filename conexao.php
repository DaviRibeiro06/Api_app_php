<?php

    $banco = 'app_mercantil';
    $host = 'localhost';
    $usuario = 'root';
    $senha = '1234';


    date_default_timezone_set('America/Sao_Paulo');

    try{
        $pdo = new PDO("mysql:dbname=$banco;ho1st=$host;charset=utf8", "$usuario", "$senha");
    }catch (Exception $e){
        echo "Erro ao conectar com o banco de dados! " . $e; 
    }

