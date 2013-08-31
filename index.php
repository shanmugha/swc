<?php include_once('header.php'); ?>

<body id="page">
<header class="header">
    <div class="container">
        <div class="content-school-logo"><a class="logo" href="#"><img
                    src="<?php echo $resourcePath ?>/img/layout/logo.png" width="54" height="66"/></a></div>
        <div class="content-login">
            <p style="float:right;color:#7A7A7A;"><a href="#sign-up" data-toggle="modal" role="button"><img
                        src="<?php echo $resourcePath ?>/img/layout/login.png" width="15" height="15"/>Login</a></p>
        </div>
        <div class="content-heading">
            <h2 align="left">ST.ANN'S SCHOOL</h2>
            <h6 style="margin-bottom:4px; margin-top:2px; margin-left:5px;">( Affiliated to CBSE, No.930688 )</h6>
            <h5 align="left">AYOOR- 691 533, KOLLAM (Dist.), KERALA</h5>
        </div>
    </div>
</header>
<div style="margin-top:15px; margin-bottom:15px;">
    <marquee behavior="scroll" direction="left" onMouseOver="this.stop();" onMouseOut="this.start();"
             style="color:#FF0000;font-size:14px;">
        10th STD EXAMINATION RESULT WILL BE PUBLISH ON 1-DEC-2013
    </marquee>
</div>


<div class="container" >
   <ul  id="menu">
    <li><a  href="#hometab" id="#hometab" data-toggle="tab"> Home </a></li>
    <li><a   href="#"> About </a>
	                 <ul>
                        <li><a href="#" title="Our Vision">Our Vision</a></li>
						<li><a href="#" title="Infrastructure">Infrastructure</a></li>
                     </ul>
	</li>
    <li><a  href="#"> Gallery </a></li>
    <li><a  href="#contact-tab" id="#contact-tab" data-toggle="tab"> Contact </a></li>
    <li ><a  href="#"> People </a>

	                  <ul>
                        <li><a href="#" title="Faculty">Faculty</a></li>
						<li><a href="#" title="Students">Students</a></li>
                        <li><a href="#" title="Management">Management</a></li>
                     </ul>
	</li>
  </ul>

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
    <section class="content-pg clearfix">

        <div class="tab-content">

            <div class="tab-pane active" id="hometab" >

                <?php include_once('home.php'); ?>
            </div>
            <div class="tab-pane" id="contact-tab">
                <?php include_once('contact-us.php'); ?>
            </div>
        </div>
    </section>

</div>
<?php include_once('footer.php'); ?>
