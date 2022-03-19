<?php

function teste($callback){
    //Processo lento

    $callback();
}

teste(function(){
    echo "Terminou";
});


$fn = function($a){
    echo $a;
};

$fn("Oi");

