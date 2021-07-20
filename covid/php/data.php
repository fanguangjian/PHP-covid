<?php
/*
 * @Author: your name
 * @Date: 2020-03-26 21:40:48
 * @LastEditTime: 2020-04-10 14:41:32
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /htdocs/covid/data.php
 */

 //跨域请求的处理头
// header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Headers: accept,x-requested-with,Content-Type');


header('Access-Control-Allow-Method:POST,GET');//允许访问的方式

//返回头(对jquery并不是必须，但针对于通用性，最好设置)
header('Content-Type:application/json; charset=utf-8');
// $callback = $_GET['callback'];



include_once 'conn.php';
$sql = "SELECT * FROM Covid_Data ORDER BY org_time, TOTAL ";
$res = mysqli_query($conn, $sql);

// if ($res) {
//     // echo "<pre>";
//     // echo "查询成功";
//     // echo "<script>alert('查询成功');</script>";
//     // var_dump($res);
// } else {
    
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);   
//     exit();
// }

// 获取一州连续数据
$row = mysqli_fetch_assoc($res);
$dataArr = array();
if($res = mysqli_query($conn, $sql)){
    while($row = mysqli_fetch_assoc($res)){
        $dataArr[] = $row;   
    }
     //释放结果集合
     mysqli_free_result($res);
}
// var_dump(($dataArr));
// print_r(($dataArr));

$arr = array_column($dataArr,'NSW');

//title Arr
$tabs = array();
if($res = mysqli_query($conn, $sql)){
    while($row = mysqli_fetch_field($res)){
        $tabs[] = $row->name;    
    }
    //释放结果集合
    mysqli_free_result($res);
}
// var_dump(array_slice($tabs,1,9));
$arrTitle = array_slice($tabs,1,9);

//获取数组索引, 只获取数据的值, 数组下标从0开始
$rows = mysqli_fetch_row($res);
// print_r($rows);
//time arr
$arrData = array();
$rowS = mysqli_fetch_row($res);
// print_r($rowS);
if($res = mysqli_query($conn, $sql)){
    while($row = mysqli_fetch_row($res)){
        // print_r($row);
        // $rows = $row;
        // echo $row[10];
        $arrData[] = $row[10];     
    }
    //释放结果集合
    mysqli_free_result($res);
}

// var_dump($arrData);

$dataRes = array();
array_push($dataRes,
$arrData,
$arrTitle,
array_column($dataArr,'TOTAL'),
array_column($dataArr,'NSW'),
array_column($dataArr,'VIC'),
array_column($dataArr,'QLD'),
array_column($dataArr,'SA'),
array_column($dataArr,'WA'),
array_column($dataArr,'TAS'),
array_column($dataArr,'NT'),
array_column($dataArr,'ACT')

);



// /将关联数据或者php对象，以json的形式返回
// $jsoncallback = htmlspecialchars($_REQUEST['callback']);
$json_data = json_encode($dataRes);
// if(!empty($jsoncallback)){
//     // echo $jsoncallback . "('.$json_data. ')";
//     echo $json_data;
// }else{
//     // echo "jsoncallback('.$json_data.')";
//     echo $json_data;

// }

// echo $callback."($json_data)";

// echo '{$callback}({$json_data})';


echo json_encode($dataRes);

// // jsonp 通过get请求的返回数据形式
// if (isset ($_GET['callback'])) {
//     header("Content-Type: application/json");
//     // echo $_GET['callback']."(".$json_data.")";
//     echo json_encode($dataRes);    

// }



 
mysqli_close($conn);


 

 ?>