<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Loja</title>
<style>
    .botao:hover {
        background-color: #df3bae;
    }
</style>
</head>
<body>
    <h2>Produto que Deseja</h2>
    <form action="Busca.php" method="GET">
        <input type="text" name="campo_produto" required><br><br>

        <button class="botao" type="submit">Procurar</button>
    </form>
</body>
<!--Com o metodo GET o resultado soma na URL de pesquisa-->
<!--Bom para salvar caminhos-->
<!--Ruim para logins(dados importantes)-->
</html>

