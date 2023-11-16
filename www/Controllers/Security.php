<?php
namespace App\Controllers;

use App\Core\View;
use App\Models\User;

class Security{

    public function login(): void
    {
        $myUser = new User();
        $myUser->setFirstname("Toma");
        $myUser->setLastname("   CHANG    ");
        $myUser->setEmail("toma.chang@gmail.com");
        $myUser->setPwd("TESttest");
        $myUser->save();

        /*
        $myPage = new Page();
        $myPage->setTitle("MA super page");
        $myPage->setDescription("Description de ma super page");
        $myPage->save();
        */

        new View("Security/login", "back");
    }
    public function logout(): void
    {
        echo "Logout";
    }
    public function register(): void
    {
        echo "Register";
    }


}