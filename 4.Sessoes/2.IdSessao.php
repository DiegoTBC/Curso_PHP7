<?php

session_start();

$_SESSION['nome'] = 'Diego';
echo session_id() . "<br>";

echo $_SESSION['nome'];
