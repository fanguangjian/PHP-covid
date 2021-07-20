<!DOCTYPE html>
<html>
<body>

<?php
//这是PHP 单行注释
/*
 * @ 版本说明
 * @ 作者
 *
 * */
echo "Hello World 范广建 注释!";
/*这是PHP多
行注释
*/
$x = 5;
$y = 10;
function  myTest(){
	global $x, $y;//全局变量
	// $x, $y;
 
	$y = $x + $y;
}
myTest();
echo $y;  //15

function myTest1($x)
{
    echo $x;
}
myTest1(5); // 5


// 变量删除
unset($x);
echo $x;

// 系统常量
echo '<hr/>' , PHP_VERSION, '<br/>', PHP_INT_SIZE , '<br/>',
 __DIR__, 
  ///Applications/MAMP/htdocs
 '<br/>', __FILE__ , '<br/>' ; ///Applications/MAMP/htdocs/index.php;
 //创建数据
 $a = 'abc1.1.1';
 $b = '1.1.1abc';
 // 自动转换
 echo $a+$b;

 echo '<br/>', "DDD";
  //强制转化
 echo '<br/>', (float)$a, (float)$b;

 //浮点数
 $f1 = 1.23;
 $f2 = 1.23e10;

 var_dump($f1, $f2);

 //连接运算符
 $A = 'hello';
 $B = 'Fan';
 // echo '<hr/>','<br/>',  $A.$B;
 $A .= $B;
 echo '<hr/>','<br/>',  $A;



//错误抑制符号
 echo '<hr>';
 $a  = 10;
 $b = 0;
 $C = $a / $b;
 // echo $C;
 @($C);

 //三元运算符
 $a = 10;
 $b = $a > 1 ? 100 : 0;
 echo $b;

//自操作运算符
 $a = 10;
 $b = $a++;
 $c =  ++$a;
 echo '<br>' ,$b, $c; // 10 12
 echo '<br>', $a++, ++$b;  //12   11

?>


</body>
</html>
