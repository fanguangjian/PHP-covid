<?php

/*
 * @Author: your name
 * @Date: 2020-03-20 23:44:23
 * @LastEditTime: 2020-03-21 00:31:09
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /htdocs/MySQL/05mysqlFunction.php
 */

// PHP MYSQL 相关函数

include_once 'conn.php';

// $sql = "SELECT * FROM n_news ";
// $res = mysqli_query($conn, $sql);

//查询当前结果集中所有字段数量
// echo  mysqli_num_fields($res);

// echo mysqli_field_name($res,1);
// print_r(mysqli_fetch_fields($res));



$sql = "INSERT INTO n_news VALUES (null, 'itcase',2, 'showcase自增长ID', 'fanfan', {$pub_time})";
 
if (mysqli_query($conn, $sql)) {
    echo "新记录插入成功";
    echo "<script>alert('新纪录插入成功');</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);   
}

echo mysqli_insert_id($conn);
 
mysqli_close($conn);




 ?>