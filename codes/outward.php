<?php
/**
 *
 * User: weiwang
 * Date: 2019-07-08
 * Email: <434533508@qq.com>
 *
 */

/*
 * 外观模式
 */

class SubA
{
    public function methodOne()
    {
        echo "子系统方法1\n";
    }
}

class SubB
{
    public function methodTwo()
    {
        echo "子系统方法2\n";
    }
}

class SubC
{
    public function methodThree()
    {
        echo "子系统方法3\n";
    }
}

class SubD
{
    public function methodFourth()
    {
        echo "子系统方法4\n";
    }
}

//外观方法
class Facade
{
    private $systemOne;
    private $systemTwo;
    private $systemThree;
    private $systemFour;
    function __construct()
    {
        $this->systemOne = new SubA();
        $this->systemTwo = new SubB();
        $this->systemThree = new SubC();
        $this->systemFour = new SubD();
    }
    public function methodA()
    {
        echo "方法A() ---\n";
        $this->systemOne->methodOne();
        $this->systemThree->methodThree();
    }
    public function methodB()
    {
        echo "方法B() ---\n";
        $this->systemTwo->methodTwo();
        $this->systemFour->methodFourth();
    }
}

//客户端
$facade = new Facade();
$facade->methodA();
$facade->methodB();

/*
 * 外观模式通常用在重构复杂或者历史遗留接口，让外观和历史遗留交互，新系统和外观交互。
 * 外观模式为子系统的一组接口提供一个一致的界面，定义了高层接口
 * 在设计初期，要有意识将不同的两个层分析，层于层之间建立外观模式，其次，在开发阶段，子系统往往因为迭代重构越来越复杂，增加外观可以提供
 * 一个简单的接口，减少他们之间的依赖，另外在维护一个遗留的大型系统时，可能这个系统已经非常难以维护和扩展了，为新系统开发一个外观Facade类，来提供设计粗糙或高度复杂的遗留代码的比较清晰简单的接口，让系统与Facade对象交互，Facade与遗留代码交互所有复杂的工作
 */