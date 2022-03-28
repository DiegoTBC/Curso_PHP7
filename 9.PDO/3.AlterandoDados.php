<?php

$conn = new PDO("mysql:dbname=dbphp7;host=localhost", "root", "17062018");

$stmt = $conn->prepare("UPDATE tb_usuarios SET login = :LOGIN, senha = :PW WHERE idusuario = :ID");

$login = "teste";
$pw = "456dsada";
$id = 25;

$stmt->bindParam(":LOGIN", $login);
$stmt->bindParam("PW", $pw);
$stmt->bindParam(":ID", $id);

if ($stmt->execute())
    echo "Atualizado";