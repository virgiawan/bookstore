<h2>List Category</h2>
<table>
    <tr>
        <th>No</th>
        <th>Category</th>
    </tr>
    <?php $i=1;foreach($value as $vl):?>
        <tr>
            <td><?php echo $i?></td>
            <td><?php echo $vl->c_category?></td>
        </tr>
    <?php $i++;endforeach;?>
</table>
