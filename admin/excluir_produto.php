<?php

require "../conexao.php";

$id = $_GET['id'];

try {

    $stmt = $pdo->prepare(
        "DELETE FROM produtos WHERE id = ?"
    );

    $stmt->execute([$id]);

    header("Location: produtos.php");

} catch(PDOException $e) {

    echo "Não é possível excluir este produto porque ele já faz parte de um pedido.";
}
