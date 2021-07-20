<?php

/*
 * @Author: your name
 * @Date: 2020-03-21 22:58:27
 * @LastEditTime: 2020-03-21 23:03:02
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /htdocs/MySQL/01insertPre.php
 */

include_once 'conn.php';
 
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
 

// $sql .= "INSERT INTO n_news (isTop,content,title) VALUES (3, 'contentTTTT', 'fanfan')"; // + .

// 预处理及绑定
$stmt = $conn->prepare("INSERT INTO n_news (isTop, title, content) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $isTop, $title, $content);
 
// 设置参数并执行
$isTop = 1;
$title = "Doe";
$content = "john@example.com";
$stmt->execute();
 
$isTop = 1;
$title = "Moe";
$content = "mary@example.com";
$stmt->execute();
 
$isTop = 2;
$title = "Dooley";
$content = "julie@example.com";
$stmt->execute();
 
echo "新记录插入成功";
 
$stmt->close();
$conn->close();


 ?>