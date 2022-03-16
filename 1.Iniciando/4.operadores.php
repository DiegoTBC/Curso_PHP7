<?php

$nome = "Diego";
$nome .= " Torres";

echo $nome."<br>";

$valorTotal = 0;
$valorTotal += 100;
$valorTotal += 50;

echo $valorTotal."<br>";

$valorTotal *= 0.9;

echo $valorTotal."<br>";

/////////////////

$a = 11;
$b = 5;

echo $a % $b."<br>";

/////////

var_dump(10 > 5);
var_dump(10 < 5);
var_dump(10 === 10);
var_dump(10 === "10");
echo "<br>";
var_dump(10 != 10.0);
var_dump(10 !== 10.0);
echo "<br>";
var_dump(50 <=> 55);
echo "<br>";
////////// null coalescing
$c = 10;
$resultado = $c ?? "Oi";
echo $resultado;
echo "<br>";
//////////

var_dump(10 > 5 or 5 > 10);