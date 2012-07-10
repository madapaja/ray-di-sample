<?php

namespace Madapaja\Ray\Di\Sample01\Interceptor;

use Ray\Aop\MethodInterceptor;
use Ray\Aop\MethodInvocation;

/**
 * Transaction interceptor
 */
class Transaction implements MethodInterceptor
{
    public function invoke(MethodInvocation $invocation)
    {
        $object = $invocation->getThis();
        $ref = new \ReflectionProperty($object, 'db');
        $ref->setAccessible(true);
        $db = $ref->getValue($object);
        $db->beginTransaction();
        try {
            echo "begin Transaction" . json_encode($invocation->getArguments()) . "\n";
            $invocation->proceed();
            $db->commit();
            echo "commit\n";
        } catch (\Exception $e) {
            $db->roleback();
        }
    }
}
