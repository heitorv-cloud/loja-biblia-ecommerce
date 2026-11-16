<?php
session_start();
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Loja Bíblia</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php if(isset($_SESSION["nome"])) { ?>

<h2>Bem-vindo, <?php echo $_SESSION["nome"]; ?>!</h2>

<?php } ?>

<a href="logout.php">Sair</a>

    <h1>Loja Bíblia</h1>

    <a href="login.php">Login</a>
    <a href="cadastro.php">Cadastro</a>

    <hr>

    <h2>Bem-vindo à Loja Bíblia</h2>
    <p>Encontre as melhores bíblias e livros cristãos.</p>

    <a href="produtos.php">Produtos</a>
    
</body>
</html>