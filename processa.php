<?php

for ($i = 1; $i <= 5; $i++) {
    $nome = $_POST["produto{$i}_nome"];
    $f1 = $_POST["produto{$i}_filial1"];
    $f2 = $_POST["produto{$i}_filial2"];
    $f3 = $_POST["produto{$i}_filial3"];


    $f1 = (int) $f1;
    $f2 = (int) $f2;
    $f3 = (int) $f3;

    $total = $f1 + $f2 + $f3;

    echo "<h3>Produto $i: $nome</h3>";
    echo "Filial 1: $f1 unidades";
    echo "Filial 2: $f2 unidades";
    echo "Filial 3: $f3 unidades";
    echo "Total: $total unidades";
}
?>
