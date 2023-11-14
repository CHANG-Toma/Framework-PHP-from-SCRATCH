<?php
namespace App\Controllers;

use App\Core\View;
use App\Models\User;


class Security{

    public function login(): void
    {
        $myUser = new User();
        $myUser->setFirstname("YVEs");
        $myUser->setLastname("   SKrZypczYK    ");
        $myUser->setEmail("Y.skrzypczyk@gmail.com");
        $myUser->setPwd("Test1234");

        $dataARRAY["firstname"] = $myUser->getFirstname();
        $dataARRAY["lastname"] = $myUser->getLastname();
        $dataARRAY["email"] = $myUser->getEmail();
        $dataARRAY["pwd"] = $myUser->getPwd();

        print_r($dataARRAY);

        //$myUser->save("User", $dataARRAY);

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