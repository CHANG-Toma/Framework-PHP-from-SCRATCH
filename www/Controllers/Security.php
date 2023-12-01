<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\User;

class Security
{
    /**
     * Gère la fonctionnalité de connexion de l'utilisateur.
     */
    public function login(): void
    {
        // Insère un nouvel utilisateur
        $myUser = new User();
        $myUser->setFirstname("toto");
        $myUser->setLastname("   tata    ");
        $myUser->setEmail("toma11chang@gmail.com");
        $myUser->setPwd("eeee");
        //$myUser->setId(5);
        //$myUser->save();

        // Modifie un utilisateur existant
        $myUser = User::populate(5);
        if (!empty($myUser)) {
            $myUser->setFirstname("Test");
            $myUser->save();
        }

        // Affiche la vue "Security/login" dans le contexte "back"
        new View("Security/login", "back");
    }

    /**
     * Gère la fonctionnalité de déconnexion de l'utilisateur.
     */
    public function logout(): void
    {
        // Affiche le message "Logout"
        echo "Logout";
    }

    /**
     * Gère la fonctionnalité d'inscription de l'utilisateur.
     */
    public function register(): void
    {
        // Affiche le message "Register"
        echo "Register";
    }
}
