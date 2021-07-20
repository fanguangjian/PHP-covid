<?php

/*
 * @Author: your name
 * @Date: 2020-03-17 22:19:53
 * @LastEditTime: 2020-03-17 22:27:20
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /htdocs/MySQL/conn.php
 */

header('Content-type:text/html;charset=utf-8');

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "News";
 
// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);
// 检测连接
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$pub_time = time(); 


 ?>