<?php

namespace App;

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


// parse_url() analyse une URL et retourne l'URI dans un tableau ['path']
$uri = strtolower($_SERVER['REQUEST_URI']);
$uri = strtok($uri,"?");
if(strlen($uri) > 1) $uri = rtrim($uri, "/");


$routesYAML = 'routes.yaml';


$listOfRoutes = yaml_parse_file($routesYAML);    //récupère le contenue sous forme de tableau

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
        }
        else{
            die("Pas d'action");
        }
    }
    else{
        die("Pas de controleur");
    }
}
else{
//S'il n'y a pas de correspondance => page 404
    include "Controllers/Error.php";
    $object = new Controllers\Error();
    $object->page404();
}