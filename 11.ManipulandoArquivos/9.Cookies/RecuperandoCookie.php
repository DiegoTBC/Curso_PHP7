<?php

if (isset($_COOKIE["NOME_DO_COOKIE"])){
    echo "O cookie está ativo.";
    var_dump($_COOKIE["NOME_DO_COOKIE"]);

} else {
    echo "O cookie expirou.";
}