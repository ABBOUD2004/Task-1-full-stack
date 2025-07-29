<?php

class Vehicle {
    public $make;
    public $model;

    public function info() {
        echo "Make: $this->make, Model: $this->model";
    }
}

class Car extends Vehicle {
    public $fuelType;

    public function info() {
        echo "Make: $this->make, Model: $this->model, Fuel Type: $this->fuelType";
    }
}


$myCar = new Car();
$myCar->make = "Toyota";
$myCar->model = "Corolla";
$myCar->fuelType = "Petrol";

$myCar->info();
