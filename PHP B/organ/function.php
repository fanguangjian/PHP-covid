<?php
// 1 系统函数
//输出相关
echo print('hello world<br/>');
print 'hello Fan<br/>';
print 'hello Fan<br/>';


$a = 'hello ffff<br/>';
print_r($a);  // 比var_dump()简单, 不会输出类型, 只会输出值



// 2 时间函数
echo date("Y年 M月 d 日 H:i:s,1222222v"),"<br/>";

echo date('Y.M.d-H:i:s'),'<br/>';;
echo time(),'<br/>';
echo microtime(),'<br/>';
echo strtotime('now'),'<br/>';

// 3 数学函数 math function
// max():  指定参数中最大值
// min() 指定最小值
// rand()  指定区间获得随机数
echo rand(1,11),'<br/>';
echo mt_rand(0,111),"<br/><pre>";
// mt_rand() 与rand一样, 只是底层结构不一样,效率更高, 推荐使用
// round() 四舍五入
// ceil() 向上取整
// floor() 向下取整
// pow() 指数次结果 pow(2,3) 2^3= 8
// abs() 绝对值
// sqrt()  求平方根

//4 函数相关的函数
function test($a, $b){
    //获取指定参数
    var_dump(func_get_arg(1)); //string(1) "2"

    //获取所有参数
    var_dump(func_get_args());
    // //array(4) {
    //     [0]=>
    //     int(1)
    //     [1]=>
    //     string(1) "2"
    //     [2]=>
    //     int(3)
    //     [3]=>
    //     int(4)
    //   }

    //获取参数数量
    var_dump(func_num_args()); //int(4)
}
//调用函数
function_exists("test") && test(1,'2',3,4);








