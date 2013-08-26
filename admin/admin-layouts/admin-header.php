<?php
  session_start();  // include in the first line 
  ob_start();
  
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
        $(document).ready(function() {;
            $(".active-tab").click(function(){
                $(".active-tab").next(".sub-nav").slideToggle("slow"); });
            $(".active-list").click(function(){
                $(".active-list").next(".sub-t").toggle(); });
        });
    </script>
</head>
<body>
<header class="header">
    <div class="container clearfix">
        <a class="logo" href="#"><img src="<?php echo $resourcePath;?>img/layout/logo.png" />St.Ann's School</a>
        <a class="login" href="#sign-up" data-toggle="modal" role="button" ><i class="icon-share icon-white"></i>Logout</a>
    </div>
</header>
<?php
/*
 * connect to database
 *
 *  http://stackoverflow.com/questions/8041330/include-file-from-different-directory
 */
 

   // require_once(__DIR__ . '/../../config/connection.php');
    include(dirname(__FILE__)."/../../config/connection.php");
    $connect = new Connection();
    $url = explode('/', $_SERVER["REQUEST_URI"]);
   // ob_start();
   // session_start();
    $_SESSION['flash_messages'];
/*
 * library flash message
 */
    include('../public/library/FlashMessage/Flash.php');
?>
<section class="admin-tab">
    <ul class="tab-bar">
        <li>
            <a class="active-tab" href="#student" data-toggle="tab">People</a>
            <ul class="sub-nav" <?php if(in_array($url[2], array('teachers.php','students.php', 'management.php'))){?> style="display: block" <?php }?>>
                <li><a class="sub-list <?php if($url[2] == 'teachers.php'){echo 'current';}?>" href="teachers.php">Teachers</a></li>
                <li><a class="sub-list <?php if($url[2] == 'students.php'){echo 'current';}?>" href="students.php">Students</a></li>
                <li><a class="sub-list <?php if($url[2] == 'management.php'){echo 'current';}?>" href="management.php">Management</a></li>
            </ul>
        </li>
        <li>
            <a class="active-tab" href="#gallery" data-toggle="tab">Gallery</a>
            <ul class="sub-nav" <?php if(in_array($url[2], array('manage-album.php', 'gallery-upload-images.php'))){?> style="display: block" <?php }?>>
                <li><a class="sub-list <?php if($url[2] == 'manage-album.php'){echo 'current';}?>" href="manage-album.php">Albums</a></li>
                <li><a class="sub-list <?php if($url[2] == 'gallery-upload-images.php'){echo 'current';}?>" href="gallery-upload-images.php">Upload Images</a></li>
            </ul>
        </li>
        <li>
            <a class="active-tab" href="#news" data-toggle="tab">News</a>
            <ul class="sub-nav" <?php if(in_array($url[2], array('news.php'))){?> style="display: block" <?php }?>>
                <li><a class="sub-list <?php if($url[2] == 'news.php'){echo 'current';}?>" href="news.php">Latest News</a></li>
            </ul>
        </li>
        <li><a class="active-tab" href="#" data-toggle="tab">About School</a>
            <ul class="sub-nav" <?php if(in_array($url[2], array('infrastructure.php', 'contact.php'))){?> style="display: block" <?php }?>>
                <li><a class="sub-list <?php if($url[2] == 'infrastructure.php'){echo 'current';}?>" href="infrastructure.php">Infrastructure</a></li>
                <li><a class="sub-list <?php if($url[2] == 'contact.php'){echo 'current';}?>" href="contact.php">Contact us</a></li>
				<li><a class="sub-list" href="#">Fee Structure</a></li>
                <li><a class="sub-list" href="#">Others</a></li>
            </ul>
        </li>
        <li><a href="#">Examination</a></li>
        <li>
            <a class="active-tab" href="#" data-toggle="tab">Events</a>
            <ul class="sub-nav" <?php if(in_array($url[2], array('events.php'))){?> style="display: block" <?php }?>>
                <li><a class="sub-list <?php if($url[2] == 'events.php'){echo 'current';}?>" href="events.php">Add Events</a></li>
            </ul>
        </li>

        <li>
            <a class="active-tab" href="#" data-toggle="tab">Settings</a>
            <ul class="sub-nav" <?php if(in_array($url[2], array('change-password.php'))){?> style="display: block" <?php }?>>
                <li><a class="sub-list <?php if($url[2] == 'change-password.php'){echo 'current';}?>" href="change-password.php">Change Password</a></li>
            </ul>
        </li>
    </ul>