<?php

$cep = "19200000";
$link = "https://viacep.com.br/ws/$cep/json/";

$ch = curl_init($link);
//Dizendo que espera uma resposta
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//Dizendo que não quer verificar o SSL
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

//Executar de fato
$response = curl_exec($ch);

//Para liberar a conexão
curl_close($ch);

$data = json_decode($response, true);

print_r($data);