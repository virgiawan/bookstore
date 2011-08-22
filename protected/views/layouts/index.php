<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Obral Buku</title>
    <link href="<?php echo Yii::app()->request->baseUrl?>/css/style.css" rel="stylesheet" type="text/css" />
    <!-- Sript tooltip -->
    <script type="text/javascript">
        /***********************************************
        * Cool DHTML tooltip script- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
        * This notice MUST stay intact for legal use
        * Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
        ***********************************************/

        var offsetxpoint=-60 
        var offsetypoint=20 

        var offsetdivfrompointerX=10
        var offsetdivfrompointerY=14 

        document.write('<div id="dhtmltooltip"></div>') 


        var ie=document.all
        var ns6=document.getElementById && !document.all
        var enabletip=false
        if (ie||ns6)
        var tipobj=document.all? document.all["dhtmltooltip"] : document.getElementById? document.getElementById("dhtmltooltip") : ""

        function ietruebody(){
            return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
        }

        function ddrivetip(thetext, thecolor, thewidth){
            if (ns6||ie){
                if (typeof thewidth!="undefined") tipobj.style.width=thewidth+"px"
                if (typeof thecolor!="undefined" && thecolor!="") tipobj.style.backgroundColor=thecolor
                tipobj.innerHTML=thetext
                enabletip=true
                return false
            }
        }

        function positiontip(e){
            if (enabletip){
                var curX=(ns6)?e.pageX : event.clientX+ietruebody().scrollLeft;
                var curY=(ns6)?e.pageY : event.clientY+ietruebody().scrollTop;
                var rightedge=ie&&!window.opera? ietruebody().clientWidth-event.clientX-offsetxpoint : window.innerWidth-e.clientX-offsetxpoint-20
                var bottomedge=ie&&!window.opera? ietruebody().clientHeight-event.clientY-offsetypoint : window.innerHeight-e.clientY-offsetypoint-20
                var leftedge=(offsetxpoint<0)? offsetxpoint*(-1) : -1000
            if (rightedge<tipobj.offsetWidth)
                tipobj.style.left=ie? ietruebody().scrollLeft+event.clientX-tipobj.offsetWidth+"px" : window.pageXOffset+e.clientX-tipobj.offsetWidth+"px"
            else if (curX<leftedge)
                tipobj.style.left="5px"
            else
                tipobj.style.left=curX+offsetxpoint+"px"

            if (bottomedge<tipobj.offsetHeight)
                tipobj.style.top=ie? ietruebody().scrollTop+event.clientY-tipobj.offsetHeight-offsetypoint+"px" : window.pageYOffset+e.clientY-tipobj.offsetHeight-offsetypoint+"px"
            else
                tipobj.style.top=curY+offsetypoint+"px"
                tipobj.style.visibility="visible"
            }
        }

        function hideddrivetip(){
            if (ns6||ie){
                enabletip=false
                tipobj.style.visibility="hidden"
                tipobj.style.left="-1000px"
                tipobj.style.backgroundColor=''
                tipobj.style.width=''
            }
        }

        document.onmousemove=positiontip
    </script>
</head>
<body>
    <?php 
        $module=Yii::app()->controller->module->id;
        $action=Yii::app()->controller->action->id;
        $howtobuy=$shipping=$login=$search=$change=$book=$buy=$billing=$confirm="";
        if($module=='book' && $action=='buy'){
            $buy="current";
        }
        else if($module=='howtobuy' && $action=='how_to_buy'){
            $howtobuy="current";
        }
        else if($module=='shipping' && $action=='list'){
            $shipping="current";
        }
        else if($module=='book' && $action=='search'){
            $search="current";
        }
        else if($module=='login' && $action=='login'){
            $login="current";
        }
        else if($module=='member' && $action=='changepassword'){
            $change="current";
        }
        else if($module=='book' && $action=='confirm'){
            $confirm="current";
        }
        else if($module=='book'){
            $book="current";
        }
        else if($module=='billing'){
            $billing="current";
        }
    ?>
