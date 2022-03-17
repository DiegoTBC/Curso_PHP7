<?php

function ola(string $nome="mundo"){
    return "Ola $nome!";
}

echo ola("Diego");

function argumentos(){
    $argumentos = func_get_args();
    return $argumentos;
}

var_dump(argumentos("Oi",56,"ds"));

