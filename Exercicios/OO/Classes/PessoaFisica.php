<?php


class PessoaFisica extends \Pessoa
{
    private string $cpf;
    private string $rg;

    public function __construct(string $nome, string $cpf, string $rg, Endereco $endereco, Telefone $telefone)
    {
        parent::setNome($nome);
        $this->cpf = $cpf;
        $this->rg = $rg;
        $this->setEndereco($endereco);
        $this->setTelefone($telefone);
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): void
    {
        $this->cpf = $cpf;
    }

    public function getRg(): string
    {
        return $this->rg;
    }

    public function setRg(string $rg): void
    {
        $this->rg = $rg;
    }


    public function __toString()
    {
        return "Nome: ".$this->getNome()." CPF: ".$this->getCpf()." RG: ".$this->getRg();
    }
}