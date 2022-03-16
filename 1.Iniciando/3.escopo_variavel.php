<?php

$nome = "Diego";

function mostrarNome(){
    global $nome;
    echo $nome;
}

echo mostrarNome();

function setMessage(){
    global $message;
    $message = "Oi";
}

setMessage();
echo $message;