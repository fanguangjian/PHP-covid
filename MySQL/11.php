<?php
/*
 * @Author: your name
 * @Date: 2020-02-26 21:36:01
 * @LastEditTime: 2020-03-15 22:00:43
 * @LastEditors: your name
 * @Description: In User Settings Edit
 * @FilePath: /htdocs/MySQL/11.php
 */
$servername = "127.0.0.1";
$username = "root";
$password = "root";
 
// 创建连接
$conn = mysqli_connect($servername, $username, $password);

var_dump($conn);
 
// 检测连接
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "连接成功";
?>