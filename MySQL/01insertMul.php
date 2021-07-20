
<?php
/*
 * @Author: your name
 * @Date: 2020-03-21 22:01:29
 * @LastEditTime: 2020-03-21 22:20:32
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /htdocs/MySQL/01insertMul.php
 */

include_once 'conn.php';

// $sql = "INSERT INTO n_news VALUES (null, 'itcase',2, 'showcaseABBBBCCCC', 'fanfan', {$pub_time})";
$sql = "INSERT INTO n_news (isTop,content,title) VALUES (1, 'content', 'fanfan');";  // 中间连接+ ;
$sql .= "INSERT INTO n_news (isTop,content,title) VALUES (2, 'contentTTTT', 'fanfan');"; //+ . +;
$sql .= "INSERT INTO n_news (isTop,content,title) VALUES (3, 'contentTTTT', 'fanfan')"; // + .



 
if (mysqli_multi_query($conn, $sql)) {
    echo "新记录插入成功";
    echo "<script>alert('新纪录插入成功');</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);   
}
 
mysqli_close($conn);




 ?>