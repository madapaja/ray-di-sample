<?php

namespace Madapaja\Ray\Di\Sample01\Module;

use Ray\Di\AbstractModule;

class UserModule extends AbstractModule
{
    protected function configure()
    {
        $pdo = new \PDO('sqlite::memory:', null, null);
        $this->bind('PDO')->annotatedWith('pdo_user')->toInstance($pdo);
    }
}
