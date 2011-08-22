<h1>Cari Buku</h1>
<b><?php $this->widget('ErrorDisplayWidget',array('msg'=>$msg))?></b>
<form action="" method="POST">
    <table>
        <tr>
            <td>Cari</td><td>:</td>
            <td colspan="3"><input type="text" name="search_key" size="30"/></td>
        </tr>
        <tr>
            <td>Berdasarkan</td><td>:</td>
            <td><input type="radio" name="by" value="b_title" checked />Judul</td>
            <td><input type="radio" name="by" value="b_publisher" />Penerbit</td>
            <td><input type="radio" name="by" value="b_author" />Pengarang</td>
        </tr>
        <tr>
            <td colspan="5" align="right">
                <input type="submit" value="Cari"/>
            </td>
        </tr>
    </table>
</form>
<?php
    if($value!=null){
        if($by=='b_title'){
            $by = 'Judul';
        }
        else if($by=='b_publisher'){
            $by = 'Penerbit';
        }
        else if($by=='b_author'){
            $by = 'Pengarang';
        }
    }
    else{
        $by="";
    }
?>
<b><?php if($by!=null):?>Hasil pencarian buku berdasarkan <?php echo strtolower($by)." = ".$key?><?php endif;?></b>
<?php if($value!=null):?>
    <table>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Penerbit</th>
            <th>Pengarang</th>
            <th>Stock</th>
            <th>Harga</th>
            <th>Detail</th>
        </tr>
        <?php $i=1;foreach($value as $vl):?>
            <?php
                if($i%2==0){
                    $color='#101016';
                }
                else{
                    $color='#000';
                }
            ?>
            <tr style="background-color: <?php echo $color?>">
                <td><?php echo $i?></td>
                <td><?php echo $vl->b_title?></td>
                <td><?php echo $vl->bPublisher->p_publisher?></td>
                <td><?php echo $vl->b_author?></td>
                <td align="right"><?php echo $vl->b_stock?></td>
                <td align="right"><?php $this->widget('PriceDisplayWidget',array('_price'=>$vl->b_price))?></td>
                <td class="table_link"><a href="<?php echo $this->createUrl('default/detail',array('bid'=>$vl->b_id))?>">Detail</a></td>
            </tr>
        <?php $i++;endforeach;?>
    </table>
<?php endif?>
<div class="back_button">
    <a href="javascript:self.history.back();">Back</a>
</div>