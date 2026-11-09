<?php

require "conexao.php";

$sql = "SELECT * FROM produtos";
$stmt = $pdo->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Produtos</title>
</head>
<body>

<h1>Produtos</h1>

<?php while($produto = $stmt->fetch()) { ?>

<hr>

<h2><?php echo $produto["nome"]; ?></h2>

<p><?php echo $produto["descricao"]; ?></p>

<p>Preço: R$ <?php echo $produto["preco"]; ?></p>

<p>Estoque: <?php echo $produto["estoque"]; ?></p>

<a href="adicionar_carrinho.php?id=<?php echo $produto['id']; ?>">
    Adicionar ao Carrinho
</a>

<?php } ?>
</body>
</html>