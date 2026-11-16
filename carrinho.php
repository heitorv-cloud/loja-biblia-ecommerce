<?php

session_start();
require "conexao.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h1>Carrinho de Compras</h1>

<?php

$total = 0;

if (!isset($_SESSION['carrinho']) || empty($_SESSION['carrinho'])) {

    echo "<p>Carrinho vazio</p>";

} else {

    foreach ($_SESSION['carrinho'] as $id => $quantidade) {

        $sql = "SELECT * FROM produtos WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);

        $produto = $stmt->fetch();

        $subtotal = $produto['preco'] * $quantidade;
        $total += $subtotal;

        echo "<hr>";

        echo "<h3>" . $produto['nome'] . "</h3>";

        echo "<p>Preço: R$ " . $produto['preco'] . "</p>";

        echo "<p>Quantidade: " . $quantidade . "</p>";

        echo "<p>Subtotal: R$ " . number_format($subtotal, 2, ',', '.') . "</p>";

        echo "<a class='btn btn-danger' href='remover_carrinho.php?id=".$produto['id']."'>
        Remover
        </a>";
    }

    echo "<hr>";

    echo "<h2>Total: R$ " . number_format($total, 2, ',', '.') . "</h2>";
}

?>

<br>

<a class="btn btn-success" href="checkout.php">
    Finalizar Compra
</a>

<a class="btn btn-primary" href="produtos.php">
    Voltar aos Produtos
</a>

</body>
</html>