<?php

$conn = new PDO("mysql:dbname=dbphp7;host=localhost", "root", "17062018");

$stmt = $conn->prepare("DELETE FROM tb_usuarios WHERE idusuario = :ID");

$id = 26;

$stmt->bindParam(":ID", $id);

if ($stmt->execute())
    echo "Apagado.";