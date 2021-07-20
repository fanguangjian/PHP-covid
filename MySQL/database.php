<?php
/*
 * @Author: your name
 * @Date: 2020-03-16 22:53:50
 * @LastEditTime: 2020-03-17 22:13:55
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /htdocs/MySQL/database.php
 */

 // 做数据库初始化
 header('Content-type:text/html;charset=utf-8');

 //连接认证
$conn =  mysqli_connect('localhost:3306','root','root') or die("Connect error");

//  $con = mysqli_connect('localhost:3306','root','root'); 
//  if (mysqli_connect_errno($con)) 
// { 
//     echo "连接 MySQL 失败: " . mysqli_connect_error(); 
// } 

 //设置字符集
 mysqli_query('set names utf8');

 //选择数据库
mysqli_query('use News');

// $res =  mysqli_query('use News');
//  var_dump($res);
//  echo 'ddd';



?>