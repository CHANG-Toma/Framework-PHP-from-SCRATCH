<?php

interface VehicleInt{
    function changeWheel();
}

abstract class Vehicle {
    public function speedUp(): void
    {
        $this->speed += $this->accelerate;
    }
    public function __construct()
    {
        echo "Construction d'un véhicule";
    }
    public abstract function tempsDeFlottaison(): void;
}

final class Car extends Vehicle implements VehicleInt {
    private int $wheel = 4;
    protected int $accelerate = 1;
    protected int $speed = 0;
    public function __construct()
    {
        parent::__construct();
        echo "Je viens de te créer une nouvelle voiture";
    }
    public function __toString()
    {
        return "Ta voiture fait du ".$this->speed;
    }
    public function tempsDeFlottaison(): void
    {

    }
}

class Moto extends Vehicle implements VehicleInt  {
    private int $wheel = 2;
    protected int $accelerate = 2;
    protected int $speed = 0;

    public function __construct()
    {
        parent::__construct();
        echo "Je viens de te créer une nouvelle moto";
    }
    public function __toString()
    {
        return "Ta moto fait du ".$this->speed;
    }

    public function getSpeed(): int
    {
        return $this->speed;
    }
    public function tempsDeFlottaison(): void
    {

    }
}

$myCar = new Car();
$myMoto = new Moto();
//$myVehicle = new Vehicle();

//echo $myCar;


