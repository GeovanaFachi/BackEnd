<?php
require 'conexao.php';
require 'ClientesModel.php';

$clientesModel = new ClientesModel($pdo);
$clientes = $clientesModel->buscarPorId(3);
print_r($clientes);
