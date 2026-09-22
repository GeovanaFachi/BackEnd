<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Fornecedor</title>

    <link rel="stylesheet" href="../public/stylo.css">
</head>

<body>
    <div class="formulario-fornecedor">

    <h1>Cadastrar Fornecedor</h1>

    <form method="POST" action="index.php?acao=fornecedor_cadastrar">

        <div>
            <label>Razão Social:</label>
            <input type="text" name="razao_social" required>
        </div>

        <br>

        <div>
            <label>CNPJ:</label>
            <input type="text" name="cnpj" required>
        </div>

        <br>

        <div>
            <label>Cidade:</label>
            <input type="text" name="cidade" required>
        </div>

        <br>

        <div>
            <label>Estado:</label>
            <input type="text" name="estado" maxlength="2" required>
        </div>

        <br>

        <div>
            <label>Rua:</label>
            <input type="text" name="rua" required>
        </div>

        <br>

        <div>
            <label>Número:</label>
            <input type="text" name="numero" required>
        </div>

        <br>

        <div class="acoes-formulario">
        <button type="submit">Salvar</button>
        <a href="index.php?acao=fornecedor">Cancelar</a>
        </div>

    </form>

    <br>

    <a href="index.php">Voltar</a>
</div>

</body>

</html>