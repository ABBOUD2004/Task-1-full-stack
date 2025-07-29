<?php
class BOOK {
    public $titel;
    public function read() {
        echo "$this->titel is being read.";
    }
}
$Book = new BOOK();
$Book->titel = "abdallah mohamed";
$Book->read(); 
