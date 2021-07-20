<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
<div class="leftmenu">
    <?php
    // require 'noFileExists.php';  //require错误后不会继续执行
    echo "I have a $color $car.";
    ?>
    <?php 
    include './footer.php';   //include err后会继续执行
    echo "I have a $color $car"; // I have a red BMW
    ?>
    </div>
    <h1>欢迎来到我的主页!</h1>
    <p>一些文本。</p>
    
</body>
</html>