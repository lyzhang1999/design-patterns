<?php
/**
 *
 * User: weiwang
 * Date: 2019-07-05
 * Email: <434533508@qq.com>
 *
 */

/*
 * 代理模式
 */

class SchoolGirl
{
    private $name;
    function __construct($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
}

//代理接口
interface GiveGift
{
    public function GiveDolls();
    public function GiveFlowers();
    public function GiveChocolate();
}

//代理实现送礼物
class Proxy implements GiveGift
{
    protected $pursuit;
    function __construct(SchoolGirl $girl)
    {
        $this->pursuit = new Pursuit($girl);
    }
    public function GiveDolls()
    {
        $this->pursuit->GiveDolls();
    }
    public function GiveFlowers()
    {
        $this->pursuit->GiveFlowers();
    }
    public function GiveChocolate()
    {
        $this->pursuit->GiveChocolate();
    }
}

class Pursuit implements GiveGift
{
    protected $girl;
    function __construct(SchoolGirl $girl)
    {
        $this->girl = $girl;
    }
    public function GiveDolls()
    {
        echo $this->girl->getName()." 送你娃娃\n";
    }
    public function GiveFlowers()
    {
        echo $this->girl->getName()." 送你花\n";
    }
    public function GiveChocolate()
    {
        echo $this->girl->getName()." 送你巧克力\n";
    }
}

//实现
$girl = new SchoolGirl("梅子");
$proxy = new Proxy($girl);
$proxy->GiveDolls();
$proxy->GiveChocolate();
$proxy->GiveFlowers();