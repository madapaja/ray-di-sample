<?php

namespace Madapaja\Ray\Di\Sample01\Module;

use Ray\Di\AbstractModule;
use Madapaja\Ray\Di\Sample01\Interceptor\Transaction;
use Madapaja\Ray\Di\Sample01\Interceptor\Timer;
use Madapaja\Ray\Di\Sample01\Interceptor\Template;

class UserModule extends AbstractModule
{
    protected function configure()
    {
        // bind dependency @Inject @Named("pdo_user")
        $pdo = new \PDO('sqlite::memory:', null, null);
        $this->bind('PDO')->annotatedWith('pdo_user')->toInstance($pdo);

        // bind aspect @Transactional method
        $this->bindInterceptor(
            $this->matcher->any(),
            $this->matcher->annotatedWith('Madapaja\Ray\Di\Sample01\Annotation\Transactional'),
            [new Timer, new Transaction]
        );

        // bind aspect @Template method
        $this->bindInterceptor(
            $this->matcher->any(),
            $this->matcher->annotatedWith('Madapaja\Ray\Di\Sample01\Annotation\Template'),
            [new Template]
        );
    }
}
