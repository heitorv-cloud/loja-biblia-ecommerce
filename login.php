<?php

session_start();
require "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);

    $usuario = $stmt->fetch();

    if ($usuario && password_verify($senha, $usuario["senha"])) {

        $_SESSION["id"] = $usuario["id"];
        $_SESSION["nome"] = $usuario["nome"];
        $_SESSION["tipo"] = $usuario["tipo"];

        echo "<h2>Login realizado com sucesso!</h2>";

    } else {

        echo "<h2>Email ou senha inválidos!</h2>";

    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<h1>Login</h1>

<form method="POST">

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Senha:</label><br>
    <input type="password" name="senha" required><br><br>

    <button type="submit">Entrar</button>

</form>

</body>
</html>