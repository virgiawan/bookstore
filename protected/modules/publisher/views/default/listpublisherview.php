<h1>Daftar Semua Penerbit :</h1>
<ul>
    <?php foreach($value as $vl):?>
        <li><a href="<?php echo $this->createUrl('//book/default/grouping',array('gid'=>'publisher','pid'=>$vl->p_id))?>"><?php echo $vl->p_publisher?></a></li>
    <?php endforeach;?>
</ul>