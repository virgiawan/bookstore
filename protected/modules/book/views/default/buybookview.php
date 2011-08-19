<h1>Keranjang Belanja Anda</h1>
<b><?php if(Yii::app()->user->getState('role')) echo "Anda telah login"?></b>
<?php $this->widget('ErrorDisplayWidget',array('msg'=>$msg));?>
<form action="<?php echo $this->createUrl('default/confirm'); ?>" method="POST" 
<?php if(Yii::app()->user->getState('role')):?> onSubmit="return confirm('Akhiri belanja Anda ?')" <?php else:?> onSubmit="return confirm('Untuk melakukan konfirmasi barang Anda harus login. Login sekarang?')" <?php endif;?> >
    <table>
        <tr>
            <th>No</th>
            <th>Id Buku</th>
            <th>Judul Buku</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Ubah</th>
            <th>Hapus</th>
        </tr>
        <?php $array_cookie=Yii::app()->request->getCookies()->toArray();$i=0;$total=0;?>
        <?php foreach($array_cookie as $key=>$value):?>
            <?php if(strpos($key, "chart_")!==false):?>
                <?php 
                    $cookie_name=$key;
                    $exp=  explode("_",$key);
                    $b_id=$exp[1];
                    $b_title=str_replace("*", " ", $exp[2]);
                    $b_price=$exp[3];
                    $i++;
                    if($i%2==0){
                        $color='#101016';
                    }
                    else{
                        $color='#000';
                    }
                ?>
                <tr style="background-color: <?php echo $color?>">
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
                    <td align="right">
                        <?php $b_price=Yii::app()->request->cookies[$key]->value*$b_price;  $this->widget('PriceDisplayWidget',array('_price'=>$b_price));?>
                        <input type="hidden" name="pur_total_price[]" value="<?php echo $b_price;?>" />
                    </td>
                    <td class="table_link">
                        <a href="<?php echo $this->createUrl('default/detail',array('bid'=>$b_id))?>">Ubah</a>
                    </td>
                    <td class="table_link">
                        <a href="<?php echo $this->createUrl('default/delete',array('cookie_name'=>$cookie_name))?>">Hapus</a>
                    </td>
                </tr>
            <?php $total=$total+$b_price;endif;?>
        <?php endforeach;?>
        <tr style="background-color : #003D03 ">
            <td colspan="4">Total</td>
            <td><?php $this->widget('PriceDisplayWidget',array('_price'=>$total))?></td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td colspan="7" align="right">
                <input type="submit" value="Beli" />
            </td>
        </tr>
    </table>
</form>
<div class="back_button">
    <a href="javascript:self.history.back();">Back</a>
</div>
