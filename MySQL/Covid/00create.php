
<?php

/*
 * @Author: your name
 * @Date: 2020-03-22 23:22:52
 * @LastEditTime: 2020-03-29 19:36:49
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /htdocs/MySQL/00create.php
 */
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Covid_19";
 
// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);
// 检测连接
if (!$conn) {
    die("连接失败: " . mysqli_connect_error());
}
 
// 使用 sql 创建数据表
$sql = "CREATE table `Covid_Data`(   
    `id` BIGINT(20) AUTO_INCREMENT PRIMARY KEY COMMENT '主键',
     NSW int NOT NULL,
     VIC int NOT NULL,
     QLD int NOT NULL,
     SA int NOT NULL,
     WA int NOT NULL,
     TAS int NOT NULL,
     NT int NOT NULL,
     ACT int NOT NULL,
     TOTAL int NOT NULL,
     org_time VARCHAR(20) not null,
     `create_time` datetime DEFAULT NULL COMMENT '创始时间',
     `modified_time` datetime DEFAULT NULL COMMENT '修改时间',
     pub_time VARCHAR(20) not NULL comment '发布时间'
)";//  )前不能空格,对齐
 
if (mysqli_query($conn, $sql)) {
    echo "数据表 MyGuests 创建成功";
} else {
    echo "创建数据表错误: " . mysqli_error($conn);
}
 
mysqli_close($conn);
?>