<ul>
    <?php foreach($value as $vl):?>
        <li><a href="<?php echo Yii::app()->createUrl('//book/default/grouping',array('gid'=>'publisher','pid'=>$vl->p_id))?>"><?php echo $vl->p_publisher?></a></li>
    <?php endforeach;?>
    <li><a href="<?php echo Yii::app()->createUrl('//publisher/default/list')?>">Lihat semua kategori...</a></li>
</ul>