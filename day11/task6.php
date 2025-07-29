<?php

abstract class employee
{
    private $salary = 0;


    public function calculateSalary()
    {

        $salary = $this->salary;
    }
}
class HourlyEmployee extends Employee
{
    private $houerWork;
    private $hourRate;

    public function __construct($houerWork, $hourRate)
    {
        $this->houerWork = $houerWork;
        $this->hourRate = $hourRate;


    }
    public function calculateSalary()
    {
        echo $this->houerWork * $this->hourRate;
    }
}

$employee = new HourlyEmployee(40,20);
echo "Salary: $" . $employee->calculateSalary() ."";