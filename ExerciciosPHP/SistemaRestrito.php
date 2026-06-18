<?php 
    $usuario_cadastrado = "admin";
    $senha_correta = "1234";

    $tentativa_usuario = "admin";
    $tentativa_senha = "1234";

    $acesso_concedido = true;

    if (($usuario_cadastrado === $tentativa_usuario) && ($senha_correta === $tentativa_senha)) {
        var_dump($acesso_concedido); 
    } else {
        var_dump(!$acesso_concedido);
    };
?>