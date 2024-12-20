<?php

namespace App;

class FullTimeEmployee extends Employee
{
    private float $salary;

    public function __construct(string $name, string $position, float $salary)
    {
        parent::__construct($name, $position);
        $this->salary = $salary;
    }

    public function calculateSalary(): float
    {
        return $this->salary;
    }
}
