<h1>Ubah Password</h1>
<?php $this->widget('ErrorDisplayWidget',array('msg'=>$msg));?>
<form action="" method="POST">
    <table>
        <tr>
            <td>Password lama</td><td>:</td>
            <td>
                <input type="password" name="old_pwd" />
            </td>
        </tr>
        <tr>
            <td>Passwod baru</td><td>:</td>
            <td>
                <input type="password" name="m_password" />
            </td>
        </tr>
        <tr>
            <td>Ketik ulang password</td><td>:</td>
            <td>
                <input type="password" name="re_password" />
            </td>
        </tr>
        <tr>
            <td colspan="3" align="right">
                <input type="submit" value="Ubah Password"/>
            </td>
        </tr>
    </table>
</form>
