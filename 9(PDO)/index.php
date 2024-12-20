<?php

require 'vendor/autoload.php';

$database = new Database();
$user = new User($database);
$data = [
    'name' => 'Arth',
    'email' => 'archy@example.com'
];

if ($user->updateUser(1, $data)) {
    echo "Пользователь обновлен успешно.";
} else {
    echo "Пользователь не найден.";
}
