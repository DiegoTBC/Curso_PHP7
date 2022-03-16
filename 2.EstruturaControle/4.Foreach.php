<?php

$meses = ["Janeiro", "Fevereiro", "Março", "Abril"];

foreach ($meses as $index => $mes){
    echo "índice: $index | Mês: $mes <br>";
}

if (isset($_GET)){
    foreach ($_GET as $parametro => $valor){
        echo "$parametro: $valor <br>";
    }
}


