<?php

session_save_path('D:\Downloads\teste');

session_start();

$_SESSION['nome'] = "Diego";
$_SESSION['idade'] = 21;

echo session_id() . "<br>";

echo session_save_path();