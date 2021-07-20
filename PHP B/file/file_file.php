<?php
// file_get_contents(文件路径)  获取文件内容
//
//读取内容
$file = 'content.txt';
$content = @file_get_contents($file);
var_dump($content);

//写入内容
$text = 'hello world';
$res = @file_put_contents($file, $text);
var_dump($res);
print_r($res);
