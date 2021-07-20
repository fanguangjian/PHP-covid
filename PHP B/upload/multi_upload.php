<?php
    header('Content-type:text/html;charset=utf-8');
    echo '<pre>';
    // var_dump($_POST);
    var_dump($_FILES);

    // foreach($_FILES as $file){
    //     if(is_uploaded_file($file['tmp_name'])){
    //         //save
    //         move_uploaded_file($file['tmp_name'],'uploads/' . $file['name']);
    //     }
    // }
     
    //判断元素存在, 而且是数组
    if (isset($_FILES['image']['name']) && is_array($_FILES['image']['name'])) {
        # code...
        // 遍历构造 数组元素
        $images = array();
        foreach ($_FILES['image']['name'] as $k => $file) {
            # code...
            echo $file;
            $images[] = array(
                'name' => $file,
                'tmp_name' => $_FILES['image']['tmp_name'][$k],
                'type' => $_FILES['image']['type'][$k],
                'error' => $_FILES['image']['error'][$k],
                'size' => $_FILES['image']['size'][$k],
            );
        }
    }
    print_r($images);



    


?>