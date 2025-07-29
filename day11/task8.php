<?php

class Animal {
    public $name;
    public function makeSound(){
        echo "$this->name WOOF";
    }
}
class dog extends Animal {
    public function dog(){
        echo "$this->name SOUND";
    }
}
$animal = new dog();
$animal->makeSound();
?>