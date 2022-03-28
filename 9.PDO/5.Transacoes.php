<?php

$conn = new PDO("mysql:dbname=dbphp7;host=localhost", "root", "17062018");

$conn->beginTransaction();

//$stmt = $conn->prepare("DELETE FROM tb_usuarios WHERE idusuario = :ID");
$stmt = $conn->prepare("DELETE FROM tb_usuarios WHERE idusuario = ?");

$id = 3;

//$stmt->bindParam(":ID", $id);

if (!$stmt->execute([$id])){
    $conn->rollBack();
    die();
}

echo "Apagado.";
$conn->commit();