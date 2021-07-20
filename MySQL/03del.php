
<?php
/*
 * @Author: your name
 * @Date: 2020-03-17 21:05:47
 * @LastEditTime: 2020-03-17 23:10:34
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /htdocs/MySQL/insert.php
 */

 //

include_once 'conn.php';

$sql = "DELETE FROM n_news where id = 1";
 
if (mysqli_query($conn, $sql)) {
    echo "DEL成功";
    echo "<script>alert('删除成功');</script>";
} else {
    
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);   
}
 
mysqli_close($conn);




 ?>