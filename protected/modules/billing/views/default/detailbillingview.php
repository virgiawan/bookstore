<h1>Billing <?php echo $value->bil_id."-".$value->bil_key."-".$value->bil_member_id.", date : ".$value->bil_date." (".$value->bilMember->m_name.")"?></h1>
<h2>Informasi Billing :</h2>
<table>
    <tr>
        <td>Bil key</td><td>:</td>
        <td><?php echo $value->bil_id."-".$value->bil_key."-".$value->bil_member_id?></td>
    </tr>
    <tr>
        <td>Status Pembayaran</td><td>:</td>
        <td>
            <?php if($value->bil_status==0):?>
                Belum lunas
            <?php else:?>
                Sudah lunas
            <?php endif;?>
        </td>
    </tr>
    <tr>
        <td>Status Pengiriman</td><td>:</td>
        <td>
            <?php if($value->bil_shipping_status==0):?>
                Belum dikirim
            <?php else:?>
                Sudah dikirim
            <?php endif;?>
        </td>
    </tr>
    <tr>
        <td>Nama Pembeli</td><td>:</td>
        <td><?php echo $value->bilMember->m_name;?></td>
    </tr>
    <tr>
        <td>Tujuan Kirim</td><td>:</td>
        <td><?php echo $value->bil_address_destination?></td>
    </tr>
     <tr>
        <td>Wilayah Kirim</td><td>:</td>
        <td><?php echo $value->bilShippingCharges->sc_location;?></td>
    </tr>
    <tr>
        <td>Ongkos Kirim</td><td>:</td>
        <td><?php $this->widget('PriceDisplayWidget',array('_price'=>$value->bilShippingCharges->sc_cost))?></td>
    </tr>
    <tr>
        <td>Total Pembayaran</td><td>:</td>
        <td><?php $total=$value->bilShippingCharges->sc_cost+$value->bil_total_price;$this->widget('PriceDisplayWidget',array('_price'=>$total))?></td>
    </tr>
    <tr>
        <td>Pesan</td><td>:</td>
        <td><?php echo !empty($value->bil_message)?$value->bil_message:"-"?></td>
    </tr>
</table>
<h2>Rincian :</h2>
<table>
    <tr>
        <th>No</th>
        <th>Judul Buku</th>
        <th>Jumlah</th>
        <th>Harga Satuan</th>
        <th>Harga Total</th>
    </tr>
    <?php $i=1;foreach($purchase as $pur):?>
        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $pur->purBook->b_title?></td>
            <td><?php echo $pur->pur_quantity?></td>
            <td><?php $this->widget('PriceDisplayWidget',array('_price'=>$pur->purBook->b_price))?></td>
            <td><?php $this->widget('PriceDisplayWidget',array('_price'=>$pur->pur_total_price))?></td>
        </tr>
    <?php $i++;endforeach;?>
        <tr>
            <td colspan="4">
                Ongkos Kirim
            </td>
            <td>
                <?php $this->widget('PriceDisplayWidget',array('_price'=>$value->bilShippingCharges->sc_cost))?>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                Total yang Dibayar
            </td>
            <td>
                <?php $this->widget('PriceDisplayWidget',array('_price'=>$total))?>
            </td>
        </tr>
</table>
<a href="<?php echo $this->createUrl('default/list');?>">Back</a>
