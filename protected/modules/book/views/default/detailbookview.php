<h1>Detail Book :</h1>
<div id="obral_buku_detail_book">
    <h2> <?php echo $value->b_title;?></h2>
    <img class="obral_buku_detail_book_image" align="left" width="100" height="150" src="<?php echo Yii::app()->request->baseUrl."/imgbook/resize/".$value->b_image;?>"/>
    <p><b>Kategori :</b> <?php echo $value->bCategory->c_category?></p>
    <p><b>Pengarang :</b> <?php echo $value->b_author;?></p>
    <p><b>Penerbit :</b> <?php echo $value->bPublisher->p_publisher;?></p>
    <p><b>Tahun :</b> <?php echo $value->b_year?></p>
    <p><b>Stock barang :</b> <?php echo $value->b_stock?> buku</p>
    <p><b>Harga : </b> <?php $this->widget('PriceDisplayWidget',array('_price'=>$value->b_price))?></p>
    <div id="obral_buku_purchase_form">
        <h2>Beli Sekarang</h2>
        <h4><?php $this->widget('PriceDisplayWidget',array('_price'=>$value->b_price))?></h4>
        <form action="<?php echo $this->createUrl('default/buy');?>" method="POST">
            <input type="hidden" name="b_id" value="<?php echo $value->b_id;?>"/>
            Jumlah : 
            <select name="pur_quantity">
                <?php for($i=1;$i<=20;$i++):?>
                    <option value="<?php echo $i?>"><?php echo $i?></option>
                <?php endfor;?>
            </select>
            <input type="submit" value="Beli"/>
        </form>
    </div>
    <div id="obral_buku_detail_description">
        <b>Description :</b>
        <?php echo $value->b_description;?>
    </div>
</div>
