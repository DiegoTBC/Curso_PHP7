<?php

$file = fopen("teste.txt", "w+");
fwrite($file, "Teste");
fclose($file);

unlink("teste.txt");

echo "Arquivo removido com sucesso.";