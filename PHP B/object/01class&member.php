<?php

class Buyer
{
    public $name;
    public $money = 100;
}
//实例化, 将对象保存在栈区
$b = new Buyer();
//修改属性
$b->name = 'fan';
echo $b->name;
//添加属性
$b->age = 20;
$b->gender = 'male';
//var_dump($b);

//删除属性
unset($b->name);
//var_dump($b);

class Saler{
    //定义常量 constant 不能直接访问
    const PI = 3.14;
    //成员方法
    public function dialay(){
        echo __CLASS__;
    }
}
$s = new Saler();
$s->dialay();
echo Saler::PI;   //输出常量     , 范围解析操作符::