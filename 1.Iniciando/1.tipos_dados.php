<?php

//Basicos
$nome = "Diego";
$ano = 2000;
$salario = 2500.99;
$bloqueado = false;

//Compostos
$frutas = ["Abacaxi", "Limão", "Maça"];
$nascimento = new DateTime();

//Especiais
$arquivo = fopen("1.tipos_dados.php", "r");
$nulo = null;

if (isset($nulo)){
    echo "Sim";
}
