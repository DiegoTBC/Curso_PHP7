<form method="POST" enctype="multipart/form-data">
    <input type="file" name="fileUpload">
    <br>
    <button>Enviar</button>
</form>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $file = $_FILES['fileUpload'];

//    var_dump($file);
//    die();

    if ($file['error']){
        throw new Exception("Error: ".$file['error']);
    }

    $dirUploads = "uploads";

    if (!is_dir($dirUploads)){
        mkdir($dirUploads);
    }

    //Move do diretório temporário para um permanente.
    //Verificar se a pasta destino tem permissão de escrita
    if (move_uploaded_file($file['tmp_name'], $dirUploads.DIRECTORY_SEPARATOR.$file['name'])){
        echo "Upload realizado com sucesso";
    } else {
        throw new Exception("Não foi possível realizar o upload.");
    }



}
