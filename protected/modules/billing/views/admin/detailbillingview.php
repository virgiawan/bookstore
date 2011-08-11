<h2>Billing <?php echo $value->bil_id."-".$value->bil_key."-".$value->bil_member_id.", date : ".$value->bil_date." (".$value->bilMember->m_name.")"?></h2>
<h3>Billing Information :</h3>
<table>
    <tr>
        <td>Bil key</td><td>:</td>
        <td><?php echo $value->bil_id."-".$value->bil_key."-".$value->bil_member_id?></td>
    </tr>
    <tr>
        <td>Payment Status</td><td>:</td>
        <td>
            <?php if($value->bil_status==0):?>
                <a href="<?php echo $this->createUrl('admin/payment',array('billid'=>$value->bil_id))?>">Not yet</a>
            <?php else:?>
                Paid
            <?php endif;?>
        </td>
    </tr>
    <tr>
        <td>Shipping Status</td><td>:</td>
        <td>
             <?php if($value->bil_shipping_status==0):?>
                <a href="<?php echo $this->createUrl('admin/shipping',array('billid'=>$value->bil_id))?>">Deffered</a>
            <?php else:?>
                Sent
            <?php endif;?>
        </td>
    </tr>
    <tr>
        <td>Customer Name</td><td>:</td>
        <td><?php echo $value->bilMember->m_name;?></td>
    </tr>
    <tr>
        <td>Send Destination</td><td>:</td>
        <td><?php echo $value->bil_address_destination?></td>
    </tr>
     <tr>
        <td>Location</td><td>:</td>
        <td><?php echo $value->bilShippingCharges->sc_location;?></td>
    </tr>
    <tr>
        <td>Shipping Charges</td><td>:</td>
        <td><?php $this->widget('PriceDisplayWidget',array('_price'=>$value->bilShippingCharges->sc_cost))?></td>
    </tr>
    <tr>
        <td>Total Cost</td><td>:</td>
        <td><?php $total=$value->bilShippingCharges->sc_cost+$value->bil_total_price;$this->widget('PriceDisplayWidget',array('_price'=>$total))?></td>
    </tr>
    <tr>
        <td>Message</td><td>:</td>
        <td><?php echo !empty($value->bil_message)?$value->bil_message:"-"?></td>
    </tr>
</table>
<h3>Details :</h3>
<table>
    <tr>
        <th>No</th>
        <th>Book Title</th>
        <th>Quantity</th>
        <th>Unit Price</th>
        <th>Total Price</th>
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
                Shipping Charges
            </td>
            <td>
                <?php $this->widget('PriceDisplayWidget',array('_price'=>$value->bilShippingCharges->sc_cost))?>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                Total Cost
            </td>
            <td>
                <?php $this->widget('PriceDisplayWidget',array('_price'=>$total))?>
            </td>
        </tr>
</table>
<a href="<?php echo $this->createUrl('admin/list');?>">Back</a>
