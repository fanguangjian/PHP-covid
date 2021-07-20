<?php

/*
 * @Author: your name
 * @Date: 2020-03-23 17:10:08
 * @LastEditTime: 2020-03-29 20:27:10
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /htdocs/MySQL/Covid/insert.php
 */
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Covid_19";
 
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
 
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// $sql .= "INSERT INTO Covid_Data (isTop,content,title) VALUES (3, 'contentTTTT', 'fanfan')"; // + .

// 预处理及绑定
$stmt = $conn->prepare("INSERT INTO Covid_Data(NSW,VIC,QLD,SA,WA,TAS,NT,ACT,TOTAL,org_time,pub_time) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("iiiiiiiiiss",$NSW, $VIC, $QLD, $SA, $WA, $TAS, $NT, $ACT, $TOTAL,$org_time,$pub_time);

// 参数
// i - integer（整型）
// d - double（双精度浮点型）
// s - string（字符串）
// b - BLOB（binary large object:二进制大对象）
 
// 设置参数并执行
$pub_time =  date('y-m-d H:i:s');

$NSW = '210';
$VIC = 94;
$QLD = 78;
$SA = 32;
$WA = 30;
$TAS = 7;
$NT = 0;
$ACT = 2;
$TOTAL = 453;
$org_time = '2020-03-11';
// $pub_time = now();
$stmt->execute();
 
echo "新记录插入成功";
 
$stmt->close();
$conn->close();


?>