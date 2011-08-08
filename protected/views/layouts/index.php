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
<!--  Free CSS Templates -- Modified by Virgiawan Huda Akbar -->
<div id="obral_buku_container">
    <div id="obral_buku_menu">
        <!-- menu -->
        <ul>
            <li><a href="index.html" class="current">Beranda</a></li>
            <li><a href="form.html">Cara Pembelian</a></li>
            <li><a href="subpage.html">Tentang Kami</a></li>
        </ul>
        <!--search-->
        <div id="search">
            <form action="">
                    <input class="input_search" type="text" size="25" maxlength="100" value="              -- Cari buku --">
                    <input class="button_search" type="submit" value="Cari">
            </form>
        </div><!-- end of search -->
    </div><!-- end of menu -->
    
    <div id="obral_buku_header">
    	<div id="obral_buku_special_offers">
        	<p>
                Kami berikan diskon sebesar <span>25%</span> selama bulan ini.
        	</p>
			<a href="subpage.html" style="margin-left: 50px;">Selengkapnya..</a>
        </div>
        
        
        <div id="obral_buku_new_books">
        	<ul>
                <li>Cara Menjadi Pebisnis Sukses dalam 24 Jam</li>
                <li>100 Cara Membuat Bisnis Pecel Lele Anda Laris</li>
                <li>Indahnya Kebersamaan</li>
            </ul>
            <a href="subpage.html" style="margin-left: 50px;">Selengkapnya...</a>
        </div>
    </div> <!-- end of header -->
    
    <div id="obral_buku_content">
    	
        <div id="obral_buku_content_left">
        	<div class="obral_buku_content_left_section">
            	<h1>Kategori</h1>
                <ul>
                    <li><a href="subpage.html">Agama</a></li>
					<li><a href="#">Bahasa dan Sastra</a></li>
					<li><a href="#">Ekonomi</a></li>
					<li><a href="#">Kesehatan</a></li>
					<li><a href="#">Komik</a></li>
					<li><a href="#">Komputer</a></li>
                    <li><a href="subpage.html">Motivasi</a></li>
                    <li><a href="#">Novel</a></li>
                    <li><a href="#">Pelajaran</a></li>
                    <li><a href="#">Politik</a></li>
					<li><a href="#">Lihat semua kategori..</a></li>
            	</ul>
            </div>
			<div class="obral_buku_content_left_section">
            	<h1>Penerbit Populer :</h1>
                <ul>
                    <li><a href="subpage.html">Andi Publisher</a></li>
                    <li><a href="subpage.html">Gramedia Pustaka Utama</a></li>
                    <li><a href="#">Elex Media Komputindo</a></li>
                    <li><a href="#">Penebar Swadaya</a></li>
                    <li><a href="#">Erlangga</a></li>
                    <li><a href="#">Gagas Media</a></li>
                    <li><a href="#">Griya Kreasi</a></li>
                    <li><a href="#">DAR Mizan</a></li>
                    <li><a href="#">Ufuk Publishing</a></li>
					<li><a href="#">Kompas</a></li>
					<li><a href="#">Lihat semua penerbit..</a></li>
            	</ul>
            </div>
            
            <div class="obral_buku_content_left_section">   
				<h1>Layanan Online :</h1>
					<img class="status_ym" src="images/online.gif" alt="image"/>
			</div>
			<div class="obral_buku_content_left_section">                
				<img src="images/rss.png" width="45" height="45" alt="image" width="186"/>
				<img class="facebook" src="images/facebook_logo1.jpg" alt="image" width="130"/>
			</div>
			<div class="obral_buku_content_left_section">
				<h1>Berlangganan :</h1>
				<table class="subscribe">
					<tr><td><input class="input_subscribe" type="text" value="        -- Nama Anda --"/></td><td></td></tr>
					<tr><td><input class="input_subscribe" type="text" value="        -- Email Anda --" /></td><td align="right"><input class="ya" type="submit" value="Ya" /></td></tr>
				</table>
			</div>
        </div> <!-- end of content left -->
        <div id="obral_buku_content_right">
            <?php echo $content;?>
        </div> <!-- end of content right -->
    	<div class="cleaner_with_height">&nbsp;</div>
    </div> <!-- end of content -->
    <div id="obral_buku_footer">
	       <a href="subpage.html">Beranda</a> | <a href="subpage.html">Cara Pembelian</a> | <a href="subpage.html">Tentang Kami</a><br>
        Copyright © 2011 <a href="#"><strong>Obral Buku</strong></a></div>
    <!-- end of footer -->
<!--  Free CSS Template www.obral_buku.com -->
</div> <!-- end of container -->
</body>
</html>