<ul>
    <?php foreach($value as $vl):?>
        <li><a href="<?php echo Yii::app()->createUrl('//book/default/grouping',array('gid'=>'category','cid'=>$vl->c_id))?>"><?php echo $vl->c_category?></a></li>
    <?php endforeach;?>
    <li><a href="<?php echo Yii::app()->createUrl('//category/default/list')?>">Lihat semua kategori...</a></li>
</ul>
