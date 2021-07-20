<?php
/*
 * @Author: your name
 * @Date: 2020-03-06 22:11:43
 * @LastEditTime: 2020-03-23 17:34:09
 * @LastEditors: your name
 * @Description: In User Settings Edit
 * @FilePath: /htdocs/uper/time.php
 */
//d : 月份第几天, 有0   j 月份第几天  不带0
//D : 星期 第几天, MON  l 小写L, 星期第几天, Sunday   N 1-7  W 0 -6
// z 年份中第几天, 
// y  m  d 年 月  日 
// echo date("Y:m:d");
echo "<br>";
// echo date("Y:m:d H:i:sa");
// H 24 小时
// h 12 小时
echo "<br>";

// echo date()

//设置时区, 指定格式输出
// date_default_timezone_set("Asia/Shanghai"); // 只有上海时间代表中国🇨🇳
// date_default_timezone_set("Asia/Beijing"); //false
// date_default_timezone_set('PRC');//其中PRC为“中华人民共和国”

// date_default_timezone_set("Shanghai"); //false 

date_default_timezone_set("Australia/Melbourne");
// NZ              => Pacific/Auckland
// Australia/NSW   => Australia/Sydney
// Australia/North => Australia/Darwin
// Australia/South => Australia/Adelaide

// date_default_timezone_set("Australia/South");
// date_default_timezone_set("NZ");

// echo '当前时间'. date('h:i:sa');

echo "<br>";

$d=mktime(9, 12, 31, 6, 10, 2016);
echo "创建日期是 " . date("Y-m-d h:i:sa", $d);
echo "<br>";

echo "创建日期是 " . date("Y-m-d h:i:sa");
echo "<br>";

$d=strtotime("10:38pm April 15 2016");
echo "创建日期是 " . date("Y-m-d h:i:sa", $d);

$d=strtotime("tomorrow");
echo date("Y-m-d h:i:sa", $d) . "<br>";
$d=strtotime("next Saturday");
echo date("Y-m-d h:i:sa", $d) . "<br>";
$d=strtotime("+3 Months");
echo date("Y-m-d h:i:sa", $d) . "<br>";

echo strtotime("now"),"<br>";           //当前时间的时间戳
echo "输出时间：".date("Y-m-d H:i:s",strtotime("now")),"<br>";  //输出当前时间
echo strtotime("24 May 2016"),"<br>";                     //输出指点时间的时间戳
echo "输出时间：".date("Y-m-d H:i:s",strtotime("24 May 2016")),"<br>";     //输入指定的日期



?>













?>