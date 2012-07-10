<?php

namespace Madapaja\Ray\Di\Sample01\Interceptor;

use Ray\Aop\MethodInterceptor;
use Ray\Aop\MethodInvocation;

class Template implements MethodInterceptor
{
    public function invoke(MethodInvocation $invocation)
    {
        $view = '';
        $result = $invocation->proceed();
        if (! is_array($result)) {
            return $result;
        }
        foreach ($result as &$row) {
            $view .= "Name:{$row['Name']}\tAge:{$row['Age']}\n";
        }
        echo $view;

        return $result;
    }
}
