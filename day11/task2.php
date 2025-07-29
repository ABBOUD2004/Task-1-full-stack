<?php

class Employee
{
    public $name = "John";
    protected $salary = 5000;
    private $bonus = 1000;

    public function getSalary()
    {
        echo $this->salary;
    }


    public function getBonus()
    {
        echo $this->bonus;
    }
}

$employee = new Employee();

echo "Name: " . $employee->name . "<br>";
echo "Salary: " . $employee->getSalary() . "<br>";
echo "Bonus: " . $employee->getBonus();
