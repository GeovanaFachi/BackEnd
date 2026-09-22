<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Notas de Entrada</title>

    <link rel="stylesheet" href="../public/stylo.css">
</head>

<body>
    <h1>Notas de Entrada</h1>

    <h2><?= $notaEditando ? 'Editar Nota' : 'Lançar Nota' ?></h2>


    <?php if ($notaEditando): ?>
        <form method="POST" action="index.php?acao=nota_atualizar&id=<?= $notaEditando['id'] ?>">
    <?php else: ?>
        <form method="POST" action="index.php?acao=nota_cadastrar">
    <?php endif; ?>


        <div class = "fornecedor_campo">
            <label>Fornecedor:</label>
            <select name="fornecedor_id" required>
                <option value="">Selecione o fornecedor</option>

                <?php foreach ($fornecedores as $fornecedor): ?>

                <option value="<?= $fornecedor['id'] ?>" <?= ($notaEditando && $notaEditando['fornecedor_id'] == $fornecedor['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($fornecedor['razao_social']) ?></option>

                <?php endforeach; ?>
            </select>

            <a href="index.php?acao=fornecedor"><button type="button">Cadastrar Fornecedor</button></a>
            
        </div>

        <br>
        
        <div class="linha-campos">
        <div>
            <label>Número da NF:</label>
            <input type="number" name="numero_nf" value="<?= $notaEditando ? htmlspecialchars($notaEditando['numero_nf']) : '' ?>"required>
        </div>

        <br>

        <div>
            <label>Data de Emissão:</label>
            <input type="date" name="data_emissao" value="<?= $notaEditando ? htmlspecialchars($notaEditando['data_emissao']) : '' ?>"required>
        </div>
        </div>

        <br>

        <div>
            <label>Valor Total:</label>
            <input type="number" name="valor_total" step="0.01" value="<?= $notaEditando ? htmlspecialchars($notaEditando['valor_total']) : '' ?>"required>
        </div>

        <br>

        <div class="linha-campos">
        <div>
            <label>Classificação:</label>
            <select name="classificacao_id" required>
                <option value="">Selecione a classificação</option>

                <?php foreach ($classificacoes as $classificacao): ?>

                <option value="<?= $classificacao['id'] ?>"<?= ($notaEditando && $notaEditando['classificacao_id'] == $classificacao['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($classificacao['nome']) ?></option>

                <?php endforeach; ?>
            </select>
        </div>

        <br>

        <div>
            <label>Forma de Pagamento:</label>
            <select name="forma_pagamento_id" required>
                <option value="">Selecione a forma de pagamento</option>

                <?php foreach ($formasPagamento as $forma): ?>

                <option value="<?= $forma['id'] ?>" <?= ($notaEditando && $notaEditando['forma_pagamento_id'] == $forma['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($forma['nome']) ?></option>

                <?php endforeach; ?>
            </select>
        </div>
        </div>

        <br>

        <div class="acoes-formulario">
        <?php if ($notaEditando): ?>
            <button type="submit">Atualizar Nota</button>
            <a href="index.php">Cancelar</a>
        <?php else: ?>
            <button type="submit">Salvar Nota</button>
        <?php endif; ?>
        </div>

    </form>

    <br>
    <br>

    <h2>Notas Lançadas</h2>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Número NF</th>
                <th>Fornecedor</th>
                <th>Data Emissão</th>
                <th>Valor Total</th>
                <th>Classificação</th>
                <th>Forma de Pagamento</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($notas as $nota): ?>
                <tr>
                    <td><?= $nota['id'] ?></td>
                    <td><?= htmlspecialchars($nota['numero_nf']) ?></td>
                    <td><?= htmlspecialchars($nota['fornecedor']) ?></td>
                    <td><?= htmlspecialchars($nota['data_emissao']) ?></td>
                    <td><?= htmlspecialchars($nota['valor_total']) ?></td>
                    <td><?= htmlspecialchars($nota['classificacao']) ?></td>
                    <td><?= htmlspecialchars($nota['forma_pagamento']) ?></td>
                    <td class="acoes"><a href="index.php?acao=nota_editar&id=<?= $nota['id'] ?>">Editar</a>
                    <a class="btn-excluir" href="index.php?acao=nota_excluir&id=<?= $nota['id'] ?>"onclick="return confirm('Excluir esta nota?')">Apagar</a>
                    </td>
                </tr>

            <?php endforeach; ?>

        </tbody>
    </table>

    <br>

    <a href="index.php">Voltar</a>

</body>
</html>