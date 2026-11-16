<?php

require "../conexao.php";

$stmt = $pdo->query("SELECT * FROM produtos");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Gerenciar Produtos</title>
</head>
<body>

<h1>Gerenciar Produtos</h1>

<a href="novo_produto.php">Novo Produto</a>

<hr>

<?php while($produto = $stmt->fetch()) { ?>

<p>

<?php echo $produto['nome']; ?>

|

R$ <?php echo $produto['preco']; ?>

</p>

<?php } ?>

</body>
</html>