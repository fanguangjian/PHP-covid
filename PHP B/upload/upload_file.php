<?php
 header('Content-type:text/html;charset=utf-8');
 echo '<pre>';
 var_dump($_POST);

 var_dump($_FILES);
//  $_FILES 变量详情
    /*  name :  文件名
     type :  文件类型
     temp_name:  文件存储路径
     error:  int(0); 文件上传的代号, 告知文件接收过程中的问题,
     size : int() */

/*  array(1) {
    ["file"]=>
    array(5) {
      ["name"]=>
      string(42) "屏幕快照 2020-02-26 下午10.12.33.png"
      ["type"]=>
      string(9) "image/png"
      ["tmp_name"]=>
      string(36) "/Applications/MAMP/tmp/php/phpNL2pZR"
      ["error"]=>
      int(0)
      ["size"]=>
      int(3085639)
    }
  } */

if ($_FILES["file"]["error"] > 0)
{
    echo "错误：" . $_FILES["file"]["error"] . "<br>";
}
else
{
    echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
    echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
    echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"];
}
?>