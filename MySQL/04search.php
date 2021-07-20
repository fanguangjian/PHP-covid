<?php

/*
 * @Author: your name
 * @Date: 2020-03-18 23:19:58
 * @LastEditTime: 2020-03-27 00:16:44
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /htdocs/MySQL/04search.php
 */

include_once 'conn.php';

$sql = "SELECT * FROM n_news ";
// $sql = "SELECT * FROM n_news where id = 100";


$res = mysqli_query($conn, $sql);
// $res = mysqli_query($sql);

//获取数据结果条数
$rows =  mysqli_num_rows($res);
echo '<pre>';
echo '<hr>';

//解析结果集 
$row = mysqli_fetch_assoc($res);
// print_r($row);

//获取数组索引, 只获取数据的值, 数组下标从0开始
$row = mysqli_fetch_row($res);
// print_r($row);

// 获取一组索引, 一组数据
$row = mysqli_fetch_array($res);
// print_r($row);


if ($res) {
    echo "<pre>";
    echo "查询成功";
    echo "<script>alert('查询成功');</script>";
    // var_dump($res);
} else {
    
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);   
    exit();
}
 
mysqli_close($conn);


/* Array
(
    [id] => 2
    [title] => itcase
    [isTop] => 1
    [content] => showcase
    [publisher] => fanfan
    [pub_time] => 1584440341
)
Array
(
    [0] => 3
    [1] => itcase
    [2] => 1
    [3] => showcase
    [4] => fanfan
    [5] => 1584440342
)
Array
(
    [0] => 4
    [id] => 4
    [1] => itcase
    [title] => itcase
    [2] => 1
    [isTop] => 1
    [3] => showcase
    [content] => showcase
    [4] => fanfan
    [publisher] => fanfan
    [5] => 1584440343
    [pub_time] => 1584440343
)
 */



 ?>