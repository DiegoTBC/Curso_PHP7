<?php

namespace Conta;

use Pessoa;

abstract class Conta
{
    private Pessoa $titular;
    private string $numeroConta;
    private float $saldo = 0;

    public function getTitular(): Pessoa
    {
        return $this->titular;
    }

    public function setTitular(Pessoa $titular): void
    {
        $this->titular = $titular;
    }

    public function getNumeroConta(): string
    {
        return $this->numeroConta;
    }

    public function setNumeroConta(string $numeroConta): void
    {
        $this->numeroConta = $numeroConta;
    }

    public function getSaldo(): float
    {
        return $this->saldo;
    }

    public function setSaldo(float $saldo): void
    {
        $this->saldo = $saldo;
    }


}