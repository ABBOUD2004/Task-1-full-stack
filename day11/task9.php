<?php

class Student
{
    public $name;
    public $email;
    public $age;
    private $isActive = false;

    public function __construct($name, $email, $age)
    {
        $this->name = $name;
        $this->email = $email;
        $this->age = $age;
    }

    public function activate()
    {
        $this->isActive = true;
    }

    public function getStatus()
    {
        return $this->isActive;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $name = $_POST["name"] ?? "Unknown";
    $email = $_POST["email"] ?? "no@email.com";
    $age = $_POST["age"] ?? 0;


    $student = new Student($name, $email, $age);
    $student->activate();


    $status = $student->getStatus();


    $welcome = $status ? "Welcome, $name" : "Please activate your account.";


    $response = [
        "status" => $status,
        "welcome" => $welcome
    ];

    header("Content-Type: application/json");
    echo json_encode($response);
}
?>