<?php

//php错误处理
//header("Content-type:text/html;charset=utf-8");//处理脚本

$a = 100;
echo $a;

$b = 0;

if($b == 0){
    //人为触发错误
    trigger_error("除数不能为0!");  //默认Notice, 代码会继续执行
    // trigger_error('除数不能为0', E_USER_ERROR);

}

echo "hello";
echo $a / $b;

//以下无法显示
// PHP Notice:  除数不能为0! in /usercode/file.php on line 13 
// PHP Warning:  Division by zero in /usercode/file.php on line 19


// 自定义错误处理机制
function my_error($errno, $errstr,$errfile, $errline){
    //判断, 当前会碰到错误有哪些
    if(!(error_reporting() & $errno)){
        return false;
        // error_reporting没有参数代表获取当前系统错误处理对应的级别
    };

    //开始判断错误类型
    switch($errno){
        case E_ERROR;
        case E_USER_ERROR;
            echo 'fatal error in file' .$errfile .'on line' .$errline. '<br/>';
            echo 'error info:' . $errstr;
            break;
        case E_WARNING;
        case E_USER_WARNING;
            echo 'fatal error in file' .$errfile .'on line' .$errline. '<br/>';
            echo 'error info:' . $errstr;
            break;
        case E_NOTICE;
        case E_NOTICE_WARNING;
            echo 'fatal error in file' .$errfile .'on line' .$errline. '<br/>';
            echo 'error info:' . $errstr;
            break;
    }
    return true;
}
//报错
// $a = 5;
echo $a;


//修改错误机制
set_error_handler('my_error');
echo $a;
