<?php
/*
 * @Author: your name
 * @Date: 2020-03-31 21:27:27
 * @LastEditTime: 2020-03-31 21:47:57
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /htdocs/http/http_header.php
 */
//header('Content-type:text/html;charset=utf-8');
// echo ' 你好  ';

 //location : 立即重定向
//header('Location:test.php');
//echo 'Hello fan';

//Refresh : 重定向, 定时跳转
// header('Refresh:3 url=test.php'); //3s跳转
//echo 'Hello fan';

//Content_disposition  下载
header('Content-disposition:attachment; filename=girl.jpg');
echo 'Hello fan';





 ?>
