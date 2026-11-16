<?php

require "../conexao.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $estoque = $_POST["estoque"];
    $categoria = $_POST["categoria"];

    $sql = "INSERT INTO produtos
    (nome, descricao, preco, estoque, categoria_id)
    VALUES (?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $nome,
        $descricao,
        $preco,
        $estoque,
        $categoria
    ]);

    echo "Produto cadastrado com sucesso!";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Novo Produto</title>
</head>
<body>

<h1>Novo Produto</h1>

<form method="POST">

Nome:<br>
<input type="text" name="nome"><br><br>

Descrição:<br>
<textarea name="descricao"></textarea><br><br>

Preço:<br>
<input type="number" step="0.01" name="preco"><br><br>

Estoque:<br>
<input type="number" name="estoque"><br><br>

Categoria ID:<br>
<input type="number" name="categoria"><br><br>

<button type="submit">
Cadastrar Produto
</button>

</form>

</body>
</html>