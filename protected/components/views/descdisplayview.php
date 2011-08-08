<?php
    
    $temp=strtok(nl2br($desc)," ");
    for($i=1;$i<=10;$i++){
        echo ($temp);
        echo (" ");
        $temp=strtok(" ");
    }
    
?>
