<?php

function incluirClasses($nomeClasse){
    if (file_exists("$nomeClasse.php"))
        require_once "$nomeClasse.php";

}

spl_autoload_register("incluirClasses");