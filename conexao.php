<?php
    //DEFINIR DATA E HORA COM BASE NO LOCAL SELECIONADO
    date_default_timezone_set('America/Sao_Paulo');

    try {
        $pdo = new PDO("mysql:dbname=php8;host=localhost","root","12345678");
    } catch (\Throwable $e) {
        echo "<p>Erro ao tentar conectar o banco de dados </p>".$e;
    }
?>