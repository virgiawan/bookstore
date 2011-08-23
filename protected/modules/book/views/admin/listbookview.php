<h2>List Book</h2>
<b class="msg"><?php $this->widget('ErrorDisplayWidget',array('msg'=>$msg));?></b>
<table>
    <tr style="background-color: pink">
        <th>No</th>
        <th>Title</th>
        <th>Publisher</th>
        <th>Author</th>
        <th>Category</th>
        <th>Stock</th>
        <th>Price</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php $i=1; foreach($value as $vl):?>
        <?php
            if($i%2==0){
                $color='#fff';
            }
            else{
                $color='#7FB7D6';
            }
        ?>
        <tr style="background-color: <?php echo $color;?>">
            <td><?echo $i;$i++;?></td>
            <td><?php echo $vl->b_title;?></td>
            <td><?php echo $vl->bPublisher->p_publisher;?></td>
            <td><?php echo $vl->b_author;?></td>
            <td><?php echo $vl->bCategory->c_category;?></td>
            <td><?php echo $vl->b_stock;?></td>
            <td><?php $this->widget('PriceDisplayWidget',array('_price'=>$vl->b_price));?></td>
            <td><a href="<?php echo $this->createUrl('admin/update',array('bid'=>$vl->b_id));?>">Edit</a></td>
            <td><a href="<?php echo $this->createUrl('admin/delete',array('bid'=>$vl->b_id))?>">Delete</a></td>
        </tr>
    <?php endforeach;?>
</table>
<br>
<?php $this->widget('CLinkPager',array('pages'=>$pages))?>