<?php

class Cliente {
    private $id;
    private $nome;
    private $email;
    private $conexao;

    // Construtor com injeção de dependência do banco de dados
    public function __construct($db) {
        $this->conexao = $db;
    }

    // Método para criar um novo cliente
    public function criar() {
        $query = "INSERT INTO clientes (nome, email) VALUES (:nome, :email)";
        $stmt = $this->conexao->prepare($query);
        
        // Limpar dados
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->email = htmlspecialchars(strip_tags($this->email));

        // Bind dos valores
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);

        // Executar query
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Método para ler todos os clientes
    public function ler() {
        $query = "SELECT * FROM clientes";
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Método para atualizar um cliente
    public function atualizar() {
        $query = "UPDATE clientes SET nome = :nome, email = :email WHERE id = :id";
        $stmt = $this->conexao->prepare($query);

        // Limpar dados
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind dos valores
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":id", $this->id);

        // Executar query
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Método para excluir um cliente
    public function excluir() {
        $query = "DELETE FROM clientes WHERE id = :id";
        $stmt = $this->conexao->prepare($query);

        // Limpar dados
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind do valor
        $stmt->bindParam(":id", $this->id);

        // Executar query
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Getters e setters para os atributos
    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
}
?>
