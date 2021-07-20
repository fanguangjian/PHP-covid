
/*
 * @Author: your name
 * @Date: 2020-03-23 17:20:14
 * @LastEditTime: 2020-04-12 16:56:36
 * @LastEditors: your name
 * @Description: In User Settings Edit
 * @FilePath: /htdocs/MySQL/Covid/conn.php
 */
<?php
/*
 * @Author: your name
 * @Date: 2020-03-23 17:20:14
 * @LastEditTime: 2020-03-23 18:09:15
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /htdocs/MySQL/Covid/conn.php
 */

header('Content-type:text/html;charset=utf-8');

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Covid_19";
 
// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);
// 检测连接
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo date("Y-m-d H:i:s");



?>