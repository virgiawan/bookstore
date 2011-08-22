<h2>Add Publisher</h2>
<b class="msg"><?php $this->widget('ErrorDisplayWidget',array('msg'=>$msg))?></b>
<form action="" method="POST">
    <table>
        <tr>
            <td>Publisher</td><td>:</td>
            <td><input type="text" name="p_publisher" maxlength="64"/></td>
        </tr>
        <tr>
            <td colspan="3" align="right">
                <input type="submit" value="Add">
            </td>
        </tr>
    </table>
</form>
