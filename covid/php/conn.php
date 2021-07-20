<?php
/*
 * @Author: your name
 * @Date: 2020-03-23 17:20:14
 * @LastEditTime: 2020-05-09 15:55:47
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /htdocs/MySQL/Covid/conn.php
 */

header('Content-type:text/html;charset=utf-8');
 //跨域请求的处理头
 header('Access-Control-Allow-Origin:*');
 header('Access-Control-Allow-Headers: accept,x-requested-with,Content-Type');

 $SERVER_DATA = true;// 本地数据
// $SERVER_DATA = false;// 线上数据


$dbname = "Covid_19";

 if($SERVER_DATA){
    $servername = "localhost:3307";
    $username = "root";
    $password = "root";
    // 创建连接
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // 检测连接
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
 }else{
     $servername = "150.158.119.153";
     $username = "root_Covid_19";
     $password = "B6TDBmxCXz66KE8H";
     // n = mysqli_connect($servername, $username, $password, $dbname);
     $conn = mysqli_connect($servername,$username,$password,$dbname,3306);
     // 检测连接
     if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());

     }
 }