<?php

$host = "localhost";
$banco = "lojabiblia";
$usuario = "root";
$senha = "";

try {

    $pdo = new PDO(
        "mysql:host=$host;dbname=$banco;charset=utf8",
        $usuario,
        $senha
    );

} catch (PDOException $erro) {

    die("Erro: " . $erro->getMessage());

}
