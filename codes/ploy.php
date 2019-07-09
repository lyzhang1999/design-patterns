<?php
/**
 *
 * User: weiwang
 * Date: 2019-07-04
 * Email: <434533508@qq.com>
 *
 */

/*
 * 策略模式
 * 抽象方法，只定义方法，继承后子类实现具体方法
 * 对外提供一个统一的方法，内部处理业务逻辑，对外透明
 * 好处在于业务逻辑变动的时候，只需要修改具体实现方法，而不需要管外部具体调用
 * 1、类的划分为了封装，分类的基础是抽象，具有相同的功能或者属性的对象集合才是类
 * 2、从类外部看，完成的都是相同的工作，只是实现不同，他可以以相同的方式调用不同的算法，减少算法类之间的耦合
 * 3、策略模式为Context定义了一系列可重用的算法
 * 4、策略模式就是用来封装算法，需要处理不同业务规则的时候，就可以考虑使用策略模式处理这种问题
 */


abstract class Strategy
{
    // 这里先定义一个抽象方法，具体又外部继承的子类去各自实现
    // 抽象函数-算法方法
    abstract public function  AlgorithmInterface();
}

/*
 * 算法a
 */
class ConcreteA extends Strategy
{
    public function AlgorithmInterface()
    {
        echo "算法A具体实现\n";
    }
}

/*
 * 算法B
 */
class ConcreteB extends Strategy
{
    public function  AlgorithmInterface()
    {
        echo "算法B具体实现\n";
    }
}

/*
 * 上下文content
 */
class Context
{
    private $straegy;
    function __construct($straegy)
    {
        $this->straegy = $straegy;
    }
    public function contextInterface()
    {
        $this->straegy->AlgorithmInterface();
    }
}

$context = new Context(new ConcreteA());
$context->contextInterface();

$context = new Context(new ConcreteB());
$context->contextInterface();

