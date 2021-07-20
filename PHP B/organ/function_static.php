<?php
//    静态变量  的作用是为了跨函数共享数据, (同一个函数多次调用)

function display(){
    // 定义变量
    $local = 1;      //local 

    //定义静态变量
    static $count = 1;     //static

    echo $local++ , $count++,'<br/>';
    
}
display();//11
display();//12
display();//13 //每次调用该函数时,该变量将会保留函数前一次被调用的值; 
