<?php
//1.图片资源

//制作验证码图片
$img = imagecreatetruecolor(200,50);
//背景色
$bg_color = imagecolorallocate($img,220,220,220);
imagefill($img,0,0,$bg_color);

//获取随机文字
$str = '黑马层许愿驾驭我是最邦德墨尔本';
//获取字符串长度
$len = strlen($str);
//echo $len;
//汉字在utf-8字符集中, 一个汉字占用3个字节
$c_len = $len/3;
//随机取
$rand = mt_rand(0,$c_len-1);
$char1 = substr($str,  mt_rand(0,$c_len-1) * 3,3);
$char2 = substr($str,  mt_rand(0,$c_len-1) * 3,3);
$char3 = substr($str, $rand * 3,3);  //same
$char4 = substr($str, $rand * 3,3);   //same
//echo $char1, $char2;

//写入内容
$font = 'msyhbd.ttf';
$str_color1 = imagecolorallocate($img, mt_rand(0,100),mt_rand(0,100),mt_rand(0,100));
$str_color2 = imagecolorallocate($img, mt_rand(0,100),mt_rand(0,100),mt_rand(0,100));

imagettftext($img,mt_rand(15,25),15,60,40,$str_color1,$font,$char1);
imagettftext($img,mt_rand(20,30),-15,140,40,$str_color2,$font,$char2);
//2 写入文字

//干扰点线
for ($i = 0; $i < 50;$i++){
    $dot_color = imagecolorallocate($img,mt_rand(150,250),mt_rand(150,250),mt_rand(150,250));
    imagestring($img, mt_rand(1,5),mt_rand(0,200),mt_rand(0,50),'*',$dot_color);
}
//干扰线
for ($i = 0; $i < 10;$i++){
    $line_color = imagecolorallocate($img,mt_rand(150,250),mt_rand(150,250),mt_rand(150,250));
    imageline($img, mt_rand(0,200),mt_rand(0,200),mt_rand(0,50),mt_rand(0,200),$line_color);
}


//3 输出资源
header('Content-type:image/png');
imagepng($img);

//4 销毁资源
imagedestroy($img);

