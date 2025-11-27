<?php
class Database {
    private $host = DB_HOST;
    private $dbname = DB_NAME;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $charset = 'utf8mb4';

    protected $conn;

    public function connect() {
        try {
            $this->conn = new PDO(
                "mysql:host=".$this->host.";dbname=".$this->dbname.";charset=".$this->charset,
                $this->user,
                $this->pass
            );

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;

        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
