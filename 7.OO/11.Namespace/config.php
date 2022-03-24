<?php

spl_autoload_register(function ($nomeClasse){
//    var_dump($nomeClasse);

    $dirClass = "Classes";
    $fileName = $dirClass.DIRECTORY_SEPARATOR."$nomeClasse.php";

    if (file($fileName))
        require_once $fileName;
});