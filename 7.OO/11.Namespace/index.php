<?php

require_once "config.php";

use Cliente\Cadastro;

$cadastro = new Cadastro();
$cadastro->setNome("Diego");
$cadastro->setEmail("diego@diego.com");
$cadastro->setSenha("132");

$cadastro->registrarVenda();

echo $cadastro;