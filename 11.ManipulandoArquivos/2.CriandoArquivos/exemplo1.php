<?php

//$file = fopen("log.txt","w+");
$file = fopen("log.txt","a+");

fwrite($file, date("d/m/Y H:i:s \n"));
fclose($file);

echo "Arquivo criado com sucesso.";