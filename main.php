<?php

require __DIR__.'/vendor/autoload.php';

use Ray\Di\Injector;
use Ray\Di\Container;
use Ray\Di\Forge;
use Ray\Di\Config;
use Ray\Di\Annotation;
use Ray\Di\Definition;

use Madapaja\Ray\Di\Sample01\Module\UserModule;

$di = new Injector(new Container(new Forge(new Config(new Annotation(new Definition)))));
$di->setModule(new UserModule);
