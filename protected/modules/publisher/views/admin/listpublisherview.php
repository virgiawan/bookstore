<h2>List Publisher</h2>
<table>
    <tr>
        <th>No</th>
        <th>Publisher</th>
    </tr>
    <?php $i=1;foreach($value as $vl):?>
        <tr>
            <td><?php echo $i?></td>
            <td><?php echo $vl->p_publisher?></td>
        </tr>
    <?php $i++;endforeach;?>
</table>
