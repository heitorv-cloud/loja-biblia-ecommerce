<?php
session_start();
?>

<?php

session_start();

if (!isset($_SESSION["id"])) {
    die("Acesso negado");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Painel Administrativo</title>
</head>
<body>

<h1>Painel Administrativo</h1>

<a href="produtos.php">Gerenciar Produtos</a>

<br><br>

<a href="pedidos.php">Visualizar Pedidos</a>

<br><br>


<a href="../index.php">Voltar ao Site</a>

</body>
</html>