<?php
/*
 * @Author: your name
 * @Date: 2020-03-15 22:09:22
 * @LastEditTime: 2020-03-17 21:00:51
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /htdocs/MySQL/01link.php
 */

//建立连接
//1 主机地址: 默认连接端口 3306
$link = mysqli_connect('localhost:3306','root','root') or die("Connect error");
echo '<pre>';
// var_dump($link);

//设定字符集
$res = mysqli_set_charset("utf8");
// $res = mysqli_query("set names utf8",$link);

//选择数据库
$res = mysqli_query('use News');

var_dump($res);
// var_dump($link);

//  关闭连接
$res = mysqli_close($link);
// var_dump($res);



?>