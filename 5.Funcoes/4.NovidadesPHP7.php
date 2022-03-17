<?php

function soma(float ...$valores): float{
    return array_sum($valores);
}

echo soma(1,2,3,4,5,6);
echo "<br>";
echo soma(1.5,2.5);