<!--  Free CSS Templates -- Modified by Virgiawan Huda Akbar -->
<div id="obral_buku_container">
    <div id="obral_buku_menu">
        <!-- menu -->
        <ul>
            <li><a href="<?php echo $this->createUrl('//book/default/list')?>" class="<?php echo $book?>">Beranda</a></li>
            <li><a href="<?php echo  $this->createUrl('//howtobuy/default/how_to_buy')?>" class="<?php echo $howtobuy?>">Cara Pembelian</a></li>
            <li><a href="<?php echo $this->createUrl('//shipping/default/list')?>" class="<?php echo $shipping?>">Ongkos Kirim</a></li>
            <li><a href="<?php echo $this->createUrl('//book/default/search')?>" class="<?php echo $search?>">Cari</a></li>
            <?php if(Yii::app()->request->cookies['buy']):?>
                <li><a href="<?php echo $this->createUrl('//book/default/buy')?>" class="<?php echo $buy?>">Keranjang Belanja</a></li>
            <?php endif?>
             <?php if(Yii::app()->request->cookies['confirm']!=null && Yii::app()->request->cookies['buy']==null):?>
                <li><a href="<?php echo $this->createUrl('//book/default/confirm')?>" class="<?php echo $confirm?>">Konfirmasi Pembayaran</a></li>
            <?php endif?>
            <?php if(Yii::app()->user->getState('role')!=null):?>
                <li><a href="<?php echo $this->createUrl('//billing/default/list')?>" class="<?php echo $billing?>">Daftar Billing</a></li>
                <li><a href="<?php echo $this->createUrl('//member/default/change_password')?>" class="<?php echo $change?>">Ubah Password</a></li>
                <li><a href="<?php echo $this->createUrl('//login/default/logout')?>">Logout ( <?php echo Yii::app()->user->getState('name')?> )</a></li>
            <?php else:?>
                <li><a href="<?php echo $this->createUrl('//login/default/login')?>" class="<?php echo $login?>">Login</a></li>
            <?php endif;?>
        </ul>
    </div><!-- end of menu -->
    
    <div id="obral_buku_header">
    	<div id="obral_buku_special_offers">
           <!-- <p>
            Kami berikan diskon sebesar <span>25%</span> selama bulan ini.
            </p>
            <a href="subpage.html" style="margin-left: 50px;">Selengkapnya..</a>-->
        </div>
        <div id="obral_buku_new_books">
            <!--<ul>
                <li>Cara Menjadi Pebisnis Sukses dalam 24 Jam</li>
                <li>100 Cara Membuat Bisnis Pecel Lele Anda Laris</li>
                <li>Indahnya Kebersamaan</li>
            </ul>-->
            <a href="subpage.html" style="margin-left: 50px;">Selengkapnya...</a>
        </div>
    </div> <!-- end of header -->
    
    <div id="obral_buku_content">
        <div id="obral_buku_content_left">
            <?php
                $facebook = Yii::app()->facebook->fbInit();
                $user = $facebook->getUser();
                $data = $facebook->api('/me');
                if($user!==0):
            ?>
                <div class="obral_buku_content_left_section">
                    <h1>Login via Facebook</h1>
                    <img src="https://graph.facebook.com/<?php echo $user?>/picture"/><br/>
                    Nama : <?php echo $data['name']?><br/>
                    Lokasi : <?php echo $data['location']['name']?>
                </div>
            <?php endif;?>
            <div class="obral_buku_content_left_section">
            	<h1>Kategori</h1>
                <?php $this->widget('CategoryDisplayWidget')?>
            </div>
            <div class="obral_buku_content_left_section">
            	<h1>Penerbit Populer :</h1>
                <?php $this->widget('PublisherDisplayWidget')?>
            </div>
            <div class="obral_buku_content_left_section">   
                <h1>Layanan Online :</h1>
                <a href="ymsgr:sendIM?hilex_co&m=Hello"><img class="ym" src="http://opi.yahoo.com/online?u=hilex_co&t=14" border="0" /></a>
            </div>
            <div class="obral_buku_content_left_section">                
                <img src="images/rss.png" width="45" height="45" alt="image" width="186"/>
                <img class="facebook" src="images/facebook_logo1.jpg" alt="image" width="130"/>
            </div>
        </div> <!-- end of content left -->
        <div id="obral_buku_content_right">
            <?php echo $content;?>
        </div> <!-- end of content right -->
        <div class="cleaner_with_height">&nbsp;</div>
    </div> <!-- end of content -->
    <div id="obral_buku_footer">
        <a href="<?php echo $this->createUrl('//book/default/list')?>">Beranda</a> | 
        <a href="form.html">Cara Pembelian</a> | 
        <?php if(Yii::app()->request->cookies['buy']):?>
            <a href="<?php echo $this->createUrl('//book/default/buy')?>">Keranjang Belanja</a> | 
        <?php endif?>
        <?php if(Yii::app()->request->cookies['confirm']):?>
            <a href="<?php echo $this->createUrl('//book/default/confirm')?>">Konfirmasi Pembayaran</a> | 
        <?php endif?>
        <?php if(Yii::app()->user->getState('role')!=null):?>
            <a href="<?php echo $this->createUrl('//billing/default/list')?>">Daftar Billing</a> | 
            <a href="<?php echo $this->createUrl('//member/default/changepassword')?>">Ubah Password</a> | 
            <a href="<?php echo $this->createUrl('//login/default/logout')?>">Logout ( <?php echo Yii::app()->user->getState('name')?> )</a>
        <?php else:?>
            <a href="<?php echo $this->createUrl('//login/default/login')?>">Login</a>
        <?php endif;?>
        <br/>Copyright © 2011 <a href="#"><strong>Obral Buku</strong></a>
    </div><!-- end of footer -->
<!--  Free CSS Template www.obral_buku.com -->
</div> <!-- end of container -->
</body>
</html>