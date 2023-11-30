<?php
namespace App\Controllers;

use App\Core\View;
use App\Models\User;

class Security{

    public function login(): void
    {
        $myUser = new User();
        $myUser->setFirstname("Yves");
        $myUser->setLastname("   SKrZypczYK    ");
        $myUser->setEmail("Y.skrzypczyk@gmail.com");
        $myUser->setPwd("Test1234");
        $myUser->save(1);

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