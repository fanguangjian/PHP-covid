<?php
/*
 * @Author: your name
 * @Date: 2020-03-17 21:05:47
 * @LastEditTime: 2020-03-17 23:01:45
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /htdocs/MySQL/insert.php
 */

 //

include_once 'conn.php';

$sql = "INSERT INTO n_news VALUES (null, 'itcase',2, 'showcase测试SSSTTTT', 'fanfan', {$pub_time})";
 
if (mysqli_query($conn, $sql)) {
    echo "新记录插入成功";
    echo "<script>alert('新纪录插入成功');</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);   
}
 
mysqli_close($conn);




 ?>