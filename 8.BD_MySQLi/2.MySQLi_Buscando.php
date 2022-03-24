<?php

$conn = new mysqli("localhost", "root", "","dbphp7");

if ($conn->connect_error){
    echo "Erro: ". $conn->connect_error;
    exit;
}

$result = $conn->query("SELECT * FROM TB_USUARIOS ORDER BY LOGIN");

$data = [];

while ($row = $result->fetch_assoc()) {

    array_push($data, $row);

}

echo json_encode($data);