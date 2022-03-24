<?php

$conn = new mysqli("localhost", "root", "","dbphp7");

if ($conn->connect_error){
    echo "Erro: ". $conn->connect_error;
    exit;
}

$stmt = $conn->prepare("INSERT INTO tb_usuarios (login, senha) VALUES (?,?)");
$stmt->bind_param("ss", $user, $pw );

$user = "user";
$pw = "132";

$stmt->execute();