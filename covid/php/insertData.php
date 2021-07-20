<?php
/*
 * @Author: your name
 * @Date: 2020-03-29 15:33:34
 * @LastEditTime: 2020-03-30 23:53:43
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /htdocs/covid/php/insertData.php
 */

//跨域请求的处理头
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Headers: accept,x-requested-with,Content-Type');

//返回头(对jquery并不是必须，但针对于通用性，最好设置)
header('Content-Type:application/json; charset=utf-8');

// header('Content-type:text/html;charset=utf-8');

$json = $_POST['msg'];
$dataForm = json_decode($json);
//echo  json_encode($dataForm->NSW);

// 创建连接
include_once 'conn.php';

// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
 // // 预处理及绑定
 $stmt = $conn->prepare("INSERT INTO Covid_Data(NSW,VIC,QLD,SA,WA,TAS,NT,ACT,TOTAL,org_time,pub_time)
 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
 $stmt->bind_param("iiiiiiiiiss",$NSW, $VIC, $QLD, $SA, $WA, $TAS, $NT, $ACT, $TOTAL,$org_time,$pub_time);

 // // 参数s
 // // i - integer（整型）
 // // d - double（双精度浮点型）
 // // s - string（字符串）
 // // b - BLOB（binary large object:二进制大对象）

 // // 设置参数并执行
 $NSW = $dataForm->NSW;
 $VIC = $dataForm->VIC;
 $QLD = $dataForm->QLD;
 $SA = $dataForm->SA;
 $WA = $dataForm->WA;
 $TAS = $dataForm->TAS;
 $NT = $dataForm->NT;
 $ACT = $dataForm->ACT;
 $TOTAL = $dataForm->TOTAL;
 $org_time = $dataForm->DATE;
//  $pub_time = now(); 
 $pub_time = date('Y-m-d H:i:s');

 $stmt->execute();



// echo "新记录插入成功";
$stmt->close();
$conn->close();
echo  json_encode('注入成功!!');
// echo  json_encode( $pub_time);



// // /将关联数据或者php对象，以json的形式返回
// echo json_encode($dataRes);

?>
