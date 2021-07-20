<?php

//php文件下载
//设定解析字符集
header("Content-type:text/html;charset=utf-8");
$file = 'content.txt';
//设置响应头
//header("Content-type:image/jpg");
header("Content-type:application/octem-stream");//以文件流形式传输数据给浏览器
header('Accept-ranges:bytes');                  //以字节方式计算
header('Content-disposition:attachment; filename =' .$file); //附件下载, 指定命名
header("Accept_length:" . filesize($file));

//字符集转码, 从GBK--UTF-8: $file = iconv('GBK','UTF-8',$file);
//小文件 php5
echo file_get_contents($file);
//大文件 网络不好 php4
//way1 直接读, 然后输出
$f = @fopen($file,'r') or die();
while($row = fread($f, 1024)){
    echo $row;
}
////way2 判断是否可读, 然后再度
//while(!feof($f)){
//    echo fread($f,1024);
//}
