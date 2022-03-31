<?php

$images = scandir("teste");
$data = [];

foreach ($images as $image){
    if (!in_array($image,[".",".."])){
        $filename = "teste".DIRECTORY_SEPARATOR.$image;
        $info = pathinfo($filename);

        $info['size'] = filesize($filename);
        $info["modified"] = date("d/m/Y H:i:s", filemtime($filename));
        $info["url"] = "http://localhost:8000/".str_replace("\\","/", $filename);

        array_push($data, $info);
    }
}

echo json_encode($data);