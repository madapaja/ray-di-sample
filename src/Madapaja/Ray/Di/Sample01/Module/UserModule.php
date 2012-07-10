<?php

namespace Madapaja\Ray\Di\Sample01\Module;

use Ray\Di\AbstractModule;
use Madapaja\Ray\Di\Sample01\Interceptor\Transaction;
use Madapaja\Ray\Di\Sample01\Interceptor\Timer;

class UserModule extends AbstractModule
{
    protected function configure()
    {
        $pdo = new \PDO('sqlite::memory:', null, null);
        $this->bind('PDO')->annotatedWith('pdo_user')->toInstance($pdo);
        $this->bindInterceptor($this->matcher->any(), $this->matcher->annotatedWith('Madapaja\Ray\Di\Sample01\Annotation\Transactional'), [new Timer, new Transaction]);
    }
}
