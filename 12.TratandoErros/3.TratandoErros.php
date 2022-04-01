<?php

//função p/ substituir o manipulador de erros padrão
function error_handler($code, $message, $file, $line){

    echo json_encode([
        "code" => $code,
        "message" => $message,
        "file" => $file,
        "line" => $line
    ]);
}

//Evita que o php mostre um erro e determina qual função irá ser chamada pra tratar os erros
set_error_handler("error_handler");

echo 100 / 0;