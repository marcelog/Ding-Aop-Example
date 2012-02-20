<?php
class MyService
{
    public function doBusiness1()
    {
        echo "hi, i'm " . __METHOD__ . " and i'm intercepted\n";
        $args = func_get_args();
        return $args;
    }

    public function doBusiness2()
    {
        echo "hi, i'm " . __METHOD__ . " and i'm intercepted\n";
        $args = func_get_args();
        return $args;
    }

    public function methodNotIntercepted()
    {
        echo "hi, i'm not intercepted\n";
    }

    public function wontDoBusiness3()
    {
        throw new \Exception("what a pitty");
    }
}


