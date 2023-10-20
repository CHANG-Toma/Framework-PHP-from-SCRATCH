<?php

namespace App\Core;

Class View
{
    public function __construct($path, $layout)
    {
        if (file_exists("Views/" . $path . ".view.php")) {
            $path = "Views/" . $path . ".view.php";
            include "Views/Templates/".$layout.".tpl.php";

        } else {
            echo "pas de fichier";
        }
    }
}

