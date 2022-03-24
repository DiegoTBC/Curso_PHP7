<?php

interface Veiculo {

    public function acelerar($velocidade);

    public function frenar($velocidade);

    public function trocarMarcha($marcha);

}

class Carro implements Veiculo {

    public function acelerar($velocidade)
    {
    }

    public function frenar($velocidade)
    {
    }

    public function trocarMarcha($marcha)
    {
    }
}

$carro = new Carro();