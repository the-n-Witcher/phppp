<?php

class User
{
    private Database $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function updateUser(int $id, array $data): bool
    {
        return $this->database->updateUser($id, $data);
    }
}
