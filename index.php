<?php include_once('header.php'); ?>


<body id="page">
<div class="container">
<header class="header">
       <a class="logo-head" href="#">
       	<img src="<?php echo $resourcePath ?>/img/layout/logo.png" class="logo"/>
                    
                    <h2 class="fl">ST.ANN'S SCHOOL</h2>
                    </a>
        <div class="content-login">
            <p style="float:right;color:#7A7A7A;"><a href="#sign-up" data-toggle="modal" role="button"><img
                        src="<?php echo $resourcePath ?>/img/layout/login.png" width="15" height="15"/>Login</a></p>
        </div>
            
	<div class="clear"></div>
</header>


<div class="flash-news" >
    <marquee behavior="scroll" direction="left" onMouseOver="this.stop();" onMouseOut="this.start();">
        10th STD EXAMINATION RESULT WILL BE PUBLISH ON 1-DEC-2013
    </marquee>
</div>



   



<!-- DIV FOR IMAGE SLIDER  -->
<div align="center">

    <div id="myCarousel" class="carousel slide" style="width:980px; height:380px;">
        <!--  <ol class="carousel-indicators">
             <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
             <li data-target="#myCarousel" data-slide-to="1"></li>
             <li data-target="#myCarousel" data-slide-to="2"></li>
         </ol>  -->
        <!-- Carousel items -->
        <div class="carousel-inner">
            <div class="active item"><img src="<?php echo $resourcePath ?>/img/layout/image1.jpg"/></div>
            <div class="item"><img src="<?php echo $resourcePath ?>/img/layout/image2.jpg"/></div>
            <div class="item"><img src="<?php echo $resourcePath ?>/img/layout/image3.jpg"/></div>
        </div>
        <!-- Carousel nav -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>

    <!-- <img src="img/layout/t3slider.jpg" alt="" width="940" height="380" /> -->
</div>

<!-- END OF DIV FOR IMAGE SLIDER  -->


<div class="wrapper">
	<aside class="left-box">
		<div class="news-box">
        <h4>Lalest News</h4>
        <article class="news-body">
        <marquee behavior="scroll" direction="down" onMouseOver="this.stop();" onMouseOut="this.start();">
       		<ul>
            	<li>Examination Result</li>
                <li>Admisson form applyed status result</li>
                <li>Tender applyed status result</li>
            </ul>
            
    </marquee>
        
        </article>
        </div>
    
    <div class="news-box">
        <h4>Eventes</h4>
        <article class="news-body">
        	<a href="#">
        	<img src="public/img/layout/calendar.png" />
        	</a>
        </article>
        </div>
    
    
    </aside>

    <section class="content-pg clearfix">

        <div class="tab-content">

            <div class="tab-pane active" id="hometab" >

                <?php include_once('ourvission.php'); ?>
            </div>
            <div class="tab-pane" id="contact-tab">
                <?php include_once('contact-us.php'); ?>
            </div>
        </div>
    </section>
<div class="clear"></div>
</div>
<?php include_once('footer.php'); ?>
</div>