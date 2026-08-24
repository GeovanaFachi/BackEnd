<?php
require 'conexao.php';
require 'ClientesModel.php';

$clientesModel = new ClientesModel($pdo);
$id = $clientesModel->inserirCliente(
    "Paulo Perez",
    "498899665533",
    "Santa Rita, SMO"
);

print_r($id);
