<?php

namespace App\Core;

Class View
{
    private $template;
    public function __construct($path, $layout)
    {
        if (file_exists("Views/" . $path . ".view.php")) {
            $path = "Views/" . $path . ".view.php";
            $this->template =  "Views/Templates/".$layout.".tpl.php";

        } else {
            echo "pas de fichier";
        }
    }

    public function __destruct(){
        include $this->template;
    }
}

