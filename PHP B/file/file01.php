<?php
/*
 * @Author: your name
 * @Date: 2020-04-02 21:47:09
 * @LastEditTime: 2020-04-02 22:01:02
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /htdocs/file/file01.php
 */

/*
 * @param1 string $dir , 指定路径
 * @param2 int $level = 0, 层级, 默认顶层
 *  * */
//递归遍历文件夹
//定义路径
$dir = 'uploads';
function my_scandir($dir,$level = 0){
    //保证文件安全: 如果不是路径没有必要往下
    if (!is_dir($dir)){
        dir($dir . '<br/>');
    };
    //读取全部路径信息, 遍历输出
    $files = scandir($dir);
    foreach ($files as $file){
     //$file 就是一个文件名
        echo str_repeat("&nbsp;&nbsp",$level), $file . '<br/>';
        //排除. ..
        if ($file == '.' || $file == '..') continue;
        //构造路径
        $file_dir = $dir . '/' . $file;
//        echo $file_dir . '<br/>';

        //判断路径
        if (is_dir($file_dir)){
            //递归
            my_scandir($file_dir, $level+1);
        }
    }
}
//调用
my_scandir($dir);