<?php
// 字符串

//引号定义
$str1 = 'hello';
$str2 = "hello";
var_dump($str1,$str2);
echo '<br/>';

// 3 nowdoc 字符串   没有单引号的单引号字符串
$str3 = <<<EOD
    hello
    world
EOD;

// 4 heredoc 字符串   没有双引号的双引号字符串
$str4 = <<<'EOD'
    hello
    world
EOD;
var_dump($str3,$str4);

//转义符号
// \' : 在单引号字符串显示单引号
// \" : 在双引号字符串显示双引号
// \r : 回车
// \n : 代表新的一行
// \t : 类似table键,输出4个空格
// \$ : PHP使用$符号作为变量符号, 因此需要特定识别

$strA = "abc\r\ndef";

echo $strA,'<br/>'; 

// 双引号能识别$符号, 双引号可以识别变量
$a = 'hello';
//变量识别
$strAA = 'abc $a defg';
$strBB = "abc $a defg";
//使用{}
$strA1 = "abc$adefg"; // abc hello defgabc
$strA2 = "abc{$a}defg";  // OK   abchellodefg

echo $strAA, '<br/>',$strBB,'<br\>', $strA1,'<br/>',$strA2;

$strAA = <<<EOD
//这是弹出内容
    <script>
     alert("$strAA");
    </script>
EOD;
echo $strAA;

