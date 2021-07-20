<?php
//  strlen();
// mb_strlen();

$str = "发挥好符号发货未付和我";
$str1 = "ancddeee";

echo strlen($str),'<br/>';  //33
echo mb_strlen($str),'<br/>';    //11   针对不同的字符集计算长度
echo mb_strlen($str1);       // 8
