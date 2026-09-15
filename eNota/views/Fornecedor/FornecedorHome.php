<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Fornecedores</title>
</head>

<body>
    <h1>Fornecedores</h1>
    <a href="index.php?controller=fornecedor&action=criar">Cadastrar fornecedor</a>

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
                <td><a class="btn btn-editar" href="index.php?id=<?= $fornecedor['id'] ?>">Editar</a>
                    <a class="btn btn-apagar" href="index.php?acao=excluir&id=<?= $fornecedor['id'] ?>"
                           onclick="return confirm('Apagar este usuário?')">Apagar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <br>

    <a href="index.php">Voltar</a>

</body>

</html>