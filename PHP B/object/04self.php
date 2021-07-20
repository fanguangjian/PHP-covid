<?php
class Saler{
    //属性
    private  static  $count = 0;      //私有不允许外部直接访问
    //方法
    public static function showClass(){
        echo Saler::$count;
        echo self::$count;         //replace className
    }

    //构造方法: 私有化
    private function __construct()
    {
    }

    ///静态方法
    public static function getInstance(){
//        return new Sale();
        return new self();       //replace className
    }
}
//Saler :: showClass();

//获取对象
$s = Saler::getInstance();
var_dump($s);