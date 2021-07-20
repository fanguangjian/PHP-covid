<?php

/*
 * @Author: your name
 * @Date: 2020-03-18 23:19:58
 * @LastEditTime: 2020-03-22 11:06:40
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /htdocs/MySQL/04search.php
 */

include_once 'conn.php';

$sql = "SELECT * FROM n_news ";
// $sql = "SELECT * FROM n_news where id = 56";


$res = mysqli_query($conn, $sql);
// $res = mysqli_query($sql);

//获取数据结果条数
$rows =  mysqli_num_rows($res);
//解析结果集 
$row = mysqli_fetch_assoc($res);
print_r($row);

if (mysqli_num_rows($res) > 0) {
    // 输出数据
    while($row = mysqli_fetch_assoc($res)) {
        // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        echo 'id:  '. $row['id']. '-title:'     .$row['title']. '-content:' .$row['content'].'<br>';
    }
} else {
    echo "0 结果";
}

/* if ($rows > 0) {
        # code...输出数据
        while( $row = mysqli_fetch_assoc($res) ){
            echo 'id'. $row['id']. '-title:' .$row['title']. '-content:' .$row['content'].'<br>';
        }
    }else {
    
    // echo "Error: " . $sql . "<br>" . mysqli_error($conn);   
    // exit();
}; */
 
mysqli_close($conn);

 ?>