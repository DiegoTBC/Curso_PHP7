<?php

class Endereco2{

    private $logradouro;
    private $numero;
    private $cidade;

    public function __construct($a, $b, $c)
    {
        $this->logradouro = $a;
        $this->numero = $b;
        $this->cidade = $c;
    }

    public function __destruct()
    {
        var_dump("DESTRUIR");
    }

    public function __toString()
    {
        return "$this->logradouro, $this->numero, $this->cidade";
    }
}

$meuEndereco = new Endereco2("Rua Valdemar Saraiva", "123", "Pirapozinho");

echo $meuEndereco."<br>";

//unset($meuEndereco);