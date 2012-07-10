<?php

require __DIR__.'/vendor/autoload.php';

use Ray\Di\Injector;
use Ray\Di\Container;
use Ray\Di\Forge;
use Ray\Di\Config;
use Ray\Di\Annotation;
use Ray\Di\Definition;

$di = new Injector(new Container(new Forge(new Config(new Annotation(new Definition)))));
