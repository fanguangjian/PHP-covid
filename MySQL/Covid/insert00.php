<?php

/*
 * @Author: your name
 * @Date: 2020-03-23 17:10:08
 * @LastEditTime: 2020-03-29 19:34:04
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /htdocs/MySQL/Covid/insert.php
 */

include_once 'conn.php';
 
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
 
// echo "新记录插入";
// $pub_time =  date('y-m-d H:i:s');

$sql = "INSERT INTO Covid_Data (NSW, VIC, QLD, SA, WA, TAS, NT, ACT, TOTAL,org_time,pub_time) 
         VALUES ('1405',574,555,257,255,58,12,62,3178,'2020-03-16',now())";
         

if(mysqli_query($conn,$sql)){
    echo '插入成功';
}else{
    echo 'Error:' .$sql . '<br>' . mysqli_error($conn);
}



?>