<?php

namespace PessoaJuridica;

use Pessoa;

class PessoaJuridica extends Pessoa
{
    private string $cnpj;
    private string $ie;

    public function __construct(string $nome, string $cnpj, string $ie)
    {
        parent::setNome($nome);
        $this->cnpj = $cnpj;
        $this->ie = $ie;
    }

    public function getCnpj(): string
    {
        return $this->cnpj;
    }

    public function setCnpj(string $cnpj): void
    {
        $this->cnpj = $cnpj;
    }

    public function getIe(): string
    {
        return $this->ie;
    }

    public function setIe(string $ie): void
    {
        $this->ie = $ie;
    }

    public function __toString()
    {
        return "Nome: ".$this->getNome()." CNPJ: ".$this->getCnpj()." IE: ".$this->getIe();
    }

}