<?php

namespace Madapaja\Ray\Di\Sample01\Interceptor;

use Ray\Aop\MethodInterceptor;
use Ray\Aop\MethodInvocation;

class Timer implements MethodInterceptor
{
    public function invoke(MethodInvocation $invocation)
    {
        printf('%s::%s(): Timer start'."\n", $invocation->getMethod()->class, $invocation->getMethod()->name);
        $mtime = microtime(true);
        $return = $invocation->proceed();
        $time = microtime(true) - $mtime;
        printf('%s::%s(): Timer stop [%01.7f sec]'."\n\n", $invocation->getMethod()->class, $invocation->getMethod()->name, $time);

        return $return;
    }
}
