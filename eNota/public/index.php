<?php
require_once __DIR__ . '/../config/conexao.php';
require_once __DIR__ . '/../app/Controllers/NotaController.php';
require_once __DIR__ . '/../app/Controllers/FornecedorController.php';


$fornecedorController = new FornecedorController();
$notaController = new NotaController();
$acao = $_GET['acao'] ?? 'home';
$id = $_GET['id'] ?? null;


switch ($acao) {
    case 'home':
        $notaController->home($pdo, $id);
        break;
    case 'nota_cadastrar':
        $notaController->cadastrar($pdo);
        break;
    case 'nota_editar':
        $notaController->home($pdo, $id);
        break;
    case 'nota_atualizar':
        $notaController->atualizar($pdo, $id);
        break;
    case 'nota_excluir':
        $notaController->excluir($pdo, $id);
        break;

    case 'fornecedor':
        $fornecedorController->home($pdo);
        break;
    case 'fornecedor_criar':
        $fornecedorController->criar();
        break;
    case 'fornecedor_cadastrar':
        $fornecedorController->cadastrar($pdo);
        break;
    case 'fornecedor_editar':
        $fornecedorController->editar($pdo, $id);
        break;
    case 'fornecedor_atualizar':
        $fornecedorController->atualizar($pdo, $id);
        break;
    case 'fornecedor_excluir':
        $fornecedorController->excluir($pdo, $id);
        break;

    default: echo "Página não encontrada.";
        break;
}