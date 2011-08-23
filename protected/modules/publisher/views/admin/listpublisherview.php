<h2>List Publisher</h2>
<table>
    <tr style="background-color: pink">
        <th>No</th>
        <th>Publisher</th>
    </tr>
    <?php $i=1;foreach($value as $vl):?>
        <?php
            if($i%2==0){
                $color='#fff';
            }
            else{
                $color='#7FB7D6';
            }
        ?>
        <tr style="background-color: <?php echo $color;?>">
            <td><?php echo $i?></td>
            <td><?php echo $vl->p_publisher?></td>
        </tr>
    <?php $i++;endforeach;?>
</table>
<br>
<?php $this->widget('CLinkPager',array('pages'=>$pages))?>
