<?php

require "conexao.php";

$sql = "SELECT * FROM produtos";
$stmt = $pdo->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            📖 Loja Bíblia
        </a>

        <a class="btn btn-outline-light" href="carrinho.php">
            Carrinho
        </a>
    </div>
</nav>

<div class="container">

    <h1 class="text-center mb-4">
        Nossos Produtos
    </h1>

    <div class="row">

        <?php while($produto = $stmt->fetch()) { ?>

        <div class="col-md-4 mb-4">

            <div class="card shadow h-100">

                <img
                    src="<?php echo $produto['imagem']; ?>"
                    class="card-img-top"
                    style="height: 350px; object-fit: cover;"
                    alt="<?php echo $produto['nome']; ?>">

                <div class="card-body">

                    <h5 class="card-title">
                        <?php echo $produto['nome']; ?>
                    </h5>

                    <p class="card-text">
                        <?php echo $produto['descricao']; ?>
                    </p>

                    <p class="text-success fw-bold">
                        R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?>
                    </p>

                    <p>
                        Estoque:
                        <?php echo $produto['estoque']; ?>
                    </p>

                    <a
                        href="adicionar_carrinho.php?id=<?php echo $produto['id']; ?>"
                        class="btn btn-success">

                        Adicionar ao Carrinho

                    </a>

                </div>

            </div>

        </div>

        <?php } ?>

    </div>

</div>

</body>
</html>