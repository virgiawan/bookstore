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
    <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $vl->purBook->b_title?></td>
        <td><?php echo $vl->pur_quantity;?></td>
        <td><?php $this->widget('PriceDisplayWidget',array('_price'=>$vl->pur_total_price))?></td>
    </tr>
    <?php $total=$total+$vl->pur_total_price;endforeach;?>
    <tr>
        <td colspan="3">Jumlah</td>
        <td><?php $this->widget('PriceDisplayWidget',array('_price'=>$total));?></td>
    </tr>
</table>
<h2>Form bill : </h2>
<form>
    <input type="hidden" name="bil_key" value="<?php echo rand(000000, 999999);?>" />
    <table>
        <tr>
            <td></td>
        </tr>
    </table>
</form>
