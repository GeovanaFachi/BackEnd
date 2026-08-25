<?php
require 'conexao.php';
require 'ClientesModel.php';

$clientesModel = new ClientesModel($pdo);
$contato = $clientesModel->deletarContato(4);

print_r($contato);