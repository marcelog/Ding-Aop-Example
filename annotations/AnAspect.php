<?php
use Ding\Aspect\MethodInvocation;

/**
 * @Aspect
 */
class AnAspect
{
    /**
     * @ExceptionInterceptor(class-expression=".*Service$", expression="\w")
     */
    public function exceptionInterceptor(MethodInvocation $invocation)
    {
        echo "The method threw up\n";
    }

    /**
     * @MethodInterceptor(class-expression=".*Service$", expression="doBusiness[12]")
     */
    public function methodInterceptor(MethodInvocation $invocation)
    {
        $originalInvocation = $invocation->getOriginalInvocation();
        $method = $originalInvocation->getMethod();
        $class = $originalInvocation->getClass();
        echo 
            "Pre $class::$method with input args: "
            . print_r($invocation->getArguments(), true)
            . "\n"
        ;
        $ret = $invocation->proceed(9, 8, 7);
        echo "Post with result: " . print_r($ret, true) . "\n";
        return $ret;
    }
}


