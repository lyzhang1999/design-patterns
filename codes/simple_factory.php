<?php
/**
 *
 * User: weiwang
 * Date: 2019-07-04
 * Email: <434533508@qq.com>
 *
 */

/*
 * 简单工厂模式：封装、继承、多态；高内聚，低耦合
 * 常用的业务逻辑场景比如商户结算里面，针对不同商户，可能有不同的结算条款和逻辑，涉及到动态的自动化结算公式，可以用工厂模式来设计对象化的计算逻辑。
 * 通过传递结算中间过程的上下文，既能实现对中间计算过程的记录，又能很好的实现最终结算款金额的计算。
 */

class Operator
{
    protected $a = 0;
    protected $b = 0;
    public  function  setA($a)
    {
        $this->a = $a;
    }
    public function  setB($b)
    {
        $this->b = $b;
    }
    public function getResult()
    {
        $result = 0;
        return $result;
    }
}

/*
 * Add action
 */
class OperatorAdd extends Operator
{
    public function getResult()
    {
        return $this->a + $this->b;
    }
}

/*
 * Mul action
 */
class OperatorMul extends Operator
{
    public function  getResult()
    {
        return $this->a * $this->b;
    }
}

/*
 * Sub action
 */
class OperatorSub extends Operator
{
    public  function  getResult()
    {
        return $this->a - $this->b;
    }
}

/*
 * Div action
 */
class OperatorDiv extends Operator
{
    public  function  getResult()
    {
        return $this->a / $this->b;
    }
}

/*
 * Operator Factory
 */
class OperatorFactory
{
    public static function createdOperator($operator)
    {
        switch ($operator) {
            case "+":
                $oper = new OperatorAdd();
                break;
            case "-":
                $oper = new OperatorSub();
                break;
            case "*":
                $oper = new OperatorMul();
                break;
            case "/":
                $oper = new OperatorDiv();
                break;
        }
        return $oper;
    }
}

//实现
$operator = OperatorFactory::createdOperator("+");
$operator->setA(2);
$operator->setB(3);
echo $operator->getResult();