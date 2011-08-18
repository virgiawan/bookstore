<h1>Login Member :</h1>
<?php $this->widget('ErrorDisplayWidget',array('msg'=>$msg));?>
<?php if(Yii::app()->request->cookies['buy']):?>
    Untuk melakukan pembelian Anda harus login terlebih dahulu
<?php endif;?>
<form action="" method="POST">
    <table>
        <tr>
            <td>* Username</td><td>:</td>
            <td>
                <input type="text" name="username" />
            </td>
        </tr>
        <tr>
            <td>* Password</td><td>:</td>
            <td>
                <input type="password" name="password" />
            </td>
        </tr>
        <tr>
            <td colspan="3" align="right">
                <input type="submit" value="Login" />
            </td>
        </tr>
    </table>
</form>
    Buat account, klik di <a href="<?php echo $this->createUrl('//member/default/register')?>">sini</a>