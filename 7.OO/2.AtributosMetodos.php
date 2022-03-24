<?php

class Carro{

    private $modelo;
    private $motor;
    private $ano;

    public function getModelo()
    {
        return $this->modelo;
    }

    public function setModelo($modelo): void
    {
        $this->modelo = $modelo;
    }

    public function getAno(): int
    {
        return $this->ano;
    }

    public function setAno($ano): void
    {
        $this->ano = $ano;
    }

    public function setMotor($motor): void
    {
        $this->motor = $motor;
    }

    public function getMotor():float
    {
        return $this->motor;
    }

    public function exibir()
    {
        return [
            "modelo" => $this->getModelo(),
            "motor" => $this->getMotor(),
            "ano" => $this->getAno()
        ];
    }
}

$celta = new Carro();
$celta->setModelo("Celta");
$celta->setAno("2007");
$celta->setMotor("1.0");

var_dump($celta->exibir());