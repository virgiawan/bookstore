<h1>Buku Baru</h1>
<?php $i=0;?>
<?php foreach($value as $vl):?>
    <div class="obral_buku_product_box">
        <h2><?php echo $vl->b_title?></h2>
            <a href="" onMouseover="<?php echo "ddrivetip('<div id=tooltipnya style=text-align:left !important><b>".$vl->b_title."</b><br/><br /><p></p></div>','#CBC750',200)";?>"; onMouseout="hideddrivetip()">
                <img src="<?php echo Yii::app()->request->baseUrl."/imgbook/resize/".$vl->b_image?>" alt="image" height="150" width="100"/>
            </a>
        <div class="product_info">
            <div class="buy_now_button"><a href="subpage.html">Beli</a></div>
            <div class="detail_button"><a href="subpage.html">Detail</a></div>
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