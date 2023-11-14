<?php
namespace App\Controllers;

use App\Core\View;
use App\Models\User;
use App\Core;

class Security extends DB{

    public function login(): void
    {
        new View("Security/login", "front");
    }
    public function logout(): void
    {
        new View("Security/register", "front");
    }
    public function register(): void
    {
        echo "Register";
    }


}