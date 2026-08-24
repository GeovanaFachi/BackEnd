<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Pagina 1</title>

    <link rel="stylesheet" href"style.css">
</head>
<body>
    <main>
    <h2>Valor do Produto</h2>

    <form method="POST">
        <input type="number" name="campo_valor" required><br>

    <button type="submit">Enviar</button>
    </form>

    </main>

    <?php
    if (isset($_POST['campo_valor'])) {
        require_once 'Gorjeta.php';
    }
    ?>

    <?php include 'ExibirRodape.php'; ?>

</body>
</html>
