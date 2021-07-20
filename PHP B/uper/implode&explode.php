<?php

header('Content-type:text/html;charset=utf-8');
// $hobby = $_POST['hobby'];
$hobby = isset($_POST['hobby']) ? $_POST['hobby'] : array() ;// 数组为空可以返回数据

print_r($hobby);
echo '<br>';
//数组转换成有格式的字符串
$hobby_string = implode($hobby,'|'); 
echo $hobby_string;

echo '<br>';
//数据库取出string 转成数组
var_dump(explode('|',$hobby_string));
?>