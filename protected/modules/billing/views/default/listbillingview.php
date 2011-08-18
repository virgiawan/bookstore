<h1>Daftar Billing Anda</h1>
<table>
    <tr>
        <th>Tanggal</th>
        <th>Bil Id</th>
        <th>Status Pembayaran</th>
        <th>Status Pengiriman</th>
        <th>Ongkos Kirim</th>
        <th>Harga Barang</th>
        <th>Total Pembayaran</th>
        <th>Detail</th>
    </tr>
    <?php foreach($value as $vl):?>
        <tr>
            <td><?php echo $vl->bil_date;?></td>
            <td><?php echo $vl->bil_id."-".$vl->bil_key."-".$vl->bil_member_id?></td>
            <td>
                <?php if($vl->bil_status==0):?>
                    Belom Dibayar
                <?php else:?>
                    Sudah Dibayar
                <?php endif;?>
            </td>
            <td>
                <?php if($vl->bil_shipping_status==0):?>
                    Belom Dikirim
                <?php else:?>
                    Sudah Dikirim
                <?php endif;?>
            </td>
            <td><?php $this->widget('PriceDisplayWidget',array('_price'=>$vl->bilShippingCharges->sc_cost))?></td>
            <td><?php $this->widget('PriceDisplayWidget',array('_price'=>$vl->bil_total_price))?></td>
            <td><?php $total=$vl->bilShippingCharges->sc_cost+$vl->bil_total_price;$this->widget('PriceDisplayWidget',array('_price'=>$total))?></td>
            <td><a href="<?php echo $this->createUrl('default/detail',array('billid'=>$vl->bil_id))?>">Detail</a></td>
        </tr>
    <?php endforeach;?>
</table>