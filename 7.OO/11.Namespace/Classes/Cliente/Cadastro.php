<?php

namespace Cliente;

class Cadastro extends \Cadastro //Contra barra para voltar pra raiz
{
    public function registrarVenda()
    {
        echo "Registrou a venda do " .$this->getNome(). "<br>";
    }
}