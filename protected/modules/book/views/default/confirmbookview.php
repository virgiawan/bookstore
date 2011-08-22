<h1>Konfirmasi</h1>
<h2>Daftar buku yang Anda beli :</h2>
<table>
    <tr>
        <th>No</th>
        <th>Buku</th>
        <th>Jumlah</th>
        <th>Harga</th>
    </tr>
    <?php $total=0;$i=1;foreach($value as $vl):?>
     <?php
        if($i%2==0){
            $color='#101016';
        }
        else{
            $color='#000';
        }
    ?>
    <tr style="background-color: <?php echo $color?>">
        <td><?php echo $i;?></td>
        <td><?php echo $vl->purBook->b_title?></td>
        <td><?php echo $vl->pur_quantity;?></td>
        <td align="right"><?php $this->widget('PriceDisplayWidget',array('_price'=>$vl->pur_total_price))?></td>
    </tr>
    <?php $i++;$total=$total+$vl->pur_total_price;endforeach;?>
    <tr style="background-color : #003D03 ">
        <td colspan="3">Jumlah</td>
        <td><?php $this->widget('PriceDisplayWidget',array('_price'=>$total));?></td>
    </tr>
</table>

<h2>Form bill : </h2>
<?php $this->widget('ErrorDisplayWidget',array('msg'=>$msg));?>
<form action="<?php echo $this->createUrl('default/bill');?>" method="POST" onSubmit="return confirm('Pastikan data yang Anda masukkan sudah benar')">
    <input type="hidden" name="bil_key" value="<?php echo rand(0000, 9999);?>" />
    <input type="hidden" name="bil_total_price" value="<?php echo $total;?>" />
    <table>
        <tr>
            <td>Tujuan Kirim</td><td>:</td>
            <td><input type="text" name="bil_address_destination" maxlength="200" size="40"/></td>
        </tr>
        <tr>
            <td>Wilayah</td><td>:</td>
            <td>
                <select name="bil_shipping_charges_id">
                    <option value="">-- pilih wilayah kirim --</option>
                    <?php foreach($shippingcharges as $sc):?>
                        <option value="<?php echo $sc->sc_id?>"><?php echo $sc->sc_location?></option>
                    <?php endforeach;?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Pesan</td><td>:</td>
            <td>
                <?php $this->widget('application.extensions.tinymce.ETinyMce',array('name'=>'bil_message','width'=>'300px','height'=>'100px'));?>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="right">
                <input type="submit" value="OK"/>
            </td>
        </tr>
    </table>
</form>
