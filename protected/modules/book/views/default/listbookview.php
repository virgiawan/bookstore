<h1>
    Daftar Buku 
    <?php if($grouping!=null):?>
        <?php echo $grouping." : ".$criteria?>
    <?php endif;?>
</h1>
<div id="list_book">
<b class="msg"><?php $this->widget('ErrorDisplayWidget',array('msg'=>$msg))?></b>
<?php $i=0;?>
<?php foreach($value as $vl):?>
    <div class="obral_buku_product_box">
        <h2><?php  echo $vl->b_title?></h2>
        <a href="<?php echo $this->createUrl('default/detail',array('bid'=>$vl->b_id));?>" onMouseover="<?php echo "ddrivetip('<div id=tooltipnya style=text-align:left !important><b>".$vl->b_title."</b><br/><br /><p></p></div>','#CBC750',200)";?>"; onMouseout="hideddrivetip()">
            <img src="<?php echo Yii::app()->request->baseUrl."/imgbook/resize/".$vl->b_image?>" alt="image" height="150" width="100"/>
        </a>
        <div class="product_info">
                <div class="buy_now_button"><a href="<?php echo $this->createUrl('default/detail',array('bid'=>$vl->b_id));?>">Beli</a></div>
            <h3><?php $this->widget('PriceDisplayWidget',array('_price'=>$vl->b_price));?></h3>
        </div>
        <div class="cleaner">&nbsp;</div>
    </div>
    <?php $i++;?>
    <?php if($i%3==0):?>
        <div class="cleaner_with_height">&nbsp;</div>
    <?php else:?>
        <div class="cleaner_with_width">&nbsp;</div>
    <?php endif;?>
<?php endforeach;?>
</div>
<div id="pagging">
    <?php $this->widget('CLinkPager',array('pages'=>$pages))?>
</div>