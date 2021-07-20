<?php
/*
 * @Author: your name
 * @Date: 2020-04-13 10:56:13
 * @LastEditTime: 2020-04-13 11:04:48
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /htdocs/object/21singleton.php
 */
//单例模式
class Singleton{
    //静态属性, 保存生产出来的对象
    private static $object = NULL;

    //私有化构造方法
    private function __construct(){
        echo __METHOD__,'<br/>>';
    }
    //类入口, 允许进入类内部
    public static function getInstance(){
        //判断静态对象是否存在当前类对象
        if(!(self::$object instanceof self)){
            self::$object = new self();
        }
        return self::$object;
    }
    //私有化克隆
    private function __clone(){
        
    }
}

//静态方法进入类内部
$s = Singleton::getInstance();
$s1 = Singleton::getInstance();
var_dump($s,$s1);
