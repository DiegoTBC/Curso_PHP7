<?php

$pessoas = [];

array_push($pessoas, [
    'nome' => 'Diego',
    'idade' => 21
]);

array_push($pessoas, [
    'nome' => 'Torres',
    'idade' => 25
]);

echo json_encode($pessoas);

echo "<br>";

$json = '[{"nome": "Diego","idade": 21},{"nome": "Torres","idade": 25}]';

$data = json_decode($json, true);

var_dump($data);