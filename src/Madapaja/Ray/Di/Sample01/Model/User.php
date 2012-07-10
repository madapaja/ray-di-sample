<?php

namespace Madapaja\Ray\Di\Sample01\Model;

class User
{
    private $db;

    public function __construct(\PDO $pdo)
    {
        $this->db = $pdo;
    }
}
