<?php
/*
 * @Author: your name
 * @Date: 2020-03-16 23:08:48
 * @LastEditTime: 2020-03-17 22:15:52
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /htdocs/MySQL/fan.php
 */

//  添加数据
// include_once 'database.php';
// / 做数据库初始化
//  header('Content-type:text/html;charset=utf-8');

//  //连接认证
 $conn = mysqli_connect('localhost:3306','root','root') or die("Connect error");

// //  / /设置字符集
//  mysqli_query('set names utf8');

//  //选择数据库
mysqli_query('use News');

// 组织SQL指令
$pub_time = time();

//注意单引号报错
// $sql = 'insert into n_news values(null, 'itcase',1, "showcase", "fanfan", {$pub_time})';
// $sql = "INSERT INTO n_news VALUES(null, 'itcase',1, 'showcase', 'fanfan', {$pub_time})";
$sql = "INSERT INTO n_news VALUES (null, 'itcase',1, 'showcasePHPTT', 'fanfan', {$pub_time})";


//执行SQL
if (mysqli_query($conn, $sql)) {
    # 操作成功: 通常返回自增长Id给用户
    echo '数据插入成功';
}else{
    //操作失败
    echo '数据操作失败';
}


 ?>