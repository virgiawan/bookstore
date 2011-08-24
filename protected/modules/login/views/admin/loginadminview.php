<h2>Login Administrator :</h2>
<b class="msg"><?php $this->widget('ErrorDisplayWidget',array('msg'=>$msg));?></b>
<form action="" method="POST">
    <table>
        <tr>
            <td>* Username (Email)</td><td>:</td>
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
            <td colspan="3">
                <input type="submit" value="Login" />
            </td>
        </tr>
    </table>
</form>