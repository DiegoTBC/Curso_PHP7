<?php

$id = (isset($_GET['id'])) ? $_GET['id'] : 1;
//id=2 OR 1 = 1 --

//if (!is_numeric($id) || strlen($id) > 5{
//    exit("Te peguei, safadinho!");
//}

$conn = mysqli_connect("localhost", "root","17062018", "dbphp7");

$sql = "SELECT * FROM tb_usuarios WHERE idusuario = '$id'";

$exec = mysqli_query($conn,$sql);


while ($resultado = mysqli_fetch_object($exec)){
    echo $resultado->login."<br>";
}