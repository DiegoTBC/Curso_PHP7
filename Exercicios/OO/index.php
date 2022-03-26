<?php

require "config.php";

$endereco = new Endereco("Rua X", "12", "Centro", "19200-000", "Pirapozinho", "São Paulo", "Brasil");
$endereco2 = new Endereco("Rua Y", "45", "Centro", "19200-000", "Pirapozinho", "São Paulo", "Brasil");
$telefone = new Telefone("18", "997859574");
$pessoa = new PessoaFisica("Diego Torres", "123.456.789-98", "56.987.789-9", $endereco, $telefone);
$pessoa->setEndereco($endereco2);

var_dump($pessoa->getEndereco()[1]);