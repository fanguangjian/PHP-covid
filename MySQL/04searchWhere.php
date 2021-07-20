<?php

/*
 * @Author: your name
 * @Date: 2020-03-22 11:08:34
 * @LastEditTime: 2020-03-22 15:04:53
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /htdocs/MySQL/04searchWhere.php
 */

include_once 'conn.php';

 // 检测连接
if (mysqli_connect_errno())
{
    echo "连接失败: " . mysqli_connect_error();
}
$sql = "SELECT * FROM n_news WHERE isTop = 0";

$res = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($res))
{
    echo $row['id'] . " " . $row['isTop'];
    echo "<br>";
}
 ?>