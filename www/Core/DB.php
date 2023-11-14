<?php

namespace App\Core;

class DB
{
    public function __construct()
    {
        //Connexion à la bdd
        echo get_called_class();
    }

    public function save(): void
    {
        //Création et execution d'une requête insert SQL
        echo "Enregistrer les résultats";
    }

}