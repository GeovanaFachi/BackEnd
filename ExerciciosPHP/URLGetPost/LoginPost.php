<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Tela de Login</title>
</head>
<body>
    <h2>Acesse o Sistema</h2>
    <form action="validar.php" method="POST">
        <label>E-mail:</label><br>
        <input type="email" name="campo_email" required><br><br>

        <label>Senha:</label><br>
        <input type="password" name="campo_senha" required><br><br>

        <button type="submit">Entrar</button>
    </form>
</body>

<!--Com o metodo POST o resultado não vai na URL de pesquisa-->
<!--Bom para dados importantes, como senhas-->
</html>

