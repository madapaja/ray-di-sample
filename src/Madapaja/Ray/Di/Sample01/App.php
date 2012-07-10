<?php

namespace Madapaja\Ray\Di\Sample01;

use Ray\Di\Injector;
use Ray\Di\Container;
use Ray\Di\Forge;
use Ray\Di\Config;
use Ray\Di\Annotation;
use Ray\Di\Definition;

use Madapaja\Ray\Di\Sample01\Module\UserModule;

class App
{
    public function run()
    {
        $di = new Injector(new Container(new Forge(new Config(new Annotation(new Definition)))));
        $di->setModule(new UserModule);

        $user = $di->getInstance('Madapaja\Ray\Di\Sample01\Model\User');

        $user->init();
        $user->createUser('Koriym', rand(18,35));
        $user->createUser('Bear', rand(18,35));
        $user->createUser('Yoshi', rand(18,35));

        $users = $user->readUsers();
        var_export($users);
    }
}
