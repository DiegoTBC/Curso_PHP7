<?php

$nome = "Diego";
$sobrenome = "Torres";

echo "Oi $nome <br>";
echo 'Oi $sobrenome <br>';

//////////////////

$minusculo = "Palavra";
$maiusculo = "PALAVRA2";
echo strtoupper($minusculo)."<br>";
echo strtolower($maiusculo)."<br>";
$texto = "oi tudo bem?";
echo ucfirst($texto)."<br>";
echo ucwords($texto)."<br>";

///////////////////

$nomeSobrenome = "Diego Torres";
$nomeSobrenome = str_replace("Torres", "Cunha", $nomeSobrenome);
echo $nomeSobrenome."<br>";

//////////////////

$frase = "Oi tudo bem com você?";
$q = strpos($frase, "bem");
echo $q."<br>";

$texto2 = substr($frase, 0, $q);
echo $texto2;