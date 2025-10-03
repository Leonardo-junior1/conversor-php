<?php
function validarEntrada($nome, $q1, $q2, $q3) {
    if ($nome == "" || $nome == null) return "Nome vazio";
    if (!is_numeric($q1) || !is_numeric($q2) || !is_numeric($q3)) return "Quantidade precisa ser número";
    if ($q1 < 0 || $q2 < 0 || $q3 < 0) return "Quantidade não pode ser negativa";
    return "";
}

function calcularEstoqueTotal($q1, $q2, $q3) {
    return $q1 + $q2 + $q3;
}

function verificarEstoqueBaixo($nome, $q1, $q2, $q3, $limite = 30) {
    $filiais = [];
    if ($q1 < $limite) $filiais[] = "Filial 1";
    if ($q2 < $limite) $filiais[] = "Filial 2";
    if ($q3 < $limite) $filiais[] = "Filial 3";

    if (count($filiais) > 0) {
        $listaFiliais = implode(", ", $filiais);
        return "Estoque Baixo - Filiais: $listaFiliais";
    } else {
        return "Estoque OK";
    }
}

for ($i = 1; $i <= 5; $i++) {
    $nome = $_POST["produto{$i}_nome"];
    $f1 = (int) $_POST["produto{$i}_filial1"];
    $f2 = (int) $_POST["produto{$i}_filial2"];
    $f3 = (int) $_POST["produto{$i}_filial3"];

    $erro = validarEntrada($nome, $f1, $f2, $f3);
    if ($erro != "") {
        echo "<h3>Produto $i: $nome</h3>";
        echo "<p style='color:red'>Erro: $erro</p><br>";
        continue;
    }

    $total = calcularEstoqueTotal($f1, $f2, $f3);
    $situacao = verificarEstoqueBaixo($nome, $f1, $f2, $f3, 30);

    echo "<h3>Produto $i: $nome</h3>";
    echo "Filial 1: $f1 unidades<br>";
    echo "Filial 2: $f2 unidades<br>";
    echo "Filial 3: $f3 unidades<br>";
    echo "<b>Total:</b> $total unidades<br>";
    if ($situacao != "Estoque OK") {
        echo "<p style='color:red'><b>$situacao</b></p>";
    }
    echo "<br>";
}
?>
