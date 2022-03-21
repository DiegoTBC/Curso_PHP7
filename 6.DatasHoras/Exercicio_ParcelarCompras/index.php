<html>
    <body>
    <form action="/index.php" method="POST">
        <fieldset>
            <legend>Negociar</legend>
            <label for="valor">Valor:</label>
            <input type="text" id="valor" name="valor"><br><br>
            <label for="qtdParcelas">Quantidade de Parcelas</label>
            <select name="qtdParcelas" id="qtdParcelas">
                <?php
                    for ($i = 1; $i <= 12; $i++)
                        echo "<option value='$i'>$i</option>"
                ?>
            </select><br><br>
            <label for="dataPagamento">Data do Primeiro Pagamento:</label>
            <input type="date" name="dataPagamento" id="dataPagamento"><br><br>
            <button>Calcular</button>
        </fieldset>
    </form>
    </body>
</html>

<?php

if (isset($_POST['valor']) && isset($_POST['qtdParcelas']) && isset($_POST['dataPagamento'])){

    $valor = (float)$_POST['valor'];
    $qtdParcelas = (int)$_POST['qtdParcelas'];
    $dataPrimeiroPagamento = (new DateTime)->setTimestamp(strtotime($_POST['dataPagamento']));

    $valorParcela = number_format($valor / $qtdParcelas, 2);
    $valorRestante = $valor % $qtdParcelas;


    echo "<table><tr>
<th>Parcela</th><th>Valor</th><th>Data Pagamento</th>
</tr>";

    for ($i = 1; $i <= $qtdParcelas; $i++){

        if ($i === 1){
            $valorPrimeiraParcela = number_format($valorRestante == 0 ? $valorParcela : $valorParcela + $valorRestante, 2);
            $dataVencimento = (new DateTime)->setTimestamp(strtotime($_POST['dataPagamento']))->format("d/m/Y");
            echo "<tr>
                <td>$i</td><td>R$ $valorPrimeiraParcela</td><td>$dataVencimento</td>
            </tr>";
        } else {
            $intervalo = new DateInterval("P$i"."M");
            $dataVencimento = (new DateTime)->setTimestamp(strtotime($_POST['dataPagamento']))->add($intervalo)->format("d/m/Y");
            echo "<tr>
                <td>$i</td><td>R$ $valorParcela</td><td>$dataVencimento</td>
            </tr>";
        }

    }

    echo "</table>";


}