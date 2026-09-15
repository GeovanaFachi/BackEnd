<?php
require_once __DIR__ . '/../config/conexao.php';
require_once __DIR__ . '/../app/Controllers/FornecedorController.php';

$controller = new FornecedorController();
$acao = $_GET['acao'] ?? 'home';
$id = $_GET['id'] ?? null;

switch ($acao) {
    case 'cadastrar':
        $controller->cadastrar($pdo);
        break;
    case 'atualizar':
        $controller->atualizar($pdo, $id);
        break;
    case 'excluir':
        $controller->excluir($pdo, $id);
        break;
    default:
        $controller->home($pdo, $id);
        break;
}