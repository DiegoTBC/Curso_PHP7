<?php

$dir1 = "dir1";
$dir2 = "dir2";

if (!is_dir($dir1)) mkdir($dir1);
if (!is_dir($dir2)) mkdir($dir2);

$filename = "teste.txt";
$diretorio = $dir1.DIRECTORY_SEPARATOR.$filename;

if (!file_exists($diretorio)){
    $file = fopen($diretorio, "w+");
    fwrite($file, date("d/m/Y H:i:s"));
    fclose($file);
}

rename($diretorio, $dir2.DIRECTORY_SEPARATOR.$filename);

echo "Arquivo movido com sucesso";