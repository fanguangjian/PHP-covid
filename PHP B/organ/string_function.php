<?php
// 1. 转换函数 
    //   implode(连接方式, 数组) 

    //  implode(separator, array)           //separator  能为空
    //  explode(separator,string,limit)     //separator 不能为空 limit可为空
    //  str_split(string,length)           //把字符串分割到数组中

    $arr = array('Hello','World!','Beautiful','Day!');
    echo implode(" ",$arr)."<br>";
    echo implode("+",$arr)."<br>";
    echo implode("-",$arr)."<br>";

    echo implode("X",$arr);'<pre>';
    // Hello World! Beautiful Day!
    // Hello+World!+Beautiful+Day!
    // Hello-World!-Beautiful-Day!
    // HelloXWorld!XBeautifulXDay!

    $str = 'one,two,three,four'; 
    //  返回包含一个元素的数组
    print_r(explode(',',$str,0));
    print "<br>";    
    // 数组元素为 2
    print_r(explode(',',$str,2));
    print "<br>";    
    // 删除最后一个数组元素
    print_r(explode(',',$str,-1));
    print "<br>";  

    echo explode(',',$str,0),'<br>';
    print_r(str_split("Hello",2));

    // Array ( [0] => one,two,three,four )
    // Array ( [0] => one [1] => two,three,four )
    // Array ( [0] => one [1] => two [2] => three )


    //2  截取函数
    // trim(),lrtim(), rtrim()
    $str = "  nn Hello World! ";
    echo "Without trim: " . $str;
    echo "<br>";
    echo "With trim: " . trim($str);
    var_dump(trim($str));
    echo '<hr/>';

    // 3 截取函数 substr(), strstr()
    // substr(string,start,length)
    // strstr(string,search,before_search)

    echo substr("Hello world",1, 3)."<br>";
    echo strstr("Hello world!","world",false)."<br>"; //默认为false, 返回搜索位开始后的字符
    echo strstr("Hello world!","world")."<br>"; 
    echo strstr("Hello world!","world",true)."<br>"; // 返回hello


    //4 大小写转换
    // strtoupper();
    // strtolower();
    // ucfirst()      

    // strtolower() - 把字符串转换为小写
    // lcfirst() - 把字符串中的首字符转换为小写
    // ucfirst() - 把字符串中的首字符转换为大写
    // ucwords() - 把字符串中每个单词的首字符转换为大写

     // 5 查找函数
    //  strpos() f函数查找字符串在另一字符串中第一次出现的位置（区分大小写）。
    //  strrpos() - 查找字符串在另一字符串中最后一次出现的位置（区分大小写）
    //  stripos() - 查找字符串在另一字符串中第一次出现的位置（不区分大小写）
    //  strripos() -查找字符串在另一字符串中最后一次出现的位置（不区分大小写）


    // 6 替换函数
    // str_replace()  函数替换字符串中的一些字符（区分大小写）
    // str_replace(find,replace,string,count)

    //7 格式化输出数据
    // sprintf(format,arg1,arg2,arg++)




