<?php

class NotaModel{

    private $db;

    public function __construct($conexao){
        $this->db = $conexao;
    }

    public function buscarTodos(){
        $sql = "SELECT nota_entrada.id, nota_entrada.numero_nf, nota_entrada.data_emissao, nota_entrada.valor_total,fornecedor.razao_social AS fornecedor, classificacao.nome AS classificacao, forma_pagamento.nome AS forma_pagamento FROM nota_entrada 
            INNER JOIN fornecedor ON nota_entrada.fornecedor_id = fornecedor.id
            INNER JOIN classificacao ON nota_entrada.classificacao_id = classificacao.id
            INNER JOIN forma_pagamento ON nota_entrada.forma_pagamento_id = forma_pagamento.id
            ORDER BY nota_entrada.id DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id){
        $sql = "SELECT * FROM nota_entrada WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function criar($dados){
        $sql = "INSERT INTO nota_entrada(fornecedor_id, numero_nf, data_emissao, valor_total, classificacao_id, forma_pagamento_id)
                VALUES(:fornecedor_id, :numero_nf, :data_emissao, :valor_total, :classificacao_id, :forma_pagamento_id)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['fornecedor_id' => $dados['fornecedor_id'], 'numero_nf' => $dados['numero_nf'], 'data_emissao' => $dados['data_emissao'], 'valor_total' => $dados['valor_total'],
            'classificacao_id' => $dados['classificacao_id'], 'forma_pagamento_id' => $dados['forma_pagamento_id']]);
        return $this->db->lastInsertId();
    }

    public function atualizar($id, $dados){
        $sql = "UPDATE nota_entrada SET fornecedor_id = :fornecedor_id, numero_nf = :numero_nf, data_emissao = :data_emissao, valor_total = :valor_total, classificacao_id = :classificacao_id, forma_pagamento_id = :forma_pagamento_id
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['fornecedor_id' => $dados['fornecedor_id'], 'numero_nf' => $dados['numero_nf'], 'data_emissao' => $dados['data_emissao'], 'valor_total' => $dados['valor_total'],
            'classificacao_id' => $dados['classificacao_id'], 'forma_pagamento_id' => $dados['forma_pagamento_id'], 'id' => $id]);
    }

    public function excluir($id){
        $sql = "DELETE FROM nota_entrada WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}