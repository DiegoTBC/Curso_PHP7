<?php

require "config.php";

$sql = new SQL();
$usuarios = $sql->select("SELECT * FROM tb_usuarios");

echo json_encode($usuarios);