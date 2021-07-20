<?php
header("Content-type:text/html;charset=utf-8");
$arr=array(
 array("小明","90","80","77"),
 array("小龙","88","75","89"),
 array("小花","99","95","94"),
);
// for($x=0;$x<3;$x++){
//  echo "<p>行数$x</p>";
//  echo"<ul>";
//  for($row=0;$row<3;$row++){
//  echo "<li>".$arr[$x][$row]."</li>";
//  }
//  echo"</ul>";
// }

for($x=0; $x<3; $x++){
    echo "<p>行数$x</p>";
    echo "<ul>";
    for($row=0; $row<3; $row++){
        echo "<li>".$arr[$x][$row]."</li>";
    }
    echo"</ul>";
}

?>