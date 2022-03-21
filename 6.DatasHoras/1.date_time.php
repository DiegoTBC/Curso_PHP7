<?php

echo date("l, d/m/y H:i");

echo "<br>";

echo time();

echo "<br>";

echo strtotime("2000-11-17 15:00");//retorna o timestamp de uma data

echo "<br>";

echo date("d/m/Y", strtotime("next friday", strtotime("2022-03-26")));