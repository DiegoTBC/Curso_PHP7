<?php

abstract class Animal {
    public function falar()
    {
        return "Som";
    }

    public function mover()
    {
        return "Anda";
    }
}

class Cachorro extends Animal {

    public function falar(){
        return "Late";
    }
}

class Gato extends Animal {

    public function falar(){
        return "Mia";
    }

    public function mover(){
        return "Corre e ".parent::mover();
    }
}

$dog = new Cachorro();
echo $dog->falar();

$cat = new Gato();
echo $cat->falar();
echo $cat->mover();
