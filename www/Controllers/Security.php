<?php
namespace App\Controllers;

use App\Core\View;

class Security{

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