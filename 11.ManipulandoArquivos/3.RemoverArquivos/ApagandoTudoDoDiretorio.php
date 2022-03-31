<?php

foreach (scandir("testando") as $item){
    if (!in_array($item,[".",".."])){
        unlink("testando".DIRECTORY_SEPARATOR.$item);
    }
}

