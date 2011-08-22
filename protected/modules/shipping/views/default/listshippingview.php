<h1>Daftar ongkos Kirim</h1>
<table>
    <tr>
        <th>No</th>
        <th>Wilayah</th>
        <th>Ongkos Kirim</th>
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
            <td><?php echo $vl->sc_location?></td>
            <td align="right"><?php $this->widget('PriceDisplayWidget',array('_price'=>$vl->sc_cost));?></td>
        </tr>
    <?php $i++;endforeach;?>
</table>
* Daftar ongkos kirim dapat berubah tanpa pemberitahuan
<div class="back_button">
    <a href="javascript:self.history.back();">Back</a>
</div>