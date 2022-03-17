<?php

//session_id('7jiitfmrqp1emte9rpbsspvlu8');
session_start();

session_regenerate_id();

echo session_id();

if (isset($_SESSION['nome'])){
    echo $_SESSION['nome'];
}