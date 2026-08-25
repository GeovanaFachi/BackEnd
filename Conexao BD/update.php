<?php
require 'conexao.php';
require 'ClientesModel.php';

$clientesModel = new ClientesModel($pdo);
$contato = $clientesModel->alterarContato(
    "49899665533",
    4
);

print_r($contato);
