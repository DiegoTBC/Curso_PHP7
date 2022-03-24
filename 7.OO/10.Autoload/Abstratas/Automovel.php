<?php

abstract class Automovel implements IVeiculo {

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