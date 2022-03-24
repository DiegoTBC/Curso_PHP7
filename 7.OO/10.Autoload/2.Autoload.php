<?php

function incluirClasses($nomeClasse){
    if (file_exists("$nomeClasse.php"))
        require_once "$nomeClasse.php";
    elseif (file_exists("Abstratas".DIRECTORY_SEPARATOR."$nomeClasse.php"))
        require_once "Abstratas".DIRECTORY_SEPARATOR."$nomeClasse.php";
    elseif (file_exists("Interfaces".DIRECTORY_SEPARATOR."$nomeClasse.php"))
        require_once "Interfaces".DIRECTORY_SEPARATOR."$nomeClasse.php";
    elseif (file_exists("Classes".DIRECTORY_SEPARATOR."$nomeClasse.php"))
        require_once "Classes".DIRECTORY_SEPARATOR."$nomeClasse.php";
}

spl_autoload_register("incluirClasses");

$carro = new Celta();
$carro->abastecer();