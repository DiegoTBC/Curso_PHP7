<?php

$cargos = [
    [
        'nome_cargo' => "CEO",
        'subordinados' => [
            [
                'nome_cargo' => "Diretor de TI",
                'subordinados' => [
                    [
                        'nome_cargo' => "Gerente de TI",
                        'subordinados' => [
                            [
                                'nome_cargo' => 'Supervidor de TI'
                            ],
                            [
                                'nome_cargo' => 'Analista de QA'
                            ]
                        ]
                    ],
                    [
                        'nome_cargo' => "Gerente de Redes",
                        'subordinados' => [
                            [
                                'nome_cargo' => 'Supervidor de Redes'
                            ]
                        ]
                    ]
                ]
            ],
            [
                'nome_cargo' => 'Diretor Financeiro',
                'subordinados' => [
                    [
                        'nome_cargo' => 'Gerente Financeiro',
                        'subordinados' => [
                            [
                                'nome_cargo' => "Supervisor Financeiro"
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ]
];

function exibeHierarquia($cargos){
    $html = "<ul>";

    foreach ($cargos as $cargo){
        $html .= "<li>";

        $html .= $cargo['nome_cargo'];

        if (isset($cargo['subordinados']) && count($cargo['subordinados']) > 0){
            $html .= exibeHierarquia($cargo['subordinados']);
        }

        $html .= "</li>";
    }

    $html .= "</ul>";

    return $html;
}

echo exibeHierarquia($cargos);