<?php

$file = fopen("arquivo.txt", "r");

$header = explode(";",fgets($file));

$dados = [];

while ($row = fgets($file)){
    $linhaArray = explode(";", $row);


    $linha = [];

    for ($i = 0; $i < count($header); $i++){
        $linha[$header[$i]] = $linhaArray[$i];
    }


    array_push($dados,$linha);

}

fclose($file);

var_dump($dados[1]);

echo json_encode($dados[0]);
