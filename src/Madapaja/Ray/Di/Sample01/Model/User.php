<?php

namespace Madapaja\Ray\Di\Sample01\Model;

use Ray\Di\Di\Inject;
use Ray\Di\Di\Named;
use Ray\Di\Di\PostConstruct;
use Madapaja\Ray\Di\Sample01\Annotation\Transactional;
use Madapaja\Ray\Di\Sample01\Annotation\Template;

class User
{
    private $db;

    /**
     * @Inject
     * @Named("pdo=pdo_user")
     */
    public function __construct(\PDO $pdo)
    {
        $this->db = $pdo;
    }

    /**
     * @PostConstruct
     */
    public function init()
    {
        return $this->db->query('CREATE TABLE User (Id INTEGER PRIMARY KEY, Name TEXT, Age INTEGER)');
    }

    /**
     * @Transactional
     */
    public function createUser($name, $age)
    {
        $sth = $this->db->prepare('INSERT INTO User (Name, Age) VALUES (:name, :age)');
        return $sth->execute(array(':name' => $name, ':age' => $age));
    }

    /**
     * @Template
     */
    public function readUsers()
    {
        $sth = $this->db->query('SELECT Name, Age FROM User');
        $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
}
