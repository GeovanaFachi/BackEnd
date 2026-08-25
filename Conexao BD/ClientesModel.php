<?php
class ClientesModel {
    private $db;

    public function __construct($conexao) {
        $this->db = $conexao;
    }

    public function buscarPorId($id) {
        // 1. PREPARE: O SQL vai com um '?' (o marcador de posição)
        $sql = "SELECT * FROM clientes WHERE id = ?";
        $stmt = $this->db->prepare($sql);

        // 2. EXECUTE: O valor entra separado, impedindo que comandos maliciosos rodem
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function inserirCliente($nome, $contato, $endereco) {
        $sql = "INSERT INTO clientes (nome, contato, endereco) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);

        $stmt->execute([$nome, $contato, $endereco]);

        return $this->db->lastInsertId();
    }

    public function alterarContato($contato, $id) {
        $sql = "UPDATE clientes SET contato =? WHERE ID = ?";
        $stmt = $this->db->prepare($sql);

        $stmt->execute([$contato, $id]);

        return $stmt->rowCount();
    }

    public function deletarContato($id) {
    $sql = "DELETE FROM clientes WHERE id = ?";
    $stmt = $this->db->prepare($sql);

    $stmt->execute([$id]);

    return $stmt->rowCount();
    }

   }
