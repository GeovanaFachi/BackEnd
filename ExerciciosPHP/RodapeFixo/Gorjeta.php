<?php

   $valorConta = $_POST['campo_valor'];
    
    $gorjeta = $valorConta*0.1;        

    echo "<h2>Resumo do Pedido<br>
    Valor do consumo: R$ $valorConta<br>
    Valor da gorjeta é: R$ $gorjeta, referente 10%<br>
    </h2>";
   
?>
        