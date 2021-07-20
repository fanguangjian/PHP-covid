
<table border=1>
    <?php for ($i = 1; $i < 10; $i++ ) {?>
        <tr>
            <?php for($j = 1; $j<= $i ; $j++ ){?>
            <td>
                <?php  echo $i. "*" . $j ."=" . $i*$j;?>
            </td>
            <?php }?>
        </tr>
    <?php } ?>

</table>



// use endfor replace }
// use : replace {


<table border=1>
    <?php for ($i = 1; $i < 10; $i++ ) :?>
        <tr>
            <?php for($j = 1; $j<= $i ; $j++ ):?>
                <td>
                    <?php  echo $i. "*" . $j ."=" . $i*$j;?>
                </td>
            <?php endfor?>
        </tr>
    <?php endfor?>

</table>

