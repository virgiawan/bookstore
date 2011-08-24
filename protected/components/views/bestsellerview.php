<ul>
    <?php foreach($value as $vl):?>
    <li><a href="<?php echo Yii::app()->createUrl('//book/default/detail',array('bid'=>$vl->b_id))?>"><?php echo $vl->b_title?></a></li>
    <?php endforeach;?>
</ul>
