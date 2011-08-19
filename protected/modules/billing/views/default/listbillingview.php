<h1>Daftar Billing Anda</h1>
<?php if($value != null):?>
    <table>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Bil Id</th>
            <th>Status Pembayaran</th>
            <th>Status Pengiriman</th>
            <th>Total Pembayaran</th>
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
                <td align="right"><?php $total=$vl->bilShippingCharges->sc_cost+$vl->bil_total_price;$this->widget('PriceDisplayWidget',array('_price'=>$total))?></td>
                <td class="table_link"><a href="<?php echo $this->createUrl('default/detail',array('billid'=>$vl->bil_id))?>">Detail</a></td>
            </tr>
        <?php $i++;endforeach;?>
    </table>
<?php else:?>
    <b>Anda belum pernah melakukan transaksi</b>
<?php endif;?>
<div class="back_button">
    <a href="javascript:self.history.back();">Back</a>
</div>