<?php

$condicao = true;

while ($condicao) {

    $numero = rand(1, 10);

    if ($numero === 5) {
        echo "Cincoooo <br>";
        $condicao = false;
        break;
    }

    echo "$numero <br>";
}