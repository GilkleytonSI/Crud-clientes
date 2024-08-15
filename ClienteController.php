<?php
include_once 'Cliente.php';
include_once 'Database.php';

class ClienteController {
    private $cliente;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->cliente = new Cliente($db);
    }

    public function criarCliente($nome, $email) {
        $this->cliente->setNome($nome);
        $this->cliente->setEmail($email);
        return $this->cliente->criar();
    }

    public function listarClientes() {
        return $this->cliente->ler();
    }

    public function atualizarCliente($id, $nome, $email) {
        $this->cliente->setId($id);
        $this->cliente->setNome($nome);
        $this->cliente->setEmail($email);
        return $this->cliente->atualizar();
    }

    public function excluirCliente($id) {
        $this->cliente->setId($id);
        return $this->cliente->excluir();
    }
}
?>
