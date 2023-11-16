<?php

//Variables
/*
    Déclaration automatique
    Typage automatique et dynamique : String, Integer, Float, Bool, null
    Convention : camelCase (snake_case, PascalCase, kebab-case)
    Pertinence
    Anglais
 */
/*
$myVar = "Yves";
$myVar = 4;

//Incrémentation et Décrementation
$cpt = 0;
$cpt++;
$cpt += 1;
$cpt = $cpt + 1;
++$cpt;


$cpt = 0;
echo $cpt; //0
echo $cpt++; //0
$cpt+1;
echo $cpt;//1
echo ++$cpt;//2
echo $cpt = $cpt+1;//3


$myVar = "toto";
$myVar2 = &$myVar;
$myVar2 = "test";
echo $myVar; //test

//CONDITIONS
$age = 18;

if($age < 18){
    echo "mineur";
}else if ($age == 18){
    echo "Tout juste majeur";
}else{
    echo "majeur";
}

//Condition ternaire
// instruction (condition)?vrai:faux;
$age = 18;
if($age < 18){
    echo "mineur";
}else{
    echo "majeur";
}

echo ($age < 18)?"mineur":"majeur";

//Null coalescent
$firstname = null;

if($firstname == null){
    echo "John Doe";
}else{
    echo $firstname;
}

echo $firstname??"John Doe";

//Switch

$scope = "admin";
switch ($scope){
    case "admin":
        echo "Peut modifier la config";
    case "editor":
        echo "Peut modifier le contenu des autres";
    case "author":
        echo "Peut modifier ses contenus";
    default:
        echo "Peut consulter le site";
}

if($scope == "admin"){
    echo "Peut modifier la config";
}
if($scope == "admin" || $scope == "editor"){
    echo "Peut modifier les contenus des autres";
}
if($scope == "admin" || $scope == "author" || $scope == "editor"){
    echo "Peut modifier ses contenus";
}
echo "Peut consulter le site";


//BOUCLES FOR, WHILE, DO WHILE, FOREACH

for($cpt=0; $cpt < 10 ; $cpt++){
    echo $cpt;
}

$number = rand(1, 10);
$cpt = 1;
while ($number != 6){
    $number = rand(1, 10);
    $cpt++;
}
echo "il y a eu ".$cpt." tentatives";




$cpt = 0;
do{
    $number = rand(1, 10);
    $cpt++;
}while ($number != 6);
echo "il y a eu ".$cpt." tentatives";


*/
//TABLEAU

$array = [];
//$array = array();

$class = [2=>"Nadine", "Marc", 0=>"Loan"];
//echo $class; Array to string conversion


$class[]="Robin";

echo "<pre>";
print_r($class);
//var_dump($class);

$student = ["lastname"=>"dany", "firstname"=>"sambo", "average"=>14];
//Afficher Prénom nom a une moyenne de note/20
//dany sambo a une moyenne de 14/20
echo $student["firstname"]." ".$student["lastname"]." a une moyenne de ".$student["average"]."/20";

$array = [
            0=>[],
            1=>[
                0=>[
                    0=>[],
                    1=>[
                        0=>[
                            0=>[
                                0=>[0=>""]
                            ],
                            1=>[]
                        ]
                    ]
                ]
            ]
        ];// 7D

echo $array[1][0][1][0][0][0][0];

$class = [
    0=>["Nadine", 12],
    1=>["Marc", 10.1],
    2=>["Loan", 11],
    3=>["Nicolas", 11]
];
/*
echo "<li>".$class[0][0].":".$class[0][1];
echo "<li>".$class[1][0].":".$class[1][1];
echo "<li>".$class[2][0].":".$class[2][1];
*/
foreach ($class as $student){
    echo "<li>".$student[0].":".$student[1];
}


//FONCTIONS


function hello()
{
    echo "Bonjour";
}

hello();


$firstname = "Yves";
function helloYou($firstname="")
{
    //global $firstname;
    echo "Bonjour ".$firstname;
}

helloYou($firstname);
helloYou();


function cleanAndCheckFirstname(&$firstname)
{
    $firstname = ucwords(strtolower(trim($firstname)));
    return strlen($firstname) > 2;
}

$firstname = "    jEAn yVES   ";
if(cleanAndCheckFirstname($firstname)){
    echo "Welcome ".$firstname;
}else{
    echo "Nok";
}
