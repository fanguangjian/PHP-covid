<?php
 
/*
 依赖koroFileHeader,  mac：ctrl+cmd+t,即可生成文件头部注释
 * @Author: your name
 * @Date: 2020-03-14 23:16:16
 * @LastEditTime: 2020-03-15 18:27:24
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /htdocs/upload/uploadFunction.php
 */

/**
 * @description: 实现文件上传(单文件)
 * @param    array   $file ,   需要上传的文件信息,: 一维5元素数组[name, tmp_name, error, size, type]
 * @param1   array   $allow_type ,  允许上传的MINE类型
 * @param2   string  $path ,  存储的路径
 * @param3   string  $error,  出现错误的原因
 * @param4   array   $allow_format = array(),  允许上传的文件格式
 * @param5   int     $max_size = 20000000,  允许上传的最大值
 *  * 
 * @return: 
 */

 header('Content-type:text/html;charset=utf-8');

//  $file, $allow_type, $allow_format, $path, $error, $max_size

 function upload_single($file, $allow_type,$allow_format = array(), $path, $error,$max_size = 20000000){
    if (!is_array($file) || !isset($file['error'])) {
        //文件无效
        $error = '不是一个有效的文件上传文件'; 
        return false;
    }

    echo '<hr>';
    var_dump($path);

    //判断文件存储路径是否有效
    if (!is_dir($path)) {
        # 路径不存在
        $error = '文件存储路径不存在!';
        return false;
    }
    //判断文件上传过程是否出错
    switch($file['error']){
        case 1:
        case 2:
            $error = '文件超出服务器允许大小';
            return false;
        case 3:
            $error = '文件上传出现问题';
            return false;
        case 4:
            $error = '用户没有选中上传文件';
            return false;
        case 5:
        case 6:
        case 7:
            $error = '文件保存失败!';
            return false;
    }

    //判断MINE类型
    if (!in_array($file['type'], $allow_type)) {
        # 该文件类型不允许上传
        $error = '当前文件类型不允许上传';
        return false;
    }
  

    //文件格式处理   后缀名处理
    $ext = ltrim(strrchr($file['name'], '.'),'.');
    if (!empty($allow_format) && !in_array($ext, $allow_format)) {
        # code...
        //不允许上传
        $error = "当前文件的格式不允许上传";
        return false;
    }
    echo '<hr>';
    // echo 'ceshi';

    //判断当前文件大小是否满足需求
    if ($file['size'] > $max_size) {
        # code...
        // 文件过大
        $error = '当前文件超出大小, 最大允许为' . $max_size . '字节!';
        return false;
    }

    // 构造文件名字: 类型_年月日+随机字符串.$ext
    $fullname = strstr($file['type'],'/',TRUE) . date('Ymd');
    //产生随机字符串
    for ($i=0; $i < 4; $i++) { 
        $fullname .= chr(mt_rand(65,80));
    }
    //拼凑后缀
    $fullname .= '.' . $ext;

    //移动到指定目录
    if (!is_uploaded_file($file['tmp_name'])) {
        # code...
        // 文件不是上传的
        $error = '错误, 不是上传文件!';
        return false;
    }
  

    if (move_uploaded_file($file['tmp_name'],$path . '/' . $fullname)) {
        # code...
        // ok
        return $fullname;
    }else{
        //移动失败
        $error = '文件上传失败';
        return false;
    } 

 }

 //提供数据
 $file = $_FILES['image'];
 $path = 'uploads';
 $allow_type = array('image/jpg','image/jpeg','image/gif');
 $allow_format = array('jpg','jpeg','gif');
 $max_size = 8000000;

 echo $file;
 var_dump($file);


if( $filename = 
        upload_single($file, $allow_type, $allow_format, $path, $error, $max_size)
){
    echo $filename;
}else {
    echo $error;
}


?>