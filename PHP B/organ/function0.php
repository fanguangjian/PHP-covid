<?php

//定义函数
function display(){
    //函数体
    echo 'hello world';
    echo PHP_VERSION;
}

//调用
display();


//函数参数
function add($arg1,$arg2){
    echo '<hr/>', $arg1 + $arg2;
}
$num1 = 1;
add($num1, 10);

//函数默认值
function jian($num1 = 10, $num2 = 100){     // $num1是形参
        echo '<hr>',$num1 - $num2; //-99
};
jian($num1);

//引用传值
// B形参采用的是取地址, 在实参传入后, 系统B取到了外部变量的B的内存地址
function display1($a,&$b){
// function display1($a,$b){
    //修改形参得值 
    $a = $a * $a;
    $b = $b * $b;
    echo '<br>', $a, '<br>',$b, '<br/>'; //100  25
}

//定义变量
$a = 10 ;
$b = 5;

//调用函数
display1($a,$b);
//display1($a, $b);
// display1(10,9);  //如果有& 直接调用会报错


echo '<hr/>',$a, '<br/>', $b; //10   25