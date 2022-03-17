<?php

define("SERVIDOR", "127.0.0.1");

echo SERVIDOR;

define("BANCO_DE_DADOS", [
    '127.0.0.1',
    'root',
    'password',
    'teste'
]);

print_r(BANCO_DE_DADOS);

echo DIRECTORY_SEPARATOR; //Para saber o separador do PC (Win,Linux...)