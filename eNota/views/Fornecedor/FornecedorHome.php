<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Fornecedores</title>

    <link rel="stylesheet" href="../public/stylo.css">
</head>

<body>
      <div class="pagina-fornecedor">

    <h1>Fornecedores</h1>
    <a class="btn-cadastrar" href="index.php?acao=fornecedor_criar"><button type="button">Cadastrar Fornecedor</button></a>

    <br>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Razão Social</th>
                <th>CNPJ</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>Rua</th>
                <th>Número</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>

        <?php foreach ($fornecedores as $fornecedor): ?>
            <tr>
                <td><?= $fornecedor["id"] ?></td>
                <td><?= htmlspecialchars($fornecedor["razao_social"]) ?></td>
                <td><?= htmlspecialchars($fornecedor["cnpj"]) ?></td>
                <td><?= htmlspecialchars($fornecedor["cidade"]) ?></td>
                <td><?= htmlspecialchars($fornecedor["estado"]) ?></td>
                <td><?= htmlspecialchars($fornecedor["rua"]) ?></td>
                <td><?= htmlspecialchars($fornecedor["numero"]) ?></td>
                <td class ="acoes"><a class="btn btn-editar" href="index.php?acao=fornecedor_editar&id=<?= $fornecedor['id'] ?>">Editar</a>
                    <a class="btn-excluir" href="index.php?acao=fornecedor_excluir&id=<?= $fornecedor['id'] ?>"
                           onclick="return confirm('Apagar este Fornecedor?')">Apagar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <br>

    <a href="index.php">Voltar</a>

</div>

</body>

</html>