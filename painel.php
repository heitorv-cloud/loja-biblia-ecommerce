<?php

session_start();

if (!isset($_SESSION["id"])) {
    die("Acesso negado");
}

echo "<h1>Bem-vindo, " . $_SESSION["nome"] . "</h1>";

?>