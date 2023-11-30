<?php

namespace App\Core;

use PDO;
use PDOException;

class DB
{
    protected $pdo;
    protected $table;
    protected $primaryKey = 'id';

    public function __construct()
    {
        $host = 'mariadb';
        $db   = 'esgii';
        $user = 'esgi';
        $pass = 'esgipwd';
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

    public function save(?int $id = null): void
    {
        $data = $this->getData();

        if ($id === null) {
            $keys = array_keys($data);
            $columns = implode(', ', $keys);
            $placeholders = ':' . implode(', :', $keys);
            $sql = "INSERT INTO {$this->table} ($columns) VALUES ($placeholders)";
        } else {
            $set = implode(', ', array_map(fn($key) => "$key = :$key", array_keys($data)));
            $sql = "UPDATE {$this->table} SET $set WHERE {$this->primaryKey} = :id";
            $data['id'] = $id;
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        
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
        $fields = get_object_vars($this);
        $data = array();
        

        foreach ($fields as $field => $value){
            if ($field != "pdo" && $field != "table" && $field != "primaryKey"){
                $data["$field"] = $value;
            }
        }
        return $data;
    }
}