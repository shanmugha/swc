<?php
session_start(); // include in the first line

/*
 * connect to database
 *
 *  http://stackoverflow.com/questions/8041330/include-file-from-different-directory
 */

include(dirname(__FILE__) . "/../../config/connection.php");
$connect   = new Connection();
$actualUrl = explode('/', $_SERVER["REQUEST_URI"]);
$cnt       = count($actualUrl) - 1;
$url       = $actualUrl[$cnt];
$_SESSION['flash_messages'];
/*
 * library flash message
 */
include('../public/library/FlashMessage/Flash.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php $resourcePath ='../public/' ?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>admin</title>
    <link rel="stylesheet" href="<?php echo $resourcePath;?>css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo $resourcePath;?>css/style.css" />
    <!--<script src="http://code.jquery.com/jquery-latest.min.js"></script>-->
    <script src="<?php echo $resourcePath;?>js/jquery.min.js"></script>
    <script src="<?php echo $resourcePath;?>js/jqbootstrapvalidation.js"></script>
    <script type="text/javascript" src="<?php echo $resourcePath;?>js/modernizr.custom.86080.js"></script>
    <script src="<?php echo $resourcePath;?>js/bootstrap.min.js"></script>
    <!--<script type="text/javascript" src="https://rnhckrdotcom.googlecode.com/svn/bloggerwidget/rnhckr-tripleflap.js"></script>
   --> <script type="text/javascript">
        $(document).ready(function() {
            $(".active-tab").on('click', function(){
                $(this).next(".sub-nav").slideToggle("slow");
                $('.sub-nav').hide();
                $(this).next().show()
            });
        });
    </script>
</head>
<body>
<!--<header class="header">
    <div class="container clearfix">
        <a class="logo" href="#"><img src="<?php /*echo $resourcePath;*/?>img/layout/logo.png" />St.Ann's School</a>
        <a class="login" href="#sign-up" data-toggle="modal" role="button" ><i class="icon-share icon-white"></i>Logout</a>
    </div>
</header>-->
<header class="header admin-header"><a href="#" class="logo-head"> <img class="logo" src="<?php echo $resourcePath;?>img/layout/logo.png" />

            <h2 class="fl">ST.ANN'S SCHOOL</h2> <br>

        </a>
		  
		 

        <div class="content-login">
            <p style="float:right;color:#7A7A7A;"><a  href="<?php echo $baseUrl.'?action=logout';?>"><img width="15" height="15" src="public//img/layout/login.png">Logout</a></p>
        </div>
        <div class="clear"></div>
    </header>

<section class="admin-tab">
    <ul class="tab-bar">
        <li>
            <a class="active-tab" href="#student" data-toggle="tab">People</a>
            <ul class="sub-nav" <?php if(in_array($url, array('teachers.php','students.php', 'management.php'))){?> style="display: block" <?php }?>>
                <li><a class="sub-list <?php if($url == 'teachers.php'){echo 'current';}?>" href="teachers.php">Teachers</a></li>
                <li><a class="sub-list <?php if($url == 'students.php'){echo 'current';}?>" href="students.php">Students</a></li>
                <li><a class="sub-list <?php if($url == 'management.php'){echo 'current';}?>" href="management.php">Management</a></li>
            </ul>
        </li>
        <li>
            <a class="active-tab" href="#gallery" data-toggle="tab">Gallery</a>
            <ul class="sub-nav" <?php if(in_array($url, array('manage-album.php', 'gallery-upload-images.php'))){?> style="display: block" <?php }?>>
                <li><a class="sub-list <?php if($url == 'manage-album.php'){echo 'current';}?>" href="manage-album.php">Albums</a></li>
                <li><a class="sub-list <?php if($url == 'gallery-upload-images.php'){echo 'current';}?>" href="gallery-upload-images.php">Upload Images</a></li>
            </ul>
        </li>
        <li>
            <a class="active-tab" href="#news" data-toggle="tab">News</a>
            <ul class="sub-nav" <?php if(in_array($url, array('news.php'))){?> style="display: block" <?php }?>>
                <li>
                    <a class="sub-list <?php if($url == 'news.php'){echo 'current';}?>" href="news.php">Latest News</a>
                    <a class="sub-list <?php if($url == 'flashnews.php'){echo 'current';}?>" href="flashnews.php">Flash News</a>
                </li>
            </ul>
        </li>
        <li><a class="active-tab" href="#" data-toggle="tab">About School</a>
            <ul class="sub-nav" <?php if(in_array($url, array('infrastructure.php', 'contact.php', 'others.php'))){?> style="display: block" <?php }?>>
                <li><a class="sub-list <?php if($url == 'infrastructure.php'){echo 'current';}?>" href="infrastructure.php">Infrastructure</a></li>
                <li><a class="sub-list <?php if($url == 'contact.php'){echo 'current';}?>" href="contact.php">Contact us</a></li>
				<li><a class="sub-list" href="#">Fee Structure</a></li>
                <li><a class="sub-list <?php if($url == 'others.php'){echo 'current';}?>" href="others.php">Others</a></li>
            </ul>
        </li>
        <li><a href="#">Examination</a></li>
        <li>
            <a class="active-tab" href="#" data-toggle="tab">Events</a>
            <ul class="sub-nav" <?php if(in_array($url, array('events.php'))){?> style="display: block" <?php }?>>
                <li><a class="sub-list <?php if($url == 'events.php'){echo 'current';}?>" href="events.php">Add Events</a></li>
            </ul>
        </li>

        <li>
            <a class="active-tab" href="#" data-toggle="tab">Settings</a>
            <ul class="sub-nav" <?php if(in_array($url, array('change-password.php'))){?> style="display: block" <?php }?>>
                <li><a class="sub-list <?php if($url == 'change-password.php'){echo 'current';}?>" href="change-password.php">Change Password</a></li>
            </ul>
        </li>
    </ul>