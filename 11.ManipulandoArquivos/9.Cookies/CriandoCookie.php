<?php

$data = [
    "empresa" => "Teste"
];

setcookie("NOME_DO_COOKIE", json_encode($data), time() + 300);

echo "Ok";