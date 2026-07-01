<?php 
    $valor_compra = 400;

    echo "<h1> CALCULO DO DESCONTO </H1>";

    if ($valor_compra >= 500) {
        $desconto = $valor_compra*0.2;
        $valor_liquido = $valor_compra-$desconto;

         echo "<h1>Valor da Compra R$ $valor_compra 
         <br>Valor do Desconto R$ $desconto 
         <br>Valor Liquido R$ $valor_liquido</h1>";

    } elseif (($valor_compra <= 499) && ($valor_compra >= 200)) {
        $desconto = $valor_compra*0.1;
        $valor_liquido = $valor_compra-$desconto;

         echo "<h1>Valor da Compra R$ $valor_compra 
         <br>Valor do Desconto R$ $desconto 
         <br>Valor Liquido R$ $valor_liquido</h1>";
    } else {
        echo "<h1>Valor da Compra R$ $valor_compra 
         <br>Não possui desconto</h1>";
    };
?>