<h2>Add Category</h2>
<?php $this->widget('ErrorDisplayWidget',array('msg'=>$msg))?>
<form action="" method="POST">
    <table>
        <tr>
            <td>Category</td><td>:</td>
            <td><input type="text" name="c_category" maxlength="64"/></td>
        </tr>
        <tr>
            <td colspan="3" align="right">
                <input type="submit" value="Add">
            </td>
        </tr>
    </table>
</form>
