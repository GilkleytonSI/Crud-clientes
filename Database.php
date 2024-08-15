<?php
class Database {
    private $host = "localhost";
    private $db_name = "meubanco";
    private $username = "root";
    private $password = "";
    public $conexao;

    // Conexão com o banco de dados
    public function getConnection() {
        $this->conexao = null;

        try {
            $this->conexao = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conexao->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Erro na conexão: " . $exception->getMessage();
        }

        return $this->conexao;
    }
}
?>
