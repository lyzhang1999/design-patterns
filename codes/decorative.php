<?php
/**
 *
 * User: weiwang
 * Date: 2019-07-05
 * Email: <434533508@qq.com>
 *
 */
/*
 * 装饰模式的优点:
1、比静态继承更灵活；
2、避免在层次结构高层的类有太多的特征
装饰模式的缺点：
1、使用装饰模式会产生比使用继承关系更多的对象。并且这些对象看上去都很想像，从而使得查错变得困难。
 */
abstract class Component
{
    abstract public function Operation();
}

class ConcreteCpmponent extends Component
{
    public function Operation()
    {
        echo "具体的对象操作\n";
    }
}

abstract class Decorator extends Component
{
    protected $component;
    public function SetComponent($component)
    {
       $this->component = $component;
    }
    //重写operator 方法，实际上实行的是Component->Operator()
    public function Operation()
    {
        if ($this->component != null)
        {
            $this->component->Operation();
        }
    }
}

/*
 * ConcreteDecoratorA
 */
class ConcreteDecoratorA extends Decorator
{
    private $addedState;
    public function Operation()
    {
        // 调用Component的Operation()
        // 如addedState,相当于对Component装饰
        parent::Operation();
        $this->addedState = "ConcreteDecoratorA Status";
        echo $this->addedState."\n";
        echo "具体装饰对象A的操作.\n";
    }
}


/*
 * ConcreteDecoratorB
 */
class ConcreteDecoratorB extends Decorator
{
    public function Operation()
    {
        parent::Operation(); // TODO: Change the autogenerated stub
        $this->addedBehavior();
        echo "具体装饰对象B的操作.\n";
    }

    // 本类的独有功能，以区别于ConcreteDecoratorA
    private function addedBehavior()
    {
        echo "ConcreteDecoratorB Status.\n";
    }
}

//实现代码
// 装饰的方法是：首先用ConcreteComponent实例化对象c,
// 然后用ConcreteDecoratorA的实例对象$d1来包装$c,
// 然后再用ConcreteDecoratorB的实例$d2包装$d1,
// 最终执行$d2的Operation();
$c = new ConcreteCpmponent();
$d1 = new ConcreteDecoratorA();
$d2 = new ConcreteDecoratorB();

$d1->SetComponent($c);
$d2->SetComponent($d1);
$d2->Operation();