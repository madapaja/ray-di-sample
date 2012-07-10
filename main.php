<?php

use Doctrine\Common\Annotations\AnnotationRegistry;

$loader = require __DIR__.'/vendor/autoload.php';
AnnotationRegistry::registerLoader(array($loader, "loadClass"));

use Madapaja\Ray\Di\Sample01\App;

(new App())->run();
