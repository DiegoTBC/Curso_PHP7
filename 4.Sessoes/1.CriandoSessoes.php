<?php

session_start();

$_SESSION['nome'] = 'Diego';

echo $_SESSION['nome'];