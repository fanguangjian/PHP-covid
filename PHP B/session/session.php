
<?php
//开启session
session_start();
//var_dump($_SESSION);
//设置session数据
$_SESSION['name'] = 'Fan';
$_SESSION['hobby'] = array('bass', 'key');

//访问session 数据
echo $_SESSION['name'];

//删除数据
unset($_SESSION['name']);
echo $_SESSION['name'];
$_SESSION = array();

var_dump($_SESSION);

