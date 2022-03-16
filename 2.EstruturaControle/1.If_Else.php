<?php

$idade = 65;

if ($idade >= 18 && $idade < 65){
    echo "Maior de Idade";
} else if ($idade >= 65) {
    echo "Melhor de Idade";
} else {
    echo "Menor de Idade";
}

echo "<br>";

echo ($idade < 18) ? "Menor de Idade" : "Maior de Idade";