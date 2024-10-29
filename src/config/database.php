<?php

    $host = "localhost";
    $dbname = "voluntariado";
    $user = "root";
    $password = "";

    $conexao = new mysqli($host, $user, $password, $dbname);
    if(!$conexao) {
        die("Erro na conexão com o Banco de Dados.". mysqli_error($conexao));
    }

?>