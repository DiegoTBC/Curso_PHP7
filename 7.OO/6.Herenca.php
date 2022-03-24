<?php

class Documento2 {
    private $numero;

    public function setNumero($numero): void
    {
        $this->numero = $numero;
    }

    public function getNumero()
    {
        return $this->numero;
    }

}

class CPF extends Documento2 {

    public function validar():bool
    {
        return true;
    }
    
}

$doc = new CPF();
$doc->setNumero("13265498774");
$result = $doc->validar();

var_dump($result);