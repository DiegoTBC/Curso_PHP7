<?php

define("SECRET_IV", pack("a16", "senha"));
define("SECRET", pack("a16", "senha"));

$data = [
    "nome" => "Diego"
];

$openSSL = openssl_encrypt(
    json_encode($data),
    'AES-128-CBC',
    SECRET,
    0,
    SECRET_IV
);

echo $openSSL."<br>";

$string = openssl_decrypt($openSSL, 'AES-128-CBC', SECRET, 0 , SECRET_IV);

var_dump($string);