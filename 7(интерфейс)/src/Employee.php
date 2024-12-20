<?php

namespace App;

abstract class Employee
{
    protected string $name;
    protected string $position;

    public function __construct(string $name, string $position)
    {
        $this->name = $name;
        $this->position = $position;
    }

    abstract public function calculateSalary(): float;

    public function getDetails(): string
    {
        return "Имя: {$this->name}, Должность: {$this->position}";
    }
}
