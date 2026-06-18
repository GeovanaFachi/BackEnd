<?php 

    define("NOME", "Butique");
    $produto = "Brusinha";
    $preco = 55.99;
    $quantidade = 3;

    $total = $preco * $quantidade;

    echo "<h1>Compra na loja " .NOME. "
    <br>$quantidade $produto, 
    <br>total $total.</h1>";
?>