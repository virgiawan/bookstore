<h2>List Billing</h2>
<b class="msg"><?php $this->widget('ErrorDisplayWidget',array('msg'=>$msg));?></b>
<form action="<?php echo $this->createUrl('admin/search');?>" method="POST">
    Bil Id : <input type="text" name="bilsearch" /> <input type="submit" value="Search" />
</form>
<table>
    <tr style="background-color: pink">
        <th>No</th>
        <th>Date</th>
        <th>Billing Id</th>
        <th>Customer</th>
        <th>Total Price</th>
        <th>Payment Status</th>
        <th>Shipping Status</th>
        <th>Detail</th>
    </tr>
    <?php $i=1;foreach($value as $vl):?>
         <?php
            if($i%2==0){
                $color='#fff';
            }
            else{
                $color='#7FB7D6';
            }
        ?>
        <tr style="background-color: <?php echo $color;?>">
            <td><?php echo $i?></td>
            <td><?php echo $vl->bil_date;?></td>
            <td><?php echo $vl->bil_id."-".$vl->bil_key."-".$vl->bil_member_id?></td>
            <td><?php echo $vl->bilMember->m_name?></td>
            <td><?php $total=$vl->bil_total_price+$vl->bilShippingCharges->sc_cost;$this->widget('PriceDisplayWidget',array('_price'=>$total))?></td>
            <td>
                <?php if($vl->bil_status==0):?>
                    <a href="<?php echo $this->createUrl('admin/payment',array('billid'=>$vl->bil_id))?>">Not yet</a>
                <?php else:?>
                    <b style="color: #009">Paid</b>
                <?php endif;?>
            </td>
            <td>
                <?php if($vl->bil_shipping_status==0):?>
                    <a href="<?php echo $this->createUrl('admin/shipping',array('billid'=>$vl->bil_id))?>">Deffered</a>
                <?php else:?>
                    <b style="color:#009">Sent</b>
                <?php endif;?>
            </td>
            <td>
                <a href="<?php echo $this->createUrl('admin/detail',array('billid'=>$vl->bil_id))?>">Detail</a>
            </td>
        </tr>
    <?php $i++;endforeach;?>
</table>
<br>
<?php $this->widget('CLinkPager',array('pages'=>$pages))?>
