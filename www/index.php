<?php

namespace App;

/*
    Si nous sommes sur l'url /login alors il faut instancier
    la class (controller) Security et appeler la method (Action) login
    Si l'url ne correspond à rien  alors il faut instancier
    la class (controller) Main et appeler la method (Action) page404
*/

//Récupérer l'URL et ne garder que l'URI, exemple /login
//Nettoyage de la chaîne
// /login?id=3

spl_autoload_register("App\myAutoloader");
function myAutoloader($class)
{
    //$class = App\Core\View
    $file = str_replace("App\\", "", $class);
    $file = str_replace("\\", "/", $file);
    $file .=".php";
    if(file_exists($file)){
        include $file;
    }
}



$uri = strtolower($_SERVER["REQUEST_URI"]);
$uri = strtok($uri, "?");
if(strlen($uri )>1) $uri = rtrim($uri, "/");



//Récupérer le contenu du fichier routes.yaml
$fileRoute = "routes.yaml";
if(file_exists($fileRoute)) {
    $listOfRoutes = yaml_parse_file($fileRoute);
}else{
    die("Le fichier de routing n'existe pas");
}

//Comparer son URI avec ce que l'on a dans le fichier routes et voir s'il y a une correspondance
//S'il y a une correspandance on doit récupérer le controller et l'action
//On fait toutes les vérifications nécessaires et on fait
//une instance du controller et l'appel de l'action

if(!empty($listOfRoutes[$uri])){
    if(!empty($listOfRoutes[$uri]["controller"])){
        if(!empty($listOfRoutes[$uri]["action"])){

            $controller = $listOfRoutes[$uri]["controller"];
            $action = $listOfRoutes[$uri]["action"];

            if(file_exists("Controllers/".$controller.".php")){
                include "Controllers/".$controller.".php";
                $controller = "App\\Controllers\\".$controller;
                if(class_exists($controller)){
                    $object = new $controller();
                if(method_exists($object, $action)){
                    $object->$action();
                }else{
                    die("L'action' ".$action. " n'existe pas");
                }
                }else{
                    die("Le class controller ".$controller. " n'existe pas");
                }
            }else{
                die("Le fichier controller ".$controller. " n'existe pas");
            }

        }else{
            die("La route ".$uri." ne possède pas d'action dans le ficher ".$fileRoute);
        }
    }else{
        die("La route ".$uri." ne possède pas de controller dans le ficher ".$fileRoute);
    }
}else{
//S'il n'y a pas de correspondance => page 404
    include "Controllers/Error.php";
    $object = new Controllers\Error();
    $object->page404();
}






