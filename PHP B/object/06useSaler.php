<?php
/*
 * @Author: your name
 * @Date: 2020-04-11 20:37:03
 * @LastEditTime: 2020-04-11 20:39:24
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /htdocs/object/06useSaler.php
 */
//手动加载
//include_once '05classLoad.php';
//判断加载
/*if (!class_exists('Saler')){
    // 不存在, 加载
    echo 'load Class';
    include_once '05classLoad.php';
}*/


// 自动加载
function __autoload($classname){
    include_once $classname . '.php';
}


 //使用Saler
 $s = new Saler();