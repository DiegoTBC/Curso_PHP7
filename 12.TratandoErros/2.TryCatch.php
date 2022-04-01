<?php

function trataNome($name){
    if (!$name){
        throw new Exception("Nenhum nome foi informado. <br>", 1);
    }

    echo ucfirst($name)."<br>";
}

try {

    trataNome("Diego");
    trataNome("");

} catch (Exception $e) {
    echo $e->getMessage();
} finally {
    echo "Enviou um email.";
}
