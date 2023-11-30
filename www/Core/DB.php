<?php

namespace App\Core;

    use PDO;
    use PDOException;

class DB
{
    private $pdo;
    private $table;
    private $primaryKey = 'id';

    public function __construct()
    {
        $host = 'mariadb';
        $db   = 'mydatabase';
        $user = 'user';
        $pass = 'password';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        try {
            $this->pdo = new PDO($dsn, $user, $pass, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function save(): void
    {
        $data = $this->getData();

        print_r($data);
    }

    public function find($id): ?object
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE {$this->primaryKey} = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetchObject();
    }

    public function delete($id): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM {$this->table} WHERE {$this->primaryKey} = :id");
        $stmt->execute(['id' => $id]);
    }

    public function __destruct()
    {
        $this->pdo = null;
    }

    protected function getData(): array
    {
        throw new \Exception("Method getData() must be implemented in the subclass.");
    }

}