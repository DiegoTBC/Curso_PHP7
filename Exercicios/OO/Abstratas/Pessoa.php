<?php

abstract class Pessoa
{
    private string $nome;
    private array $endereco;
    private array $telefone;

    public function __construct(string $nome, Endereco $endereco, Telefone $telefone)
    {
        $this->nome = $nome;
        $this->endereco[] = $endereco;
        $this->telefone[] = $telefone;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setEndereco($endereco): void
    {
        $this->endereco[] = $endereco;
    }

    public function getEndereco(): array
    {
        return $this->endereco;
    }

    public function setTelefone($telefone): void
    {
        $this->telefone[] = $telefone;
    }

    public function getTelefone(): array
    {
        return $this->telefone;
    }

    public function __toString()
    {
        return $this->nome;
    }
}