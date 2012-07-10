<?php

namespace Madapaja\Ray\Di\Sample01\Interceptor;

use Ray\Aop\MethodInterceptor;
use Ray\Aop\MethodInvocation;

class Timer implements MethodInterceptor
{
    public function invoke(MethodInvocation $invocation)
    {
        echo "Timer start\n";
        $mtime = microtime(true);
        $invocation->proceed();
        $time = microtime(true) - $mtime;
        echo "Timer stop:[" . sprintf('%01.7f', $time) . "] sec\n\n";
    }
}
