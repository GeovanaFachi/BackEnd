<?php
// class UsuarioModel {
//     private $db;

//     public function __construct($conexao) {
//         $this->db = $conexao;
//     }

//     // INSERT dentro da classe UsuarioModel
//     public function inserir($nome, $email, $senha) {
//         $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
//         $stmt = $this->db->prepare($sql);
        
//         // Criptografa a senha por segurança
//         $senhaCripto = password_hash($senha, PASSWORD_DEFAULT);
        
//         return $stmt->execute([$nome, $email, $senhaCripto]);
//     }

//     // SELECT dentro da classe UsuarioModel
//     public function ler() {
//         $sql = "SELECT id, nome, email, criado_em FROM usuarios";
//         $stmt = $this->db->prepare($sql);
//         $stmt->execute();
        
//         // Retorna uma matriz com todos os usuários encontrados
//         return $stmt->fetchAll(PDO::FETCH_ASSOC);
//     }

//     // UPDATE dentro da classe UsuarioModel
//     public function atualizar($id, $nome, $email) {
//         // Atualiza apenas o usuário que possui o ID correspondente
//         $sql = "UPDATE usuarios SET nome = ?, email = ? WHERE id = ?";
//         $stmt = $this->db->prepare($sql);
        
//         // Retorna true se a atualização deu certo, ou false se falhou
//         return $stmt->execute([$nome, $email, $id]);
//     }

//     // DELETE dentro da classe UsuarioModel
//     public function deletar($id) {
//         // Apaga apenas o usuário com o ID correspondente
//         $sql = "DELETE FROM usuarios WHERE id = ?";
//         $stmt = $this->db->prepare($sql);
        
//         // Retorna true em caso de sucesso ou false em caso de falha
//         return $stmt->execute([$id]);
//     }
// }

// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// LOCAL: app/Models/UsuarioModel.php

class UsuarioModel {
    private $db;

    public function __construct($conexao) {
        $this->db = $conexao;
    }

    public function buscarTodos() {
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // public function criar($dados) {
    //     $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
    //     $stmt = $this->db->prepare($sql);
    //     $stmt->execute([
    //         'nome' => $dados['nome'],
    //         'email' => $dados['email'],
    //         'senha' => password_hash($dados['senha'], PASSWORD_DEFAULT)
    //     ]);
    //     return $this->db->lastInsertId();
    // }

    // public function atualizar($id, $dados) {
    //     $sql = "UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id";
    //     $stmt = $this->db->prepare($sql);
    //     return $stmt->execute([
    //         'nome' => $dados['nome'],
    //         'email' => $dados['email'],
    //         'id' => $id
    //     ]);
    // }

    public function criar($dados) {
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['nome' => $dados['nome'], 'email' => $dados['email'], 'senha' => password_hash($dados['senha'], PASSWORD_DEFAULT)]);
        return $this->db->lastInsertId();
    }
 
    public function atualizar($id, $dados) {
        $sql = "UPDATE usuarios SET nome = :nome, email = :email, senha = :senha WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['nome' => $dados['nome'], 'email' => $dados['email'], 'senha' => password_hash($dados['senha'], PASSWORD_DEFAULT), 'id' => $id]);
    }

    public function excluir($id) {
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}