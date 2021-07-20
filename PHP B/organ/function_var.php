<?php
// 可变函数
// php魔术常量  8个
echo '这是第'.__LINE__.'row', '<br>';
echo '该文件位于'.__FILE__.'<br/>';
echo '该文件位于'.__DIR__.'<br/>';
function test(){
    echo '函数名'.__FUNCTION__,'<br/>';
}
test();


//定义函数
function display(){
    echo __LINE__,__FUNCTION__;
}
//定义变量
$func = 'display';


//可变函数
$func();

// 匿名函数
// closure 闭包
$funct = function(){
    echo 'hello world';
};

// $funct();
// var_dump($func);


function displayB(){
    $name = __FUNCTION__;
    $innerfunction = function() use($name) {
        echo '<br/>',$name;
    };
    //call
    $innerfunction();

};
displayB();

// 闭包函数
function displayA(){
     $name = __FUNCTION__;
     //定义匿名函数
     $innerfunction = function() use($name){
        //函数内部函数
        echo '<br/>',$name;
     };
     //调用函数  call function
    //  $innerfunction();
    // 返内部匿名函数
    return $innerfunction;

};
// displayA();
$closure = displayA();
$closure();



