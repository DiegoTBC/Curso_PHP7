<?php

$total = 150;
$desconto = 0.9;

do {
    $total *= $desconto;
    echo "R$ ". (float)$total ."<br>";
} while ($total > 100);

