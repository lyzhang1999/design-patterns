<?php
/**
 *
 * User: weiwang
 * Date: 2019-07-08
 * Email: <434533508@qq.com>
 *
 */

/*
 * 模板方法模式
 */

class TestPaper
{
    public function TestQ1()
    {
        echo "问题1";
        echo "答案".$this->answer1()."\n";
    }
    public function TestQ2()
    {
        echo "问题2";
        echo "答案".$this->answer2()."\n";
    }
    public function TestQ3()
    {
        echo "问题3";
        echo "答案".$this->answer3()."\n";
    }
    protected function answer1()
    {
        return "";
    }
    protected function answer2()
    {
        return "";
    }
    protected function answer3()
    {
        return "";
    }
}

class TestPaperA extends TestPaper
{
    protected function answer1()
    {
        return 'a';
    }
    protected function answer2()
    {
        return 'b';
    }

    protected function answer3()
    {
        return 'c';
    }
}

class TestPaperB extends TestPaper
{
    protected function answer1()
    {
        return 'aa';
    }
    protected function answer2()
    {
        return 'bb';
    }

    protected function answer3()
    {
        return 'cc';
    }
}

//实现
echo "甲\n";
$student = new TestPaperA();
$student->TestQ1();
$student->TestQ2();
$student->TestQ3();

$student2 = new TestPaperB();
$student2->TestQ1();
$student2->TestQ2();
$student2->TestQ3();


/**
 * 定义一个父类，将一些步骤在子类实现，例如定义一个算法骨架，由子类继承后实现
 * 当我们要完成在某一细节层次一致的一个过程或一系列步骤，但其中个别步骤在更详细的层次上的实现可能不同时，我们通常考虑用模版方法模式来处理。
 * 当不变的和可变的行为在方法的子类实现中混合在一起的时候，不变的行为就会在子类中重复出现。通过模版方法把这些行为搬移到单一的地方，这样就帮助子类摆脱重复的不变行为的纠缠。
 */