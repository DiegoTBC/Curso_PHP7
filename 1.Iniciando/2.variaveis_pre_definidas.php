<?php

$nome = $_GET["nome"];
$sobrenome = $_GET["sobrenome"];

var_dump($nome);
var_dump($sobrenome);

$ip = $_SERVER["SCRIPT_NAME"];
var_dump($ip);

var_dump($_SERVER);