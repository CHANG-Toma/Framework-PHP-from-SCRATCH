<?php

namespace App\Core;

class DB
{
    private $pdo;
    private $prefix = "esgi_";
    private $table;

    /**
     * Constructeur de la classe DB.
     * Gère la connexion à la base de données et définit le nom de la table en fonction du nom de la classe.
     */
    public function __construct()
    {
        // Connexion à la base de données
        try {
            $this->pdo = new \PDO("mysql:host=mariadb;dbname=esgi;charset=utf8", "esgi", "esgipwd");
        } catch (\PDOException $exception) {
            echo "Erreur de connexion à la base de données : " . $exception->getMessage();
        }

        // Détermine le nom de la table en fonction du nom de la classe
        $table = get_called_class();
        $table = explode("\\", $table);
        $table = array_pop($table);
        $this->table = $this->prefix . strtolower($table);
    }

    /**
     * Obtient les variables enfant de l'objet.
     * @return array
     */
    public function getChildVars(): array
    {
        // Récupère les variables de l'objet qui ne sont pas dans la classe parente
        $vars = array_diff_key(get_object_vars($this), get_class_vars(get_class()));
        return $vars;
    }

    /**
     * Enregistre l'objet dans la base de données en créant et exécutant une requête SQL d'insertion ou de mise à jour.
     */
    public function save(): void
    {
        // Crée et exécute une requête SQL d'insertion ou de mise à jour
        $childVars = $this->getChildVars();

        if (empty($this->getId())) { // Si l'ID est vide, effectue une insertion
            $sql = "INSERT INTO " . $this->table . " (" . implode(", ", array_keys($childVars)) . ")
            VALUES (:" . implode(", :", array_keys($childVars)) . ")";
        } else { // Sinon, effectue une mise à jour
            $sql = "UPDATE " . $this->table . " SET ";
            foreach ($childVars as $key => $value) {
                $sql .= $key . "=:" . $key . ", ";
            }
            $sql = substr($sql, 0, -2);
            $sql .= " WHERE id=:id";
            $childVars["id"] = $this->getId();
        }

        $query = $this->pdo->prepare($sql);
        $query->execute($childVars);
    }

    /**
     * Peuple un objet avec des données de la base de données en fonction de son ID.
     * @param $id
     * @return object|int
     */
    public static function populate($id): object|int
    {
        // Récupère un objet par son ID
        return (new static())->getOneBy(["id" => $id], "object");
    }

    /**
     * Récupère un enregistrement de la base de données en fonction des critères spécifiés.
     * @param array $data
     * @param string $return
     * @return object|array|int
     */
    public function getOneBy(array $data, $return = "array"): object|array|int
    {
        // Récupère un enregistrement en fonction des données fournies
        $sql = "SELECT * FROM " . $this->table . " WHERE ";
        foreach ($data as $key => $value) {
            $sql .= $key . "=:" . $key . " AND ";
        }
        $sql = substr($sql, 0, -5);
        $query = $this->pdo->prepare($sql);
        $query->execute($data);

        // Retourne le résultat sous forme d'objet, tableau ou entier en fonction de $return
        if ($return == "object")
            $query->setFetchMode(\PDO::FETCH_CLASS, get_called_class());
        return $query->fetch();
    }
}
