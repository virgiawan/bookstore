<h1>Keranjang Belanja Anda</h1>
<form action="<?php echo $this->createUrl('default/confirm'); ?>" method="POST" onSubmit="return confirm('Akhiri Belanja Anda ?')">
    <table>
        <tr>
            <th>No</th>
            <th>Id Buku</th>
            <th>Judul Buku</th>
            <th>Jumlah</th>
            <th>Harga</th>
        </tr>
        <?php $array_cookie=Yii::app()->request->getCookies()->toArray();$i=0;$total=0;?>
        <?php foreach($array_cookie as $key=>$value):?>
            <?php if(strpos($key, "chart_")!==false):?>
                <?php 
                    $exp=  explode("_",$key);
                    $b_id=$exp[1];
                    $b_title=str_replace("*", " ", $exp[2]);
                    $b_price=$exp[3];
                    $i++;
                ?>
                <tr>
                    <td><?php echo $i?></td>
                    <td><?php echo $b_id?>
                        <input type="hidden" name="pur_book_id[]" value="<?php echo $b_id?>" />
                    </td>
                    <td>
                        <?php echo $b_title?>
                    </td>
                    <td>
                        <?php echo Yii::app()->request->cookies[$key]->value?>
                        <input type="hidden" name="pur_quantity[]" value="<?php echo Yii::app()->request->cookies[$key]->value;?>" />
                    </td>
                    <td>
                        <?php $b_price=Yii::app()->request->cookies[$key]->value*$b_price;  $this->widget('PriceDisplayWidget',array('_price'=>$b_price));?>
                        <input type="hidden" name="pur_total_price[]" value="<?php echo $b_price;?>" />
                    </td>
                </tr>
            <?php $total=$total+$b_price;endif;?>
        <?php endforeach;?>
        <tr>
            <td colspan="4">Total</td>
            <td><?php $this->widget('PriceDisplayWidget',array('_price'=>$total))?></td>
        </tr>
        <tr>
            <td colspan="5">
                <input type="submit" value="Beli" />
            </td>
        </tr>
    </table>
</form>