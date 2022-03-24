<?php

class Pessoa{

    public $nome = "Diego";
    protected $idade = 21;
    private $senha = "132456";

    public function verDados(){
        echo $this->nome."<br>";
        echo $this->idade."<br>";
        echo $this->senha."<br>";
    }

}

class Programador extends Pessoa {

    public function verDados(){
        echo get_class($this)."<br>";

        echo $this->nome."<br>";
        echo $this->idade."<br>";
//        echo $this->senha."<br>";
    }
}

$objeto = new Pessoa();
$objeto->verDados();

$programador = new Programador();
$programador->verDados();
