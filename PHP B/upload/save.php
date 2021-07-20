<?php
    header('Content-type:text/html;charset=utf-8');
    echo '<pre>';
    // var_dump($_POST);
    var_dump($_FILES);

    // 1 取得信息文件
    $file = $_FILES['file'];
    var_dump($file); //null
    echo '<hr>';
    echo $file;

    // 2 判断是否为上传文件,: 临时文件
    if(is_uploaded_file($file['tmp_name'])){
        // 是上传文件
        if(move_uploaded_file($file['tmp_name'],'uploads/' .$file['name'])){
            echo  '文件保存成功!';
        }else{
            echo '文件保存失败!';
        }
    }else{
        // 不是上传文件
    }

?>