<?php
//php domain定义域  
// 默认的代码空间  全局变量   global variables
$global = 'global area';

//局部变量                  local variable
function displayA(){

    $inner = __FUNCTION__;
    // echo $global;   //报错, 全局变量不能在局部访问

    //访问全局变量
    // var_dump($GLOBALS);
    echo $GLOBALS['global']; //超全局变量
}
displayA();
// echo $inner;   //全局不能 访问局部变量



// /局部变量                  local variable
function display(){

    $inner = __FUNCTION__;
    // echo $global;   //报错, 全局变量不能在局部访问

    // 定义变量, 使用全局变量
    global $global;
    echo '<hr/>',$global;

    //定义变量, 全局不存在
    global $local;
    $local = '<br/>'.'Inner';    
}
display();
echo $local;


