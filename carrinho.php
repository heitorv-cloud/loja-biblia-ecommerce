<?php

session_start();
require "conexao.php";

echo "<h1>Carrinho de Compras</h1>";

$total = 0;

if (!isset($_SESSION['carrinho']) || empty($_SESSION['carrinho'])) {

    echo "Carrinho vazio";

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

        echo "Preço: R$ " . $produto['preco'] . "<br>";

        echo "Quantidade: " . $quantidade . "<br>";

        echo "Subtotal: R$ " . number_format($subtotal, 2, ',', '.') . "<br>";

        echo "<a href='remover_carrinho.php?id=".$produto['id']."'>
Remover
</a><br>";

    }

    echo "<hr>";

    echo "<h2>Total: R$ " . number_format($total, 2, ',', '.') . "</h2>";
}

?>

<br>

<a href="produtos.php">Voltar aos Produtos</a>