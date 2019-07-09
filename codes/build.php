<?php
/**
 *
 * User: weiwang
 * Date: 2019-07-08
 * Email: <434533508@qq.com>
 *
 */
/*
 * 建造者模式
 */

abstract class PersonBuilder
{
    abstract public function buildA();
    abstract public function buildB();
    abstract public function buildC();
}

class BuildAA extends PersonBuilder
{
    public function buildA()
    {
        echo '建立A';
    }
    public function buildB()
    {
        echo '建立B';
    }
    public function buildC()
    {
        echo '建立C';
    }
}

class BuildBB extends PersonBuilder
{
    public function buildA()
    {
        echo '建立AA';
    }
    public function buildB()
    {
        echo '建立BB';
    }
    public function buildC()
    {
        echo '建立CC';
    }
}

class Create
{
    private $builder;
    function __construct($builder)
    {
        $this->builder = $builder;
    }
    public function createAll()
    {
        $this->builder->buildA();
        $this->builder->buildB();
        $this->builder->buildC();
    }
}

//实现A
$a = new Create(new BuildAA());
$a->createAll();

//实现B
$a = new Create(new BuildBB());
$a->createAll();


/*
 * 建造者模式，将一个复杂对象的构建与它的表示分离，使得同样的构建过程可以创建不同的表示。
 * 外部只要构建类型就可以了，具体的过程和细节不需要知道。
 * 只要用于创建一些复杂的对象，这些内部构建的顺序一般是稳定的，但是内部的过程面临复杂的变化。
 * 建造者模式是在当创建复杂对象的算法应该独立于该对象的组成部分以及它们的装配方式时适用的模式。
 */
