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

        $user->createUser('Koriym', mt_rand(18,35));
        $user->createUser('Bear', mt_rand(18,35));
        $user->createUser('Yoshi', mt_rand(18,35));

        $users = $user->readUsers();
        print_r($users);
    }
}
