<?php

interface Veiculo {

    public function acelerar($velocidade);

    public function frenar($velocidade);

    public function trocarMarcha($marcha);

}

abstract class Automovel implements Veiculo {

    public function acelerar($velocidade)
    {
        echo "Acelerou";
    }

    public function frenar($velocidade)
    {

        echo "Frenou";
    }

    public function trocarMarcha($marcha)
    {

        echo "Trocou marcha";
    }
}

class Celta extends Automovel{
    public function abastecer()
    {

    }
}


$carro = new Celta();