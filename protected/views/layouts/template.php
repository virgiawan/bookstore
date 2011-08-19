<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/css/admin.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/css/pager.css" type="text/css"/>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <?php if(Yii::app()->user->getState('role')=='admin'):?>
                    <h1>Welcome Admin</h1>
                <?php else:?>
                    <h1>ObralBuku.com</h1>
                <?php endif;?>
            </div>
            <div id="menu">
                <?php if(Yii::app()->user->getState('role')=='admin'):?>
                    <h2>Menu</h2>
                    <ul>
                        <li>
                            <a href="">Book</a>
                            <ul>
                                <li><a href="<?php echo Yii::app()->createUrl('//book/admin/add')?>">Add Book</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('//book/admin/list')?>">List Book</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="">Billing</a>
                            <ul>
                                <li><a href="<?php echo Yii::app()->createUrl('//billing/admin/list')?>">List Billing</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="">Member</a>
                            <ul>
                                <li><a href="<?php echo Yii::app()->createUrl('//member/admin/list')?>">List Member</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="">Category</a>
                            <ul>
                                <li><a href="<?php echo Yii::app()->createUrl('//category/admin/add')?>">Add Category</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('//category/admin/list')?>">List Category</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="">Publisher</a>
                            <ul>
                                <li><a href="<?php echo Yii::app()->createUrl('//publisher/admin/add')?>">Add Publisher</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('//publisher/admin/list')?>">List Publisher</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="">Account</a>
                            <ul>
                                <li><a href="<?php echo Yii::app()->createUrl('//member/admin/changepassword')?>">Change Password</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="">Logout</a>
                            <ul>
                                <li><a href="<?php echo Yii::app()->createUrl('//login/admin/logout')?>">Logout ( <?php echo Yii::app()->user->getState('role')?> )</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php endif;?>
            </div>
            <div id="content"><?php echo $content; ?></div>
            <div id="footer"><center>ObralBuku</center></div>
        </div>
    </body>
</html>