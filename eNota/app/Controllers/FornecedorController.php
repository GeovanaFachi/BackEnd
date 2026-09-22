<?php

require_once __DIR__ . '/../Models/FornecedorModel.php';

class FornecedorController{


    public function home($pdo){
        $model = new FornecedorModel($pdo);
        $fornecedores = $model->buscarTodos();
        require_once __DIR__ . '/../../views/Fornecedor/FornecedorHome.php';
    }

    public function criar(){
        require_once __DIR__ . '/../../views/Fornecedor/FornecedorCriar.php';
    }


    public function cadastrar($pdo){
        $model = new FornecedorModel($pdo);
        $model->criar($_POST);
        header('Location: inex.php?acao=fornecedor');
        exit;
    }
   
    public function editar($pdo, $id){
        $model = new FornecedorModel($pdo);
        $fornecedor = $model->buscarPorId($id);
        require_once __DIR__ . '/../../views/Fornecedor/FornecedorEditar.php';
    }


    public function atualizar($pdo, $id){
        $model = new FornecedorModel($pdo);
        $model->atualizar($id, $_POST);
        header('Location: index.php');
        exit;
    }

    public function excluir($pdo, $id){
        $model = new FornecedorModel($pdo);
        $model->excluir($id);
        header('Location: index.php');
        exit;
    }
}