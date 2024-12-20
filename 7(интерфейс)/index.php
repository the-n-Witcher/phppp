<?php

require 'vendor/autoload.php';

use App\Employee;
use App\FullTimeEmployee;
use App\PartTimeEmployee;

$employees = [
    new FullTimeEmployee("Иван Иванов", "Менеджер", 50000),
    new PartTimeEmployee("Петр Петров", "Кассир", 200, 80),
    new FullTimeEmployee("Светлана Сидорова", "Разработчик", 70000),
    new PartTimeEmployee("Алексей Алексеев", "Уборщик", 150, 60),
];

foreach ($employees as $employee) {
    echo $employee->getDetails() . ", Зарплата: " . $employee->calculateSalary() . " руб." . PHP_EOL;
}
