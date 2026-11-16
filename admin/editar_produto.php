<?php

session_start();

if (!isset($_SESSION["id"])) {
    die("Acesso negado");
}

?>

<?php

require "../conexao.php";

$id = $_GET['id'];

$stmt = $pdo->prepare(
    "SELECT * FROM produtos WHERE id = ?"
);

$stmt->execute([$id]);

$produto = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $estoque = $_POST["estoque"];

    $stmt = $pdo->prepare(
        "UPDATE produtos
         SET nome = ?, preco = ?, estoque = ?
         WHERE id = ?"
    );

    $stmt->execute([
        $nome,
        $preco,
        $estoque,
        $id
    ]);

    header("Location: produtos.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Produto</title>
</head>
<body>

<h1>Editar Produto</h1>

<form method="POST">

Nome:<br>
<input type="text"
name="nome"
value="<?php echo $produto['nome']; ?>">

<br><br>

Preço:<br>
<input type="number"
step="0.01"
name="preco"
value="<?php echo $produto['preco']; ?>">

<br><br>

Estoque:<br>
<input type="number"
name="estoque"
value="<?php echo $produto['estoque']; ?>">

<br><br>

<button type="submit">
Salvar
</button>

</form>

</body>
</html>