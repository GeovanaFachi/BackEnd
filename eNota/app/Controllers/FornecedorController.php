<?php
require_once __DIR__ . '/../Models/FornecedorModel.php';

class FornecedorController {
    public function home($pdo, $id = null) {
        $model = new FornecedorModel($pdo);
        $fornecedor = $model->buscarTodos();
        $usuarioEditando = $id ? $model->buscarPorId($id) : null;
        require_once __DIR__ . '/../../views/fornecedor/fornecedorhome.php';
    }

    public function listar($pdo) {
        $model = new FornecedorModel($pdo);
        $model->buscarTodos($_POST);
        header('Location: index.php');
        exit;
    }

    public function cadastrar($pdo) {
        $model = new FornecedorModel($pdo);
        $model->criar($_POST);
        header('Location: index.php');
        exit;
    }

    public function atualizar($pdo, $id) {
        $model = new FornecedorModel($pdo);
        $model->atualizar($id, $_POST);
        header('Location: index.php');
        exit;
    }

    public function excluir($pdo, $id) {
        $model = new FornecedorModel($pdo);
        $model->excluir($id);
        header('Location: index.php');
        exit;
    }
}