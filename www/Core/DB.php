<?php

namespace App\Core;

use PDO;
use PDOException;

class DB
{
    private $login= "user";
    private $password= "password";
    private $dataBase= "mydatabase";
    private $server= "localhost";
    private $connect;

    public function __construct()
    {
        try {
            $this->connect = new \PDO("mysql:host=mariadb;dbname=" . $this->dataBase, $this->login, $this->password);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            print "Erreur de connexion PDO " . $e->getMessage();
            die();
        }
    }

    public function save($table, $data): void
    {
        // Construction de la requête d'insertion
        $columns = implode(', ', array_keys($data));
        $values = "'" . implode("', '", array_values($data)) . "'";
        $sql = "INSERT INTO $table ($columns) VALUES ($values)";

        // Exécution de la requête
        if ($this->conn->query($sql) === TRUE) {
            echo "Enregistrement réussi";
        } else {
            echo "Erreur lors de l'enregistrement : " . $this->conn->error;
        }
    }

}