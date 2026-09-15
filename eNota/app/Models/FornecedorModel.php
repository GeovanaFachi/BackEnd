<?php

class FornecedorModel {
    private $db;

    public function __construct($conexao) {
        $this->db = $conexao;
    }

    public function buscarTodos() {
        $sql = "SELECT * FROM fornecedor ORDER BY razao_social";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM fornecedor WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarPorCnpj($dados) {
        $sql = "SELECT * FROM fornecedor WHERE cnpj = :cnpj";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['cnpj' => $dados['cnpj']]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function criar($dados) {
        $sql = "INSERT INTO fornecedor (razao_social, cnpj, cidade, estado, rua, numero) VALUES (:razao_social, :cnpj, :cidade, :estado, :rua, :numero)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['razao_social' => $dados['razao_social'], 'cnpj' => $dados['cnpj'], 'cidade' => $dados['cidade'], 'estado' => $dados['estado'], 'rua' => $dados['rua'], 'numero' => $dados['numero']]);
        return $this->db->lastInsertId();
    }
 
    public function atualizar($id, $dados) {
        $sql = "UPDATE fornecedor SET razao_social = :razao_social, cnpj = :cnpj, cidade = :cidade, estado = :estado, rua = :rua, numero = :numero WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['razao_social' => $dados['razao_social'], 'cnpj' => $dados['cnpj'], 'cidade' => $dados['cidade'], 'estado' => $dados['estado'], 'rua' => $dados['rua'], 'numero' => $dados['numero'], 'id' => $id]);
    }

    public function excluir($id) {
        $sql = "DELETE FROM fornecedor WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}