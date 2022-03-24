<?php

function __autoload($nomeClasse){
//    var_dump($nomeClasse);
    require_once "$nomeClasse.php";
}


$carro = new Celta();
$carro->abastecer();

