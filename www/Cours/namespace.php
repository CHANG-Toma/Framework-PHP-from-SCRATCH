<?php

namespace App\Controllers;
class User {
    public function __construct()
    {
        echo "User pour la sécurité";
    }
}

/******************************************/

namespace App\Facebook;
class User {
    public function __construct()
    {
        echo "User pour les réseaux sociaux";
    }
}

/******************************************/

namespace App;
use App\Controllers\User as UserController;
use App\Facebook\User as UserFacebook;
//Chemin absolue
//new \App\Controllers\User();

//Chemin relatif
//new Facebook\User();

new UserController();