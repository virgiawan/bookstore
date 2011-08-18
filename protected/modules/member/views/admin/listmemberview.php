<h2>List Member</h2>
<table>
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Address</th>
        <th>Email</th>
    </tr>
    <?php $i=1;foreach($value as $vl):?>
            <tr>
                <td><?php echo $i?></td>
                <td><?php echo $vl->m_name?></td>
                <td><?php echo $vl->m_address?></td>
                <td><?php echo $vl->m_email?></td>
            </tr>
    <?php $i++;endforeach;?>
</table>
<?php $this->widget('CLinkPager',array('pages'=>$pages))?>
