<?php

require "../conexao.php";

$sql = "SELECT pedidos.*, usuarios.nome
        FROM pedidos
        INNER JOIN usuarios
        ON pedidos.usuario_id = usuarios.id
        ORDER BY pedidos.id DESC";

$stmt = $pdo->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Pedidos</title>
</head>
<body>

<h1>Pedidos Realizados</h1>

<?php while($pedido = $stmt->fetch()) { ?>

<hr>

<p>ID Pedido: <?php echo $pedido['id']; ?></p>

<p>Cliente: <?php echo $pedido['nome']; ?></p>

<p>Pagamento: <?php echo $pedido['forma_pagamento']; ?></p>

<p>Total: R$ <?php echo $pedido['total']; ?></p>

<p>Data: <?php echo $pedido['data_pedido']; ?></p>

<?php } ?>

</body>
</html>