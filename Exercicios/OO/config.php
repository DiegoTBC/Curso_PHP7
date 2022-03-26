<?php

spl_autoload_register(function($nomeClasse){
    $nomePastaClasses = "Classes";
    $diretorioClasses = $nomePastaClasses. DIRECTORY_SEPARATOR . "$nomeClasse.php";

//    echo $diretorioClasses."<br>";

    $nomePastaInterfaces = "Interfaces";
    $diretorioInterfaces = $nomePastaInterfaces. DIRECTORY_SEPARATOR . "$nomeClasse.php";

    $nomePastaAbstratas = "Abstratas";
    $diretorioAbstratas = $nomePastaAbstratas. DIRECTORY_SEPARATOR . "$nomeClasse.php";

//    echo $diretorioAbstratas."<br>";

    if (file_exists($diretorioClasses)){
        require_once $diretorioClasses;
//        echo $diretorioClasses."<br>";
    }

    if (file_exists($diretorioInterfaces))
        require $diretorioInterfaces;

    if (file_exists($diretorioAbstratas)){
        require $diretorioAbstratas;
//        echo $diretorioAbstratas."<br>";
    }
});

//spl_autoload_register(function($nomeClasse){
//    $diretorioClasses = "Classes\\$nomeClasse.php";
//
//    echo $diretorioClasses."<br>";
//
//    if (file_exists($diretorioClasses))
//        require_once $diretorioClasses;
//
//    $diretorioClasses = "Abstratas\\$nomeClasse.php";
//
//    if (file_exists($diretorioClasses))
//        require_once $diretorioClasses;
//});