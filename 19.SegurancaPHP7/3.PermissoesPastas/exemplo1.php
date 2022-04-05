<?php

/* Permissões
0 - Nenhuma permissão de acesso. Equivalente a -rwx.
1 - Permissão de execução (x).
2 - Permissão de gravação (w).
3 - Permissão de gravação e execução (wx). Equivalente a permissão 2+1
4 - Permissão de leitura (r).
5 - Permissão de leitura e execução (rx). Equivalente a permissão 4+1
6 - Permissão de leitura e gravação (rw). Equivalente a permissão 4+2
7 - Permissão de leitura, gravação e execução. Equivalente a +rwx (4+2+1).

O uso de um deste números define a permissão de acesso do dono, grupo ou outros usuários. Um modo fácil de entender como as permissões de acesso octais funcionam, é através da seguinte tabela:
1 = Executar
2 = Gravar
4 = Ler

*/

$pasta = "arquivos";
$permissao = "0775"; //Mais utilizada para uploads
//Da permissão total pra dono e grupos, e de ler e executar para visitantes

if (!is_dir($pasta)){
    mkdir($pasta, $permissao);
    echo "Diretório criado com sucesso!";
}