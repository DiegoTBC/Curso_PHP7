<?php

function incluirClasses($nomeClasse){
    if (file_exists("Classes".DIRECTORY_SEPARATOR."$nomeClasse.php"))
        require_once "Classes".DIRECTORY_SEPARATOR."$nomeClasse.php";

}

spl_autoload_register("incluirClasses");