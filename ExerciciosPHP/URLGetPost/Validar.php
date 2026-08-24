<?php
// 1. linha PHP para processa os dados do LoginPost.php

// 2. Recebendo os dados do formulário
$email = $_POST['campo_email'];
$senha = $_POST['campo_senha'];

// 3. Lógica simples de validação (Simulando um banco de dados)
$email_correto = "aluno@escola.com";
$senha_correta = "12345";

if ($email == $email_correto && $senha == $senha_correta) {
    echo "<h1> Logado com sucesso!</h1>";
    echo "Bem-vindo, $email.";
} else {
    echo "<h1> Erro: Usuário ou senha inválidos.</h1>";
    echo "<a href='login.html'>Tentar novamente</a>";
}
?>

