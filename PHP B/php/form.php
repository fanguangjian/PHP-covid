<!DOCTYPE HTML>
 <html>
 <head>
     <meta charset="utf-8">
     <title>PHP中文网(php.cn)</title>
 </head>
 <style>
     .error{color:#ff0000}
 </style>
 <body>
 
 <?php
 // 定义变量并默认设置为空值
 $name = $email = $gender = $comment = $website = "";
 $nameErr = $emailErr = $genderErr = $commentErr = $websiteErr = "";
 
 if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
    //  $name = test_input($_POST["name"]);
    //  $email = test_input($_POST["email"]);
    //  $website = test_input($_POST["website"]);
    //  $comment = test_input($_POST["comment"]);
    //  $gender = test_input($_POST["gender"]);

    if(empty($_POST["name"])){
        $nameErr = "*姓名是必填的";
    }else{
        $name = test_input($POST_["name"]);
    }

    if(empty($_POST[email])){
        $emailErr = "*邮是必填的";
    }else{
        $email = test_input($POST_["email"]);
    }

    if(empty($_POST["website"])){
        $websiteErr = "*网址是必填的";
    }else{
        $website = test_input($POST_["website"]);
    }

    if(empty($_POST["comment"])){
        $commentErr = "*评论是必填的";
    }else{
        $comment = test_input($POST_["comment"]);
    }

    if(empty($_POST["gender"])){
        $genderErr = "*性别是必填的";
    }else{
        $gender = test_input($POST_["gender"]);
    }


 }

//  （通过 PHP trim() 函数）去除用户输入数据中不必要的字符（多余的空格、制表符、换行）
// 2.   （通过 PHP stripslashes() 函数）删除用户输入数据中的反斜杠（\）
 
 function test_input($data)
 {
     $data = trim($data);
     $data = stripslashes($data);
    //  echo $data,'<br>';
     $data = htmlspecialchars($data);
     echo $data;

     return $data;
 }
 ?>
 
 <h2>PHP 表单验证实例</h2>

 <!-- echo  $_SERVER["PHP_SELF"];  ///php/form.php  是一种超全局变量, 返回当前执行脚本的文件名 -->
 <!-- htmlspecialchars() 函数把特殊字符转换为 HTML 实体。这意味着 < 和 > 之类的 HTML 字符会被替换为 &lt; 和 &gt; 。这样可防止攻击者通过在表单中注入 HTML 或 JavaScript 代码（跨站点脚本攻击）对代码进行利用。 -->


 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
     名字: <input type="text" name="name">
        <span class = "error"><?php echo $nameErr ;?></span>
     <br><br>
     E-mail: <input type="text" name="email">
     <span class = "error"><?php echo $emailErr ;?></span>
     <br><br>
     网址: <input type="text" name="website">
     <span class = "error"><?php echo $websiteErr ;?></span>
     <br><br>
     备注: <textarea name="comment" rows="5" cols="40"></textarea>
     <span class = "error"><?php echo  $commentErr ;?></span>
     <br><br>
     性别:
     <input type="radio" name="gender" value="female">女
     <input type="radio" name="gender" value="male">男
     <span class = "error"><?php echo  $genderErr ;?></span>

     <br><br>

     <input type="submit" name="submit" value="提交">
 </form>
 
 <?php
 echo "<h2>您输入的内容是:</h2>";
 echo $name;
 echo "<br>";
 echo $email;
 echo "<br>";
 echo $website;
 echo "<br>";
 echo $comment;
 echo "<br>";
 echo $gender;
 echo "<br>";
//  echo  $_SERVER["PHP_SELF"];  ///php/form.php  是一种超全局变量, 返回当前执行脚本的文件名
 echo "<br>" . "DDDD";
//  echo htmlspecialchars($_SERVER["PHP_SELF"]);
 ?>
 
 </body>