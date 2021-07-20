

<?php
/*
 * @Author: your name
 * @Date: 2020-03-17 21:05:47
 * @LastEditTime: 2020-03-17 23:06:40
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /htdocs/MySQL/insert.php
 */

 //

include_once 'conn.php';

$sql = "UPDATE n_news SET content = 'BLACK HORSE NB' WHERE id = 1";
 
if (mysqli_query($conn, $sql)) {
    echo "更新成功";
    echo "<script>alert('更新成功');</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);   
}
 
mysqli_close($conn);




 ?>