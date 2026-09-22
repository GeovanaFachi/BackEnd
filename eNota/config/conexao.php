<?php
$host = 'localhost';
$db = 'db_enota';
$user = 'root';
$pass = '';

try {
    $pdoStarter = new PDO("mysql:host={$host};charset=utf8mb4", $user, $pass);
    $pdoStarter->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdoStarter->exec("CREATE DATABASE IF NOT EXISTS `{$db}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

    $pdo = new PDO("mysql:host={$host};dbname={$db};charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $pdo->exec("
        CREATE TABLE IF NOT EXISTS usuarios (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(100) NOT NULL,
            email VARCHAR(150) NOT NULL UNIQUE,
            senha VARCHAR(255) NOT NULL,
            criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
    ");


    $pdo->exec("
        CREATE TABLE IF NOT EXISTS fornecedor (
            id INT AUTO_INCREMENT PRIMARY KEY,
            razao_social VARCHAR(150) NOT NULL,
            cnpj VARCHAR(18) NOT NULL UNIQUE,
            cidade VARCHAR(100) NOT NULL,
            estado CHAR(2) NOT NULL,
            rua VARCHAR(100) NOT NULL,
            numero INT NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
    ");

    $pdo->exec("
        CREATE TABLE IF NOT EXISTS classificacao (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(100) NOT NULL,
            cfop VARCHAR(10) NOT NULL,
            descricao VARCHAR(255) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
    ");


    $pdo->exec("
        CREATE TABLE IF NOT EXISTS forma_pagamento (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(50) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
    ");


    $pdo->exec("
        CREATE TABLE IF NOT EXISTS nota_entrada (
            id INT AUTO_INCREMENT PRIMARY KEY,
            fornecedor_id INT NOT NULL,
            numero_nf INT NOT NULL,
            data_emissao DATE NOT NULL,
            valor_total DECIMAL(15,2) NOT NULL,
            classificacao_id INT NOT NULL,
            forma_pagamento_id INT NOT NULL,
            FOREIGN KEY (fornecedor_id)
                REFERENCES fornecedor(id),
            FOREIGN KEY (classificacao_id)
                REFERENCES classificacao(id),
            FOREIGN KEY (forma_pagamento_id)
                REFERENCES forma_pagamento(id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
    ");


} catch (PDOException $e) {
    die('Erro ao conectar ao banco: ' . $e->getMessage());
}