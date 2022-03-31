<?php

$filename = "usuarios.csv";

if (file_exists($filename)){
    $file = fopen($filename, "r");
    $header = explode(";",fgets($file));

    $data = [];

    while($row = fgets($file)){
        $rowData = explode(";",$row);
        $linha = [];

        for ($i = 0; $i < count($header); $i++){
            $linha[$header[$i]] = $rowData[$i];
        }

        array_push($data, $linha);
    }

    fclose($file);

    echo json_encode($data);
}
