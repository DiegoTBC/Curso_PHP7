<?php

$conn = new PDO("mysql:dbname=dbphp7;host=localhost", "root", "17062018");

$stmt = $conn->prepare("INSERT INTO tb_usuarios (login, senha) VALUES (:LOGIN,:PW)");

$login = "jose";
$pw = "132dsa";

$stmt->bindParam(":LOGIN", $login);
$stmt->bindParam(":PW", $pw);

if ($stmt->execute())
    echo "Sucesso.";

