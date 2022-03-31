<?php

require_once "config.php";

$sql = new SQL();
$result = $sql->select("SELECT * FROM tb_usuarios ORDER BY login");

$header = [];

//Pegar somente o nome da coluna para servir como header
foreach ($result[0] as $descricao => $valor){
    array_push($header, ucfirst($descricao));
}

$file = fopen("usuarios.csv", "w+");
fwrite($file, implode(";", $header)."\r\n");

foreach ($result as $row){
    $data = [];
    foreach ($row as $key => $value){
        array_push($data, $value);
    }

    fwrite($file, implode(";", $data). "\r\n");
}

fclose($file);
