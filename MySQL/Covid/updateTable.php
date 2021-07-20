
<?php
/*
 * @Author: your name
 * @Date: 2020-03-23 17:51:10
 * @LastEditTime: 2020-03-23 17:59:52
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /htdocs/MySQL/Covid/updateTable.php
 */

include_once 'conn.php';


// 使用 sql 创建数据表
$sql = "ALTER table Covid_Data ADD column TOTAL int AFTER ACT";//  )前不能空格,对齐

// MYSQL添加total
 
 
if (mysqli_query($conn, $sql)) {
    echo "数据表 Covid_Data 修改成功";
} else {
    echo "创建数据表错误: " . mysqli_error($conn);
}
 
mysqli_close($conn);

 ?>
