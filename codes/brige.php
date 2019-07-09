<?php
/**
 *
 * User: weiwang
 * Date: 2019-07-09
 * Email: <434533508@qq.com>
 *
 */

/*
 * 桥接模式
 */

abstract class HandsetSoft
{
    abstract public function run();
}

class Game extends HandsetSoft
{
    public function run()
    {
        echo "运行手机游戏\n";
    }
}

class PhoneList extends HandsetSoft
{
    public function run()
    {
        echo "运行手机通讯录\n";
    }
}

abstract class HandsetBrand
{
    protected $soft;
    public function setHandsetSoft(HandsetSoft $soft)
    {
        $this->soft = $soft;
    }
    abstract public function run();
}

class BrandN extends HandsetBrand
{
    public function run()
    {
        $this->soft->run();
    }
}

class BrandM extends HandsetBrand
{
    public function run()
    {
        $this->soft->run();
    }
}

$ab = new BrandN();
$ab->setHandsetSoft(new Game());
$ab->run();

$ab = new BrandN();
$ab->setHandsetSoft(new PhoneList());
$ab->run();
