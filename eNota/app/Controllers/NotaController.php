<?php

require_once __DIR__ . '/../Models/NotaModel.php';

class NotaController{

    public function home($pdo, $id = null){
        $model = new NotaModel($pdo);
        $notas = $model->buscarTodos();
        $notaEditando = $id ? $model->buscarPorId($id) : null;
        $sqlFornecedor = "SELECT * FROM fornecedor ORDER BY razao_social";
        $stmtFornecedor = $pdo->prepare($sqlFornecedor);
        $stmtFornecedor->execute();
        $fornecedores = $stmtFornecedor->fetchAll(PDO::FETCH_ASSOC);
        $sqlClassificacao = "SELECT * FROM classificacao ORDER BY nome";
        $stmtClassificacao = $pdo->prepare($sqlClassificacao);
        $stmtClassificacao->execute();
        $classificacoes = $stmtClassificacao->fetchAll(PDO::FETCH_ASSOC);
        $sqlPagamento = "SELECT * FROM forma_pagamento ORDER BY nome";
        $stmtPagamento = $pdo->prepare($sqlPagamento);
        $stmtPagamento->execute();
        $formasPagamento = $stmtPagamento->fetchAll(PDO::FETCH_ASSOC);

        require_once __DIR__ . '/../../views/Nota.php';
    }

    public function cadastrar($pdo){
        $model = new NotaModel($pdo);
        $model->criar($_POST);
        header('Location: index.php');
        exit;
    }


    public function atualizar($pdo, $id){
        $model = new NotaModel($pdo);
        $model->atualizar($id, $_POST);
        header('Location: index.php');
        exit;
    }

    public function excluir($pdo, $id){
        $model = new NotaModel($pdo);
        $model->excluir($id);
        header('Location: index.php');
        exit;
    }
}