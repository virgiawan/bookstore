<h1>Billing Anda</h1>
<h2>Informasi billing</h2>
<table>
    <tr>
        <td>Bil key</td><td>:</td>
        <td><?php echo $value->bil_id."-".$value->bil_key."-".$value->bil_member_id?></td>
    </tr>
    <tr>
        <td>Nama</td><td>:</td>
        <td><?php echo $value->bilMember->m_name;?></td>
    </tr>
    <tr>
        <td>Tujuan kirim</td><td>:</td>
        <td><?php echo $value->bil_address_destination?></td>
    </tr>
     <tr>
        <td>Wilayah</td><td>:</td>
        <td><?php echo $value->bilShippingCharges->sc_location;?></td>
    </tr>
    <tr>
        <td>Ongkos kirim</td><td>:</td>
        <td><?php $this->widget('PriceDisplayWidget',array('_price'=>$value->bilShippingCharges->sc_cost))?></td>
    </tr>
    <tr>
        <td>Total yang harus dibayar</td><td>:</td>
        <td><?php $total=$value->bilShippingCharges->sc_cost+$value->bil_total_price;$this->widget('PriceDisplayWidget',array('_price'=>$total))?></td>
    </tr>
    <tr>
        <td>Pesan</td><td>:</td>
        <td><?php echo !empty($value->bil_message)?$value->bil_message:"-"?></td>
    </tr>
</table>
<h2>Rincian</h2>
<table>
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Jumlah</th>
        <th>Harga Satuan</th>
        <th>Harga</th>
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
                Ongkos kirim
            </td>
            <td>
                <?php $this->widget('PriceDisplayWidget',array('_price'=>$value->bilShippingCharges->sc_cost))?>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                Total
            </td>
            <td>
                <?php $this->widget('PriceDisplayWidget',array('_price'=>$total))?>
            </td>
        </tr>
</table>
