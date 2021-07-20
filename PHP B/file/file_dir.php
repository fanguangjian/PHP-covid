<?php
/*
 * @Author: your name
 * @Date: 2020-04-02 15:04:13
 * @LastEditTime: 2020-04-02 15:44:32
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /htdocs/file/file_dir.php
 */
// 目录操作

//创建目录
$res = @mkdir('directory');
//$res = @mkdir('dir');
//var_dump($res);  //bool(true)

//删除目录
@rmdir('dir');

//读取目录的
$r = opendir('./uploads');
//读取资源
//echo readdir($r), "<br/>";
//echo readdir($r), "<br/>";
//echo readdir($r), "<br/>";

//循环遍历输出
while($file = readdir($r)){
    echo $file .'<br/>';
}

//其他函数
$dir1 = 'E:/server/apache/htdocs';
$dir2 = 'E:/server/apache/htdocs/file.php';
//var_dump(dirname($dir1),dirname(($dir2)));  //返回上一级目录
var_dump(realpath($dir1));
var_dump(is_dir($dir1),is_dir($dir2)); //判断路径是否是目录

//scandir() 获取指定路径下的文件信息, 以数组形式返回
//echo '<pre>';
var_dump(scandir('uploads'));






//关闭目录
closedir($r);

