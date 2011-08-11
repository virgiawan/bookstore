<h2>List Billing</h2>
<?php $this->widget('ErrorDisplayWidget',array('msg'=>$msg));?>
<form action="<?php echo $this->createUrl('admin/search');?>" method="POST">
    Bil Id : <input type="text" name="bilsearch" /> <input type="submit" value="Search" />
</form>
<table>
    <tr>
        <th>Date</th>
        <th>Billing Id</th>
        <th>Customer</th>
        <th>Total Price</th>
        <th>Payment Status</th>
        <th>Shipping Status</th>
        <th>Detail</th>
    </tr>
    <?php foreach($value as $vl):?>
        <tr>
            <td><?php echo $vl->bil_date;?></td>
            <td><?php echo $vl->bil_id."-".$vl->bil_key."-".$vl->bil_member_id?></td>
            <td><?php echo $vl->bilMember->m_name?></td>
            <td><?php $total=$vl->bil_total_price+$vl->bilShippingCharges->sc_cost;$this->widget('PriceDisplayWidget',array('_price'=>$total))?></td>
            <td>
                <?php if($vl->bil_status==0):?>
                    <a href="<?php echo $this->createUrl('admin/payment',array('billid'=>$vl->bil_id))?>">Not yet</a>
                <?php else:?>
                    Paid
                <?php endif;?>
            </td>
            <td>
                <?php if($vl->bil_shipping_status==0):?>
                    <a href="<?php echo $this->createUrl('admin/shipping',array('billid'=>$vl->bil_id))?>">Deffered</a>
                <?php else:?>
                    Sent
                <?php endif;?>
            </td>
            <td>
                <a href="<?php echo $this->createUrl('admin/detail',array('billid'=>$vl->bil_id))?>">Detail</a>
            </td>
        </tr>
    <?php endforeach;?>
</table>
<?php $this->widget('CLinkPager',array('pages'=>$pages))?>
