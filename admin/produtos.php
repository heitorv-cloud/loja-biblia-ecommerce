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

<a href="editar_produto.php?id=<?php echo $produto['id']; ?>">
Editar
</a>

|

R$ <?php echo $produto['preco']; ?>

|

<a href="excluir_produto.php?id=<?php echo $produto['id']; ?>">
Excluir
</a>

</p>

<?php } ?>

</body>
</html>