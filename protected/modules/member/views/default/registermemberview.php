<h1>Buat Account :</h1>
<?php $this->widget('ErrorDisplayWidget',array('msg'=>$msg))?>
* Harus diisi
<form action="" method="POST">
    <table>
        <tr>
            <td>* Nama</td><td>:</td>
            <td><input type="text" name="m_name" value="<?php echo isset($value->m_name)?$value->m_name:""?>" /></td>
        </tr>
        <tr>
            <td>* Email</td><td>:</td>
            <td><input type="text" name="m_email" value="<?php echo isset($value->m_email)?$value->m_email:""?>" /></td>
        </tr>
        <tr>
            <td>* Password</td><td>:</td>
            <td><input type="password" name="m_password" /></td>
        </tr>
        <tr>
            <td>* Ketik ulang password</td><td>:</td>
            <td><input type="password" name="re_password" /></td>
        </tr>
        <tr>
            <td>* Alamat</td><td>:</td>
            <td><input type="text" name="m_address" value="<?php echo isset($value->m_address)?$value->m_address:""?>" /></td>
        </tr>
        <tr>
            <td colspan="3" align="right">
                <input type="submit" value="Daftar" />
            </td>
        </tr>
    </table>
</form>
