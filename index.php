<?php

ob_start();
$baseurl = 'http://localhost/stanns/swc/';
//session start
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<html xmlns="http://www.w3.org/1999/xhtml">
<?php $resourcePath = 'public/'?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>home</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Fullscreen Background Image Slideshow with CSS3 - A Css-only fullscreen background image slideshow" />
<meta name="keywords" content="css3, css-only, fullscreen, background, slideshow, images, content" />
<meta name="author" content="Sujith K S" />
<title>home</title>

<link rel="stylesheet" href="<?php echo $resourcePath ?>/css/bootstrap.css" />
<link rel="stylesheet" href="<?php echo $resourcePath ?>/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo $resourcePath ?>/css/style1.css" />
<link rel="stylesheet" href="<?php echo $resourcePath ?>/css/menu.css">
<link rel="stylesheet" href="<?php echo $resourcePath ?>/css/uploadify.css">
<link rel="stylesheet" type="text/css" href="<?php echo $resourcePath ?>/css/style.css" />
<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!--<script src="http://code.jquery.com/jquery-latest.min.js"></script>-->
    <script type="text/javascript" src="<?php echo $resourcePath ?>/js/jquery.min.js"></script>

<script type="text/javascript" src="<?php echo $resourcePath ?>/js/modernizr.custom.86080.js"></script>
<script type="text/javascript" src="<?php echo $resourcePath ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://rnhckrdotcom.googlecode.com/svn/bloggerwidget/rnhckr-tripleflap.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	    $('#myModal').modal(options)

	        $('.carousel').carousel({
				interval: 500
			})
	});

</script>


<!--HERE IS THE JQUERY FOR DROPDOWN MENU CODE -->
<script type="text/javascript" src="<?php echo $resourcePath ?>/js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo $resourcePath ?>/js/drop_down_menu_ui.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $("img").hover(function() {
      $(this).stop().animate({opacity: "0.8"}, 'slow');
    },
    function() {
      $(this).stop().animate({opacity: "1"}, 'slow');
    });
  });
</script>
 <!-- END-->

</head>

<body id="page" >
<header class="header">
  <div class="container">
    <div class="content-school-logo"> <a class="logo" href="#"><img src="<?php echo $resourcePath ?>/img/layout/logo.png" width="54" height="66" /></a> </div>
    <div class="content-login">
      <p style="float:right;color:#7A7A7A;"><a href="#sign-up" data-toggle="modal" role="button"><img src="<?php echo $resourcePath ?>/img/layout/login.png" width="15" height="15" />Login</a></p>
    </div>
    <div class="content-heading" >
      <h2 align="left">ST.ANN'S SCHOOL</h2>
      <h6 style="margin-bottom:4px; margin-top:2px; margin-left:5px;" >( Affiliated to CBSE, No.930688 )</h6>
      <h5 align="left">AYOOR- 691 533, KOLLAM (Dist.), KERALA</h5>
    </div>
  </div>
</header>
<div  style="margin-top:15px; margin-bottom:15px;" >
  <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();" style="color:#FF0000;font-size:14px;">
  10th STD EXAMINATION RESULT WILL BE PUBLISH ON 1-DEC-2013
  </marquee>
</div>

<div class="container" >
   <ul  id="menu">
    <li><a  href="#"> Home </a></li>
    <li><a   href="#"> About </a>
	                 <ul>
                        <li><a href="#" title="Our Vision">Our Vision</a></li>
						<li><a href="#" title="Location">Location</a></li>
						<li><a href="#" title="Infrastructure">Infrastructure</a></li>
						<li><a href="#" title="News and Events">News and Events</a></li>
                     </ul>
	</li>
    <li><a  href="#"> Gallery </a></li>
    <li><a  href="#"> Contact </a></li>
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
<div align="center" >

    <div id="myCarousel" class="carousel slide" style="width:980px; height:380px;">
       <!--  <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>  -->
        <!-- Carousel items -->
        <div class="carousel-inner">
            <div class="active item"><img src="<?php echo $resourcePath ?>/img/layout/image1.jpg"/></div>
            <div class="item"><img src="<?php echo $resourcePath ?>/img/layout/image2.jpg" /></div>
            <div class="item"><img src="<?php echo $resourcePath ?>/img/layout/image3.jpg" /></div>
        </div>
        <!-- Carousel nav -->
            <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
            <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
   </div>

        <!-- <img src="img/layout/t3slider.jpg" alt="" width="940" height="380" /> -->
</div>

<!-- END OF DIV FOR IMAGE SLIDER  -->


<div class="wrapper">
    <?php
    /*
     * connect to database
     *
	 *  http://stackoverflow.com/questions/8041330/include-file-from-different-directory
	 */
	 
	
   // require_once dirname(__FILE__). '/config/connection.php';
    include(dirname(__FILE__)."/config/connection.php");
    $connect = new Connection();
    ?>
  <section class="content-pg clearfix">
      <?php include_once('home.php');?>
  </section>

</div>

 <footer class="footer">
    <div align="center">
      <h6><a style=" font-size:10px;color:#FFFFFF;" href="#">Copyright © 2013 St.Ann's School, All rights reserved.</a></h6>
    </div>
  </footer>
 <div id="sign-up" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <i class="icon-user"></i> <span id="myModalLabel">Login</span>
    </div>
    <div class="modal-body">

        <form class="bs-docs-example form-horizontal" method="post">
            <div class="control-group">
                <label for="inputEmail" class="control-label">Email</label>
                <div class="controls">
                    <input type="text" placeholder="Email" name="email" id="inputEmail">
                </div>
            </div>
            <div class="control-group">
                <label for="inputPassword" class="control-label">Password</label>
                <div class="controls">
                    <input type="password" placeholder="Password" name="password" id="inputPassword">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">

                    <button class="btn" name="login" type="submit">Sign in</button>
                </div>
            </div>
        </form>

    </div>
    <div class="modal-footer">

    </div>
</div>
</body>
</html>
