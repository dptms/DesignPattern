<?php
class Factory
{
    public static function getInstanceA()
    {
        return new A();
    }
    public static function getInstanceB()
    {
        return new B();
    }
}

class A
{

}

class B
{

}

var_dump(Factory::getInstanceA());
var_dump(Factory::getInstanceB());
