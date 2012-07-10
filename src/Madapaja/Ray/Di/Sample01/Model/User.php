<?php

namespace Madapaja\Ray\Di\Sample01\Model;

class User
{
    private $db;

    public function __construct(\PDO $pdo)
    {
        $this->db = $pdo;
    }

    public function init()
    {
        return $this->db->query('CREATE TABLE User (Id INTEGER PRIMARY KEY, Name TEXT, Age INTEGER)');
    }

    public function createUser($name, $age)
    {
        $sth = $this->db->prepare('INSERT INTO User (Name, Age) VALUES (:name, :age)');
        return $sth->execute(array(':name' => $name, ':age' => $age));
    }

    public function readUsers()
    {

    }
}
