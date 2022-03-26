<?php

class Telefone
{
    private string $ddd;
    private string $numero;

    public function __construct($ddd, $numero)
    {
        $this->ddd = $ddd;
        $this->numero = $numero;
    }

    public function getDdd(): string
    {
        return $this->ddd;
    }


    public function setDdd(string $ddd): void
    {
        $this->ddd = $ddd;
    }


    public function getNumero(): string
    {
        return $this->numero;
    }


    public function setNumero(string $numero): void
    {
        $this->numero = $numero;
    }
}