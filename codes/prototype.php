<?php
/**
 *
 * User: weiwang
 * Date: 2019-07-08
 * Email: <434533508@qq.com>
 *
 */

/*
 * 原型模式
 */

class Company
{
    private $company;

    public function setName($name)
    {
        $this->company = $name;
    }

    public function getName()
    {
        return $this->company;
    }
}

class Resume
{
    private $name;
    private $sex;
    private $age;
    private $timeArea;
    private $company;

    function __construct($name)
    {
        $this->name = $name;
        $this->company = new Company();
    }

    public function setPersonalInfo($sex, $age)
    {
        $this->sex = $sex;
        $this->age = $age;
    }

    public function setWorkExperience($timeArea, $company)
    {
        $this->timeArea = $timeArea;
        $this->company->setName($company);
    }

    public function display()
    {
        echo $this->name." ".$this->sex." ".$this->age."\n";
        echo $this->timeArea." ".$this->company->getName()."\n";
    }

    // 对引用执行深复制
    function __clone()
    {
        $this->company = clone $this->company;
    }
}

$resume = new Resume("男人");
$resume->setPersonalInfo("男","29");
$resume->setWorkExperience("1992-2008","武汉科技");

$resume2 = clone $resume;
$resume2->setPersonalInfo("男","20");
$resume2->setWorkExperience("2001-2009","武汉某公司");

$resume->display();
$resume2->display();

//原型模式，用原型实例指定创建对象的种类，并且通过拷贝这些原型创建新的对象。
//
//原型模式其实就是从一个对象再创建另外一个可定制的对象，而且不需要知道任何创建的细节。
//
//一般在初始化的信息不发生变化的情况下，克隆是最好的办法。既隐藏了对象创建的细节，又对性能是大大的提高。