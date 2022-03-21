<?php

$data = new DateTime();
$periodo = new DateInterval("P1M");

echo $data->format("d/m/Y H:i")."<br>";

$data->add($periodo);

echo $data->format("d/m/Y H:i")."<br>";