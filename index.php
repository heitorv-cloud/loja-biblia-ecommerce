<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja Bíblia</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="index.php">
            📖 Loja Bíblia
        </a>

        <div>

            <a class="btn btn-outline-light me-2" href="produtos.php">
                Produtos
            </a>

            <a class="btn btn-outline-light me-2" href="carrinho.php">
                Carrinho
            </a>

            <?php if(isset($_SESSION["nome"])) { ?>

                <a class="btn btn-success me-2">
                    <?php echo $_SESSION["nome"]; ?>
                </a>

                <a class="btn btn-danger" href="logout.php">
                    Sair
                </a>

            <?php } else { ?>

                <a class="btn btn-primary me-2" href="login.php">
                    Login
                </a>

                <a class="btn btn-warning" href="cadastro.php">
                    Cadastro
                </a>

            <?php } ?>

        </div>

    </div>
</nav>

<div class="container">

    <div class="text-center py-5">

        <h1 class="display-4">
            📖 Loja Bíblia
        </h1>

        <p class="lead">
            As melhores Bíblias, Devocionais e Livros Cristãos.
        </p>

        <a href="produtos.php" class="btn btn-success btn-lg">
            Ver Produtos
        </a>

    </div>

    <div class="row">

        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body text-center">

                    <h3>📚 Livros</h3>

                    <p>
                        Diversos títulos cristãos para estudo.
                    </p>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body text-center">

                    <h3>📖 Bíblias</h3>

                    <p>
                        Modelos de estudo, devocional e evangelismo.
                    </p>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body text-center">

                    <h3>🙏 Devocionais</h3>

                    <p>
                        Leituras diárias para fortalecer sua fé.
                    </p>

                </div>
            </div>
        </div>

    </div>

</div>

<footer class="bg-dark text-white text-center p-3 mt-5">

    Loja Bíblia © 2026

</footer>

</body>
</html>
