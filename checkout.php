<?php

session_start();
require "conexao.php";

if (!isset($_SESSION["id"])) {
    die("Faça login para finalizar a compra.");
}

if (empty($_SESSION["carrinho"])) {
    die("Carrinho vazio.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $forma_pagamento = $_POST["pagamento"];
    $usuario_id = $_SESSION["id"];

    $total = 0;

    foreach ($_SESSION["carrinho"] as $id => $quantidade) {

        $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
        $stmt->execute([$id]);

        $produto = $stmt->fetch();

        $total += $produto["preco"] * $quantidade;
    }

    $stmt = $pdo->prepare(
        "INSERT INTO pedidos (usuario_id, forma_pagamento, total)
         VALUES (?, ?, ?)"
    );

    $stmt->execute([
        $usuario_id,
        $forma_pagamento,
        $total
    ]);

    $pedido_id = $pdo->lastInsertId();

    foreach ($_SESSION["carrinho"] as $id => $quantidade) {

        $stmt = $pdo->prepare(
            "SELECT * FROM produtos WHERE id = ?"
        );

        $stmt->execute([$id]);

        $produto = $stmt->fetch();

        $stmt = $pdo->prepare(
            "INSERT INTO itens_pedido
            (pedido_id, produto_id, quantidade, preco_unitario)
            VALUES (?, ?, ?, ?)"
        );

        $stmt->execute([
            $pedido_id,
            $id,
            $quantidade,
            $produto["preco"]
        ]);

        $novoEstoque =
            $produto["estoque"] - $quantidade;

        $stmt = $pdo->prepare(
            "UPDATE produtos
             SET estoque = ?
             WHERE id = ?"
        );

        $stmt->execute([
            $novoEstoque,
            $id
        ]);
    }

    unset($_SESSION["carrinho"]);

    echo "<h2>Pedido realizado com sucesso!</h2>";

    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
</head>
<body>

<h1>Finalizar Compra</h1>

<form method="POST">

    <label>Forma de Pagamento:</label>

    <select name="pagamento">

        <option value="PIX">PIX</option>

        <option value="Boleto">Boleto</option>

        <option value="Cartao">Cartão</option>

    </select>

    <br><br>

    <button type="submit">
        Confirmar Compra
    </button>

</form>

</body>
</html>