<?php
 header("Content-type:text/html;charset=utf-8");    //设置编码
 //^匹配以date 开始的数据
//  在正则表达式中字母使用\w、而数字使用\d（\D表示非数字）来表示
// •   + 表示一个或者多个
// •   * 表示0个或者多个
// •   ? 表示有或者没有
// •   {n} 表示具体几位
// •   {m, n} 表示大于m个，小于n个

// $str = 'date20150121data';
//  if (preg_match('/^date/', $str)) {
// //  if (preg_match('/$a/', $str)) {

//      echo '匹配成功';
//  } else {
//      echo '匹配失败';
//  }

//  if (preg_match('/^date/', $str,$mat)) {
//     print_r($mat);
// } else {
//     echo '匹配失败';
// }


$str = 'data111111';
$isMatched = preg_match('/^data/', $str, $matches);
echo $isMatched, $matches;// 1 Array
 ?>    