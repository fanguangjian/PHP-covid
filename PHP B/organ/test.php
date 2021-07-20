<?php
 $day = 'Sunday';

 if ($day == 'Sunday' ){
     echo "Go ship";
 }else{
     echo "work day";
 }

 echo '<br/>';

 $day = 1;
 switch($day){
     case 1:
         echo '111';
         break;
     case 2:
         echo '222';
         break;

 }


// //for cycle
//for($i = 1; $i <= 10; $i++){
//    //输出
//    echo $i, '</br>'; // 1 --- 10
//}
////最后输出
//echo $i,'<br/>';  //11


//do while😂😂😂😂😂🤣🤣🤣🤣😀😀
$i = 1;
do {
    //执行输出
    if ($i % 2 != 1){
        echo $i, '是偶数','<br/>';
    }
    //条件变更
    $i++;
}while($i <= 10 );

//while使用
$j = 1;
while($j <= 100){
    if ($j % 5 !=  0){
        //说明不是5的倍数
        //重新循环
        $j++;
        //重新循环
        //continue;
        //终止循环
        break;
    }
    //输出数值
    echo $j++,'<br/>';
}
echo $j;

