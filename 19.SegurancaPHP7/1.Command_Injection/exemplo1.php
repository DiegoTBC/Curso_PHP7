<?php

//Atenção ao usar funções que executam algo no sistema
//Se for usar dados dinamicos, sempre utilize escapes.

if ($_SERVER['REQUEST_METHOD'] === "POST")
{
    $cmd = escapeshellcmd($_POST['cmd']); //Aqui que mora o perigo, dados dinamicos. Ex.: "mkdir {diretorio}

    var_dump($cmd);
    echo "<pre>";

    $comando = system($cmd, $retorno);

    echo "</pre>";
}

?>

<form method="post">
    <input type="text" name="cmd">
    <button type="submit">Enviar</button>
</form>
