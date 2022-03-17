<?php

$a = 10;

function trocaValor(&$a){
    $a += 50;
    return $a;
}

echo trocaValor($a);
echo "<br>";
echo $a;
echo "<br>";
echo "<br>";
echo "<br>";


$pessoas = [
    "nome" => "Diego",
    "idade" => 21
];

foreach ($pessoas as &$valor) {
    if (gettype($valor) === "integer") {
        $valor += 10;
        echo $valor . "<br>";
    }
}

echo $pessoas['idade'];
