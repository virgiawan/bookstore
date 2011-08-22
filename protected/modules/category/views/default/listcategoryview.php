<h1>Daftar Semua Kategori :</h1>
<ul>
    <?php foreach($value as $vl):?>
        <li><a href="<?php echo $this->createUrl('//book/default/grouping',array('gid'=>'category','cid'=>$vl->c_id))?>"><?php echo $vl->c_category?></a></li>
    <?php endforeach;?>
</ul>