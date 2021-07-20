<?php

//a 获取图片资源
$src_image = 'panda.jpg';
//获取图片信息
$src_info = getimagesize($src_image);
//var_dump($src_image);
$src = imagecreatefromjpeg($src_image);
//var_dump($src);

//b 得到缩略图资源
$dst = imagecreatetruecolor(100,100);
//填充背景色
$dst_color = imagecolorallocate($dst, 255,255,255);
imagefill($dst, 0,0,$dst_color);

//计算缩略图原图采样的宽和高
$thumb_b = 100 / 100;
$src_b = $src_info[0] / $src_info[1];

//缩略图宽和高
$thumb_x = $thumb_y = 0;        //wh
$start_x = $start_y = 0;         //start position
//比较
if ($thumb_b >= $src_b){
    //缩略图宽高比原图宽高比大
    $thumb_y = 100;
    $thumb_x = floor($src_b * $thumb_y);
    $start_x = floor((100 - $thumb_x )/ 2);
}else{
    $thumb_x = 100;
    $thumb_y = floor( $thumb_x / $src_b );
    $start_y = floor((100 - $thumb_y) / 2);
}

//计算缩略图对应的位置: 放图形中间
//图采样复制
$res = imagecopyresampled($dst,$src,$start_x,$start_y,0,0,$thumb_x,$thumb_y,$src_info[0],$src_info[1]);
//var_dump($res);

//保存
header('Content-type:image/png');
imagepng($dst);
//imagepng($dst,'panda.png');

//销毁资源
imagedestroy($src);
imagedestroy($dst);