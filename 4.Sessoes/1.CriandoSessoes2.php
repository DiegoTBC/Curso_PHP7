<?php

session_start();

if (isset($_SESSION['nome'])){
    echo $_SESSION['nome']." :)";
    session_destroy();
} else {
    echo "Não está setada!";
}

if (!isset($_SESSION['nome'])) {
    echo "Apagado!";
}