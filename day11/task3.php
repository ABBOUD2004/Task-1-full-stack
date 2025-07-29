<?php

class Course {
    private $titel;
    private $instrutor;

    public function __construct($titel, $instrutor) {
        $this->titel = $titel;
        $this->instrutor = $instrutor;
    }

    public function show() {
        echo "Title: $this->titel - Instructor: $this->instrutor";
    }
}

$Course = new Course("c++", "Ahmed Elsayed");
$Course->show();
